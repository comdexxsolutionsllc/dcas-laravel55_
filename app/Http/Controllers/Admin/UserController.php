<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\RedirectResponse;

/**
 * Class UserController
 *
 * @package App\Http\Controllers\Admin
 */
class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    /**
     * @param $newUser
     *
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws AuthenticationException
     */
    public function userSwitchStart($newUser): RedirectResponse
    {
        session()->put('orig_user', auth()->id());

        $newUser = User::find($newUser);

        if (!$newUser) {
            throw new AuthenticationException;
        }

        auth()->login($newUser);

        return redirect()->back();
    }

    /**
     * @return RedirectResponse
     */
    public function userSwitchStop(): RedirectResponse
    {
        $origUser = User::find(session()->pull('orig_user'));

        auth()->login($origUser);

        return redirect()->back();
    }
}

//// Inside View
//<a href="admin/user/switch/start/2">Login as 2</a>
//
//@if( Session::has('orig_user') )
//<a href="admin/user/switch/stop">Switch back to 1</a>
//@endif
//
//
//// Simple Test inside View
//@if( Auth::id() == 1 )
//    User 1
//@endif
//
//@if( Auth::id() == 2 )
//    User 2
//@endif
