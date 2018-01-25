<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class QueueTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function an_authorized_user_can_view_queues()
    {
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /** @test */
    public function an_unauthorized_user_cannot_view_queues()
    {
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /** @test */
    public function a_user_cannot_update_queues()
    {
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /** @test */
    public function a_superadmin_can_update_queues()
    {
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /** @test */
    public function a_user_cannot_delete_queues()
    {
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /** @test */
    public function a_superuser_can_delete_queues()
    {
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }
}
