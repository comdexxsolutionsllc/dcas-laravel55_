<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Authy;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Send the post-authentication response.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Illuminate\Contracts\Auth\Authenticatable $user
     * @return \Illuminate\Http\Response
     */
    protected function authenticated(Request $request, Authenticatable $user)
    {
        if (Authy::getProvider()->isEnabled($user) || (env('AUTHY_ENABLED') === true)) {
            return $this->logoutAndRedirectToTokenScreen($request, $user);
        }

        return redirect()->intended($this->redirectPath());
    }

    /**
     * Generate a redirect response to the two-factor token screen.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Illuminate\Contracts\Auth\Authenticatable $user
     * @return \Illuminate\Http\Response
     */
    protected function logoutAndRedirectToTokenScreen(Request $request, Authenticatable $user): Response
    {
        auth($this->getGuard())->logout();

        $request->session()->put('authy:auth:id', $user->id);

        return redirect(url('auth/token'));
    }

    /**
     * Show two-factor authentication page
     *
     * @return \Illuminate\Http\Response|\Illuminate\View\View
     */
    public function getToken(): View
    {
        return session('authy:auth:id') ? view('auth.token') : redirect(url('login'));
    }

    /**
     * Verify the two-factor authentication token.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function postToken(Request $request): Response
    {
        $this->validate($request, ['token' => 'required']);
        if (!session('authy:auth:id')) {
            return redirect(url('login'));
        }

        $guard = config('auth.defaults.guard');
        $provider = config('auth.guards.' . $guard . '.provider');
        $model = config('auth.providers.' . $provider . '.model');

        $user = (new $model)->findOrFail(
            $request->session()->pull('authy:auth:id')
        );

        if (Authy::getProvider()->tokenIsValid($user, $request->token)) {
            auth($this->getGuard())->login($user);

            return redirect()->intended($this->redirectPath());
        } else {
            return redirect(url('login'))->withErrors('Invalid two-factor authentication token provided!');
        }
    }
}
