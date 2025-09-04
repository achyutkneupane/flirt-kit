<?php

declare(strict_types=1);

namespace App\Filament\Clusters\Settings\Pages;

use App\Filament\Clusters\Settings\SettingsCluster;
use App\Settings\SiteSettings;
use BackedEnum;
use Exception;
use Filament\Forms\Components\CodeEditor;
use Filament\Forms\Components\CodeEditor\Enums\Language;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Pages\SettingsPage;
use Filament\Schemas\Components\Section;
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
            ->columns(1)
            ->components([
                Section::make('Site Details')
                    ->description('These details are used in various places throughout the application, such as the site title and meta tags.')
                    ->aside()
                    ->schema([
                        TextInput::make('name')
                            ->label('Site Name')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('description')
                            ->label('Site Description')
                            ->required()
                            ->maxLength(500),
                    ]),
                Section::make('Site Images')
                    ->description('Images used for branding and social media sharing.')
                    ->aside()
                    ->schema([
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
                    ]),
                Section::make('Custom Scripts')
                    ->description('Add custom scripts to the header or footer of your site')
                    ->schema([
                        CodeEditor::make('header_scripts')
                            ->language(Language::Html)
                            ->label('Header Scripts')
                            ->helperText('Scripts added here will be included in the <head> section of your site.'),
                        CodeEditor::make('footer_scripts')
                            ->language(Language::Html)
                            ->label('Footer Scripts')
                            ->helperText('Scripts added here will be included before the closing </body> tag of your site.'),
                    ])
                    ->aside(),
            ]);
    }
}
