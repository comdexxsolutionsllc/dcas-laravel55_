<?php

namespace App\Providers;

use App\Role;
use App\Profile;
use Carbon\Carbon;
use App\Permission;
use App\Policies\RolePolicy;
use App\Policies\TicketPolicy;
use Laravel\Passport\Passport;
use App\Policies\CommentPolicy;
use App\Policies\ProfilePolicy;
use App\Policies\CategoryPolicy;
use App\Policies\PermissionPolicy;
use Modules\SupportDesk\Models\Ticket;
use Modules\SupportDesk\Models\Comment;
use Modules\SupportDesk\Models\Category;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

//use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Category::class => CategoryPolicy::class,
        Comment::class => CommentPolicy::class,
        Permission::class => PermissionPolicy::class,
        Profile::class => ProfilePolicy::class,
        Role::class => RolePolicy::class,
        Ticket::class => TicketPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot()
    {
        $this->registerPolicies();

        Passport::routes();
        Passport::tokensExpireIn(Carbon::now()->addDays(15));
        Passport::refreshTokensExpireIn(Carbon::now()->addDays(30));
    }
}
