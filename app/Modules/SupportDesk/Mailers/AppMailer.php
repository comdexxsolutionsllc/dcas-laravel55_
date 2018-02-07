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
    protected $recipient;

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
     * @param        $user
     * @param Ticket $ticket
     *
     * @return bool
     */
    public function sendTicketInformation($user, Ticket $ticket)
    {
        $this->recipient = $user->email;
        $this->subject = "[Ticket ID: $ticket->ticket_id] $ticket->title";
        $this->view = 'SupportDesk::emails.ticket_info';
        $this->data = compact('user', 'ticket');

        return $this->deliver();
    }

    /**
     * Deliver mail.
     *
     * @return bool
     */
    public function deliver()
    {
        $this->mailer->send($this->view, $this->data, function ($message) {
            $message->from($this->fromAddress, $this->fromName)
                ->to($this->recipient)->subject($this->subject);
        });

        return true;
    }

    /**
     * @param        $ticketOwner
     * @param Ticket $ticket
     *
     * @return bool
     */
    public function sendTicketStatusNotification($ticketOwner, Ticket $ticket)
    {
        $this->recipient = $ticketOwner->email;
        $this->subject = "RE: $ticket->title (Ticket ID: $ticket->ticket_id)";
        $this->view = 'SupportDesk::emails.ticket_status';
        $this->data = compact('ticketOwner', 'ticket');

        return $this->deliver();
    }

    /**
     * @param        $ticketOwner
     * @param        $user
     * @param Ticket $ticket
     * @param        $comment
     *
     * @return bool
     */
    public function sendTicketComments($ticketOwner, $user, Ticket $ticket, $comment)
    {
        $this->recipient = $ticketOwner->email;
        $this->subject = "RE: $ticket->title (Ticket ID: $ticket->ticket_id)";
        $this->view = 'SupportDesk::emails.ticket_comments';
        $this->data = compact('ticketOwner', 'user', 'ticket', 'comment');

        return $this->deliver();
    }
}
