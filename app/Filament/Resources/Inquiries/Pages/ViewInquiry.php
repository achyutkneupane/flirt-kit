<?php

declare(strict_types=1);

namespace App\Filament\Resources\Inquiries\Pages;

use App\Actions\ReplyToInquiry;
use App\Filament\Resources\Inquiries\InquiryResource;
use App\Models\Inquiry;
use App\Models\InquiryReply;
use Filament\Actions\Action;
use Filament\Forms\Components\RichEditor;
use Filament\Resources\Pages\ViewRecord;

final class ViewInquiry extends ViewRecord
{
    protected static string $resource = InquiryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('reply-to-inquiry')
                ->model(InquiryReply::class)
                ->label('Reply')
                ->schema([
                    RichEditor::make('message')
                        ->required()
                        ->columnSpanFull(),
                ])
                ->action(fn (Inquiry $inquiry, array $data): InquiryReply => (new ReplyToInquiry())->execute($inquiry, $data))
                ->successNotificationTitle('Reply Sent'),
        ];
    }
}
