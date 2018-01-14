<?php

namespace Modules\SupportDesk\Models;

use App\Model;

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
     * @return int
     */
    protected function getIdAttribute(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    protected function getFirstNameAttribute(): string
    {
        return $this->firstName;
    }

    /**
     * @return string
     */
    protected function getLastNameAttribute(): string
    {
        return $this->lastName;
    }

    /**
     * @return string
     */
    protected function getEmailAttribute(): string
    {
        return $this->email;
    }
}
