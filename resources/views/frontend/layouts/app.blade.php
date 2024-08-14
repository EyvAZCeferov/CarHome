<!Doctype html>
@php($setting = settings(session()->get('setting_id'), 'id'))
<html lang="{{ app()->getLocale() }}-{{ strtoupper(app()->getLocale()) }}">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="profile" href="https://gmpg.org/xfn/11" />
    <meta name="format-detection" content="telephone=no">
    <title>@yield('title') | {{ $setting->name[app()->getLocale().'_name'] }}</title>
    <meta name="robots" content="max-image-preview:large" />
    <link rel="dns-prefetch" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="canonical" href="{{ url()->current() }}" />
    <link rel="shortlink" href="{{ url()->current() }}" />
    <meta name="generator" content="Globalmart Group" />
    <meta name="author" content="Globalmart Group" />
    @include('frontend.layouts.headerscripts', ['setting' => $setting])
    @stack('css')
</head>

<body
    @if ($setting->domain == 'realestate.globalmart.az') class="@yield('bodyclass','home page-template page-template-template page-template-template-homepage page-template-templatetemplate-homepage-php page page-id-16519 houzez-theme houzez-footer-position transparent-yes houzez-header-elementor elementor-default elementor-kit-16177 elementor-page elementor-page-16519')" @endif>

    @include('frontend.layouts.header', ['setting' => $setting])

        @yield('content')
    </main>

    @include('frontend.layouts.footer', ['setting' => $setting])
    @include('frontend.layouts.footerscripts', ['setting' => $setting])

    @stack('js')
</body>

</html>
