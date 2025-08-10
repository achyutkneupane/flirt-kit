<?php

declare(strict_types=1);

namespace App\Filament\Resources\Users\Schemas;

use Exception;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

final class UserInfolist
{
    /**
     * @throws Exception
     */
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('name'),
                TextEntry::make('email')
                    ->label('Email address'),
                TextEntry::make('role')
                    ->badge(),
            ]);
    }
}
