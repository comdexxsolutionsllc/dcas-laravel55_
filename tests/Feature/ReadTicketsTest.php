<?php

namespace Tests\Feature;

use App\Role;
use App\User;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\SupportDesk\Models\Ticket;
use Tests\TestCase;

class ReadTicketsTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var Ticket
     */
    protected $ticket;


    public function setUp()
    {
        parent::setUp();

        $this->ticket = factory(Ticket::class)->create();
    }

    /** @test */
    public function an_unauthorized_user_cannot_see_a_list_of_their_tickets()
    {
        $this->expectException(AuthenticationException::class);

        $this->get(route('supportdesk.my_tickets'))
            ->assertStatus(403);
    }

    /** @test */
    public function an_authorized_user_can_see_a_list_of_their_tickets()
    {
        $this->signIn($user = create(User::class));

        create(Ticket::class, [
            'user_id' => $user->id,
            'title' => 'This is a test ticket'
        ]);

        $this->get(route('supportdesk.my_tickets'))
            ->assertSee('This is a test ticket')
            ->assertStatus(200);
    }

    /** @test */
    public function an_unauthorized_user_cannot_see_a_single_ticket()
    {
        $this->expectException(AuthenticationException::class);

        $this->get(route('supportdesk.ticket', 2))
            ->assertStatus(403);
    }

    /** @test */
    public function an_authorized_user_can_see_a_single_ticket()
    {
        $this->signIn($user = create(User::class));

        $ticket = create(Ticket::class, [
            'user_id' => $user->id,
            'title' => 'This is a test ticket'
        ]);

        $this->get(route('supportdesk.ticket', $ticket->ticket_id))
            ->assertSee('This is a test ticket')
            ->assertStatus(200);
    }

    /** @test */
    public function non_admin_users_cannot_access_all_tickets()
    {
        $this->signIn($regularUser = create(User::class))
            ->get(route('supportdesk.admin.tickets'))
            ->assertStatus(302);
    }

    /** @test */
    public function admin_users_can_only_access_all_tickets()
    {
        $adminUser = create(User::class);

        $adminRole = create(Role::class, [
            'name' => 'super_admin',
            'display_name' => 'Super Administrator',
            'description' => 'User is the master owner of the system'
        ]);

        $adminUser->attachRole($adminRole);

        $this->signIn($adminUser)
            ->get(route('supportdesk.admin.tickets'))
            ->assertSee('Actions')
            ->assertStatus(200);
    }

    // supportdesk.admin.closed_tickets

    /** @test */
    public function non_admin_users_cannot_access_closed_tickets()
    {
        $this->signIn($user = create(User::class))
            ->get(route('supportdesk.admin.closed_tickets'))
            ->assertStatus(302);;
    }

    /** @test */
    public function admin_users_can_only_access_closed_tickets()
    {
        $adminUser = create(User::class);

        $adminRole = create(Role::class, [
            'name' => 'super_admin',
            'display_name' => 'Super Administrator',
            'description' => 'User is the master owner of the system'
        ]);

        $adminUser->attachRole($adminRole);

        $this->signIn($adminUser)
            ->get(route('supportdesk.admin.closed_tickets'))
            ->assertSee('Closed')
            ->assertStatus(200);
    }
}
