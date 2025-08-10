<?php

declare(strict_types=1);

use App\Enums\UserRole;
use Filament\Support\Colors\Color;

describe('label', function (): void {
    it('returns correct label for each role', function (UserRole $userRole, string $expectedLabel): void {
        expect($userRole->getLabel())->toBe($expectedLabel);
    })->with([
        [UserRole::Developer, 'Developer'],
        [UserRole::Admin, 'Admin'],
        [UserRole::User, 'User'],
    ]);
});

describe('color', function (): void {
    it('returns correct color for each role', function (UserRole $userRole, Color|array $expectedColor): void {
        expect($userRole->getColor())->toBe($expectedColor);
    })->with([
        [UserRole::Developer, Color::Red],
        [UserRole::Admin, Color::Blue],
        [UserRole::User, Color::Green],
    ]);
});

describe('value', function (): void {
    it('has expected string values', function (UserRole $userRole, string $expectedValue): void {
        expect($userRole->value)->toBe($expectedValue);
    })->with([
        [UserRole::Developer, 'developer'],
        [UserRole::Admin, 'admin'],
        [UserRole::User, 'user'],
    ]);
});
