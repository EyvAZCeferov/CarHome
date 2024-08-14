@extends('frontend.layouts.app')
@section('title', $title)
@section('content')
        <section class="content-wrap" style="transform: none;">
            <div class="container" style="transform: none;">
                @if (
                    !empty(products(session()->get('setting_id'), 'setting_id')) &&
                        count(products(session()->get('setting_id'), 'setting_id')) > 0)
                    <section
                        class="elementor-section elementor-top-section elementor-element elementor-element-8f2527d elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                        data-id="8f2527d" data-element_type="section">
                        <div class="elementor-container elementor-column-gap-default">
                            <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-53e5086"
                                data-id="53e5086" data-element_type="column">
                                <div class="elementor-widget-wrap elementor-element-populated">
                                    <div class="elementor-element elementor-element-84e9c53 elementor-widget elementor-widget-houzez_elementor_property-card-v1"
                                        data-id="84e9c53" data-element_type="widget"
                                        data-widget_type="houzez_elementor_property-card-v1.default">
                                        <div class="elementor-widget-container">
                                            <div id="properties_module_section"
                                                class="property-cards-module property-cards-module-v1 property-cards-module-2-cols">
                                                <div id="module_properties" class="listing-view grid-view card-deck ">
                                                    @foreach ($data as $dat)
                                                        <div class="item-listing-wrap hz-item-gallery-js card houzez-gallery-loaded"
                                                            data-hz-id="hz-16890"
                                                            data-images="[
                                                    @foreach ($dat->images as $image) {&quot;image&quot;:&quot;{{ getImageUrl($image, 'images') }}&quot;,&quot;alt&quot;:&quot;&quot;,&quot;width&quot;:592,&quot;height&quot;:444}, @endforeach    
                                                    
                                                        ]">
                                                            <div class="item-wrap item-wrap-v1 item-wrap-no-frame h-100">
                                                                <div class="d-flex align-items-center h-100">
                                                                    <div class="item-header">
                                                                        @if (!empty($dat->category) && isset($dat->category->id) && !empty($dat->category->id))
                                                                            <div class="labels-wrap labels-right">
                                                                                <a href="javascript:void(0)"
                                                                                    class="label-status label status-color-7">
                                                                                    {{ $dat->category->name[app()->getLocale() . '_name'] }}
                                                                                </a>
                                                                            </div>
                                                                        @endif
                                                                        <ul class="item-price-wrap hide-on-list">
                                                                            @if (
                                                                                !empty($dat->prices) &&
                                                                                    isset($dat->prices['endirim_price']) &&
                                                                                    !empty($dat->prices['endirim_price']) &&
                                                                                    $dat->prices['endirim_price'] != 0)
                                                                                <li class="item-price">
                                                                                    ${{ $dat->prices['endirim_price'] }}
                                                                                </li>
                                                                                <li class="item-sub-price">
                                                                                    ${{ $dat->prices['price'] }}</li>
                                                                            @else
                                                                                <li class="item-price">
                                                                                    ${{ $dat->prices['price'] }}</li>
                                                                            @endif
                                                                        </ul>

                                                                        <div class="listing-image-wrap mb-4">
                                                                            <div class="listing-thumb">
                                                                                <a target="_self"
                                                                                    href="{{ route('frontend.show', ['page' => 'products', 'slug' => $dat->slugs[app()->getLocale() . '_slug']]) }}"
                                                                                    class="listing-featured-thumb hover-effect">
                                                                                    <img fetchpriority="high"
                                                                                        decoding="async" width="592"
                                                                                        height="444"
                                                                                        src="{{ getImageUrl($dat->images[0], 'images') }}"
                                                                                        data-src="{{ getImageUrl($dat->images[0], 'images') }}"
                                                                                        class="houzez-lazyload img-fluid wp-post-image"
                                                                                        alt="{{ $dat->name[app()->getLocale() . '_name'] }}"
                                                                                        srcset
                                                                                        data-srcset="{{ getImageUrl($dat->images[0], 'images') }} 592w, {{ getImageUrl($dat->images[0], 'images') }} 300w, {{ getImageUrl($dat->images[0], 'images') }} 1024w, {{ getImageUrl($dat->images[0], 'images') }}, {{ getImageUrl($dat->images[0], 'images') }} 584w, {{ getImageUrl($dat->images[0], 'images') }} 800w, {{ getImageUrl($dat->images[0], 'images') }} 120w, {{ getImageUrl($dat->images[0], 'images') }} 496w, {{ getImageUrl($dat->images[0], 'images') }} 1170w"
                                                                                        sizes="(max-width: 592px) 100vw, 592px" />
                                                                                </a>

                                                                            </div>
                                                                        </div>
                                                                        <div class="preview_loader"></div>
                                                                    </div>
                                                                    <div class="item-body flex-grow-1">
                                                                        @if (!empty($dat->category) && isset($dat->category->id) && !empty($dat->category->id))
                                                                            <div class="labels-wrap labels-right">
                                                                                <a href="javascript:void(0)"
                                                                                    class="label-status label status-color-7">
                                                                                    {{ $dat->category->name[app()->getLocale() . '_name'] }}
                                                                                </a>
                                                                            </div>
                                                                        @endif
                                                                        <h2 class="item-title">
                                                                            <a target="_self"
                                                                                href="{{ route('frontend.show', ['page' => 'products', 'slug' => $dat->slugs[app()->getLocale() . '_slug']]) }}">{{ $dat->name[app()->getLocale() . '_name'] }}</a>
                                                                        </h2>
                                                                        <ul class="item-price-wrap hide-on-list">
                                                                            @if (
                                                                                !empty($dat->prices) &&
                                                                                    isset($dat->prices['endirim_price']) &&
                                                                                    !empty($dat->prices['endirim_price']) &&
                                                                                    $dat->prices['endirim_price'] != 0)
                                                                                <li class="item-price">
                                                                                    ${{ $dat->prices['endirim_price'] }}
                                                                                </li>
                                                                                <li class="item-sub-price">
                                                                                    ${{ $dat->prices['price'] }}</li>
                                                                            @else
                                                                                <li class="item-price">
                                                                                    ${{ $dat->prices['price'] }}</li>
                                                                            @endif
                                                                        </ul>
                                                                        @if (
                                                                            !empty($dat->address) &&
                                                                                isset($dat->address[app()->getLocale() . '_address']) &&
                                                                                !empty($dat->address[app()->getLocale() . '_address']))
                                                                            <address class="item-address">
                                                                                {{ $dat->address[app()->getLocale() . '_address'] }}
                                                                            </address>
                                                                        @endif
                                                                        <a class="btn btn-primary btn-item mt-4"
                                                                            target="_self"
                                                                            href="{{ route('frontend.show', ['slug' => $dat->slugs[app()->getLocale() . '_slug'], 'page' => 'products']) }}">
                                                                            @lang('additional.fields.readmore')</a>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                @else
                    <p class="text-center text-danger">@lang('additional.fields.notfound')</p>
                @endif
            </div>
        </section>
@endsection
