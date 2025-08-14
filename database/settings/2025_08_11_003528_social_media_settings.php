<?php

declare(strict_types=1);

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('social-media.linkedin', '');
        $this->migrator->add('social-media.whatsapp', '');
        $this->migrator->add('social-media.x', '');
        $this->migrator->add('social-media.facebook', '');
        $this->migrator->add('social-media.instagram', '');
        $this->migrator->add('social-media.tiktok', '');
        $this->migrator->add('social-media.medium', '');
        $this->migrator->add('social-media.youtube', '');
        $this->migrator->add('social-media.github', '');
    }
};
