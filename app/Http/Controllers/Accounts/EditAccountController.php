<?php

namespace App\Http\Controllers\Accounts;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rule; 

class EditAccountController extends Controller
{
    public function index($id){
        $user = User::findOrFail($id);
        return view('account.edit-account', compact('user'));
    }

    // The NEW method that saves the data
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        \Log::info("yes");
        $validated = $request->validate([
            'username' => [
                'required', 
                'string', 
                'max:255', 
                Rule::unique('users')->ignore($user->id)
            ],
            'email' => [
                'required', 
                'email', 
                'max:255', 
                Rule::unique('users')->ignore($user->id)
            ],
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'suffix' => ['nullable', 'string', 'max:50'],
        ]);

        $user->update($validated);

        return back()->with('status', 'Profile details updated successfully.');
    }
}
