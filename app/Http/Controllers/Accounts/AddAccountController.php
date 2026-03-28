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
use App\Http\Requests\UserAccount\UserAccountAddRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;


class AddAccountController extends Controller
{

    public function index(){
        // Retrieve units with caching
        $units = Unit::allCached();

        return view('account.add-account', compact('units'));
    }

    public function store(UserAccountAddRequest $request)
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
        $hashPassword = bcrypt($generatedPassword);

        try {
            DB::transaction(function () use ($validatedData, $hashPassword, $generatedPassword) {
                // Create the user
                $user = User::create([
                    'username'       => $validatedData['username'],
                    'first_name'     => $validatedData['first_name'],
                    'last_name'      => $validatedData['last_name'],
                    'suffix'         => $validatedData['suffix'],
                    'email'          => $validatedData['email'],
                    'password'       => $hashPassword,
                    'is_super_admin' => $validatedData['is_super_admin'],
                ]);

                // Create the user assignment
                UserAssignment::create([
                    'user_id'    => $user->id,
                    'unit_id'    => $validatedData['unit_id'],
                    'position'   => $validatedData['position'],
                    'end_date'   => null,
                    'is_current' => 1,
                    'created_at' => now(),
                    'updated_at' => null,
                ]);

                // Log success
                Log::info('User account created successfully', [
                    'user_id'  => $user->id,
                    'username' => $user->username,
                    'email'    => $user->email,
                    'unit_id'  => $validatedData['unit_id'],
                    'position' => $validatedData['position'],
                ]);

                // Send the email with the generated password
                Mail::to($user->email)->queue(new NewUserAccountEmail($user, $generatedPassword));
            });
        } catch (\Exception $e) {
                // Log Error 
                Log::error('Failed to create user account', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'input' => $validatedData,
            ]);

            return redirect()->route('accounts')
                ->with(['error' => 'Something went wrong. Please try again']);
        }

        return redirect()->route('accounts')
            ->with('success', 'Account created successfully!');
    }
}
