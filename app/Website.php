<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Website extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'facebook_username',
        'github_username',
        'google_plus_username',
        'personal_website',
        'pinterist_username',
        'twitter_username',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function websites(): BelongsTo
    {
        return $this->belongsTo(Profile::class);
    }
}
