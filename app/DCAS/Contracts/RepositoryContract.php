<?php

namespace DCAS\Contracts;

interface RepositoryContract
{
    public function find($id, $columns = ['*'], $with = []);

    public function findBy($attribute, $value, $columns = ['*'], $with = []);

    public function findAll($columns = ['*'], $with = []);

    public function paginate($perPage = null, $columns = ['*'], $pageName = 'page', $page = null);

    public function findWhere(array $where, $columns = ['*'], $with = []);

    public function findWhereIn($attribute, array $values, $columns = ['*'], $with = []);

    public function findWhereNotIn($attribute, array $values, $columns = ['*'], $with = []);

    public function firstOrCreate(array $attributes);

    public function update($id, array $attributes = []);

    public function delete($id);
}
