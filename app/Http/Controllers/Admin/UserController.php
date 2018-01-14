<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\RedirectResponse;

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
     */
    public function user_switch_start($new_user): RedirectResponse
    {
        $new_user = User::find($new_user);

        session()->put('orig_user', auth()->id());

        auth()->login($new_user);

        return redirect()->back();
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function user_switch_stop(): RedirectResponse
    {
        $id = session()->pull('orig_user');
        $orig_user = User::find($id);

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
