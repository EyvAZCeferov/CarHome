<td class="text-center">
    @switch($type)
        @case('logojson')
            @if (isset($data->logos['logo']) && !empty($data->logos['logo']))
                <img class="img-fluid img-responsive img-circle img-small" style="height:100px"
                    src="{{ getImageUrl($data->logos['logo'], 'images') }}"
                    alt="{{ $data->name[app()->getLocale() . '_name'] }}" />
            @else
                <span class="text-center text-danger">Məlumat tapılmadı</span>
            @endif
        @break

        @case('imagejson')
            @if (!empty($data->images) && count($data->images) > 0)
                <div class="row">
                    @foreach ($data->images as $key => $image)
                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <img class="img-fluid img-responsive img-circle img-small" style="height:50px"
                                src="{{ getImageUrl($image, 'images') }}"
                                alt="{{ $data->name[app()->getLocale() . '_name'] }}" />
                        </div>
                    @endforeach
                </div>
            @else
                <span class="text-center text-danger">Məlumat tapılmadı</span>
            @endif
        @break

        @case('namejson')
            @if (
                !empty($data->name) &&
                    isset($data->name[app()->getLocale() . '_name']) &&
                    !empty($data->name[app()->getLocale() . '_name']))
                {{ $data->name[app()->getLocale() . '_name'] }}
            @else
                <span class="text-center text-danger">Məlumat tapılmadı</span>
            @endif
        @break

        @case('descriptionjson')
            @if (
                !empty($data->description) &&
                    isset($data->description[app()->getLocale() . '_description']) &&
                    !empty($data->description[app()->getLocale() . '_description']))
                {{ $data->description[app()->getLocale() . '_description'] }}
            @else
                <span class="text-center text-danger">Məlumat tapılmadı</span>
            @endif
        @break

        @case('addressjson')
            @if (
                !empty($data->address) &&
                    isset($data->address[app()->getLocale() . '_address']) &&
                    !empty($data->address[app()->getLocale() . '_address']))
                {{ $data->address[app()->getLocale() . '_address'] }}
            @else
                <span class="text-center text-danger">Məlumat tapılmadı</span>
            @endif
        @break

        @case('status')
            <span class="text-white @if ($data->status == 1) bg-success @else bg-danger @endif w-100 h-100 d-block">
                {{ $data->status == 1 ? 'Aktiv' : 'Passiv' }}</span>
        @break

        @case('user_id')
            <span class="text-black">
                @php($user = users($data->user_id))
                @if (!empty($user) && isset($user->id))
                    {{ $user->name }}
                @else
                    <span class="text-center text-danger">Məlumat tapılmadı</span>
                @endif
            </span>
        @break

        @case('domain')
            @if (isset($data->domain) && !empty($data->domain))
                {{ $data->domain }}
            @else
                <span class="text-center text-danger">Məlumat tapılmadı</span>
            @endif
        @break

        @case('setting')
            @php($setting=settings($data->setting_id,'id'))
            @if (!empty($setting) && isset($setting->id) && !empty($setting->id))
                {{ $setting->name[app()->getLocale().'_name'] }}
            @else
                <span class="text-center text-danger">Məlumat tapılmadı</span>
            @endif
        @break

    @endswitch
</td>
