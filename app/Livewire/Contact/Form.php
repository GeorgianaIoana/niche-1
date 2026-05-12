<?php

namespace App\Livewire\Contact;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('components.layouts.public')]
#[Title('Contact Us - Grooves Black')]
class Form extends Component
{
    public string $name = '';
    public string $email = '';
    public string $subject = '';
    public string $message = '';
    public bool $success = false;

    protected $rules = [
        'name' => 'required|min:2',
        'email' => 'required|email',
        'subject' => 'required|min:5',
        'message' => 'required|min:10',
    ];

    public function submit(): void
    {
        $this->validate();

        // In a real app, you would send an email or save to database
        $this->success = true;
        $this->reset(['name', 'email', 'subject', 'message']);
    }

    public function render()
    {
        return view('livewire.contact.form');
    }
}
