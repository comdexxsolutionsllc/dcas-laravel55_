<?php

namespace DCAS\Traits;

use Auth;

trait Responsible
{
    /**
     * Boot trait.
     *
     * @return void
     */
    public static function bootResponsible()
    {
        // Prepare authenticated user id
        $userId = Auth::id();
        // Register saving event listener
        static::saving(function ($model) use ($userId) {
            $model->created_by = $model->created_by ?: $userId;
            $model->updated_by = $userId;
        }, 10);
        // Register deleting event listener
        static::deleting(function ($model) use ($userId) {
            $model->deleted_by = $userId;
            $model->save();
        }, 10);
    }
}
