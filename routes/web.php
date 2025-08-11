<?php

declare(strict_types=1);

use App\Http\Controllers\LandingPageRenderer;
use Illuminate\Support\Facades\Route;

Route::get('/', LandingPageRenderer::class)->name('landing-page');
