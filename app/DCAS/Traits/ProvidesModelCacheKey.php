<?php

namespace DCAS\Traits;

/**
 * Trait ProvidesModelCacheKey.
 * @see https://laravel-news.com/laravel-model-caching
 */
trait ProvidesModelCacheKey
{
    /**
     * @var array
     * @todo Implement this in the parent model.
     */
    protected $touches = [];

    /**
     * @return string
     */
    public function cacheKey()
    {
        return sprintf(
            '%s/%s-%s',
            $this->getTable(),
            $this->getKey(),
            $this->updated_at->timestamp
        );
    }

    /*
     * @example
     */
    //    public function comments()
    //    {
    //        return $this->hasMany(Comment::class);
    //    }
    //
    //    public function getCachedCommentsCountAttribute()
    //    {
    //        return Cache::remember($this->cacheKey() . ':comments_count', 15, function () {
    //            return $this->comments->count();
    //        });
    //    }
}
