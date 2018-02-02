<?php

namespace Modules\SupportDesk\Models;

use App\Model;

/**
 * Modules\SupportDesk\Models\NullRequestor
 *
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
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model sortable($defaultSortColumn = null, $direction = 'asc')
 * @mixin \Eloquent
 */
class NullRequestor extends Model
{
    /**
     * @var int
     */
    protected $id = 0;

    /**
     * @var string
     */
    protected $firstName = 'Null First Name';

    /**
     * @var string
     */
    protected $lastName = 'Null Last Name';

    /**
     * @var string
     */
    protected $email = 'nulluser@domain.tld';

    /**
     * Get the index name for the model.
     *
     * @return string
     */
    public function searchableAs(): string
    {
        return 'nullrequestors_index';
    }

    /**
     * Get ID from database.
     *
     * @return int
     */
    protected function getIdAttribute(): int
    {
        return $this->id;
    }

    /**
     * Get First Name from Database.
     *
     * @return string
     */
    protected function getFirstNameAttribute(): string
    {
        return $this->firstName;
    }

    /**
     * Get Last Name from database.
     *
     * @return string
     */
    protected function getLastNameAttribute(): string
    {
        return $this->lastName;
    }

    /**
     * Get Email from database.
     *
     * @return string
     */
    protected function getEmailAttribute(): string
    {
        return $this->email;
    }
}
