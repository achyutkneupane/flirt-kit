<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property string $name
 * @property string|null $email
 * @property string|null $phone
 * @property string $message
 * @property int $is_read
 * @property string|null $ip_address
 * @property string|null $user_agent
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection<int, InquiryReply> $replies
 * @property-read int|null $replies_count
 *
 * @method static Builder<static>|Inquiry newModelQuery()
 * @method static Builder<static>|Inquiry newQuery()
 * @method static Builder<static>|Inquiry query()
 * @method static Builder<static>|Inquiry whereCreatedAt($value)
 * @method static Builder<static>|Inquiry whereEmail($value)
 * @method static Builder<static>|Inquiry whereId($value)
 * @method static Builder<static>|Inquiry whereIpAddress($value)
 * @method static Builder<static>|Inquiry whereIsRead($value)
 * @method static Builder<static>|Inquiry whereMessage($value)
 * @method static Builder<static>|Inquiry whereName($value)
 * @method static Builder<static>|Inquiry wherePhone($value)
 * @method static Builder<static>|Inquiry whereUpdatedAt($value)
 * @method static Builder<static>|Inquiry whereUserAgent($value)
 *
 * @mixin \Eloquent
 */
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
