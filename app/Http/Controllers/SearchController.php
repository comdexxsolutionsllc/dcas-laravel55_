<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /**
     * Alias of find function.
     *
     * @param Request $request
     *
     * @return Collection
     */
    public function search(Request $request): Collection
    {
        return $this->find();
    }

    /**
     * Find a specific query.
     *
     * @param Request $request
     *
     * @return Collection
     */
    public function find(Request $request): Collection
    {
        return User::search(
            $query = $request->query('q')
        )
            ->with('profile')
            ->get();
    }
}
