{{--@if ($ticket->status === 'Open')--}}
    {{--<span class="label status-open">{{ $ticket->status }}</span>--}}
{{--@elseif($ticket->status === 'Assigned')--}}
    {{--<span class="label status-assigned">{{ $ticket->status }}</span>--}}
{{--@elseif($ticket->status === 'On Hold')--}}
    {{--<span class="label status-onHold">{{ $ticket->status }}</span>--}}
{{--@elseif($ticket->status === 'Pending Customer Response')--}}
    {{--<span class="label status-pendingCustomerResponse">{{ $ticket->status }}</span>--}}
{{--@elseif($ticket->status === 'Awaiting Manager Review')--}}
    {{--<span class="label status-awaitingManagerReview">{{ $ticket->status }}</span>--}}
{{--@else--}}
    {{--<span class="label status-closed">{{ $ticket->status }}</span>--}}
{{--@endif--}}

<span class="label" style="background-color: {{ Cache::get('statuses')[$ticket->status] }}">
    {{ $ticket->status }}
</span>
