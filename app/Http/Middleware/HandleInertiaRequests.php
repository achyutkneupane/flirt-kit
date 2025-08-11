<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use App\Settings\SiteSettings;
use App\Settings\SocialMediaSettings;
use Illuminate\Http\Request;
use Inertia\Middleware;

final class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that's loaded on the first page visit.
     *
     * @see https://inertiajs.com/server-side-setup#root-template
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Define the props that are shared by default.
     *
     * @see https://inertiajs.com/shared-data
     *
     * @return array<string, mixed>
     */
    public function share(Request $request): array
    {
        $siteSettings = app(SiteSettings::class);
        $socialMediaSettings = app(SocialMediaSettings::class);

        return array_merge(parent::share($request),
            compact(
                'socialMediaSettings',
                'siteSettings'
            ), [
                //
            ]);
    }
}
