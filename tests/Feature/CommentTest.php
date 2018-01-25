<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CommentTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function an_authorized_user_can_view_their_own_comments()
    {
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /** @test */
    public function an_unauthorized_user_cannot_view_comments()
    {
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /** @test */
    public function a_user_cannot_update_comments()
    {
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /** @test */
    public function a_user_cannot_delete_comments()
    {
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }
}
