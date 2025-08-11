<?php

declare(strict_types=1);

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

final class SocialMediaSettings extends Settings
{
    public ?string $linkedin;

    public ?string $whatsapp;

    public ?string $x;

    public ?string $facebook;

    public ?string $instagram;

    public ?string $tiktok;

    public ?string $medium;

    public ?string $youtube;

    public ?string $github;

    public static function group(): string
    {
        return 'social-media';
    }
}
