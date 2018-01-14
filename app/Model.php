<?php

namespace App;

use Bluora\LaravelModelTraits\ModelEventsTrait;
use Bluora\LaravelModelTraits\ModelStateTrait;
use Bluora\LaravelModelTraits\ModelValidationTrait;
use Bluora\LaravelModelTraits\OrderByTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model as Eloquent;
use Laravel\Scout\Searchable;
use Nicolaslopezj\Searchable\SearchableTrait;
use Rogercbe\TableSorter\Sortable;
use Spatie\ModelCleanup\GetsCleanedUp;
use Spatie\Translatable\HasTranslations;
use Watson\Rememberable\Rememberable;
use ZigaStrgar\Orderable\Orderable;


/**
 * Generic Model Class.
 */
abstract class Model extends Eloquent implements GetsCleanedUp
{
    use HasTranslations, ModelEventsTrait, ModelStateTrait, ModelValidationTrait,
        Orderable, OrderByTrait, Rememberable, Searchable, SearchableTrait,
        Sortable;

    /**
     * Search as you type.
     * TNT/Scout.
     *
     * @var bool
     */
    public $asYouType = true;

    /**
     * Searchable rules.
     *
     * @var array
     */
    protected $searchable = [];

    /**
     * @param Builder $query
     * @return Builder
     */
    public static function cleanUp(Builder $query): Builder
    {
        return $query->where('created_at', '<', Carbon::now()->subYear());
    }

    /**
     * Return orderable array.
     *
     * @return array
     */
    public function orderable(): array
    {
        return [
            'id' => 'ASC',
        ];
    }

    /**
     * Get the index name for the model.
     *
     * @return string
     */
    abstract public function searchableAs();

    /**
     * Get the indexable data array for the model.
     *
     * @return array
     */
    public function toSearchableArray(): array
    {
        $array = $this->toArray();

        // TODO:  Customize array.

        return $array;
    }
}
