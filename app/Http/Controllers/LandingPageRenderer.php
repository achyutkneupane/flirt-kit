<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Settings\SocialMediaSettings;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

final class LandingPageRenderer extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request): Response
    {
        $socialMediaSettings = app(SocialMediaSettings::class);

        return Inertia::render('LandingPage', compact('socialMediaSettings'));
    }
}
