<?php

declare(strict_types=1);

namespace App\Filament\Resources\Inquiries;

use App\Enums\UserRole;
use App\Filament\Resources\Inquiries\Pages\ListInquiries;
use App\Filament\Resources\Inquiries\Pages\ViewInquiry;
use App\Filament\Resources\Inquiries\Schemas\InquiryInfolist;
use App\Filament\Resources\Inquiries\Tables\InquiriesTable;
use App\Models\Inquiry;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Override;

final class InquiryResource extends Resource
{
    protected static ?string $model = Inquiry::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::ChatBubbleOvalLeftEllipsis;

    protected static string|BackedEnum|null $activeNavigationIcon = Heroicon::OutlinedChatBubbleOvalLeftEllipsis;

    public static function canAccess(): bool
    {
        return in_array(auth()->user()->role, [UserRole::Admin, UserRole::Developer]);
    }

    #[Override]
    public static function infolist(Schema $schema): Schema
    {
        return InquiryInfolist::configure($schema);
    }

    #[Override]
    public static function table(Table $table): Table
    {
        return InquiriesTable::configure($table);
    }

    #[Override]
    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListInquiries::route('/'),
            'view' => ViewInquiry::route('/{record}'),
        ];
    }
}
