<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

final class Inquiry extends Model
{
    /**
     * Replies that belong to the contact message.
     *
     * @return HasMany<InquiryReply>
     */
    public function replies(): HasMany
    {
        return $this->hasMany(InquiryReply::class)
            ->orderByDesc('created_at');
    }
}
