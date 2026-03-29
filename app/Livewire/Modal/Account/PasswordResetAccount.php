<?php

namespace App\Livewire\Modal\Account;

use App\Models\User;
use Livewire\Component;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use App\Mail\AccountPasswordResetEmail;

class PasswordResetAccount extends Component
{
    public User $user;

    protected function rules(): array
    {
        return [
            'user.id' => ['required', 'exists:users,id'],
        ];
    }

public function resetPassword()
{
    $validated = $this->validate();
    
    // Generate a random password
    $generatedPassword = 'DostDOCS-' . Str::random(8);
    $hashPassword = bcrypt($generatedPassword);

    if ($validated) {
        $this->user->update(['password' => $hashPassword]);

    Log::info('Password reset for user ID: ' . $this->user->id . ' with new temporary password');

    // Send the email with the generated password
    Mail::to($this->user->email)->queue(new AccountPasswordResetEmail($this->user, $generatedPassword));    }

    return redirect()->route('accounts')->with('success', 'Password reset successfully.');
}

    public function render()
    {
        return view('livewire.modal.account.password-reset-account');
    }
}

?>



