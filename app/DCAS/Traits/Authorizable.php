<?php

namespace DCAS\Traits;

use App\Model;
use Auth;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Support\Collection;

trait Authorizable
{
    /**
     * Check whether current user is authorised to perform given ability on the model.
     *
     * @param  string $ability
     * @param Model $model
     *
     * @return boolean
     *
     * @throws AuthorizationException
     */
    protected function authorizeModel($ability, Model $model)
    {
        // Prepare authenticated user
        $user = Auth::user();

        // Check whether current user is authorised to perform given ability on model (can to may)
        if ($user && $user->may($ability, $model)) {
            return true;
        }

        throw new AuthorizationException('You are not authorized to access the requested resource.');
    }

    /**
     * Check whether current user is authorised to perform given ability on all models in collection.
     *
     * @param  string $ability
     * @param  Collection $collection
     * @return boolean
     */
    protected function authorizeCollection($ability, Collection $collection)
    {
        // Check whether current user is authorised to perform given ability on each model
        $collection->each(function ($model) use ($ability) {
            $this->authorizeModel($ability, $model);
        });

        return true;
    }
}
