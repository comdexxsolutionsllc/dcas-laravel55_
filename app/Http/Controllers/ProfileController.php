<?php

namespace App\Http\Controllers;

use App\Profile;
use Request;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index(Profile $profile)
    {
        // Return the views with all the profile list
        return view('profile.index', [
            'profiles' => $profile->all()
        ]);
    }

    public function show(Profile $profile, $username)
    {
        $this->middleware(['guest']);

        // Return the views of the requested profile
        return view('profile.show', [
            'profile' => $profile->where('username', $username)->get()
        ]);
    }

    public function create()
    {
        // Return the `create form` views
        return view('profile.create');
    }

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
                'postal_code' => 'required'
            ])
        );

        // Get the path of the `avatar` and assign it in the avatar column
        $profile->avatar = $request->file('avatar')->store('avatar');

        // Save it to the database
        $profile->save();

        // Redirect to the profile
        return redirect('/dashboard/profile/' . $profile->username);
    }
}
