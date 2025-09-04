<?php

declare(strict_types=1);

namespace App\Filament\Resources\Inquiries\Schemas;

use App\Actions\ReplyToInquiry;
use App\Models\Inquiry;
use App\Models\InquiryReply;
use Filament\Actions\Action;
use Filament\Forms\Components\RichEditor;
use Filament\Infolists\Components\RepeatableEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Notifications\Notification;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;

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
                    ->hintActions([
                        Action::make('reply-to-inquiry')
                            ->button()
                            ->outlined()
                            ->icon(Heroicon::OutlinedChatBubbleBottomCenterText)
                            ->model(InquiryReply::class)
                            ->label('Reply')
                            ->schema([
                                RichEditor::make('message')
                                    ->required()
                                    ->columnSpanFull(),
                            ])
                            ->action(function (Inquiry $inquiry, array $data): void {
                                (new ReplyToInquiry())->execute($inquiry, $data);
                                Notification::make()
                                    ->title('Reply sent successfully.')
                                    ->body('The user will be notified by email.')
                                    ->success()
                                    ->send();
                            }),
                    ])
                    ->placeholder('No replies yet')
                    ->columns()
                    ->columnSpanFull(),
            ]);
    }
}
