<?php

declare(strict_types=1);

namespace App\Livewire;

use App\Livewire\Forms\User;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class FormUser extends Component
{
    public User $user;

    /**
     * Rehydrate the form data if it exists
     * @return void
     */
    public function mount(): void
    {
        try {
            $data = session()->get(User::SESSION,[]);
            if(!empty($data)) {
                $this->user->firstName = $data['firstName'];
                $this->user->lastName = $data['lastName'];
                $this->user->address = $data['address'];
                $this->user->city = $data['city'];
                $this->user->country = $data['country'];
                $this->user->birthYear = $data['birthYear'];
                $this->user->birthMonth = $data['birthMonth'];
                $this->user->birthDay = $data['birthDay'];
                $this->user->dateOfBirth = $data['dateOfBirth'];
            }
        } catch(\Throwable $e) {
            Log::error($e->getMessage());
        }
    }

    /**
     * Render the page contents
     * @return View
     */
    public function render(): View
    {
        return view('livewire.form.user');
    }

    /**
     * Validate & Save the form data
     * @return void
     */
    public function save(): void
    {
        $this->user->store();
        $this->redirectRoute('form.marriage');
    }
}
