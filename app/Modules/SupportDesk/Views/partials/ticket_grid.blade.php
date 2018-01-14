<span class="label" style="background-color: {{ Cache::get('statuses')[$ticket->status] }}">
    {{ $ticket->status }}
</span>
