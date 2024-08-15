@extends('frontend.layouts.app')
@section('title', $title)
@section('bodyclass',
    'houzez_agent-template-default single single-houzez_agent postid-156 houzez-theme
    houzez-footer-position transparent- houzez-header- elementor-default elementor-kit-16177')
@section('content')
    @switch($routename)
        @case('teams')
        @case('services')
            <section class="content-wrap" style="transform: none;">
                <div class="container" style="transform: none;">

                    <div class="agent-profile-wrap">
                        <div class="row">
                            @if (isset($data->image) && !empty($data->image))
                                <div class="col-lg-4 col-md-4 col-sm-12 mb-2">
                                    <div class="agent-image">
                                        <div class="agent-company-logo">
                                            <img class="img-fluid" src="{{ getImageUrl($setting->logos['logo'], 'images') }}"
                                                alt="{{ $setting->name[app()->getLocale() . '_name'] }}" />
                                        </div>

                                        <img fetchpriority="high" width="700" height="700"
                                            src="{{ getImageUrl($data->image, 'images') }}"
                                            data-src="{{ getImageUrl($data->image, 'images') }}" class="img-fluid wp-post-image"
                                            alt="{{ $data->name[app()->getLocale() . '_name'] }}" decoding="async"
                                            srcset="{{ getImageUrl($data->image, 'images') }} 700w, {{ getImageUrl($data->image, 'images') }} 300w, {{ getImageUrl($data->image, 'images') }} 150w, {{ getImageUrl($data->image, 'images') }} 600w, {{ getImageUrl($data->image, 'images') }} 496w"
                                            data-srcset="{{ getImageUrl($data->image, 'images') }} 700w, {{ getImageUrl($data->image, 'images') }} 300w, {{ getImageUrl($data->image, 'images') }} 150w, {{ getImageUrl($data->image, 'images') }} 600w, {{ getImageUrl($data->image, 'images') }} 496w"
                                            sizes="(max-width: 700px) 100vw, 700px" />
                                    </div>
                                </div>
                            @endif

                            @if (isset($data->images) && !empty($data->images) && count($data->images) > 0)
                                <div class="col-lg-12 col-md-12 col-sm-12 mb-2">
                                    <div class="listing-image-wrap row">
                                        @foreach ($data->images as $image)
                                            <div class="listing-thumb col-4">
                                                <a target="_self" href="javascript:void(0)"
                                                    class="listing-featured-thumb hover-effect">
                                                    <img fetchpriority="high" decoding="async" width="592" height="444"
                                                        src="{{ getImageUrl($image, 'images') }}"
                                                        data-src="{{ getImageUrl($image, 'images') }}"
                                                        class="houzez-lazyload img-fluid wp-post-image"
                                                        alt="{{ $data->name[app()->getLocale() . '_name'] }}" srcset
                                                        data-srcset="{{ getImageUrl($image, 'images') }} 592w, {{ getImageUrl($image, 'images') }} 300w, {{ getImageUrl($image, 'images') }} 1024w, {{ getImageUrl($image, 'images') }}, {{ getImageUrl($image, 'images') }} 584w, {{ getImageUrl($image, 'images') }} 800w, {{ getImageUrl($image, 'images') }} 120w, {{ getImageUrl($image, 'images') }} 496w, {{ getImageUrl($image, 'images') }} 1170w"
                                                        sizes="(max-width: 592px) 100vw, 592px" />
                                                </a>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif

                            <div
                                @if (isset($data->image) && !empty($data->image)) class="col-lg-8 col-md-8 col-sm-12" @else class="col-lg-12 col-md-12 col-sm-12" @endif>
                                <div class="agent-profile-top-wrap">
                                    <div class="agent-profile-header">
                                        <h1>{{ $data->name[app()->getLocale() . '_name'] }}</h1>
                                    </div>
                                </div>

                                <div class="agent-profile-buttons">
                                    @if (!empty($data->social_media) && isset($data->social_media['email']) && !empty($data->social_media['email']))
                                        <a type="button" class="btn btn-secondary"
                                            href="mailto:{{ $data->social_media['email'] }}">
                                            @lang('additional.fields.sendemail')
                                        </a>
                                    @endif
                                    @if (!empty($data->social_media) && isset($data->social_media['phone']) && !empty($data->social_media['phone']))
                                        <a href="tel:{{ $data->social_media['phone'] }}" class="btn btn-call">
                                            <span class="hide-on-click">@lang('additional.fields.call')</span>
                                            <span class="show-on-click">{{ $data->social_media['phone'] }}</span>
                                        </a>
                                    @endif
                                </div>


                            </div>
                        </div>
                    </div>
                    <div class="row" style="transform: none;">
                        <div class="col-lg-6 col-md-12 bt-content-wrap">
                            <div class="agent-bio-wrap">
                                <h2>@lang('additional.fields.about')</h2>
                                <p>{!! $data->description[app()->getLocale() . '_description'] !!}</p>
                            </div>

                        </div>
                        <div class="col-lg-6 col-md-12 bt-sidebar-wrap houzez_sticky"
                            style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1px;">

                            <div class="theiaStickySidebar"
                                style="padding-top: 0px; padding-bottom: 1px; position: static; transform: none; top: 0px; left: 1052.55px;">
                                <aside class="sidebar-wrap">
                                    <div class="agent-contacts-wrap">
                                        <h3 class="widget-title">@lang('additional.fields.contact')</h3>
                                        <div class="agent-map">
                                            <address>
                                            </address>
                                        </div>
                                        <ul class="list-unstyled">
                                            <li>
                                                <strong>@lang('additional.fields.address'):</strong>
                                                <a href="tel:3214569865">
                                                    <span
                                                        class="agent-phone ">{{ $setting->address[app()->getLocale() . '_address'] }}</span>
                                                </a>
                                            </li>
                                            @if (!empty($data->social_media) && isset($data->social_media['phone']) && !empty($data->social_media['phone']))
                                                <li>
                                                    <strong>@lang('additional.fields.phone'):</strong>
                                                    <a href="tel:{{ $data->social_media['phone'] }}">
                                                        <span class="agent-phone ">{{ $data->social_media['phone'] }}</span>
                                                    </a>
                                                </li>
                                            @endif
                                            @if (!empty($data->social_media) && isset($data->social_media['phone']) && !empty($data->social_media['phone']))
                                                <li>
                                                    <strong>@lang('additional.fields.email'):</strong>
                                                    <a href="mailto:{{ $data->social_media['email'] }}">
                                                        <span class="agent-phone ">{{ $data->social_media['email'] }}</span>
                                                    </a>
                                                </li>
                                            @endif
                                            <li>
                                                <strong>@lang('additional.fields.website'):</strong>
                                                <a target="_blank"
                                                    href="https://{{ $setting->domain }}">{{ $setting->domain }}</a>
                                            </li>
                                        </ul>
                                    </div>

                                </aside>
                            </div>
                        </div>
                    </div>

                </div>
            </section>
        @break

        @case('products')
            <section class="content-wrap property-wrap property-detail-v3 " style="transform: none;">
                <div class="page-title-wrap">
                    <div class="container">
                        <div class="d-flex align-items-center">
                            <div class="breadcrumb-wrap">
                                <nav>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item breadcrumb-item-home"><i class="houzez-icon icon-house"></i><a
                                                href="{{ route('frontend.index', ['page' => 'welcome', 'setting_id' => session()->get('setting_id')]) }}">@lang('additional.routename.welcome')</a>
                                        </li>
                                        <li class="breadcrumb-item"><a
                                                href="{{ route('frontend.index', ['page' => 'products']) }}">
                                                @lang('additional.routename.products_houses')</a></li>
                                        <li class="breadcrumb-item active">{{ $title }}</li>
                                    </ol>
                                </nav>
                            </div>
                            <ul class="item-tools">

                            </ul>
                        </div>
                        <div class="d-flex align-items-center property-title-price-wrap">
                            <div class="page-title">
                                <h1>{{ $data->name[app()->getLocale() . '_name'] }}</h1>
                            </div>
                            <ul class="item-price-wrap hide-on-list">
                                @if (
                                    !empty($data->prices) &&
                                        isset($data->prices['endirim_price']) &&
                                        !empty($data->prices['endirim_price']) &&
                                        $data->prices['endirim_price'] != 0)
                                    <li class="item-price">${{ $data->prices['endirim_price'] }}</li>
                                    <li class="item-sub-price">${{ $data->prices['price'] }}</li>
                                @else
                                    <li class="item-price">${{ $data->prices['price'] }}</li>
                                @endif

                            </ul>
                        </div>
                        @if (!empty($data->category) && isset($data->category->id) && !empty($data->category->name))
                            <div class="property-labels-wrap">
                                <a href="javascript:void(0)" class="label-status label status-color-7">
                                    {{ $data->category->name[app()->getLocale() . '_name'] }}
                                </a>
                            </div>
                        @endif
                        @if (
                            !empty($data->address) &&
                                isset($data->address[app()->getLocale() . '_address']) &&
                                !empty($data->address[app()->getLocale() . '_address']))
                            <address class="item-address"><i
                                    class="houzez-icon icon-pin mr-1"></i>{{ $data->address[app()->getLocale() . '_address'] }}
                            </address>
                        @endif
                    </div>
                </div>
                <div class="container" style="transform: none;">
                    <div class="row" style="transform: none;">
                        <div class="col-lg-12 col-md-12 bt-content-wrap">
                            <div class="property-top-wrap">
                                <div class="property-banner">

                                    <div class="top-gallery-section">
                                        <div class="lSSlideOuter">
                                            <div class="lSSlideWrapper usingCss">
                                                <div id="property-gallery-js"
                                                    class="houzez-photoswipe listing-slider lightSlider lsGrab lSSlide"
                                                    style="width: 6480px; height: 483.073px; padding-bottom: 0%; transform: translate3d(0px, 0px, 0px);">
                                                    @foreach ($data->images as $image)
                                                        <div data-thumb="{{ getImageUrl($image, 'images') }}"
                                                            class="lslide active" style="width: 720px; margin-right: 0px;"><a
                                                                rel="gallery-1" data-slider-no="1" href="#"
                                                                class="houzez-trigger-popup-slider-js swipebox"
                                                                data-toggle="modal" data-target="#property-lightbox">
                                                                <img class="img-fluid" src="{{ getImageUrl($image, 'images') }}"
                                                                    alt="" title="045">
                                                            </a></div>
                                                    @endforeach

                                                </div>
                                                <div class="lSAction"><a class="lSPrev"><button type="button"
                                                            class="slick-prev slick-arrow"></button></a><a class="lSNext"><button
                                                            type="button" class="slick-next slick-arrow"></button></a></div>
                                            </div>
                                            <ul class="lSPager lSGallery"
                                                style="margin-top: 5px; transition-duration: 500ms; width: 816.125px; transform: translate3d(0px, 0px, 0px);">
                                                @foreach ($data->images as $image)
                                                    <li style="width:100%;width:85.625px;margin-right:5px" class="active"><a
                                                            href="#"><img src="{{ getImageUrl($image, 'images') }}"></a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="property-view">
                                <div class="visible-on-mobile">
                                    <div class="mobile-top-wrap">
                                        <div class="mobile-property-title clearfix">
                                            @if (!empty($data->category) && isset($data->category->id) && !empty($data->category->name))
                                                <span class="labels-wrap labels-right">
                                                    <a href="javascript:void(0)" class="label-status label status-color-7">
                                                        {{ $data->category->name[app()->getLocale() . '_name'] }}
                                                    </a>
                                                </span>
                                            @endif
                                            <div class="page-title">
                                                <span
                                                    class="item-title property-title-mobile">{{ $data->name[app()->getLocale() . '_name'] }}</span>
                                            </div>
                                            @if (!empty($data->address))
                                                && isset($data->address[app()->getLocale().'_address']) &&
                                                !empty($data->address[app()->getLocale().'_address']))
                                                <address class="item-address"><i
                                                        class="houzez-icon icon-pin mr-1"></i>{{ $data->address[app()->getLocale() . '_address'] }}
                                                </address>
                                            @endif
                                            <ul class="item-price-wrap hide-on-list">
                                                @if (
                                                    !empty($data->prices) &&
                                                        isset($data->prices['endirim_price']) &&
                                                        !empty($data->prices['endirim_price']) &&
                                                        $data->prices['endirim_price'] != 0)
                                                    <li class="item-price">${{ $data->prices['endirim_price'] }}</li>
                                                    <li class="item-sub-price">${{ $data->prices['price'] }}</li>
                                                @else
                                                    <li class="item-price">${{ $data->prices['price'] }}</li>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="property-description-wrap property-section-wrap" id="property-description-wrap">
                                    <div class="block-wrap">
                                        <div class="block-title-wrap">
                                            <h2>@lang('additional.fields.about')</h2>
                                        </div>
                                        <div class="block-content-wrap">
                                            <p>{!! $data->description[app()->getLocale() . '_description'] !!}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="property-contact-agent-wrap property-section-wrap" id="property-contact-agent-wrap">
                                    <div class="block-wrap">
                                        <div class="block-title-wrap d-flex justify-content-between align-items-center">
                                            <h2>@lang('additional.fields.contact')</h2>
                                            <a class="btn btn-primary btn-slim"
                                                href="{{ route('frontend.index', ['page' => 'welcome', '#' => '64270702']) }}"
                                                target="_blank">@lang('additional.fields.readmore')</a>
                                        </div>
                                        <div class="block-content-wrap">
                                            <form method="post" action="#">
                                                <div class="agent-details">
                                                    <div class="d-flex align-items-center">
                                                        @if (!empty($setting) && !empty($setting->logos) && isset($setting->logos['logo']) && !empty($setting->logos['logo']))
                                                            <div class="agent-image"><a
                                                                    href="{{ route('frontend.index', ['page' => 'welcome', 'setting_id' => session()->get('setting_id')]) }}"><img
                                                                        class="rounded"
                                                                        src="{{ getImageUrl($setting->logos['logo'], 'images') }}"
                                                                        alt="{{ $setting->name[app()->getLocale() . '_name'] }}"
                                                                        width="80" height="80"></a>
                                                            </div>
                                                        @endif
                                                        <ul class="agent-information list-unstyled">
                                                            <li class="agent-name"><i
                                                                    class="houzez-icon icon-single-neutral mr-1"></i>
                                                                {{ $setting->name[app()->getLocale() . '_name'] }}</li>
                                                            <li class="agent-phone-wrap clearfix">
                                                                @if (!empty($setting->social_media) && isset($setting->social_media['phone']) && !empty($setting->social_media['phone']))
                                                                    <i class="houzez-icon icon-phone mr-1"></i><span
                                                                        class="agent-phone "><a
                                                                            href="tel:{{ $setting->social_media['phone'] }}">{{ $setting->social_media['phone'] }}</a></span>
                                                                @endif
                                                                @if (
                                                                    !empty($setting->social_media) &&
                                                                        isset($setting->social_media['whatsapp']) &&
                                                                        !empty($setting->social_media['whatsapp']))
                                                                    <i class="houzez-icon icon-messaging-whatsapp mr-1"></i><span><a
                                                                            target="_blank"
                                                                            href="https://api.whatsapp.com/send?phone={{ $setting->social_media['whatsapp'] }}&amp;text={{ url()->current() }}">WhatsApp</a></span>
                                                                @endif
                                                            </li>

                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="block-title-wrap">
                                                    <h3>@lang('additional.fields.contactus')</h3>
                                                </div>
                                                <div class="form_messages"></div>
                                                <div class="row">
                                                    <div class="col-md-6 col-sm-12">
                                                        <div class="form-group">
                                                            <label>@lang('additional.form.name')</label>
                                                            <input class="form-control" name="name"
                                                                placeholder="@lang('additional.form.name')" type="text">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-12">
                                                        <div class="form-group">
                                                            <label>@lang('additional.form.phone')</label>
                                                            <input class="form-control" name="phone"
                                                                placeholder="@lang('additional.form.phone')" type="text">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-12">
                                                        <div class="form-group">
                                                            <label>@lang('additional.form.email')</label>
                                                            <input class="form-control" name="email"
                                                                placeholder="@lang('additional.form.email')" type="email">
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-12 col-xs-12">
                                                        <div class="form-group form-group-textarea">
                                                            <label>@lang('additional.fields.description')</label>
                                                            <textarea class="form-control hz-form-message" name="message" rows="5" placeholder="@lang('additional.fields.description')"></textarea>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-12 col-xs-12">
                                                        <input type="hidden" name="target_email" value="brittany@houzez.com">
                                                        <input type="hidden" name="property_agent_contact_security"
                                                            value="6816767bac">
                                                        <input type="hidden" name="property_permalink" value="index.html">
                                                        <input type="hidden" name="property_title" value="Modern Apartment">
                                                        <input type="hidden" name="property_id" value="HZ27">
                                                        <input type="hidden" name="action"
                                                            value="houzez_property_agent_contact">
                                                        <input type="hidden" class="is_bottom" value="bottom">
                                                        <input type="hidden" name="listing_id" value="16890">
                                                        <input type="hidden" name="is_listing_form" value="yes">
                                                        <input type="hidden" name="agent_id" value="156">
                                                        <input type="hidden" name="agent_type" value="agent_info">
                                                        <button
                                                            class="houzez_agent_property_form btn btn-secondary btn-sm-full-width">
                                                            <span class="btn-loader houzez-loader-js"></span> @lang('additional.fields.send')
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </section>
        @break

        @case('blogs')
            <section class="blog-wrap" style="transform: none;">
                <div class="container" style="transform: none;">
                    <div class="page-title-wrap">
                        <div class="breadcrumb-wrap">
                            <nav>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item breadcrumb-item-home"><i class="houzez-icon icon-house"></i><a
                                            href="{{ route('frontend.index', ['page' => 'welcome']) }}">@lang('additional.routename.welcome')</a>
                                    </li>
                                    <li class="breadcrumb-item active">{{ $title }}</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="row" style="transform: none;">
                        <div class="col-lg-12 col-md-12 bt-content-wrap">
                            <div class="article-wrap single-article-wrap w-100">
                                <article class="post-wrap">
                                    <div class="post-header-wrap">
                                        <div class="post-title-wrap">
                                            <h1>{{ $data->name[app()->getLocale() . '_name'] }}</h1>
                                        </div>
                                        <ul class="list-unstyled list-inline author-meta flex-grow-1">

                                            <li class="list-inline-item">
                                                <i class="houzez-icon icon-calendar-3 mr-1"></i>
                                                {{ $data->created_at->format('d.m.Y') }}
                                            </li>
                                            @if (!empty($data->category) && isset($data->category->id) && !empty($data->category->id))
                                                <li class="list-inline-item">
                                                    <i class="houzez-icon icon-tags mr-1"></i> <a href="javascript:void(0)"
                                                        rel="category tag">{{ $data->category->name[app()->getLocale() . '_name'] }}</a>
                                                </li>
                                            @endif
                                        </ul>
                                    </div>
                                    @if (!empty($data->images) && isset($data->images[0]) && !empty($data->images[0]))
                                        <div class="post-thumbnail-wrap">
                                            <img fetchpriority="high" width="1170" height="877"
                                                src="{{ getImageUrl($data->images[0], 'images') }}"
                                                data-src="{{ getImageUrl($data->images[0], 'images') }}"
                                                class="img-fluid wp-post-image" alt="" decoding="async"
                                                srcset="{{ getImageUrl($data->images[0], 'images') }} 1170w, {{ getImageUrl($data->images[0], 'images') }} 300w, {{ getImageUrl($data->images[0], 'images') }} 1024w, {{ getImageUrl($data->images[0], 'images') }} 768w, {{ getImageUrl($data->images[0], 'images') }} 592w, {{ getImageUrl($data->images[0], 'images') }} 584w, {{ getImageUrl($data->images[0], 'images') }} 800w, {{ getImageUrl($data->images[0], 'images') }} 120w, {{ getImageUrl($data->images[0], 'images') }} 496w"
                                                data-srcset="{{ getImageUrl($data->images[0], 'images') }} 1170w, {{ getImageUrl($data->images[0], 'images') }} 300w, {{ getImageUrl($data->images[0], 'images') }} 1024w, {{ getImageUrl($data->images[0], 'images') }} 768w, {{ getImageUrl($data->images[0], 'images') }} 592w, {{ getImageUrl($data->images[0], 'images') }} 584w, {{ getImageUrl($data->images[0], 'images') }} 800w, {{ getImageUrl($data->images[0], 'images') }} 120w, {{ getImageUrl($data->images[0], 'images') }} 496w"
                                                sizes="(max-width: 1170px) 100vw, 1170px">
                                        </div>
                                    @endif
                                    <div class="post-content-wrap">
                                        <p>{!! $data->description[app()->getLocale() . '_description'] !!}</p>
                                    </div>

                                </article>
                            </div>
                        </div>

                    </div>
                </div>
            </section>
        @break

        @case('standartpages')
            <section class="content-wrap" style="transform: none;">
                <div data-elementor-type="wp-page" data-elementor-id="16277" class="elementor elementor-16277">
                    <section
                        class="elementor-section elementor-top-section elementor-element elementor-element-45115ca0 elementor-section-height-min-height animated-slow elementor-section-boxed elementor-section-height-default elementor-section-items-middle animated fadeIn"
                        data-id="45115ca0" data-element_type="section"
                        data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;animation&quot;:&quot;fadeIn&quot;}">
                        <div class="elementor-background-overlay"></div>
                        <div class="elementor-container elementor-column-gap-default">
                            <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-1526ac2f"
                                data-id="1526ac2f" data-element_type="column">
                                <div class="elementor-widget-wrap elementor-element-populated">
                                    <div class="elementor-element elementor-element-537676f elementor-widget elementor-widget-heading"
                                        data-id="537676f" data-element_type="widget" data-widget_type="heading.default">
                                        <div class="elementor-widget-container">
                                            <h1 class="elementor-heading-title elementor-size-default">
                                                {{ $data->name[app()->getLocale() . '_name'] }}</h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section
                        class="elementor-section elementor-top-section elementor-element elementor-element-6c661608 elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                        data-id="6c661608" data-element_type="section"
                        data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                        <div class="elementor-container elementor-column-gap-default">
                            <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-2331cb98"
                                data-id="2331cb98" data-element_type="column">
                                <div class="elementor-widget-wrap elementor-element-populated">
                                    <div class="elementor-element elementor-element-308600b9 elementor-widget elementor-widget-spacer"
                                        data-id="308600b9" data-element_type="widget" data-widget_type="spacer.default">
                                        <div class="elementor-widget-container">
                                            <div class="elementor-spacer">
                                                <div class="elementor-spacer-inner"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="elementor-element elementor-element-64f26879 elementor-widget elementor-widget-text-editor"
                                        data-id="64f26879" data-element_type="widget" data-widget_type="text-editor.default">
                                        <div class="elementor-widget-container">
                                            <p>{!! $data->description[app()->getLocale() . '_description'] !!}</p>
                                        </div>
                                    </div>
                                    <div class="elementor-element elementor-element-5f34c0dd elementor-widget elementor-widget-spacer"
                                        data-id="5f34c0dd" data-element_type="widget" data-widget_type="spacer.default">
                                        <div class="elementor-widget-container">
                                            <div class="elementor-spacer">
                                                <div class="elementor-spacer-inner"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                </div>
            </section>
        @break

    @endswitch
    <section class="content-wrap" style="transform: none;">
        <div class="container" style="transform: none;">
            @switch($routename)
                @case('services')
                @case('products')
                    <div class="col-lg-8 col-md-12 bt-content-wrap">
                        <div class="property-view">
                            @if (
                                !empty(products(session()->get('setting_id'), 'setting_id')) &&
                                    count(products(session()->get('setting_id'), 'setting_id')) > 0)
                                <div id="similar-listings-wrap" class="similar-property-wrap listing-v6">
                                    <div class="block-title-wrap">
                                        <h2>@lang('additional.fields.houses_in_stock')</h2>
                                    </div>
                                    <div class="listing-view grid-view card-deck">
                                        @foreach (products(session()->get('setting_id'), 'setting_id') as $product)
                                            <div class="item-listing-wrap hz-item-gallery-js item-listing-wrap-v6 card houzez-gallery-loaded"
                                                data-hz-id="hz-16890"
                                                data-images="[
                                            @foreach ($product->images as $image)
                                                {&quot;image&quot;:&quot;{{ getImageUrl($image, 'images') }}&quot;,&quot;alt&quot;:&quot;&quot;,&quot;width&quot;:584,&quot;height&quot;:438}, @endforeach
                                            ]">
                                                <div class="item-wrap item-wrap-v6 h-100">
                                                    <div class="d-flex align-items-center h-100">
                                                        <div class="item-header">
                                                            @if (!empty($product->category) && isset($product->category->id) && !empty($product->category->id))
                                                                <div class="labels-wrap labels-right">
                                                                    <a href="javascript:void(0)"
                                                                        class="label-status label status-color-7">
                                                                        {{ $product->category->name[app()->getLocale() . '_name'] }}
                                                                    </a>
                                                                </div>
                                                            @endif
                                                            <div class="listing-image-wrap">
                                                                <div class="listing-thumb">
                                                                    <a class="listing-featured-thumb" target="_self"
                                                                        href="{{ route('frontend.show', ['slug' => $product->slugs[app()->getLocale() . '_slug'], 'page' => 'products']) }}">
                                                                        <img fetchpriority="high" decoding="async" width="592"
                                                                            height="444"
                                                                            src="{{ getImageUrl($product->images[0], 'images') }}"
                                                                            data-src="{{ getImageUrl($product->images[0], 'images') }}"
                                                                            class="houzez-lazyload img-fluid wp-post-image"
                                                                            alt="{{ $product->name[app()->getLocale() . '_name'] }}"
                                                                            srcset
                                                                            data-srcset="{{ getImageUrl($product->images[0], 'images') }} 592w, {{ getImageUrl($product->images[0], 'images') }} 300w, {{ getImageUrl($product->images[0], 'images') }} 1024w, {{ getImageUrl($product->images[0], 'images') }}, {{ getImageUrl($product->images[0], 'images') }} 584w, {{ getImageUrl($product->images[0], 'images') }} 800w, {{ getImageUrl($product->images[0], 'images') }} 120w, {{ getImageUrl($product->images[0], 'images') }} 496w, {{ getImageUrl($product->images[0], 'images') }} 1170w"
                                                                            sizes="(max-width: 592px) 100vw, 592px" />

                                                                </div>
                                                            </div>

                                                            <div class="preview_loader"></div>
                                                        </div>
                                                        <div class="item-body flex-grow-1">
                                                            <h2 class="item-title">
                                                                <a target="_self"
                                                                    href="{{ route('frontend.show', ['slug' => $product->slugs[app()->getLocale() . '_slug'], 'page' => 'products']) }}">{{ $product->name[app()->getLocale() . '_name'] }}</a>
                                                            </h2>
                                                            <div
                                                                class="d-flex justify-content-between align-items-center amenities-price-wrap">
                                                                <ul class="item-price-wrap">
                                                                    <li class="item-price"> ${{ $product->prices['price'] }}
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                @break

                @case('blogs')
                    <div class="col-lg-8 col-md-12 bt-content-wrap">
                        <div class="article-wrap single-article-wrap">
                            @if (
                                !empty(blogs(session()->get('setting_id'), 'setting_id')) &&
                                    count(blogs(session()->get('setting_id'), 'setting_id')) > 0)
                                <div class="related-posts-wrap">
                                    <h2>@lang('additional.routename.blogs')</h2>
                                    <div class="row">
                                        @foreach (blogs(session()->get('setting_id'), 'setting_id') as $blog)
                                            <div class="col-md-4">
                                                <div id="post-629"
                                                    class="blog-post-item blog-post-item-v1 post-629 post type-post status-publish format-standard has-post-thumbnail hentry category-business tag-apartment tag-business-development tag-house-for-families tag-houzez tag-luxury tag-real-estate">
                                                    @if (!empty($blog->images) && isset($blog->images[0]) && !empty($blog->images[0]))
                                                        <div class="blog-post-thumb">
                                                            <a href="{{ route('frontend.show', ['slug' => $blog->slugs[app()->getLocale() . '_slug'], 'page' => 'blogs']) }}"
                                                                class="hover-effect">
                                                                <img width="592" height="444"
                                                                    src="{{ getImageUrl($blog->images[0], 'images') }}"
                                                                    data-src="{{ getImageUrl($blog->images[0], 'images') }}"
                                                                    class="img-fluid wp-post-image" alt=""
                                                                    decoding="async"
                                                                    srcset="{{ getImageUrl($blog->images[0], 'images') }} 592w, {{ getImageUrl($blog->images[0], 'images') }} 300w, {{ getImageUrl($blog->images[0], 'images') }} 1024w, {{ getImageUrl($blog->images[0], 'images') }} 768w, {{ getImageUrl($blog->images[0], 'images') }} 584w, {{ getImageUrl($blog->images[0], 'images') }} 800w, {{ getImageUrl($blog->images[0], 'images') }} 120w, {{ getImageUrl($blog->images[0], 'images') }} 496w, {{ getImageUrl($blog->images[0], 'images') }} 1170w"
                                                                    data-srcset="{{ getImageUrl($blog->images[0], 'images') }} 592w, {{ getImageUrl($blog->images[0], 'images') }} 300w, {{ getImageUrl($blog->images[0], 'images') }} 1024w, {{ getImageUrl($blog->images[0], 'images') }} 768w, {{ getImageUrl($blog->images[0], 'images') }} 584w, {{ getImageUrl($blog->images[0], 'images') }} 800w, {{ getImageUrl($blog->images[0], 'images') }} 120w, {{ getImageUrl($blog->images[0], 'images') }} 496w, {{ getImageUrl($blog->images[0], 'images') }} 1170w"
                                                                    sizes="(max-width: 592px) 100vw, 592px"> </a>
                                                        </div>
                                                    @endif
                                                    <div class="blog-post-content-wrap">
                                                        <div class="blog-post-meta">
                                                            <ul class="list-inline">
                                                                <li class="list-inline-item">
                                                                    <time datetime="{{ $blog->created_at->format('d.m.Y') }}"><i
                                                                            class="houzez-icon icon-calendar-3 mr-1"></i>
                                                                        {{ $blog->created_at->format('d.m.Y') }}</time>
                                                                </li>
                                                                @if (!empty($blog->category) && isset($blog->category->id) && !empty($blog->category->id))
                                                                    <li class="list-inline-item">
                                                                        <i class="houzez-icon icon-tags mr-1"></i> <a
                                                                            href="javascript:void(0)"
                                                                            rel="category tag">{{ $blog->category->name[app()->getLocale() . '_name'] }}</a>
                                                                    </li>
                                                                @endif
                                                            </ul>
                                                        </div>
                                                        <div class="blog-post-title">
                                                            <h3><a
                                                                    href="{{ route('frontend.show', ['slug' => $blog->slugs[app()->getLocale() . '_slug'], 'page' => 'blogs']) }}">10
                                                                    {{ $blog->name[app()->getLocale() . '_name'] }}</a></h3>
                                                        </div>
                                                        <div class="blog-post-body">
                                                            {{ mb_substr(strip_tags_with_whitespace($blog->description[app()->getLocale() . '_description']), 0, 50) }}...
                                                        </div>
                                                        <div class="blog-post-link">
                                                            <a
                                                                href="{{ route('frontend.show', ['slug' => $blog->slugs[app()->getLocale() . '_slug'], 'page' => 'blogs']) }}">@lang('additional.fields.readmore')</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                @break

            @endswitch
        </div>
    </section>

    </div>
    </section>

@endsection
