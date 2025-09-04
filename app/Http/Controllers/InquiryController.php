<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Inertia\Inertia;

final class InquiryController extends Controller
{
    public function create()
    {
        return Inertia::render('ContactForm');
    }

    public function store(): void
    {
        //
    }
}
