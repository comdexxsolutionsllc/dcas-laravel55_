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
     * @param $new_user
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws AuthenticationException
     */
    public function user_switch_start($new_user): RedirectResponse
    {
        session()->put('orig_user', auth()->id());

        $new_user = User::find($new_user);

        if (!$new_user) throw new AuthenticationException;

        auth()->login($new_user);

        return redirect()->back();
    }

    /**
     * @return RedirectResponse
     */
    public function user_switch_stop(): RedirectResponse
    {
        $orig_user = User::find($id = session()->pull('orig_user'));

        auth()->login($orig_user);

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
