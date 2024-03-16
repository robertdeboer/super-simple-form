<form wire:submit="save">
    <label for="is_married">Are You Married?</label>
    <select wire:model.live="marriage.isMarried" name="is_married" id="is_married">
        <option value="Yes">Yes</option>
        <option value="No">No</option>
    </select>
    <div>
        @error('marriage.isMarried') <span class="error">{{ $message }}</span> @enderror
    </div>

    @if($this->isMarried())
        <label for="marriage_year">Date of Married (Year, Month, Day)</label>
        <input type="number" wire:model="marriage.year" name="marriage_year" id="marriage_year" size="4">
        <input type="number" wire:model="marriage.month" name="marriage_month" id="marriage_month" size="2">
        <input type="number" wire:model="marriage.day" name="marriage_day" id="marriage_day" size="2">
        <div>
            @error('marriage.year') <span class="error">{{ $message }}</span> @enderror
        </div>
        <div>
            @error('marriage.month') <span class="error">{{ $message }}</span> @enderror
        </div>
        <div>
            @error('marriage.day') <span class="error">{{ $message }}</span> @enderror
        </div>
        <label for="country">Country</label>
        <input type="text" wire:model="marriage.country" name="country" id="country">
        <div>
            @error('marriage.country') <span class="error">{{ $message }}</span> @enderror
        </div>
    @endif

    @if(!$this->isMarried())
        <label for="is_widowed">Are You Widowed?</label>
        <select wire:model="marriage.isWidowed" name="is_widowed" id="is_widowed">
            <option value="Yes">Yes</option>
            <option value="No">No</option>
        </select>
        <div>
            @error('marriage.isWidowed') <span class="error">{{ $message }}</span> @enderror
        </div>
        <label for="was_married">Have you ever been married in the past?</label>
        <select wire:model="marriage.wasMarried" name="was_married" id="was_married">
            <option value="Yes">Yes</option>
            <option value="No">No</option>
        </select>
        <div>
            @error('marriage.wasMarried') <span class="error">{{ $message }}</span> @enderror
        </div>
    @endif
    <button type="button" wire:click="previous">Previous</button>
    <button type="submit">Submit</button>
</form>
