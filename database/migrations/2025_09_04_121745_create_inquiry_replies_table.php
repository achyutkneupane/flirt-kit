<?php

declare(strict_types=1);

use App\Models\Inquiry;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('inquiry_replies', function (Blueprint $blueprint): void {
            $blueprint->id();
            $blueprint->foreignIdFor(Inquiry::class)
                ->constrained()
                ->cascadeOnDelete();
            $blueprint->foreignIdFor(User::class)
                ->constrained()
                ->cascadeOnDelete();
            $blueprint->text('message');
            $blueprint->string('ip_address')
                ->nullable();
            $blueprint->string('user_agent')
                ->nullable();
            $blueprint->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inquiry_replies');
    }
};
