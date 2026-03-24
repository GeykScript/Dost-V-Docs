<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use Illuminate\Validation\Rule;

class EditUser extends Component
{
    public User $user;
    
    // Livewire properties bound to the form
    public $username;
    public $email;
    public $first_name;
    public $last_name;
    public $suffix;

    public $successMessage;
    public $errorMessage;


    public function mount(User $user)
    {
        $this->user = $user;
        
        $this->username = $user->username;
        $this->email = $user->email;
        $this->first_name = $user->first_name;
        $this->last_name = $user->last_name;
        $this->suffix = $user->suffix;
    }

    protected function rules()
    {
        return [
            // These catch advanced backend rules like "Email already taken"
            'username' => ['required', 'string', 'max:255', Rule::unique('users')->ignore($this->user->id)],
            'email' => ['required', 'email', Rule::unique('users')->ignore($this->user->id)],
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'suffix' => ['nullable', 'string', 'max:50'],
        ];
    }

    public function updateProfile()
    {
        // Clear old messages
        $this->reset(['successMessage', 'errorMessage']);

        // Triggers rules(). If email is taken, this stops execution 
        // and sends the error to the specific <x-input-error> in Blade.
        $validated = $this->validate();

        try {
            // Save to database
            $this->user->update($validated);
            
            $this->successMessage = 'Profile updated successfully.';
            
            // Dispatch event to reset Alpine's "original" state and clear frontend errors
            $this->dispatch('profile-updated'); 
            
        } catch (\Exception $e) {
            $this->errorMessage = 'An error occurred while saving. Please try again.';
        }
    }

    public function render()
    {
        return view('livewire.admin.user-accounts.update-info-form');
    }
}