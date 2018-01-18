<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;

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
        return $this->find($request);
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
