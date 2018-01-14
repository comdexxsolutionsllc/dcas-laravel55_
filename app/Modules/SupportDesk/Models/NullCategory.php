<?php

namespace Modules\SupportDesk\Models;

use App\Model;

class NullCategory extends Model
{
    /**
     * @var int
     */
    protected $id = 0;

    /**
     * @var string
     */
    protected $name = 'Null Name';

    /**
     * Get the index name for the model.
     *
     * @return string
     */
    public function searchableAs(): string
    {
        return 'nullcategories_index';
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
    protected function getNameAttribute(): string
    {
        return $this->name;
    }
}
