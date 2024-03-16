<?php

declare(strict_types=1);

namespace App\Livewire\Forms;

use App\Rules\Country;
use App\Src\Helpers\Dates;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;
use Livewire\Form;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class Marriage extends Form
{
    public const SESSION = 'marriage';
    public string $isMarried  = 'Yes';
    public string $country;
    public string $year;
    public string $month;
    public string $day;
    public string $isWidowed  = 'No';
    public string $wasMarried = 'No';
    public string $dateOfMarriage;

    /**
     * The validation rules for the form fields
     * @return array
     */
    public function rules(): array
    {
        return [
            'isMarried'  => ['required'],
            'country'    => [Rule::requiredIf($this->isMarried == 'Yes'), new Country],
            'year'       => [Rule::requiredIf($this->isMarried == 'Yes')],
            'month'      => [Rule::requiredIf($this->isMarried == 'Yes')],
            'day'        => [Rule::requiredIf($this->isMarried == 'Yes')],
            'isWidowed'  => ['required'],
            'wasMarried' => ['required']
        ];
    }

    /**
     * Save the form results
     *
     * @param bool $validate
     *
     * @return void
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function store(bool $validate = true): void
    {
        if (!$validate) {
            session()->put(self::SESSION, $this->all());
            return;
        }
        $this->validate();
        if ($this->isMarried == 'Yes') {
            $this->dateOfMarriage = (new Dates())->createIsoString(
                $this->year,
                $this->month,
                $this->day
            );
            $user                 = session()->get(User::SESSION, []);
            if ((new Dates())->marriedBefore18($user['dateOfBirth'], $this->dateOfMarriage)) {
                $this->addError('year', 'Marriage before 18 is not allowed.');
            }
        } else {
            $this->country = '';
            $this->year    = '';
            $this->month   = '';
            $this->day     = '';
            $this->dateOfMarriage = '';
        }
        Log::debug('marriage', $this->all());
        session()->put(self::SESSION, $this->all());
    }
}
