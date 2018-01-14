<?php

namespace App;

/**
 * App\NullTicket
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
     * @return int
     */
    public function getUserId(): int
    {
        return $this->user_id;
    }

    /**
     * @return int
     */
    public function getCategoryId(): int
    {
        return $this->category_id;
    }

    public function getTicketId()
    {
        return $this->ticket_id;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return int
     */
    public function getPriority(): int
    {
        return $this->priority;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @return string
     */
    public function getStatus(): string
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
