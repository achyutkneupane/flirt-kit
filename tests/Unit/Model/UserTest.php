<?php

declare(strict_types=1);

use App\Enums\UserRole;
use App\Models\User;

use function Pest\Laravel\actingAs;

it('returns correct lowerRoles for Developer', function (): void {
    /** @var User $developer */
    $developer = User::factory()->make(['role' => UserRole::Developer]);
    actingAs($developer);

    expect($developer->lowerRoles())->toBe([
        UserRole::Developer,
        UserRole::Admin,
        UserRole::User,
    ]);
});

test('developer can see another developer as lower in role', function (): void {
    /** @var User $developer1 */
    $developer1 = User::factory()->make(['role' => UserRole::Developer]);
    actingAs($developer1);

    /** @var User $developer2 */
    $developer2 = User::factory()->make(['role' => UserRole::Developer]);

    expect($developer2->isLowerInRole())->toBeTrue();
});

test('admin and user does not see developer as lower in role', function (): void {
    $target = User::factory()->make(['role' => UserRole::Developer]);

    /** @var User $admin */
    $admin = User::factory()->make(['role' => UserRole::Admin]);
    actingAs($admin);

    expect($target->isLowerInRole())->toBeFalse();

    /** @var User $user */
    $user = User::factory()->make(['role' => UserRole::User]);
    actingAs($user);

    expect($target->isLowerInRole())->toBeFalse();
});

it('can access filament panel after logging in', function (): void {
    $filamentPanel = filament()->getPanel('admin');

    /** @var User $user */
    $user = User::factory()->make(['role' => UserRole::Admin]);

    expect($user->canAccessPanel($filamentPanel))->toBeTrue();
});
