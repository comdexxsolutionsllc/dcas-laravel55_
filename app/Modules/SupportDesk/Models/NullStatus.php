<?php

namespace Modules\SupportDesk\Models;

use App\Model;

class NullStatus extends Model
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
     * @var string
     */
    protected $hex = '#000000';

    /**
     * Get the index name for the model.
     *
     * @return string
     */
    public function searchableAs(): string
    {
        return 'nullstatuses_index';
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

    /**
     * @return string
     */
    protected function getHexAttribute(): string
    {
        return $this->hex;
    }
}
