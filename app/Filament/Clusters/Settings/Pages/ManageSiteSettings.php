<?php

declare(strict_types=1);

namespace App\Filament\Clusters\Settings\Pages;

use App\Filament\Clusters\Settings\SettingsCluster;
use App\Settings\SiteSettings;
use BackedEnum;
use Exception;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Pages\SettingsPage;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;

final class ManageSiteSettings extends SettingsPage
{
    protected static string|BackedEnum|null $navigationIcon = Heroicon::GlobeAlt;

    protected static string|BackedEnum|null $activeNavigationIcon = Heroicon::OutlinedGlobeAlt;

    protected static string $settings = SiteSettings::class;

    protected static ?string $cluster = SettingsCluster::class;

    /**
     * @throws Exception
     */
    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name'),
                TextInput::make('description'),
                FileUpload::make('logo')
                    ->image()
                    ->disk('public')
                    ->imageEditor()
                    ->openable()
                    ->preserveFilenames()
                    ->previewable()
                    ->downloadable()
                    ->deletable(),
                FileUpload::make('favicon')
                    ->image()
                    ->disk('public')
                    ->imageEditor()
                    ->imageCropAspectRatio('1:1')
                    ->maxWidth('50')
                    ->openable()
                    ->preserveFilenames()
                    ->previewable()
                    ->downloadable()
                    ->imageResizeTargetWidth('50')
                    ->imageResizeTargetHeight('50')
                    ->imagePreviewHeight('250')
                    ->deletable()
                    ->rules([
                        'dimensions:ratio=1:1',
                        'dimensions:max_width=50,max_height=50',
                    ]),
                FileUpload::make('og_image')
                    ->image()
                    ->disk('public')
                    ->imageEditor()
                    ->imageCropAspectRatio('40:21')
                    ->openable()
                    ->preserveFilenames()
                    ->previewable()
                    ->downloadable()
                    ->deletable()
                    ->rules([
                        'dimensions:ratio=40/21',
                    ]),
            ]);
    }
}
