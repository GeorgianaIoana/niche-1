<?php

namespace App\Livewire\Auth;

use App\Actions\Auth\MergeGuestDataAction;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('components.layouts.public')]
#[Title('Sign In - Grooves Black')]
class Login extends Component
{
    public string $email = '';
    public string $password = '';
    public bool $remember = false;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required',
    ];

    public function login(MergeGuestDataAction $mergeGuestData): void
    {
        $this->validate();

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
            session()->regenerate();

            $mergeGuestData->execute(Auth::user());

            $this->redirect(route('dashboard'), navigate: true);
        } else {
            $this->addError('email', 'These credentials do not match our records.');
        }
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
