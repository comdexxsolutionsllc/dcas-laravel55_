<?php

namespace Tests;

use App\Exceptions\Handler;
use App\Role;
use App\User;
use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    /**
     * @var
     */
    protected $oldExceptionHandler;

    /**
     * @var string|User
     */
    protected $user;

    protected function setUp()
    {
        parent::setUp();

        // DB::statement('PRAGMA foreign_keys=on');

        // $this->disableExceptionHandling();
        $this->withExceptionHandling();
    }

    /**
     * SignIn a user to the application.
     * @param null $user
     * @return $this
     */
    public function signIn($user = null)
    {
        if (!$user) {
            $user = factory(User::class)->create();
        }

        $this->user = $user;

        $this->actingAs($this->user);

        return $this;
    }


    /**
     * SignIn an administrator to the application.
     *
     * @param null $user
     * @param string $roleType
     *
     * @return $this
     */
    public function signInAdmin($user = null, $roleType = 'super_admin')
    {
        if (!$user) {
            $user = factory(User::class)->create();
        }

        $this->user = $user;

        $this->user->attachRole(
            $adminRole = create(Role::class, [
                'name' => $roleType,
                'display_name' => '',
                'description' => ''
            ])
        );

        $this->actingAs($this->user);

        return $this;
    }

    /**
     * Disable Exception Handling.
     */
    protected function disableExceptionHandling()
    {
        $this->oldExceptionHandler = $this->app->make(ExceptionHandler::class);
        $this->app->instance(ExceptionHandler::class, new class extends Handler
        {
            public function __construct()
            {
            }

            public function report(\Exception $e)
            {
            }

            public function render($request, \Exception $e)
            {
                throw $e;
            }
        });
    }

    /**
     * Enable Exception Handling.
     *
     * @return $this
     */
    protected function withExceptionHandling()
    {
        $this->app->instance(ExceptionHandler::class, $this->oldExceptionHandler);

        return $this;
    }
}
