<?php

namespace App\Livewire\Modal\Account;

use App\Models\User;
use Livewire\Component;
use Illuminate\Http\RedirectResponse;
class DisableAccount extends Component
{
    public User $user;

    protected function rules(): array
    {
        return [
            'user.id' => ['required', 'exists:users,id'],
        ];
    }

public function disableAccount()
{
    $validated = $this->validate();
    
    //dd($validated);

    if ($validated) {
        $this->user->delete();
    }

    return redirect()->route('accounts')->with('success', 'Account disabled successfully.');
}

    public function render()
    {
        return view('livewire.modal.account.disable-account');
    }
}

?>


