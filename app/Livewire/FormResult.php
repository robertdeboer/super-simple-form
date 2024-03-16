<?php

declare(strict_types=1);

namespace App\Livewire;

use App\Livewire\Forms\Marriage;
use App\Livewire\Forms\User;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class FormResult extends Component
{
    public array $user;
    public array $marriage;

    /**
     * Pull the data form the session to hydrate the page
     * @return void
     */
    public function mount(): void
    {
        try {
            $this->user     = session()->get(User::SESSION,[]);
            $this->marriage = session()->get(Marriage::SESSION,[]);
        } catch (\Throwable $e) {
            Log::error($e->getMessage());
            $this->user     = [];
            $this->marriage = [];
        }
    }

    /**
     * Clear the entire form and send the user back to the start
     * @return void
     */
    public function clear(): void
    {
        $this->user = [];
        session()->put(User::SESSION);
        $this->marriage = [];
        session()->put(Marriage::SESSION);
        $this->redirectRoute('form.user');
    }

    /**
     * Render the page contents
     * @return View
     */
    public function render(): View
    {
        return view('livewire.form.result');
    }
}
