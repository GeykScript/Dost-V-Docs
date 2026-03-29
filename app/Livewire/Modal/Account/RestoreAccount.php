<?php

namespace App\Livewire\Modal\Account;

use App\Models\User;
use Livewire\Component;
class RestoreAccount extends Component
{
    public User $user;

    protected function rules(): array
    {
        return [
            'user.id' => ['required', 'exists:users,id'],
        ];
    }

public function restoreAccount()
{
    $validated = $this->validate();
    
    //dd($validated);

    if ($validated) {
        $this->user->restore();
    }

    return redirect()->route('accounts')->with('success', 'Account restored successfully.');
}

    public function render()
    {
        return view('livewire.modal.account.restore-account');
    }
}

?>


