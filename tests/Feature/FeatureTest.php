<?php

declare(strict_types=1);

use Inertia\Testing\AssertableInertia;

it('renders LandingPage when / is requested', function (): void {
    $response = $this->get('/');

    $response->assertOk();
    $response->assertInertia(fn (AssertableInertia $assertableInertia): AssertableInertia => $assertableInertia
        ->component('LandingPage')
        ->has('siteSettings')
        ->has('socialMediaSettings')
    );
});
