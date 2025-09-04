<?php

declare(strict_types=1);

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('site.name', 'FLIRT Kit');
        $this->migrator->add('site.description', 'The skeleton application for the Laravel framework with RILT (React, Inertia, Laravel & TailwindCSS) stack and Filament v4 as Admin Panel.');
        $this->migrator->add('site.logo', '');
        $this->migrator->add('site.favicon', '');
        $this->migrator->add('site.og_image', '');
        $this->migrator->add('site.header_scripts', '');
        $this->migrator->add('site.footer_scripts', '');
    }
};
