<?php

namespace App\Http\Controllers\Accounts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Unit;
use App\Models\User;
use App\Models\UserAssignment;
use Illuminate\Support\Str;

use App\Http\Requests\UserAccount\UserAccountRequest;

class AddAccountController extends Controller
{
    public function index(){
        $units = Unit::all();
        return view('account.add-account', compact('units'));
    }

    public function store(UserAccountRequest $request)
    {
        $validatedData = $request->validated();

        // Generate a random password 
        $generatedPassword = 'DostDOCS-' . Str::random(8); // DostDOCS-a1B2c3D4

        // Hash the password before saving
        $hashPassword['password'] = bcrypt($generatedPassword);

        dd([
            'validated' => $validatedData,
            'plain_password' => $generatedPassword,
            'hashed_password' => $hashPassword['password'],

        ]);

        // Create the user
        $user = User::create([
            'username' => $validatedData['username'],
            'first_name' => $validatedData['first_name'],
            'last_name' => $validatedData['last_name'],
            'suffix' => $validatedData['suffix'],
            'email' => $validatedData['email'],
            'password' => $hashPassword['password'],
            'is_super_admin' => $validatedData['is_admin'],
        ]);

        // Create the user assignment
        UserAssignment::create([
            'user_id' => $user->id,
            'unit_id' => $validatedData['unit_id'],
            'position' => $validatedData['position'],
            'end_date' => null,
            'is_current' => 1,
            'created_at' => now(),
            'updated_at' => null,
        ]);

        return redirect()->route('accounts')
            ->with('success', 'Account created successfully!');
    }
}
