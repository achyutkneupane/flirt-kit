<?php

namespace App\Filament\Pages;

use App\Settings\SocialMediaSettings;
use BackedEnum;
use Exception;
use Filament\Forms\Components\TextInput;
use Filament\Pages\SettingsPage;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;

class ManageSocialMedia extends SettingsPage
{
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCog6Tooth;

    protected static string $settings = SocialMediaSettings::class;

    /**
     * @throws Exception
     */
    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
//                TextInput::make('linkedin'),
//                TextInput::make('whatsapp'),
//                TextInput::make('x'),
//                TextInput::make('facebook'),
//                TextInput::make('instagram'),
//                TextInput::make('tiktok'),
//                TextInput::make('medium'),
//                TextInput::make('youtube'),
//                TextInput::make('github'),
                TextInput::make('linkedin')
                    ->label('LinkedIn')
                    ->prefix('https://www.linkedin.com/in/'),
                TextInput::make('whatsapp')
                    ->label('WhatsApp'),
                TextInput::make('x')
                    ->label('X')
                    ->helperText('Formerly Twitter')
                    ->prefix('https://x.com/'),
                TextInput::make('facebook')
                    ->label('Facebook')
                    ->prefix('https://www.facebook.com/'),
                TextInput::make('instagram')
                    ->label('Instagram')
                    ->prefix('https://www.instagram.com/'),
                TextInput::make('tiktok')
                    ->label('TikTok')
                    ->prefix('https://www.tiktok.com/@'),
                TextInput::make('medium')
                    ->label('Medium')
                    ->prefix('https://medium.com/@'),
                TextInput::make('youtube')
                    ->label('YouTube')
                    ->prefix('https://www.youtube.com/@'),
                TextInput::make('github')
                    ->label('GitHub')
                    ->prefix('https://www.github.com/')
            ]);
    }
}
