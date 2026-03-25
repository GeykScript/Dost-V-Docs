<?php

namespace App\Http\Controllers\Accounts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Unit;
use App\Models\User;
use App\Models\UserAssignment;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewUserAccountEmail;
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

    // If the position is "Unit Head", check if there is already an active Unit Head
    if (strtolower($validatedData['position']) === 'unit head') {
        $existingUnitHead = UserAssignment::where('unit_id', $validatedData['unit_id'])
            ->where('position', 'Unit Head')
            ->where('is_current', 1)
            ->first();

        if ($existingUnitHead) {
           return redirect()->back()
            ->withInput()
            ->withErrors(['unit-error' => 'This unit already has an active Unit Head.']);
        }
    }

    // Generate a random password
    $generatedPassword = 'DostDOCS-' . Str::random(8);

    // Hash the password
    $hashPassword = bcrypt($generatedPassword);

    // dd($validatedData, $generatedPassword, $hashPassword);  

    // Create the user
    $user = User::create([
        'username' => $validatedData['username'],
        'first_name' => $validatedData['first_name'],
        'last_name' => $validatedData['last_name'],
        'suffix' => $validatedData['suffix'],
        'email' => $validatedData['email'],
        'password' => $hashPassword,
        'is_super_admin' => $validatedData['is_super_admin'],
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

    // Send email with the generated password
    Mail::to($user->email)->send(new NewUserAccountEmail($user, $generatedPassword));

    return redirect()->route('accounts')
        ->with('success', 'Account created successfully!');
}
}
