<div class="col-sm-6 col-md-4 col-lg-3">
    <label>{{ $label }}</label>
    <select name="langs[]" class="selectpicker" multiple data-live-search="true">
        <option></option>
        @foreach (config('laravellocalization.localesall') as $key => $value)
            <option value="{{ $value }}">{{ strtoupper($value) }}</option>
        @endforeach
    </select>
</div>
