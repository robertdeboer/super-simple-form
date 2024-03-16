<?php

declare(strict_types=1);

namespace App\Livewire\Forms;

use App\Rules\Address;
use App\Rules\Country;
use App\Src\Helpers\Dates;
use Livewire\Form;

class User extends Form
{
    public const SESSION = 'user';
    public string $firstName;
    public string $lastName;
    public string $address;
    public string $city;
    public string $country;
    public string $birthYear;
    public string $birthMonth;
    public string $birthDay;
    public string $dateOfBirth;

    /**
     * The validation rules for the form fields
     * @return array
     */
    public function rules(): array
    {
        return [
            'firstName'  => ['required', 'min:5', 'alpha:ascii'],
            'lastName'   => ['required', 'min:5', 'alpha:ascii'],
            'address'    => ['required', 'min:5', new Address],
            'city'       => ['required', 'min:3', 'alpha:ascii'],
            'country'    => ['required', 'min:3', new Country],
            'birthYear'  => ['required', 'numeric'],
            'birthMonth' => ['required', 'numeric'],
            'birthDay'   => ['required', 'numeric'],
        ];
    }

    /**
     * Store the form results if the data passes validation
     * @return void
     */
    public function store(): void
    {
        $this->validate();
        $this->dateOfBirth = (new Dates())->createIsoString(
            $this->birthYear,
            $this->birthMonth,
            $this->birthDay
        );
        session()->put(self::SESSION, $this->all());
    }
}
