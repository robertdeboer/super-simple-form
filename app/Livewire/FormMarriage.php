<?php

declare(strict_types=1);

namespace App\Livewire;

use App\Livewire\Forms\Marriage;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class FormMarriage extends Component
{
    public Marriage $marriage;

    /**
     * Rehydrate the form values if they exist
     * @return void
     */
    public function mount(): void
    {
        try {
            $data = session()->get(Marriage::SESSION, []);
            if (!empty($data)) {
                $this->marriage->isMarried      = $data['isMarried'];
                $this->marriage->country        = $data['country'];
                $this->marriage->year           = $data['year'];
                $this->marriage->month          = $data['month'];
                $this->marriage->day            = $data['day'];
                $this->marriage->isWidowed      = $data['isWidowed'];
                $this->marriage->wasMarried     = $data['wasMarried'];
                $this->marriage->dateOfMarriage = $data['dateOfMarriage'];
            }
        } catch (\Throwable $e) {
            Log::error($e->getMessage());
        }
    }

    /**
     * Determine if they are married
     * @return bool
     */
    public function isMarried(): bool
    {
        return $this->marriage->isMarried == 'Yes';
    }

    /**
     * Send the user back to the previous form
     * @return void
     */
    public function previous(): void
    {
        $this->marriage->store(false);
        $this->redirectRoute('form.user');
    }

    /**
     * Render the page contents
     * @return View
     */
    public function render(): View
    {
        return view('livewire.form.marriage');
    }

    /**
     * Validate & Save the form data
     * @return void
     */
    public function save(): void
    {
        if($this->marriage->store()) {
            $this->redirectRoute('form.result');
        }
    }
}
