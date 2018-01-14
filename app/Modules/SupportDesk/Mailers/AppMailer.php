<?php

namespace Modules\SupportDesk\Mailers;

use Illuminate\Contracts\Mail\Mailer;
use Modules\SupportDesk\Models\Ticket;

class AppMailer
{
    /**
     * @var Mailer
     */
    protected $mailer;

    /**
     * @var string
     */
    protected $fromAddress = 'support@supportticket.dev';

    /**
     * @var string
     */
    protected $fromName = 'Support Ticket';

    /**
     * @var string
     */
    protected $to;

    /**
     * @var string
     */
    protected $subject;

    protected $view;

    /**
     * @var array
     */
    protected $data = [];

    /**
     * AppMailer constructor.
     *
     * @param Mailer $mailer
     */
    public function __construct(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    /**
     * @param $user
     * @param Ticket $ticket
     */
    public function sendTicketInformation($user, Ticket $ticket)
    {
        $this->to = $user->email;
        $this->subject = "[Ticket ID: $ticket->ticket_id] $ticket->title";
        $this->view = 'SupportDesk::emails.ticket_info';
        $this->data = compact('user', 'ticket');

        return $this->deliver();
    }

    /**
     * Deliver mail.
     */
    public function deliver()
    {
        $this->mailer->send($this->view, $this->data, function ($message) {
            $message->from($this->fromAddress, $this->fromName)
                ->to($this->to)->subject($this->subject);
        });
    }

    /**
     * @param $ticketOwner
     * @param Ticket $ticket
     */
    public function sendTicketStatusNotification($ticketOwner, Ticket $ticket)
    {
        $this->to = $ticketOwner->email;
        $this->subject = "RE: $ticket->title (Ticket ID: $ticket->ticket_id)";
        $this->view = 'SupportDesk::emails.ticket_status';
        $this->data = compact('ticketOwner', 'ticket');

        return $this->deliver();
    }

    /**
     * @param $ticketOwner
     * @param $user
     * @param Ticket $ticket
     * @param $comment
     */
    public function sendTicketComments($ticketOwner, $user, Ticket $ticket, $comment)
    {
        $this->to = $ticketOwner->email;
        $this->subject = "RE: $ticket->title (Ticket ID: $ticket->ticket_id)";
        $this->view = 'SupportDesk::emails.ticket_comments';
        $this->data = compact('ticketOwner', 'user', 'ticket', 'comment');

        return $this->deliver();
    }
}
