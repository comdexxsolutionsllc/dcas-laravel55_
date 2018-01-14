@extends('layouts.app')

@section('title', 'All Closed Tickets')

@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-ticket"> Tickets</i>
                </div>

                <div class="panel-body">
                    @include('SupportDesk::includes.flash')

                    @if ($tickets->isEmpty())
                        <p>There are currently no tickets.</p>
                    @else
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Category</th>
                                <th>Title</th>
                                <th>Status</th>
                                <th>Last Updated</th>
                                <th style="text-align:center" colspan="2">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($tickets as $ticket)
                                @if($ticket->isClosed())
                                    <tr>
                                        <td>
                                            @foreach ($categories as $category)
                                                @if ($category->id === $ticket->category_id)
                                                    {{ $category->name }}
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>
                                            <a href="{{ url('SupportDesk/tickets/'. $ticket->ticket_id) }}">
                                                #{{ $ticket->ticket_id }} - {{ $ticket->title }}
                                            </a>
                                        </td>
                                        <td>
                                            @include('SupportDesk::partials.ticket_grid')
                                        </td>
                                        <td>{{ $ticket->updated_at }}</td>
                                        <td>
                                            <a href="{{ url('SupportDesk/tickets/' . $ticket->ticket_id) }}"
                                               class="btn btn-primary" disabled>Comment</a>
                                        </td>
                                        <td>
                                            <form action="{{ url('SupportDesk/admin/open_ticket/' . $ticket->ticket_id) }}"
                                                  method="POST">
                                                {!! csrf_field() !!}
                                                <button type="submit" class="btn btn-success">Open</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                            </tbody>
                        </table>

                        {{ $tickets->render() }}
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection