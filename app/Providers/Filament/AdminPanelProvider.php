<?php

namespace App\Providers\Filament;

use AchyutN\FilamentLogViewer\FilamentLogViewer;
use App\Enums\UserRole;
use App\Filament\Pages\ManageSiteSettings;
use Awcodes\Gravatar\GravatarPlugin;
use Awcodes\Gravatar\GravatarProvider;
use Exception;
use Filament\Actions\Action;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Navigation\MenuItem;
use Filament\Pages\Dashboard;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Support\Enums\Width;
use Filament\Support\Icons\Heroicon;
use Filament\Widgets\AccountWidget;
use Filament\Widgets\FilamentInfoWidget;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Joaopaulolndev\FilamentEditProfile\FilamentEditProfilePlugin;
use Joaopaulolndev\FilamentEditProfile\Pages\EditProfilePage;
use pxlrbt\FilamentEnvironmentIndicator\EnvironmentIndicatorPlugin;

class AdminPanelProvider extends PanelProvider
{
    /**
     * @throws Exception
     */
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login()
            ->colors([
                'primary' => Color::hex('#fc6a3e'),
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\Filament\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\Filament\Pages')
            ->pages([
                Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\Filament\Widgets')
            ->widgets([
                AccountWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ])
            ->plugins([
                FilamentLogViewer::make()
                    ->authorize(fn () => auth()->user()?->role === UserRole::Developer),
                EnvironmentIndicatorPlugin::make()
                    ->visible(fn () => auth()->user()?->role === UserRole::Developer)
                    ->showDebugModeWarning()
                    ->showGitBranch(),
                GravatarPlugin::make()
                    ->default('initials')
                    ->size(200),
                FilamentEditProfilePlugin::make()
                    ->slug('edit-profile')
                    ->setIcon('heroicon-o-user')
                    ->setTitle('Profile')
                    ->setNavigationLabel('Profile')
                    ->setNavigationGroup('Profile')
                    ->shouldRegisterNavigation(false)
                    ->shouldShowAvatarForm(false)
                    ->shouldShowDeleteAccountForm(true)
                    ->shouldShowEmailForm(false)
            ])
            ->userMenuItems([
                'profile' => Action::make('profile')
                    ->label("Edit Profile")
                    ->url(fn (): string => EditProfilePage::getUrl())
                    ->icon(Heroicon::OutlinedPencilSquare),
            ])
            ->defaultAvatarProvider(GravatarProvider::class)
            ->maxContentWidth(Width::Full)
            ->globalSearch(false)
            ->sidebarCollapsibleOnDesktop()
            ->databaseTransactions()
            ->unsavedChangesAlerts()
            ->spa();
    }
}
