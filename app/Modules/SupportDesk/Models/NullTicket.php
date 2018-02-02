<?php

namespace Modules\SupportDesk\Models;

use App\Model;

/**
 * Modules\SupportDesk\Models\NullTicket
 *
 * @property-read int $category_id
 * @property-read string $is_active
 * @property-read string $is_archived
 * @property-read string $is_deleted
 * @property-read string $is_removed
 * @property-read string $message
 * @property-read int $priority
 * @property-read string $state_name
 * @property-read string $status
 * @property-read null $ticket_id
 * @property-read string $title
 * @property-read int $user_id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model mode($mode = '0')
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model onlyActive($type = true)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model onlyArchived($type = true)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model onlyDeleted($type = true)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model order($field = '', $direction = '')
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model search($search, $threshold = null, $entireText = false, $entireTextOnly = false)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model searchRestricted($search, $restriction, $threshold = null, $entireText = false, $entireTextOnly = false)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model sortable($defaultSortColumn = null, $direction = 'asc')
 * @mixin \Eloquent
 */
class NullTicket extends Model
{
    /**
     * @var int
     */
    protected $user_id = 0;

    /**
     * @var int
     */
    protected $category_id = 0;

    /**
     * @var null
     */
    protected $ticket_id = null;

    /**
     * @var string
     */
    protected $title = '';

    /**
     * @var int
     */
    protected $priority = 0;

    /**
     * @var string
     */
    protected $message = '';

    /**
     * @var string
     */
    protected $status = 'nullable';

    /**
     * Get User ID from database.
     *
     * @return int
     */
    public function getUserIdAttribute(): int
    {
        return $this->user_id;
    }

    /**
     * Get Category ID from database.
     *
     * @return int
     */
    public function getCategoryIdAttribute(): int
    {
        return $this->category_id;
    }

    /**
     * Get Ticket ID from database.
     *
     * @return null
     */
    public function getTicketIdAttribute()
    {
        return $this->ticket_id;
    }

    /**
     * Get Title from database.
     *
     * @return string
     */
    public function getTitleAttribute(): string
    {
        return $this->title;
    }

    /**
     * Get Priority from database.
     *
     * @return int
     */
    public function getPriorityAttribute(): int
    {
        return $this->priority;
    }

    /**
     * Get Message from database.
     *
     * @return string
     */
    public function getMessageAttribute(): string
    {
        return $this->message;
    }

    /**
     * Get Status from database.
     *
     * @return string
     */
    public function getStatusAttribute(): string
    {
        return $this->status;
    }

    /**
     * Get the index name for the model.
     *
     * @return string
     */
    public function searchableAs(): string
    {
        return 'nulltickets_index';
    }
}
