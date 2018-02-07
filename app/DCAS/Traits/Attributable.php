<?php

namespace DCAS\Traits;

trait Attributable
{
    /**
     * Get a subset of the specified attributes from the model.
     *
     * @param  array|string $attributes
     * @return array
     */
    public function only($attributes)
    {
        $attributes = is_string($attributes) ? func_get_args() : $attributes;

        return array_only($this->toArray(), $attributes);
    }

    /**
     * Get a subset of attributes from the model except those specified.
     *
     * @param  array|string $attributes
     * @return array
     */
    public function except($attributes)
    {
        $attributes = is_string($attributes) ? func_get_args() : $attributes;

        return array_except($this->toArray(), $attributes);
    }
}
