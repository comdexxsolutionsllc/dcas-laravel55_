<?php

namespace Modules\SupportDesk\Models;

use App\Model;

class NullTag extends Model
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
    protected $slug = 'null-slug';

    /**
     * @var string
     */
    protected $type = 'null-type';

    /**
     * @var int
     */
    protected $order_column = 0;

    /**
     * Get the index name for the model.
     *
     * @return string
     */
    public function searchableAs(): string
    {
        return 'nulltags_index';
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
    protected function getSlugAttribute(): string
    {
        return $this->slug;
    }

    /**
     * @return string
     */
    protected function getTypeAttribute(): string
    {
        return $this->type;
    }

    /**
     * @return int
     */
    protected function getOrderColumnAttribute(): int
    {
        return $this->order_column;
    }
}
