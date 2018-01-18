<?php

namespace App;

use DCAS\Observers\ConsumerModelObserver;

/**
 * App\Consumer.
 *
 * @property string $id
 * @property string|null $api_token
 * @property string $name
 * @property string $url
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model sortable($defaultSortColumn = null, $direction = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Consumer whereApiToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Consumer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Consumer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Consumer whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Consumer whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Consumer whereUrl($value)
 * @property string $ip
 * @property int $active
 * @property-read string $is_active
 * @property-read string $is_archived
 * @property-read string $is_deleted
 * @property-read string $is_removed
 * @property-read string $state_name
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model mode($mode = '0')
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model onlyActive($type = true)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model onlyArchived($type = true)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model onlyDeleted($type = true)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model order($field = '', $direction = '')
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model search($search, $threshold = null, $entireText = false, $entireTextOnly = false)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model searchRestricted($search, $restriction, $threshold = null, $entireText = false, $entireTextOnly = false)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Consumer whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Consumer whereIp($value)
 * @mixin \Eloquent
 */
class Consumer extends UUIDModel
{
    /**
     * @var array
     */
    public $fillable = [
        'api_token',
        'name',
        'url',
        'ip',
        'active',
    ];
    /**
     * The API token field.
     *
     * @var string
     */
    private $apiTokenKey = 'api_token';

    /**
     * Add the ConsumerModelObserver to the boot method of the current model.
     */
    public static function boot()
    {
        parent::boot();
        self::observe(ConsumerModelObserver::class);
    }

    /**
     * Return the API token field.
     *
     * @return string
     */
    public function getApiTokenKey(): string
    {
        return $this->apiTokenKey;
    }

    /**
     * Get the index name for the model.
     *
     * @return string
     */
    public function searchableAs(): string
    {
        return 'consumers_index';
    }
}
