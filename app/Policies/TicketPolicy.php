<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Modules\SupportDesk\Models\Ticket;

class TicketPolicy
{
    use HandlesAuthorization;

    /**
     * Authorize all actions for the given model to Admins.
     *
     * @param \App\User $user
     * @param $ability
     *
     * @return void
     */
    public function before($user, $ability)
    {
        if ($user->isAdmin()) return true;
    }

    /**
     * Determine whether the user can view the ticket.
     *
     * @param \App\User $user
     * @param \Modules\SupportDesk\Models\Ticket $ticket
     *
     * @return mixed
     */
    public function view(User $user, Ticket $ticket)
    {
        return $user->may('view-ticket') && ($user->id === $ticket->user_id);
    }

    /**
     * Determine whether the user can create tickets.
     *
     * @param \App\User $user
     *
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->may('create-ticket');
    }

    /**
     * Determine whether the user can update the ticket.
     *
     * @param \App\User $user
     * @param \Modules\SupportDesk\Models\Ticket $ticket
     *
     * @return mixed
     */
    public function update(User $user, Ticket $ticket)
    {
        return $user->may('update-ticket') && ($user->id === $ticket->user_id);
    }

    /**
     * Determine whether the user can delete the ticket.
     *
     * @param \App\User $user
     * @param \Modules\SupportDesk\Models\Ticket $ticket
     *
     * @return mixed
     */
    public function delete(User $user, Ticket $ticket)
    {
        return $user->may('delete-ticket') && ($user->id === $ticket->user_id);
    }
}
