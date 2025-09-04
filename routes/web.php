<?php

declare(strict_types=1);

use App\Http\Controllers\InquiryController;
use App\Http\Controllers\LandingPageRenderer;
use Illuminate\Support\Facades\Route;

Route::get('/', LandingPageRenderer::class)->name('landing-page');

Route::group([
    'controller' => InquiryController::class,
    'prefix' => 'contact-us',
    'as' => 'contact.',
], function (): void {
    Route::get('/', 'create')->name('form');
    Route::post('/', 'store')->name('submit');
});
