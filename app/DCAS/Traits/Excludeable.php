<?php

namespace DCAS\Traits;

trait Excludeable
{
    /**
     * Exclude an array of elements from the result.
     *
     * @param $query
     * @param $columns
     *
     * @return mixed
     */
    public function scopeExclude($query, $columns)
    {
        return $query->select(array_diff($this->getTableColumns(), (array)$columns));
    }

    /**
     * Get the array of columns.
     *
     * @return mixed
     */
    private function getTableColumns()
    {
        return $this->getConnection()->getSchemaBuilder()->getColumnListing($this->getTable());
    }
}
