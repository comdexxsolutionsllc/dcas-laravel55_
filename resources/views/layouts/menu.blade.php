<!-- sidebar menu -->
<ul class="sidebar-menu">
    @auth
        <li class="header">MAIN NAVIGATION</li>
        <li><a href="{{route('supportdesk.my_tickets')}}"><i class="fa fa-book"></i> <span>My Tickets</span></a></li>
        <li><a href="{{route('supportdesk.new_ticket')}}"><i class="fa fa-book"></i> <span>Open a Ticket</span></a></li>
    @endauth

    @if(auth()->user()->isAdmin())
        <li class="header">ADMINISTRATOR NAVIGATION</li>
        <li><a href="{{route('supportdesk.admin.tickets')}}"><i class="fa fa-book"></i> <span>All Tickets</span></a>
        </li>
        <li><a href="{{route('supportdesk.admin.closed_tickets')}}"><i class="fa fa-book"></i>
                <span>Closed Tickets</span></a></li>
    @endif

    <li class="header">LABELS</li>
    <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
    <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
    <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>
</ul>
