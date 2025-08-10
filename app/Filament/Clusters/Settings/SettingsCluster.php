<?php

namespace App\Filament\Clusters\Settings;

use BackedEnum;
use Filament\Clusters\Cluster;
use Filament\Pages\Enums\SubNavigationPosition;
use Filament\Panel;
use Filament\Support\Icons\Heroicon;
use UnitEnum;

class SettingsCluster extends Cluster
{
    protected static string|BackedEnum|null $navigationIcon = Heroicon::Cog8Tooth;
    protected static string | BackedEnum | null $activeNavigationIcon = Heroicon::OutlinedCog8Tooth;
    protected static string | UnitEnum | null $navigationGroup = "System";
}
