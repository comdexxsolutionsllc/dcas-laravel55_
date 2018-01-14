<?php

namespace DCAS\Traits;

/**
 * This Trait disabled the updated_at value for a model.
 * Laravel doesn't provide an easy way to to this.
 * The framework **always** tries to append the updated_at column
 * when the `$timestamps` property is not set to false.
 * See code here: https://github.com/illuminate/database/blob/5.4/Eloquent/Builder.php#L757-L760.
 *
 * This traits disables all timestamps (including created_at) when performing
 * an update. We do this by listening to the `updating` and `updated`
 * events.
 */
trait DisableUpdatedAt
{
    protected static function boot()
    {
        parent::boot();
        static::updating(function ($model) {
            $model->timestamps = false;
        });
        static::updated(function ($model) {
            $model->timestamps = true;
        });
    }

    /**
     * @param $value
     */
    public function setUpdatedAt($value)
    {
    }

    /**
     * @return string
     */
    public function getUpdatedAtColumn(): string
    {
        return '';
    }
}
