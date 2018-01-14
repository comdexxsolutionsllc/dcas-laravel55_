<?php

namespace Modules\SupportDesk\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Modules\SupportDesk\Mailers\AppMailer;
use Modules\SupportDesk\Models\Comment;

class CommentsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    /**
     * @param Request $request
     * @param AppMailer $mailer
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postComment(Request $request, AppMailer $mailer): RedirectResponse
    {
        $this->validate($request, [
            'comment' => 'required',
        ]);

        $comment = Comment::create([
            'ticket_id' => request()->input('ticket_id'),
            'user_id' => auth()->user()->id,
            'comment' => request()->input('comment'),
        ]);

        // send mail if the user commenting is not the ticket owner
        if ($comment->ticket->user->id !== auth()->user()->id) {
            $mailer->sendTicketComments($comment->ticket->user, auth()->user(), $comment->ticket, $comment);
        }

        return redirect()->back()->with('status', 'Your comment has be submitted.');
    }
}
