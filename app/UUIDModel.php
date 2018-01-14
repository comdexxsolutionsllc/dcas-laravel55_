<?php

namespace App;

use DCAS\Observers\UUIDModelObserver;

/**
 * Class UUIDModel.
 *
 * @property string $id
 */
abstract class UUIDModel extends Model
{
    /**
     * Disable auto-incrementing the primary key field for this model.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * Override the primary key type.
     *
     * @var string
     */
    protected $keyType = 'string';

    /**
     * Add UUIDModelObserver to the boot method of the current model.
     */
    public static function boot()
    {
        parent::boot();
        self::observe(UUIDModelObserver::class);
    }
}
