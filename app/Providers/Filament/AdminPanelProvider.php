<?php

declare(strict_types=1);

namespace App\Providers\Filament;

use AchyutN\FilamentLogViewer\FilamentLogViewer;
use App\Enums\UserRole;
use App\Settings\SiteSettings;
use Awcodes\Gravatar\GravatarPlugin;
use Awcodes\Gravatar\GravatarProvider;
use Exception;
use Filament\Actions\Action;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages\Dashboard;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Support\Enums\Width;
use Filament\Support\Icons\Heroicon;
use Filament\Widgets\AccountWidget;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Joaopaulolndev\FilamentEditProfile\FilamentEditProfilePlugin;
use Joaopaulolndev\FilamentEditProfile\Pages\EditProfilePage;
use pxlrbt\FilamentEnvironmentIndicator\EnvironmentIndicatorPlugin;
use Spatie\LaravelSettings\Settings;

final class AdminPanelProvider extends PanelProvider
{
    protected Settings $settings;

    public function __construct($app)
    {
        parent::__construct($app);

        $this->settings = app(SiteSettings::class);
    }

    /**
     * @throws Exception
     */
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->brandName(fn () => $this->settings->name)
            ->brandLogo(fn () => $this->settings->logo ? '/'.$this->settings->logo : null)
            ->brandLogoHeight('3rem')
            ->favicon(fn () => $this->settings->favicon ? '/'.$this->settings->favicon : null)
            ->login()
            ->colors([
                'primary' => Color::hex('#fc6a3e'),
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\Filament\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\Filament\Pages')
            ->discoverClusters(in: app_path('Filament/Clusters'), for: 'App\\Filament\\Clusters')
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
                    ->authorize(fn (): bool => auth()->user()?->role === UserRole::Developer),
                EnvironmentIndicatorPlugin::make()
                    ->visible(fn (): bool => auth()->user()?->role === UserRole::Developer)
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
                    ->shouldShowEmailForm(false),
            ])
            ->userMenuItems([
                'profile' => Action::make('profile')
                    ->label('Edit Profile')
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
