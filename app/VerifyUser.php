<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\VerifyUser
 *
 * @property int $user_id
 * @property string $token
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\VerifyUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\VerifyUser whereToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\VerifyUser whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\VerifyUser whereUserId($value)
 * @mixin \Eloquent
 */
class VerifyUser extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        "user_id",
        "token"
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
