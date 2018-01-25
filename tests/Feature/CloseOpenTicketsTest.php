<?php

namespace Tests\Feature;

use App\Role;
use App\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\SupportDesk\Models\Ticket;
use Tests\TestCase;

class CloseOpenTicketsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function an_unauthorized_user_cannot_close_any_ticket()
    {
        $ticket = create(Ticket::class);

        $this->signIn($user = create(User::class))
            ->post(route('supportdesk.admin.close_ticket', $ticket->ticket_id))
            ->assertRedirect();

        $this->assertDatabaseHas('tickets', [
            'ticket_id' => $ticket->fresh()->ticket_id
        ]);
    }

    /** @test */
    public function an_authorized_user_can_close_any_ticket()
    {
        $ticket = create(Ticket::class, [
            'status' => 'New'
        ]);

        $adminUser = create(User::class);

        $adminRole = create(Role::class, [
            'name' => 'super_admin',
            'display_name' => 'Super Administrator',
            'description' => 'User is the master owner of the system'
        ]);

        $adminUser->attachRole($adminRole);

        $this->signIn($adminUser);

        $this->post(route('supportdesk.admin.close_ticket', $ticket->ticket_id))
            ->assertRedirect();

        $this->assertSoftDeleted('tickets', [
            'ticket_id' => $ticket->fresh()->ticket_id
        ]);
    }

    /** @test */
    public function an_unauthorized_user_cannot_open_any_ticket()
    {
        $ticket = create(Ticket::class, [
            'status' => 'Closed',
            'deleted_at' => Carbon::now()
        ]);

        $this->signIn($user = create(User::class))
            ->post(route('supportdesk.admin.open_ticket', $ticket->ticket_id))
            ->assertRedirect();

        $this->assertSoftDeleted('tickets', [
            'ticket_id' => $ticket->fresh()->ticket_id
        ]);
    }

    /** @test */
    public function an_authorized_user_can_open_any_ticket()
    {
        $ticket = create(Ticket::class, [
            'status' => 'Closed'
        ]);

        $adminUser = create(User::class);

        $adminRole = create(Role::class, [
            'name' => 'super_admin',
            'display_name' => 'Super Administrator',
            'description' => 'User is the master owner of the system'
        ]);

        $adminUser->attachRole($adminRole);

        $this->signIn($adminUser);

        $this->post(route('supportdesk.admin.open_ticket', $ticket->ticket_id))
            ->assertRedirect();

        $this->assertDatabaseHas('tickets', [
            'ticket_id' => $ticket->fresh()->ticket_id
        ]);
    }
}
