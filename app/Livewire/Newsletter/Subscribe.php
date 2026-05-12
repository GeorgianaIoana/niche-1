<?php

namespace App\Livewire\Newsletter;

use Livewire\Component;

class Subscribe extends Component
{
    public string $email = '';
    public bool $success = false;
    public string $variant = 'default'; // 'default' or 'dark'

    public function mount(string $variant = 'default'): void
    {
        $this->variant = $variant;
    }

    public function subscribe(): void
    {
        $this->validate([
            'email' => 'required|email',
        ]);

        // In a real app, you would save this to a database or send to a newsletter service
        $this->success = true;
        $this->email = '';
    }

    public function render()
    {
        return view('livewire.newsletter.subscribe');
    }
}
