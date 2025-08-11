<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\UserRole;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

final class User extends Authenticatable implements FilamentUser
{
    use HasFactory;
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function canAccessPanel(Panel $panel): bool
    {
        // Update this method to control access to the Filament panel.
        // Here, we allow access only to users with the Developer or Admin role.
        return in_array($this->role, [
            UserRole::Developer,
            UserRole::Admin,
        ]);
    }

    /** @returns array<int, UserRole> */
    public function lowerRoles(): array
    {
        return match (auth()->user()->role) {
            UserRole::Developer => [UserRole::Developer, UserRole::Admin, UserRole::User],
            UserRole::Admin => [UserRole::User],
            UserRole::User => [],
        };
    }

    /** @returns bool */
    public function isLowerInRole(): bool
    {
        if (auth()->user()->role === UserRole::Developer) {
            return true;
        }

        return in_array($this->role, auth()->user()->lowerRoles());
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'role' => UserRole::class,
        ];
    }
}
