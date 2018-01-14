<?php

namespace Modules\SupportDesk\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Modules\SupportDesk\Mailers\AppMailer;
use Modules\SupportDesk\Models\Category;
use Modules\SupportDesk\Models\Ticket;
use Zttp\Zttp;

class TicketsController extends Controller
{
    /**
     * TicketsController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|View
     */
    public function index(): View
    {
        $tickets = Ticket::paginate(
            $pagination = config('modules.tickets.ticket.pagination')
        );

        $categories = Category::all();

        return view('SupportDesk::tickets.index', compact('tickets', 'categories'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|View
     */
    public function create(): View
    {
        $categories = Category::all();

        return view('SupportDesk::tickets.create', compact('categories'));
    }

    /**
     * @param $ticket_id
     *
     * @return \Illuminate\Contracts\View\Factory|View
     */
    public function show($ticket_id): View
    {
        $ticket = Ticket::where('ticket_id', $ticket_id)->firstOrFail();

        $comments = $ticket->comments;

        $category = $ticket->category;

        return view('SupportDesk::tickets.show', compact('ticket', 'category', 'comments'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|View
     */
    public function showClosed(): View
    {
        $tickets = Ticket::where('status', 'Closed')
            ->paginate(
                $pagination = config('modules.tickets.ticket.pagination')
            );

        $categories = Category::all();

        return view('SupportDesk::tickets.closed', compact('tickets', 'categories'));
    }

    /**
     * @param Request $request
     * @param AppMailer $mailer
     *
     * @return RedirectResponse
     *
     * @throws \Exception
     */
    public function store(Request $request, AppMailer $mailer): RedirectResponse
    {
        $this->validate($request, [
            'title' => 'required',
            'category' => 'required',
            'priority' => 'required',
            'message' => 'required',
        ]);

        $response = Zttp::asFormParams()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => config('services.recaptcha.secret'),
            'response' => request()->input('g-recaptcha-response'),
            'remoteip' => $_SERVER['REMOTE_ADDR'],
        ]);

        if (!$response->json()['success']) {
            throw new \Exception('Recaptcha failed');
        }

        $ticket = new Ticket([
            'title' => request()->input('title'),
            'user_id' => auth()->user()->id,
            'ticket_id' => strtoupper(str_random(10)),
            'category_id' => request()->input('category'),
            'priority' => request()->input('priority'),
            'message' => request()->input('message'),
            'status' => 'Open',
        ]);

        $ticket->save();

        $mailer->sendTicketInformation(auth()->user(), $ticket);

        return redirect()
            ->route('supportdesk.my_tickets')
            ->with('status', "A ticket with ID: #$ticket->ticket_id has been opened.");
    }

    /**
     * @param $ticket_id
     * @param AppMailer $mailer
     *
     * @return RedirectResponse
     */
    public function close($ticket_id, AppMailer $mailer): RedirectResponse
    {
        $ticket = Ticket::where('ticket_id', $ticket_id)->firstOrFail();

        $ticket->status = 'Closed';

        $ticket->save();

        $ticketOwner = $ticket->user;

        $mailer->sendTicketStatusNotification($ticketOwner, $ticket);

        return redirect()->back()->with('status', 'The ticket has been closed.');
    }

    /**
     * @param $ticket_id
     * @param AppMailer $mailer
     *
     * @return RedirectResponse
     */
    public function open($ticket_id, AppMailer $mailer): RedirectResponse
    {
        $ticket = Ticket::where('ticket_id', $ticket_id)->firstOrFail();

        $ticket->status = 'Open';

        $ticket->save();

        $ticketOwner = $ticket->user;

        $mailer->sendTicketStatusNotification($ticketOwner, $ticket);

        return redirect()->back()->with('status', 'The ticket has been re-opened.');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|View
     */
    public function userTickets(): View
    {
        $tickets = Ticket::where('user_id', auth()->user()->id)
            ->paginate(
                $pagination = config('modules.tickets.ticket.pagination')
            );

        $categories = Category::all();

        return view('SupportDesk::tickets.user_tickets', compact('tickets', 'categories'));
    }
}
