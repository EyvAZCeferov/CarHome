@if ($setting->domain == 'realestate.globalmart.az')
    <div class="nav-mobile nav-mobile-js">
        <div class="main-nav navbar slideout-menu slideout-menu-left" id="nav-mobile">
            <ul id="mobile-main-nav" class="navbar-nav mobile-navbar-nav">

                <li class="nav-item menu-item menu-item-type-custom menu-item-object-custom">
                    <a class="nav-link "
                        href="{{ route('frontend.index', ['page' => 'welcome', 'setting_id' => session()->get('setting_id')]) }}">@lang('additional.routename.welcome')</a>
                </li>

                <li
                    class="nav-item houzez-megamenu menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children dropdown">
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
    </div>

    <header class="header-main-wrap header-transparent-wrap">
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
                                    class="menu-item menu-item-type-custom menu-item-object-custom nav-item menu-item-955 menu-item-design-default">
                                    <a class="nav-link"
                                        href="{{ route('frontend.index', ['page' => 'welcome', 'setting_id' => session()->get('setting_id')]) }}">@lang('additional.routename.welcome')</a>
                                </li>

                                <li
                                    class="nav-item houzez-megamenu menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children dropdown">
                                    <a class="nav-link "
                                        href="javascript:void(0)">{{ strtoupper(app()->getLocale()) }}</a> <span
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
                        </nav>
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

            @if (!empty($setting) && !empty($setting->logos) && isset($setting->logos['logo']) && !empty($setting->logos['logo']))
                <div class="header-mobile-center flex-grow-1">
                    <div class="logo logo-mobile">
                        <a
                            href="{{ route('frontend.index', ['page' => 'welcome', 'setting_id' => session()->get('setting_id')]) }}">
                            <img src="{{ getImageUrl($setting->logos['logo'], 'images') }}"
                                alt="{{ $setting->name[app()->getLocale() . '_name'] }}">
                        </a>
                    </div>
                </div>
            @endif

        </div>
    </header>
@endif
