<?php

declare(strict_types=1);

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('social-media.linkedin', 'achyutneupane');
        $this->migrator->add('social-media.whatsapp', '+9779860323771');
        $this->migrator->add('social-media.x', 'achyutkneupane');
        $this->migrator->add('social-media.facebook', 'achyutkneupane');
        $this->migrator->add('social-media.instagram', 'achyut.neupane');
        $this->migrator->add('social-media.tiktok', 'achyutkneupane');
        $this->migrator->add('social-media.medium', 'achyutneupane');
        $this->migrator->add('social-media.youtube', 'AchyutNeupane');
        $this->migrator->add('social-media.github', 'achyutkneupane');
    }
};
