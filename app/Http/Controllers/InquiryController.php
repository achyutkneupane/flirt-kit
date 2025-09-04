<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\InquiryStoreRequest;
use App\Models\Inquiry;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;

final class InquiryController extends Controller
{
    public function create()
    {
        return Inertia::render('ContactForm');
    }

    public function store(InquiryStoreRequest $inquiryStoreRequest): RedirectResponse
    {
        $withIpAndUserAgent = array_merge(
            $inquiryStoreRequest->validated(),
            [
                'ip_address' => $inquiryStoreRequest->ip(),
                'user_agent' => $inquiryStoreRequest->userAgent(),
            ]
        );

        Inquiry::query()
            ->create($withIpAndUserAgent);

        return to_route('contact.form');
    }
}
