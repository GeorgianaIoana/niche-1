<?php

namespace App\Livewire\Dashboard;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('components.layouts.dashboard')]
#[Title('Settings')]
class Settings extends Component
{
    public bool $emailNotifications = true;
    public bool $orderUpdates = true;
    public bool $promotionalEmails = false;

    public bool $settingsUpdated = false;
    public bool $confirmingDeletion = false;
    public string $deleteConfirmation = '';

    public function mount(): void
    {
        // In a real app, load these from user preferences table
    }

    public function updateSettings(): void
    {
        // In a real app, save to user preferences table
        $this->settingsUpdated = true;
    }

    public function confirmAccountDeletion(): void
    {
        $this->confirmingDeletion = true;
    }

    public function cancelDeletion(): void
    {
        $this->confirmingDeletion = false;
        $this->deleteConfirmation = '';
    }

    public function deleteAccount(): void
    {
        $this->validate([
            'deleteConfirmation' => 'required|in:DELETE',
        ], [
            'deleteConfirmation.in' => 'Please type DELETE to confirm.',
        ]);

        $user = Auth::user();
        Auth::logout();

        $user->delete();

        session()->invalidate();
        session()->regenerateToken();

        $this->redirect(route('home'), navigate: true);
    }

    public function render()
    {
        return view('livewire.dashboard.settings');
    }
}
