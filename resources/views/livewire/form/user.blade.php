<form wire:submit="save">
    <label for="first_name">First Name</label>
    <input type="text" wire:model="user.firstName" name="first_name" id="first_name">
    <div>
        @error('user.firstName') <span class="error">{{ $message }}</span> @enderror
    </div>

    <label for="last_name">Last Name</label>
    <input type="text" wire:model="user.lastName" name="last_name" id="last_name">
    <div>
        @error('user.lastName') <span class="error">{{ $message }}</span> @enderror
    </div>

    <label for="address">Address</label>
    <input type="text" wire:model="user.address" name="address" id="address">
    <div>
        @error('user.address') <span class="error">{{ $message }}</span> @enderror
    </div>

    <label for="city">City</label>
    <input type="text" wire:model="user.city" name="city" id="city">
    <div>
        @error('user.city') <span class="error">{{ $message }}</span> @enderror
    </div>

    <label for="country">Country</label>
    <input type="text" wire:model="user.country" name="country" id="country">
    <div>
        @error('user.country') <span class="error">{{ $message }}</span> @enderror
    </div>

    <label for="birth_year">Date of Birth (Year, Month, Day)</label>
    <input type="number" wire:model="user.birthYear" name="birth_year" id="birth_year" size="4">
    <input type="number" wire:model="user.birthMonth" name="birth_month" id="birth_month" size="2">
    <input type="number" wire:model="user.birthDay" name="birth_day" id="birth_day" size="2">
    <div>
        @error('user.birthYear') <span class="error">{{ $message }}</span> @enderror
    </div>
    <div>
        @error('user.birthMonth') <span class="error">{{ $message }}</span> @enderror
    </div>
    <div>
        @error('user.birthDay') <span class="error">{{ $message }}</span> @enderror
    </div>

    <button type="submit">Next</button>
</form>
