<?php

declare(strict_types=1);

namespace App\Actions;

use App\Models\Inquiry;
use App\Models\InquiryReply;

final class ReplyToInquiry
{
    public function execute(Inquiry $inquiry, array $data): InquiryReply
    {
        return $inquiry->replies()->create(array_merge(
            $data,
            [
                'user_id' => auth()->id(),
                'ip_address' => request()->ip(),
                'user_agent' => request()->userAgent(),
            ]
        ));
    }
}
