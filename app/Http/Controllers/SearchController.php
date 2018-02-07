<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

/**
 * Class SearchController
 *
 * @package App\Http\Controllers
 */
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
            $request->query('q')
        )
            ->with('profile')
            ->get();
    }
}
