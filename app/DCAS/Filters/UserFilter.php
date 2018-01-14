<?php

namespace DCAS\Filters;

use Illuminate\Database\Eloquent\Builder;

class UserFilter extends QueryFilter
{
    /**
     * Filter by user type.
     *
     * @param bool $status
     *
     * @return Builder
     */
    public function isLoggedIn($status = 'true')
    {
        return $this->builder->where('is_logged_in', $status);
    }

    /**
     * Filter by name.
     *
     * @param $name
     *
     * @return $this
     */
    public function name($name)
    {
        return $this->builder->where('name', 'LIKE', '%' . $name . '%');
    }
}
