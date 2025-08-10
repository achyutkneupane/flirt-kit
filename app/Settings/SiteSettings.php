<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class SiteSettings extends Settings
{
    public ?string $name;
    public ?string $description;
    public ?string $logo;
    public ?string $favicon;
    public ?string $og_image;


    public static function group(): string
    {
        return 'site';
    }
}
