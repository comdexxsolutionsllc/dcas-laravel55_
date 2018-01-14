<?php

namespace DCAS\Traits;

use App\Model;

trait OwnsModels
{
    /**
     * Determine whether this model owns the given model.
     *
     * @param Model $model
     *
     * @return bool
     */
    public function owns(Model $model)
    {
        return $this->id === $model->{$this->getForeignKey()};
    }
}
