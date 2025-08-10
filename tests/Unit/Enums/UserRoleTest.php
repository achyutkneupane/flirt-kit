<?php

use App\Enums\UserRole;
use Filament\Support\Colors\Color;

describe('label', function () {
    it('returns correct label for each role', function (UserRole $role, string $expectedLabel) {
        expect($role->getLabel())->toBe($expectedLabel);
    })->with([
        [UserRole::Developer, 'Developer'],
        [UserRole::Admin, 'Admin'],
        [UserRole::User, 'User'],
    ]);
});

describe('color', function () {
    it('returns correct color for each role', function (UserRole $role, Color|array $expectedColor) {
        expect($role->getColor())->toBe($expectedColor);
    })->with([
        [UserRole::Developer, Color::Red],
        [UserRole::Admin, Color::Blue],
        [UserRole::User, Color::Green],
    ]);
});

describe('value', function () {
    it('has expected string values', function (UserRole $role, string $expectedValue) {
        expect($role->value)->toBe($expectedValue);
    })->with([
        [UserRole::Developer, 'developer'],
        [UserRole::Admin, 'admin'],
        [UserRole::User, 'user'],
    ]);
});
