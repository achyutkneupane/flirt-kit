<?php

declare(strict_types=1);

namespace App\Filament\Resources\Inquiries\Schemas;

use Filament\Infolists\Components\RepeatableEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

final class InquiryInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(1)
            ->components([
                Section::make('Contact Details')
                    ->schema([
                        TextEntry::make('name')
                            ->label('Name')
                            ->inlineLabel(),
                        TextEntry::make('email')
                            ->label('Email')
                            ->inlineLabel(),
                        TextEntry::make('contact_number')
                            ->label('Contact Number')
                            ->placeholder('Not provided')
                            ->inlineLabel(),
                        TextEntry::make('created_at')
                            ->label('Received')
                            ->since()
                            ->dateTimeTooltip()
                            ->inlineLabel(),
                        TextEntry::make('ip_address')
                            ->label('IP Address')
                            ->placeholder('Not provided')
                            ->inlineLabel(),
                        TextEntry::make('user_agent')
                            ->label('User Agent')
                            ->placeholder('Not provided')
                            ->inlineLabel()
                            ->wrap(),
                        TextEntry::make('message')
                            ->label('Message')
                            ->columnSpanFull(),
                    ])
                    ->columns(),
                RepeatableEntry::make('replies')
                    ->schema([
                        TextEntry::make('user.name')
                            ->label('Replied By')
                            ->inlineLabel(),
                        TextEntry::make('created_at')
                            ->label('Replied')
                            ->since()
                            ->dateTimeTooltip()
                            ->inlineLabel(),
                        TextEntry::make('message')
                            ->label('Reply')
                            ->html()
                            ->columnSpanFull(),
                    ])
                    ->placeholder('No replies yet')
                    ->columns()
                    ->columnSpanFull(),
            ]);
    }
}
