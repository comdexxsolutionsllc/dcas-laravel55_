<?php

namespace App;

/**
 * App\NullProfile.
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model sortable($defaultSortColumn = null, $direction = 'asc')
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
 * @mixin \Eloquent
 */
class NullProfile extends Model
{
    /**
     * @var int
     */
    protected $id = 0;

    /**
     * @var int
     */
    protected $user_id = 0;

    /**
     * @var string
     */
    protected $username = 'null_user';

    /**
     * @var string
     */
    protected $biography = '';

    /**
     * @var string
     */
    protected $address_1 = 'NullAddress';

    /**
     * @var null
     */
    protected $address_2 = null;

    /**
     * @var string
     */
    protected $city = 'NullCity';

    /**
     * @var string
     */
    protected $state = 'ZZ';

    /**
     * @var string
     */
    protected $country = 'US';

    /**
     * @var string
     */
    protected $postal_code = '00000';

    /**
     * @return int
     */
    public function getIdAttribute(): int
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getUserIdAttribute(): int
    {
        return $this->user_id;
    }

    /**
     * @return string
     */
    public function getUsernameAttribute(): string
    {
        return $this->username;
    }

    /**
     * @return string
     */
    public function getBiographyAttribute(): string
    {
        return $this->biography;
    }

    /**
     * @return string
     */
    public function getAddress1Attribute(): string
    {
        return $this->address_1;
    }

    public function getAddress2Attribute()
    {
        return $this->address_2;
    }

    /**
     * @return string
     */
    public function getCityAttribute(): string
    {
        return $this->city;
    }

    /**
     * @return string
     */
    public function getStateAttribute(): string
    {
        return $this->state;
    }

    /**
     * @return string
     */
    public function getCountryAttribute(): string
    {
        return $this->country;
    }

    /**
     * @return string
     */
    public function getPostalCodeAttribute(): string
    {
        return $this->postal_code;
    }

    /**
     * Get the index name for the model.
     *
     * @return string
     */
    public function searchableAs(): string
    {
        return 'nullprofiles_index';
    }
}
