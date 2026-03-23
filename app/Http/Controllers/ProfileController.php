<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $profile = $request->user()->profile_path; // Assuming 'profile_path' is the column name in users table
        return view('profile.edit', [
            'user' => $request->user(),
            'profile' => $profile,
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }
        
        if(!$request->user()->isDirty()) {
            return Redirect::route('profile.edit')->with('status', 'no-changes-profile');
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function uploadProfilePicture(Request $request): RedirectResponse
    {
        $request->validate([
            'profilePhoto' => 'required|image|max:1024', // 1MB
        ]);
        $user = $request->user();

        $path = $request->file('profilePhoto')->store('profiles', 'public');

       
        $user->profile_path = $path;
        $user->save();

        return Redirect::route('profile.edit')->with('success', 'Profile picture updated successfully.');
}
}
