<?php

namespace Modules\SupportDesk\Models;

use App\Model;

/**
 * App\NullComment
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model sortable($defaultSortColumn = null, $direction = 'asc')
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
 * @mixin \Eloquent
 */
class NullComment extends Model
{
    /**
     * @var null
     */
    protected $ticket_id = null;

    /**
     * @var int
     */
    protected $user_id = 0;

    /**
     * @var null
     */
    protected $comment = null;

    /**
     * @return int
     */
    public function getTicketIdAttribute(): int
    {
        return $this->ticket_id;
    }

    /**
     * @return int
     */
    public function getUserIdAttribute(): int
    {
        return $this->user_id;
    }

    public function getCommentAttribute()
    {
        return $this->comment;
    }

    /**
     * Get the index name for the model.
     *
     * @return string
     */
    public function searchableAs(): string
    {
        return 'nullcomments_index';
    }
}
