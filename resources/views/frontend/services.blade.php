@extends('frontend.layouts.app')
@section('title', $title)
@section('content')
    @if (
        !empty(services(session()->get('setting_id'), 'setting_id')) &&
            count(services(session()->get('setting_id'), 'setting_id')) > 0)
        <section
            class="elementor-section elementor-top-section elementor-element elementor-element-49e5b5b elementor-section-stretched elementor-section-height-min-height elementor-section-boxed elementor-section-height-default elementor-section-items-middle"
            data-id="49e5b5b" data-element_type="section"
            data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;,&quot;background_background&quot;:&quot;classic&quot;,&quot;shape_divider_top&quot;:&quot;tilt&quot;,&quot;shape_divider_bottom&quot;:&quot;tilt&quot;}">
            <div class="elementor-background-overlay"></div>
            <div class="elementor-shape elementor-shape-top" data-negative="false">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" preserveAspectRatio="none">
                    <path class="elementor-shape-fill" d="M0,6V0h1000v100L0,6z" />
                </svg>
            </div>
            <div class="elementor-shape elementor-shape-bottom" data-negative="false">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" preserveAspectRatio="none">
                    <path class="elementor-shape-fill" d="M0,6V0h1000v100L0,6z" />
                </svg>
            </div>
            <div class="elementor-container elementor-column-gap-default">
                <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-8e1b274"
                    data-id="8e1b274" data-element_type="column">
                    <div class="elementor-widget-wrap elementor-element-populated">
                        <section
                            class="elementor-section elementor-inner-section elementor-element elementor-element-c1204eb elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                            data-id="c1204eb" data-element_type="section">
                            <div class="elementor-container elementor-column-gap-default">
                                <div class="elementor-column elementor-col-100 elementor-inner-column elementor-element elementor-element-6ab7c78"
                                    data-id="6ab7c78" data-element_type="column">
                                    <div class="elementor-widget-wrap elementor-element-populated">
                                        <div class="elementor-element elementor-element-60abb66 animated-slow elementor-invisible elementor-widget elementor-widget-houzez_elementor_section_title"
                                            data-id="60abb66" data-element_type="widget"
                                            data-settings="{&quot;_animation&quot;:&quot;fadeIn&quot;}"
                                            data-widget_type="houzez_elementor_section_title.default">
                                            <div class="elementor-widget-container">
                                                <div class="houzez_section_title_wrap section-title-module">
                                                    <h2 class="houzez_section_title">@lang('additional.fields.useourservices')
                                                    </h2>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <div class="elementor-element elementor-element-338b01a elementor-widget elementor-widget-houzez_elementor_icon_box"
                            data-id="338b01a" data-element_type="widget"
                            data-widget_type="houzez_elementor_icon_box.default">
                            <div class="elementor-widget-container">
                                <div class="text-with-icons-module module-4cols clearfix">
                                    @foreach (services(session()->get('setting_id'), 'setting_id') as $service)
                                        <div class="text-with-icon-item text-with-icon-item-v1 hoveritem"
                                            onclick="redirecturl('{{ route('frontend.show', ['page' => 'services', 'slug' => $service->slugs[app()->getLocale() . '_slug']]) }}')">
                                            @if (!empty($service->images) && count($service->images) > 0)
                                                <div class="icon-thumb">
                                                    <img loading="lazy" decoding="async" width="40" height="40"
                                                        src="{{ getImageUrl($service->images[0], 'images') }}"
                                                        data-src="{{ getImageUrl($service->images[0], 'images') }}"
                                                        class="houzez-lazyload attachment-thumbnail size-thumbnail" alt
                                                        srcset data-srcset />

                                                </div>
                                            @endif
                                            <div class="text-with-icon-info">
                                                <div class="text-with-icon-title">
                                                    <strong></strong>
                                                </div>
                                                <div class="text-with-icon-body">
                                                </div>
                                            </div>
                                            <div class="text-with-icon-link">
                                                <a
                                                    href="javascript:void(0)">{{ $service->name[app()->getLocale() . '_name'] }}</a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
@endsection
