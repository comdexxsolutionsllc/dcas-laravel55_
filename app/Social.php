<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Social
 *
 * @property int $id
 * @property int $user_id
 * @property string $provider
 * @property string $social_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Social whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Social whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Social whereProvider($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Social whereSocialId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Social whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Social whereUserId($value)
 * @mixin \Eloquent
 */
class Social extends Model
{
    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * @var string
     */
    protected $table = 'social_logins';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
