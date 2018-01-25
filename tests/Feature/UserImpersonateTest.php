<?php

namespace Tests\Feature;

use App\Role;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserImpersonateTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function an_admin_can_impersonate_a_user()
    {
        $adminUser = create(User::class, [
            'id' => 2
        ]);

        $regularUser = create(User::class, [
            'id' => 7,
            'name' => 'Cheryl Ford'
        ]);

        $adminRole = create(Role::class);

        $adminUser->attachRole($adminRole);

        $this->signIn($adminUser)
            ->get(route('impersonate.user.switch.start', $regularUser->id))
            ->assertStatus(302);

        $this->assertNotEquals(auth()->user()->id, $regularUser->id);
    }

    /** @test */
    public function a_regular_user_cannot_impersonate_a_user()
    {
        $regularUser = create(User::class, [
            'id' => 7,
            'name' => 'Cheryl Ford'
        ]);

        $anotherUser = create(User::class, [
            'id' => 8,
            'name' => 'Danny Ford'
        ]);

        $this->signIn($regularUser)
            ->get(route('impersonate.user.switch.start', $anotherUser->id))
            ->assertStatus(302);

        $this->assertEquals(auth()->user()->id, $regularUser->id);
    }

    /** @test */
    public function an_admin_can_stop_impersonating_a_user()
    {
        $adminUser = create(User::class, [
            'id' => 2
        ]);

        $regularUser = create(User::class, [
            'id' => 7,
            'name' => 'Cheryl Ford'
        ]);

        $adminRole = create(Role::class);

        $adminUser->attachRole($adminRole);

        $this->signIn($adminUser)
            ->get(route('impersonate.user.switch.stop', $regularUser->id))
            ->assertStatus(302);

        //
        $this->assertNotEquals(auth()->user()->id, $regularUser->id);
    }

    /** @test */
    public function a_regular_user_cannot_stop_impersonating_a_user()
    {
        $regularUser = create(User::class, [
            'id' => 7,
            'name' => 'Cheryl Ford'
        ]);

        $anotherUser = create(User::class, [
            'id' => 8,
            'name' => 'Danny Ford'
        ]);

        $this->signIn($regularUser)
            ->get(route('impersonate.user.switch.stop', $anotherUser->id))
            ->assertStatus(302);

        //
        $this->assertEquals(auth()->user()->id, $regularUser->id);
    }
}
