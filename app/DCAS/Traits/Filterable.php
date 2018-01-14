<?php

namespace DCAS\Traits;

use DCAS\Filters\QueryFilter;
use Illuminate\Database\Eloquent\Builder;

trait Filterable
{
    /**
     * Filter a result set.
     *
     * @param Builder $query
     * @param QueryFilter $filters
     *
     * @return Builder
     */
    public function scopeFilter($query, QueryFilter $filters)
    {
        return $filters->apply($query);
    }
}
