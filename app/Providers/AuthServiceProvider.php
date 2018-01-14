<?php

namespace App\Providers;

use App\Permission;
use App\Policies\CategoryPolicy;
use App\Policies\CommentPolicy;
use App\Policies\PermissionPolicy;
use App\Policies\ProfilePolicy;
use App\Policies\RolePolicy;
use App\Policies\TicketPolicy;
use App\Profile;
use App\Role;
use Carbon\Carbon;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Laravel\Passport\Passport;
use Modules\SupportDesk\Models\Category;
use Modules\SupportDesk\Models\Comment;
use Modules\SupportDesk\Models\Ticket;

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
