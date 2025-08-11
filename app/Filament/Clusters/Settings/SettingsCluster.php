<?php

declare(strict_types=1);

namespace App\Filament\Clusters\Settings;

use BackedEnum;
use Filament\Clusters\Cluster;
use Filament\Support\Icons\Heroicon;
use UnitEnum;

final class SettingsCluster extends Cluster
{
    protected static string|BackedEnum|null $navigationIcon = Heroicon::Cog8Tooth;

    protected static string|BackedEnum|null $activeNavigationIcon = Heroicon::OutlinedCog8Tooth;

    protected static string|UnitEnum|null $navigationGroup = 'System';
}
