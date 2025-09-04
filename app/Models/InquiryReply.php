<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property int $inquiry_id
 * @property int $user_id
 * @property string $message
 * @property string|null $ip_address
 * @property string|null $user_agent
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Inquiry $inquiry
 * @property-read User $user
 *
 * @method static Builder<static>|InquiryReply newModelQuery()
 * @method static Builder<static>|InquiryReply newQuery()
 * @method static Builder<static>|InquiryReply query()
 * @method static Builder<static>|InquiryReply whereCreatedAt($value)
 * @method static Builder<static>|InquiryReply whereId($value)
 * @method static Builder<static>|InquiryReply whereInquiryId($value)
 * @method static Builder<static>|InquiryReply whereIpAddress($value)
 * @method static Builder<static>|InquiryReply whereMessage($value)
 * @method static Builder<static>|InquiryReply whereUpdatedAt($value)
 * @method static Builder<static>|InquiryReply whereUserAgent($value)
 * @method static Builder<static>|InquiryReply whereUserId($value)
 *
 * @mixin \Eloquent
 */
final class InquiryReply extends Model
{
    /**
     * The inquiry that the reply belongs to.
     *
     * @return BelongsTo<Inquiry>
     */
    public function inquiry(): BelongsTo
    {
        return $this->belongsTo(Inquiry::class);
    }

    /**
     * The user that replied to the inquiry.
     *
     * @return BelongsTo<User>
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
