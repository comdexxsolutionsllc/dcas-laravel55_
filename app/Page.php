<?php

namespace App;

/**
 * App\Page
 *
 * @property int $id
 * @property string $slug
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read string $is_active
 * @property-read string $is_archived
 * @property-read string $is_deleted
 * @property-read string $is_removed
 * @property-read string $state_name
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model mode($mode = '0')
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model onlyActive($type = true)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model onlyArchived($type = true)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model onlyDeleted($type = true)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model order($field = '', $direction = '')
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model search($search, $threshold = null, $entireText = false, $entireTextOnly = false)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model searchRestricted($search, $restriction, $threshold = null, $entireText = false, $entireTextOnly = false)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model sortable($defaultSortColumn = null, $direction = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Page whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Page whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Page whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Page whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Page extends Model
{
    /**
     * @var array
     */
    public $fillable = [
        'slug'
    ];

    /**
     * @param $slug
     * @return Page
     */
    public static function findBySlug($slug)
    {
        return new Page(compact('slug'));
    }

    /**
     * Get the index name for the model.
     *
     * @return string
     */
    public function searchableAs(): string
    {
        return 'pages_index';
    }
}
