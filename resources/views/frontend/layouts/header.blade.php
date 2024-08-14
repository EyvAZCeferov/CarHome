@if ($setting->domain == 'realestate.globalmart.az')

    <div class="nav-mobile nav-mobile-js">
        <div class="main-nav navbar slideout-menu slideout-menu-left" id="nav-mobile">
            <ul id="mobile-main-nav" class="navbar-nav mobile-navbar-nav">
                <li class="nav-item menu-item menu-item-type-custom menu-item-object-custom ">
                    <a class="nav-link "
                        href="{{ route('frontend.index', ['page' => 'welcome', 'setting_id' => session()->get('setting_id')]) }}">@lang('additional.routename.welcome')</a>
                </li>

                <li class="nav-item menu-item menu-item-type-custom menu-item-object-custom ">
                    <a class="nav-link"
                        href="{{ route('frontend.index', ['page' => 'products', 'setting_id' => session()->get('setting_id')]) }}">@lang('additional.routename.products_houses')</a>
                </li>
                <li class="nav-item menu-item menu-item-type-custom menu-item-object-custom ">
                    <a class="nav-link"
                        href="{{ route('frontend.index', ['page' => 'blogs', 'setting_id' => session()->get('setting_id')]) }}">@lang('additional.routename.blogs')</a>
                </li>
                <li class="nav-item menu-item menu-item-type-custom menu-item-object-custom ">
                    <a class="nav-link"
                        href="{{ route('frontend.index', ['page' => 'services', 'setting_id' => session()->get('setting_id')]) }}">@lang('additional.routename.services')</a>
                </li>
                <li
                    class="nav-item menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children dropdown">
                    <a class="nav-link " href="javascript:void(0)">{{ strtoupper(app()->getLocale()) }}</a> <span
                        class="nav-mobile-trigger dropdown-toggle" data-toggle="dropdown">
                        <i class="houzez-icon arrow-down-1"></i>
                    </span>
                    <ul class="dropdown-menu">
                        @foreach ($setting->langs as $lang)
                            @if ($lang != app()->getLocale())
                                <li
                                    class="nav-item new-feature menu-item menu-item-type-post_type menu-item-object-page ">
                                    <a class="dropdown-item "
                                        href="{{ LaravelLocalization::getLocalizedURL($lang, null, [], true) }}">{{ strtoupper($lang) }}</a>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </li>
            </ul>
        </div>
        <nav class="navi-login-register slideout-menu slideout-menu-right" id="navi-user">

        </nav>
    </div>
    <main id="main-wrap" class="main-wrap main-wrap-js">
        <header class="header-main-wrap @yield('headerclass')">
            <div id="header-section" class="header-desktop header-v4" data-sticky="0">
                <div class="container">
                    <div class="header-inner-wrap">
                        <div class="navbar d-flex align-items-center">
                            @if (!empty($setting) && !empty($setting->logos) && isset($setting->logos['logo']) && !empty($setting->logos['logo']))
                                <div class="logo logo-splash">
                                    <a
                                        href="{{ route('frontend.index', ['page' => 'welcome', 'setting_id' => session()->get('setting_id')]) }}">
                                        <img src="{{ getImageUrl($setting->logos['logo'], 'images') }}" height="24px"
                                            width="127px" alt="{{ $setting->name[app()->getLocale() . '_name'] }}">
                                    </a>
                                </div>
                            @endif
                            <nav class="main-nav on-hover-menu navbar-expand-lg flex-grow-1">
                                <ul id="main-nav" class="navbar-nav justify-content-end">
                                    <li id="menu-item-955"
                                        class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children nav-item menu-item-955 menu-item-design-default">
                                        <a class="nav-link"
                                            href="{{ route('frontend.index', ['page' => 'welcome', 'setting_id' => session()->get('setting_id')]) }}">@lang('additional.routename.welcome')</a>
                                    </li>
                                    <li id="menu-item-955"
                                        class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children nav-item menu-item-955 menu-item-design-default">
                                        <a class="nav-link"
                                            href="{{ route('frontend.index', ['page' => 'products', 'setting_id' => session()->get('setting_id')]) }}">@lang('additional.routename.products_houses')</a>
                                    </li>
                                    <li id="menu-item-955"
                                        class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children nav-item menu-item-955 menu-item-design-default">
                                        <a class="nav-link"
                                            href="{{ route('frontend.index', ['page' => 'blogs', 'setting_id' => session()->get('setting_id')]) }}">@lang('additional.routename.blogs')</a>
                                    </li>
                                    <li id="menu-item-955"
                                        class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children nav-item menu-item-955 menu-item-design-default">
                                        <a class="nav-link"
                                            href="{{ route('frontend.index', ['page' => 'services', 'setting_id' => session()->get('setting_id')]) }}">@lang('additional.routename.services')</a>
                                    </li>
                                    <li id="menu-item-352"
                                        class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children nav-item menu-item-352 menu-item-design-default dropdown">
                                        <a class="nav-link dropdown-toggle"
                                            href="javascript:void(0)">{{ strtoupper(app()->getLocale()) }}</a>
                                        <ul class="dropdown-menu">
                                            @foreach ($setting->langs as $lang)
                                                @if ($lang != app()->getLocale())
                                                    <li id="menu-item-16213"
                                                        class="menu-item menu-item-type-post_type menu-item-object-page nav-item menu-item-16213">
                                                        <a class="dropdown-item "
                                                            href="{{ LaravelLocalization::getLocalizedURL($lang, null, [], true) }}">{{ strtoupper($lang) }}</a>
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </li>
                                </ul>
                            </nav>
                            <div class="login-register on-hover-menu">
                                <ul class="login-register-nav dropdown d-flex align-items-center">

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="header-mobile" class="header-mobile d-flex align-items-center" data-sticky>
                <div class="header-mobile-left">
                    <button class="btn toggle-button-left">
                        <i class="houzez-icon icon-navigation-menu"></i>
                    </button>
                </div>
                <div class="header-mobile-center flex-grow-1">
                    @if (!empty($setting) && !empty($setting->logos) && isset($setting->logos['logo']) && !empty($setting->logos['logo']))
                        <div class="logo logo-mobile">
                            <a
                                href="{{ route('frontend.index', ['page' => 'welcome', 'setting_id' => session()->get('setting_id')]) }}">
                                <img src="{{ getImageUrl($setting->logos['logo'], 'images') }}" height="24"
                                    width="127" alt="{{ $setting->name[app()->getLocale() . '_name'] }}">
                            </a>
                        </div>
                    @endif
                </div>
                <div class="header-mobile-right">

                </div>
            </div>
        </header>
@endif
