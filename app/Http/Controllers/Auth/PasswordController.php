<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class PasswordController extends Controller
{
    /**
     * Update the user's password.
     */
    public function update(Request $request): RedirectResponse
    {
        $validated = $request->validateWithBag('updatePassword', [
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'confirmed',
                Password::min(8)      // Minimum 8 characters
                ->letters()       // Must include letters
                ->numbers()       // Must include numbers
                ->symbols(), ],
        ]);

        $request->user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        if (! $request->user()->isDirty('password')) {
            return back()->with('status', 'no-changes-password');
        }

        return back()->with('status', 'password-updated');
    }
}
