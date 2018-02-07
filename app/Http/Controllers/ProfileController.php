<?php

namespace App\Http\Controllers;

use App\Profile;
use Request;

/**
 * Class ProfileController
 *
 * @package App\Http\Controllers
 */
class ProfileController extends Controller
{
    /**
     * ProfileController constructor.
     */
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    /**
     * @param Profile $profile
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Profile $profile)
    {
        // Return the views with all the profile list
        return view('profile.index', [
            'profiles' => $profile->all(),
        ]);
    }

    /**
     * @param $username
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($username)
    {
        $this->middleware(['guest']);

        try {
            // Return the views of the requested profile
            return view('profile.show', [
               'profile' => Profile::findOrFail($username),
            ]);
        } catch (\Exception $e) {
            return abort(404, 'Profile does not exist.');
        }
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        // Return the `create form` views
        return view('profile.create');
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        // Create new Profile instance
        $profile = new Profile();

        // Make sure to validate both field
        // And fill the instance with the validated result
        $profile->fill(
            $request->validate([
            'avatar' => 'nullable',
            'biography' => 'nullable',
            'address_1' => 'required',
            'address_2' => 'nullable',
            'city' => 'required',
            'state' => 'required|between:2,2',
            'country' => 'required|between:2,2',
            'postal_code' => 'required',
            ])
        );

        // Get the path of the `avatar` and assign it in the avatar column
        $profile->avatar = $request->file('avatar')->store('avatar');

        // Save it to the database
        $profile->save();

        // Redirect to the profile
        return redirect('/dashboard/profile/' . $profile->username);
    }

    /**
     * @param Request $request
     * @param Profile $profile
     *
     * @return \App\Profile
     *
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(Request $request, Profile $profile)
    {
        $this->authorize('update', $profile);

        $profile->whereUserId($profile->user->id)
            ->update($request->only([
                'address_1',
                'address_2',
                'avatar',
                'biography',
                'city',
                'country',
                'postal_code',
                'state',
            ]));

        return $profile;
//        return redirect()->back();
    }
}
