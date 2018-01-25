<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RoleTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function users_cannot_view_roles()
    {
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /** @test */
    public function a_user_cannot_update_roles()
    {
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /** @test */
    public function a_superadmin_can_update_roles()
    {
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /** @test */
    public function a_user_cannot_delete_roles()
    {
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /** @test */
    public function a_superuser_can_delete_roles()
    {
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }
}
