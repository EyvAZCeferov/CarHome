<nav>
    <div class="nav nav-tabs" id="nav-tab" role="tablist">
        @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
            <button class="nav-link {{ strtoupper($localeCode) }} @if ($localeCode == 'az') active @endif"
                id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab"
                aria-controls="nav-home" aria-selected="true"
                onclick="changeTabElements('{{ strtoupper($localeCode) }}')">{{ strtoupper($localeCode) }}</button>
            &nbsp;
        @endforeach
    </div>
</nav>
<div class="tab-content" id="nav-tabContent">
    @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
        <div class="tab-pane {{ strtoupper($localeCode) }} fade @if ($localeCode == 'az') show active @endif pt-3"
            id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
            <div class="row">
                @if (isset($name) && $name==true)
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Ad <span
                                    class="badge badge-info">{{ strtoupper($localeCode) }}</span></label>
                            <input type="text"
                                value="{{ old($localeCode.'_name', isset($data) && !empty($data) && isset($data->name[$localeCode.'_name']) && !empty($data->name[$localeCode.'_name']) ? $data->name[$localeCode.'_name'] : null) }}"
                                name="{{ $localeCode }}_name" class="form-control {{ $errors->first($localeCode.'_name') ? 'is-invalid' : '' }}">
                        </div>
                    </div>
                @endif
                @if (isset($address) && $address==true)
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Ünvan <span
                                    class="badge badge-info">{{ strtoupper($localeCode) }}</span></label>
                            <input type="text"
                                value="{{ old($localeCode.'_address', isset($data) && !empty($data) && isset($data->address[$localeCode.'_address']) && !empty($data->address[$localeCode.'_address']) ? $data->address[$localeCode.'_address'] : null) }}"
                                name="{{ $localeCode }}_address" class="form-control {{ $errors->first($localeCode.'_address') ? 'is-invalid' : '' }}">
                        </div>
                    </div>
                @endif
                @if (isset($description) && $description==true)
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Açıqlama <span
                                class="badge badge-info">{{ strtoupper($localeCode) }}</span></label>
                            <textarea name="{{ $localeCode }}_description"
                                class="form-control summernote {{ $errors->first($localeCode.'_description') ? 'is-invalid' : '' }}" rows="4">{{ old($localeCode.'_description', isset($data) && !empty($data) && isset($data->description[$localeCode.'_description']) && !empty($data->description[$localeCode.'_description']) ? $data->description[$localeCode.'_description'] : null) }}</textarea>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    @endforeach
</div>
