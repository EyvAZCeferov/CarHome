@extends('frontend.layouts.app')
@section('title', $title)
@section('content')
    <section class="content-wrap">
        <div data-elementor-type="wp-page" data-elementor-id="16519" class="elementor elementor-16519">
            {{-- Sliders --}}
            @if (
                !empty(sliders(session()->get('setting_id'), 'setting_id')) &&
                    count(sliders(session()->get('setting_id'), 'setting_id')) > 0)
                <section
                    class="elementor-section elementor-top-section elementor-element elementor-element-3b8978b1 elementor-section-stretched elementor-section-height-min-height elementor-section-boxed elementor-section-height-default elementor-section-items-middle"
                    data-id="3b8978b1" data-element_type="section"
                    data-settings='{
                        "stretch_section": "section-stretched",
                        "background_background": "slideshow",
                        "background_slideshow_gallery": [
                            @foreach (sliders(session()->get('setting_id'), 'setting_id') as $slide)
                                {"id": {{ $slide->id }}, "url": "{{ getImageUrl($slide->image_or_video, 'images') }}"}@if (!$loop->last),@endif @endforeach
                        ],
                        "background_slideshow_ken_burns": "yes",
                        "background_slideshow_loop": "yes",
                        "background_slideshow_slide_duration": 5000,
                        "background_slideshow_slide_transition": "fade",
                        "background_slideshow_transition_duration": 500,
                        "background_slideshow_ken_burns_zoom_direction": "in"
                    }'>
                    <div class="elementor-background-overlay"></div>
                    <div class="elementor-container elementor-column-gap-default">
                        <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-16a6bdb9"
                            data-id="16a6bdb9" data-element_type="column">
                            <div class="elementor-widget-wrap elementor-element-populated">
                                <section
                                    class="elementor-section elementor-inner-section elementor-element elementor-element-6449d78b elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                                    data-id="6449d78b" data-element_type="section">
                                    <div class="elementor-container elementor-column-gap-default">
                                        <div class="elementor-column elementor-col-100 elementor-inner-column elementor-element elementor-element-1d674962"
                                            data-id="1d674962" data-element_type="column">
                                            <div class="elementor-widget-wrap elementor-element-populated">
                                                <div class="elementor-element elementor-element-87f414d elementor-widget elementor-widget-spacer"
                                                    data-id="87f414d" data-element_type="widget"
                                                    data-widget_type="spacer.default">
                                                    <div class="elementor-widget-container">
                                                        <div class="elementor-spacer">
                                                            <div class="elementor-spacer-inner"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @php
                                                    $titles = sliders(session()->get('setting_id'), 'setting_id')
                                                        ->pluck('name')
                                                        ->toArray();
                                                    $descriptions = sliders(session()->get('setting_id'), 'setting_id')
                                                        ->pluck('description')
                                                        ->toArray();
                                                    $rand_key = array_rand($titles);
                                                @endphp
                                                <div class="elementor-element elementor-element-4c53104d animated-slow elementor-invisible elementor-widget elementor-widget-houzez_elementor_section_title"
                                                    data-id="4c53104d" data-element_type="widget"
                                                    data-settings="{&quot;_animation&quot;:&quot;fadeIn&quot;}"
                                                    data-widget_type="houzez_elementor_section_title.default">
                                                    <div class="elementor-widget-container">
                                                        <div class="houzez_section_title_wrap section-title-module">
                                                            <h2 class="houzez_section_title">
                                                                {{ $titles[$rand_key][app()->getLocale() . '_name'] }}</h2>
                                                            <p class="houzez_section_subtitle">
                                                                {{ strip_tags_with_whitespace($descriptions[$rand_key][app()->getLocale() . '_description']) }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>
                </section>
            @endif
            {{-- Sliders --}}
            {{-- Why Choose Us --}}
            @if (
                !empty(whychooseus(session()->get('setting_id'), 'setting_id')) &&
                    count(whychooseus(session()->get('setting_id'), 'setting_id')) > 0)
                <section
                    class="elementor-section elementor-top-section elementor-element elementor-element-262efd9 elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                    data-id="262efd9" data-element_type="section"
                    data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;shape_divider_bottom&quot;:&quot;tilt&quot;}">
                    <div class="elementor-shape elementor-shape-bottom" data-negative="false">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" preserveAspectRatio="none">
                            <path class="elementor-shape-fill" d="M0,6V0h1000v100L0,6z" />
                        </svg>
                    </div>
                    <div class="elementor-container elementor-column-gap-default">
                        <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-9e5f30b"
                            data-id="9e5f30b" data-element_type="column">
                            <div class="elementor-widget-wrap elementor-element-populated">
                                <div class="elementor-element elementor-element-5eb60ef elementor-widget elementor-widget-spacer"
                                    data-id="5eb60ef" data-element_type="widget" data-widget_type="spacer.default">
                                    <div class="elementor-widget-container">
                                        <div class="elementor-spacer">
                                            <div class="elementor-spacer-inner"></div>
                                        </div>
                                    </div>
                                </div>
                                <section
                                    class="elementor-section elementor-inner-section elementor-element elementor-element-8149cbf elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                                    data-id="8149cbf" data-element_type="section">
                                    <div class="elementor-container elementor-column-gap-default">
                                        <div class="elementor-column elementor-col-100 elementor-inner-column elementor-element elementor-element-71c5a28"
                                            data-id="71c5a28" data-element_type="column">
                                            <div class="elementor-widget-wrap elementor-element-populated">
                                                <div class="elementor-element elementor-element-378e0ff elementor-widget elementor-widget-houzez_elementor_icon_box"
                                                    data-id="378e0ff" data-element_type="widget"
                                                    data-widget_type="houzez_elementor_icon_box.default">
                                                    <div class="elementor-widget-container">
                                                        <div class="text-with-icons-module module-3cols clearfix">
                                                            @foreach (whychooseus(session()->get('setting_id'), 'setting_id') as $choosen)
                                                                <div class="text-with-icon-item text-with-icon-item-v1">
                                                                    <div class="icon-thumb">
                                                                    </div>
                                                                    <div class="text-with-icon-info">
                                                                        <div class="text-with-icon-title">
                                                                            <strong>{{ $choosen->name[app()->getLocale() . '_name'] }}</strong>
                                                                        </div>
                                                                        <div class="text-with-icon-body">
                                                                            {{ strip_tags_with_whitespace($chosen->description[app()->getLocale() . '_description']) }}
                                                                        </div>
                                                                    </div>
                                                                    {{-- <div class="text-with-icon-link">
                                                                <a href="#">Learn more</a>
                                                            </div> --}}
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <div class="elementor-element elementor-element-5bf501e elementor-widget elementor-widget-spacer"
                                    data-id="5bf501e" data-element_type="widget" data-widget_type="spacer.default">
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
            @endif
            {{-- Why Choose Us --}}
            {{-- Services --}}
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
                                                <div class="text-with-icon-item text-with-icon-item-v1">
                                                    @if (!empty($service->images) && count($service->images) > 0)
                                                        <div class="icon-thumb">
                                                            <img loading="lazy" decoding="async" width="40"
                                                                height="40"
                                                                src="{{ getImageUrl($service->images[0], 'images') }}"
                                                                data-src="{{ getImageUrl($service->images[0], 'images') }}"
                                                                class="houzez-lazyload attachment-thumbnail size-thumbnail"
                                                                alt srcset data-srcset />

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
            {{-- Services --}}
            <section
                class="elementor-section elementor-top-section elementor-element elementor-element-4f7b4543 elementor-section-content-middle elementor-section-stretched elementor-section-full_width elementor-section-height-default elementor-section-height-default"
                data-id="4f7b4543" data-element_type="section"
                data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;,&quot;background_background&quot;:&quot;classic&quot;}">
                <div class="elementor-container elementor-column-gap-wider">
                    <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-509bfd8e"
                        data-id="509bfd8e" data-element_type="column">
                        <div class="elementor-widget-wrap elementor-element-populated">
                            <div class="elementor-element elementor-element-7aa86df1 elementor-widget elementor-widget-houzez_elementor_space"
                                data-id="7aa86df1" data-element_type="widget"
                                data-widget_type="houzez_elementor_space.default">
                                <div class="elementor-widget-container">
                                    <div class="houzez-spacer">
                                        <div class="houzez-spacer-inner"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="elementor-element elementor-element-7866b6c2 elementor-widget elementor-widget-houzez_elementor_space"
                                data-id="7866b6c2" data-element_type="widget"
                                data-widget_type="houzez_elementor_space.default">
                                <div class="elementor-widget-container">
                                    <div class="houzez-spacer">
                                        <div class="houzez-spacer-inner"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section
                class="elementor-section elementor-top-section elementor-element elementor-element-64270702 elementor-section-stretched elementor-section-height-min-height elementor-section-boxed elementor-section-height-default elementor-section-items-middle"
                data-id="64270702" data-element_type="section"
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
                    <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-66703139"
                        data-id="66703139" data-element_type="column">
                        <div class="elementor-widget-wrap elementor-element-populated">
                            <div class="elementor-element elementor-element-7712d67f elementor-widget elementor-widget-houzez_elementor_space"
                                data-id="7712d67f" data-element_type="widget"
                                data-widget_type="houzez_elementor_space.default">
                                <div class="elementor-widget-container">
                                    <div class="houzez-spacer">
                                        <div class="houzez-spacer-inner"></div>
                                    </div>
                                </div>
                            </div>
                            <section
                                class="elementor-section elementor-inner-section elementor-element elementor-element-51431108 elementor-section-full_width elementor-section-height-default elementor-section-height-default"
                                data-id="51431108" data-element_type="section">
                                <div class="elementor-container elementor-column-gap-wider">
                                    <div class="elementor-column elementor-col-33 elementor-inner-column elementor-element elementor-element-1a49ac65"
                                        data-id="1a49ac65" data-element_type="column">
                                        <div class="elementor-widget-wrap elementor-element-populated">
                                            <div class="elementor-element elementor-element-4735a045 animated-slow elementor-invisible elementor-widget elementor-widget-houzez_elementor_section_title"
                                                data-id="4735a045" data-element_type="widget"
                                                data-settings="{&quot;_animation&quot;:&quot;fadeIn&quot;}"
                                                data-widget_type="houzez_elementor_section_title.default">
                                                <div class="elementor-widget-container">
                                                    <div class="houzez_section_title_wrap section-title-module">
                                                        <h2 class="houzez_section_title">@lang('additional.fields.chooseownplace')</h2>
                                                        <p class="houzez_section_subtitle">@lang('additional.fields.filltheformandwaitreply')</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="elementor-element elementor-element-ceb42f9 elementor-widget-divider--view-line elementor-widget elementor-widget-divider"
                                                data-id="ceb42f9" data-element_type="widget"
                                                data-widget_type="divider.default">
                                                <div class="elementor-widget-container">
                                                    <div class="elementor-divider">
                                                        <span class="elementor-divider-separator">
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="elementor-column elementor-col-33 elementor-inner-column elementor-element elementor-element-940ffee"
                                        data-id="940ffee" data-element_type="column">
                                        <div class="elementor-widget-wrap">
                                        </div>
                                    </div>
                                    <div class="elementor-column elementor-col-33 elementor-inner-column elementor-element elementor-element-563a69c8"
                                        data-id="563a69c8" data-element_type="column"
                                        data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                                        <div class="elementor-widget-wrap elementor-element-populated">
                                            <div class="elementor-element elementor-element-3cab00c7 elementor-button-align-stretch elementor-widget elementor-widget-houzez_elementor_inquiry_form"
                                                data-id="3cab00c7" data-element_type="widget"
                                                data-widget_type="houzez_elementor_inquiry_form.default">
                                                <div class="elementor-widget-container">
                                                    <script type="application/javascript">
                            jQuery(document).bind("ready", function () {
                              houzezValidateElementor("#houzez-form-3cab00c7");
                            });
                          </script>
                                                    <form class="elementor-form" id="houzez-form-3cab00c7" method="post"
                                                        name="New Form"
                                                        action="https://default.houzez.co/wp-admin/admin-ajax.php">
                                                        @csrf
                                                        <div class="elementor-form-fields-wrapper elementor-labels-above">
                                                            <div
                                                                class="elementor-field-group elementor-column form-group elementor-field-group-cc6b92f elementor-col-50 elementor-field-required">
                                                                <input type="text" name="first_name"
                                                                    id="form-field-cc6b92f"
                                                                    class="elementor-field form-control elementor-size-md elementor-field-textual"
                                                                    placeholder="@lang('additional.fields.firstname')"
                                                                    title="* @lang('additional.fields.firstname')" required="required">
                                                            </div>
                                                            <div
                                                                class="elementor-field-group elementor-column form-group elementor-field-group-3cc124e elementor-col-50">
                                                                <input type="text" name="last_name"
                                                                    id="form-field-3cc124e"
                                                                    class="elementor-field form-control elementor-size-md elementor-field-textual"
                                                                    placeholder="@lang('additional.fields.lastname')"
                                                                    title="* @lang('additional.fields.lastname')">
                                                            </div>
                                                            <div
                                                                class="elementor-field-group elementor-column form-group elementor-field-group-932d82c elementor-col-100 elementor-field-required">
                                                                <input type="email" name="email"
                                                                    id="form-field-932d82c"
                                                                    class="elementor-field form-control elementor-size-md elementor-field-textual"
                                                                    placeholder="@lang('additional.fields.email')"
                                                                    title="* @lang('additional.fields.email')" required="required">
                                                            </div>
                                                            <div
                                                                class="elementor-field-group elementor-column form-group elementor-field-group-3180222 elementor-col-100 elementor-field-required">
                                                                <label for="form-field-3180222"
                                                                    class="elementor-field-label">Property Details</label>
                                                                <div class="elementor-field elementor-select-wrapper">
                                                                    <select name="e_meta[property_type]"
                                                                        id="form-field-3180222"
                                                                        class="elementor-field-textual form-control elementor-size-md"
                                                                        required="required" title="* Property Details">
                                                                        <option value>Select type</option>
                                                                        <option value="apartment"> Apartment</option>
                                                                        <option value="condo"> Condo</option>
                                                                        <option value="lot"> Lot</option>
                                                                        <option value="multi-family-home"> Multi Family
                                                                            Home</option>
                                                                        <option value="office"> Office</option>
                                                                        <option value="shop"> Shop</option>
                                                                        <option value="single-family-home"> Single Family
                                                                            Home</option>
                                                                        <option value="studio"> Studio</option>
                                                                        <option value="villa"> Villa</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="elementor-field-group elementor-column form-group elementor-field-group-c549d17 elementor-col-50 elementor-field-required">
                                                                <input type="number" name="e_meta[price]"
                                                                    id="form-field-c549d17"
                                                                    class="elementor-field form-control elementor-size-md elementor-field-textual"
                                                                    placeholder="Max price" title="* Max price"
                                                                    required="required" min="0">
                                                            </div>
                                                            <div
                                                                class="elementor-field-group elementor-column form-group elementor-field-group-e08cbcb elementor-col-50 elementor-field-required">
                                                                <input type="number" name="e_meta[area-size]"
                                                                    id="form-field-e08cbcb"
                                                                    class="elementor-field form-control elementor-size-md elementor-field-textual"
                                                                    placeholder="Minimum size (Sq Ft)"
                                                                    title="* Minimum size (Sq Ft)" required="required"
                                                                    min="0">
                                                            </div>
                                                            <div
                                                                class="elementor-field-group elementor-column form-group elementor-field-group-66cc0de elementor-col-50 elementor-field-required">
                                                                <input type="number" name="e_meta[beds]"
                                                                    id="form-field-66cc0de"
                                                                    class="elementor-field form-control elementor-size-md elementor-field-textual"
                                                                    placeholder="Number of beds" title="* Number of beds"
                                                                    required="required" min="0">
                                                            </div>
                                                            <div
                                                                class="elementor-field-group elementor-column form-group elementor-field-group-dea086f elementor-col-50 elementor-field-required">
                                                                <input type="number" name="e_meta[baths]"
                                                                    id="form-field-dea086f"
                                                                    class="elementor-field form-control elementor-size-md elementor-field-textual"
                                                                    placeholder="Number of baths"
                                                                    title="* Number of baths" required="required"
                                                                    min="0">
                                                            </div>
                                                            <div
                                                                class="elementor-field-group elementor-column elementor-field-type-submit elementor-col-100">
                                                                <button type="submit"
                                                                    class="houzez-submit-button houzez-contact-form-js elementor-button elementor-size-md">
                                                                    <i class="btn-loader houzez-loader-js"></i>
                                                                    Submit </button>
                                                            </div>
                                                        </div>
                                                        <br />
                                                        <div class="ele-form-messages"></div>
                                                        <div class="error-container"></div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <div class="elementor-element elementor-element-52f14006 elementor-widget elementor-widget-houzez_elementor_space"
                                data-id="52f14006" data-element_type="widget"
                                data-widget_type="houzez_elementor_space.default">
                                <div class="elementor-widget-container">
                                    <div class="houzez-spacer">
                                        <div class="houzez-spacer-inner"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            {{-- Teams --}}
            @if (
                !empty(teams(session()->get('setting_id'), 'setting_id')) &&
                    count(teams(session()->get('setting_id'), 'setting_id')) > 0)
                <section
                    class="elementor-section elementor-top-section elementor-element elementor-element-40ac8cea elementor-section-content-middle elementor-section-stretched elementor-section-full_width elementor-section-height-default elementor-section-height-default"
                    data-id="40ac8cea" data-element_type="section"
                    data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;}">
                    <div class="elementor-background-overlay"></div>
                    <div class="elementor-container elementor-column-gap-wide">
                        <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-5a715728"
                            data-id="5a715728" data-element_type="column">
                            <div class="elementor-widget-wrap elementor-element-populated">
                                <div class="elementor-element elementor-element-25073f1e elementor-widget elementor-widget-houzez_elementor_space"
                                    data-id="25073f1e" data-element_type="widget"
                                    data-widget_type="houzez_elementor_space.default">
                                    <div class="elementor-widget-container">
                                        <div class="houzez-spacer">
                                            <div class="houzez-spacer-inner"></div>
                                        </div>
                                    </div>
                                </div>
                                <section
                                    class="elementor-section elementor-inner-section elementor-element elementor-element-61b60d20 elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                                    data-id="61b60d20" data-element_type="section">
                                    <div class="elementor-container elementor-column-gap-extended">
                                        <div class="elementor-column elementor-col-100 elementor-inner-column elementor-element elementor-element-764a5026"
                                            data-id="764a5026" data-element_type="column">
                                            <div class="elementor-widget-wrap elementor-element-populated">
                                                <div class="elementor-element elementor-element-ec4cd19 animated-slow elementor-invisible elementor-widget elementor-widget-houzez_elementor_section_title"
                                                    data-id="ec4cd19" data-element_type="widget"
                                                    data-settings="{&quot;_animation&quot;:&quot;fadeIn&quot;}"
                                                    data-widget_type="houzez_elementor_section_title.default">
                                                    <div class="elementor-widget-container">
                                                        <div class="houzez_section_title_wrap section-title-module">
                                                            <h2 class="houzez_section_title">@lang('additional.fields.meetourteams')</h2>
                                                            <p class="houzez_section_subtitle">@lang('additional.fields.ourteamswantshelpsyou')</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="elementor-element elementor-element-51d142ca elementor-widget elementor-widget-houzez_elementor_agents"
                                                    data-id="51d142ca" data-element_type="widget"
                                                    data-widget_type="houzez_elementor_agents.default">
                                                    <div class="elementor-widget-container">

                                                        <div class="agent-module module-4cols clearfix">
                                                            @foreach (teams(session()->get('setting_id'), 'setting_id') as $team)
                                                                <div class="agent-item">
                                                                    <div class="agent-thumb">
                                                                        <a
                                                                            href="{{ route('frontend.show', ['page' => 'teams', 'slug' => $team->slugs[app()->getLocale() . '_slug']]) }}">
                                                                            <img loading="lazy" decoding="async"
                                                                                width="150" height="150"
                                                                                src="{{ getImageUrl($team->image, 'images') }}"
                                                                                data-src="{{ getImageUrl($team->image, 'images') }}"
                                                                                class="houzez-lazyload img-fluid rounded-circle wp-post-image"
                                                                                alt srcset
                                                                                data-srcset="{{ getImageUrl($team->image, 'images') }} 150w, {{ getImageUrl($team->image, 'images') }} 300w, {{ getImageUrl($team->image, 'images') }} 600w, {{ getImageUrl($team->image, 'images') }} 496w, {{ getImageUrl($team->image, 'images') }} 700w"
                                                                                sizes="(max-width: 150px) 100vw, 150px" />
                                                                        </a>
                                                                    </div>
                                                                    <div class="agent-info">
                                                                        <div class="agent-name">
                                                                            <a
                                                                                href="{{ route('frontend.show', ['page' => 'teams', 'slug' => $team->slugs[app()->getLocale() . '_slug']]) }}"><strong>{{ $team->name[app()->getLocale() . '_name'] }}</strong></a>
                                                                        </div>
                                                                    </div>
                                                                    <div class="agent-body">
                                                                        {{ mb_substr(strip_tags_with_whitespace($team->description[app()->getLocale() . '_description']), 0, 50) }}...
                                                                    </div>
                                                                    <div class="agent-link">
                                                                        <a
                                                                            href="{{ route('frontend.show', ['page' => 'teams', 'slug' => $team->slugs[app()->getLocale() . '_slug']]) }}">View
                                                                            Profile</a>
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
                                <div class="elementor-element elementor-element-38417403 elementor-widget elementor-widget-houzez_elementor_space"
                                    data-id="38417403" data-element_type="widget"
                                    data-widget_type="houzez_elementor_space.default">
                                    <div class="elementor-widget-container">
                                        <div class="houzez-spacer">
                                            <div class="houzez-spacer-inner"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            @endif
            {{-- Teams --}}
            {{-- Products --}}
            @if (
                !empty(products(session()->get('setting_id'), 'setting_id')) &&
                    count(products(session()->get('setting_id'), 'setting_id')) > 0)
            <section
                class="elementor-section elementor-top-section elementor-element elementor-element-3e8e996 elementor-section-content-middle elementor-section-stretched elementor-section-full_width elementor-section-height-default elementor-section-height-default"
                data-id="3e8e996" data-element_type="section"
                data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;,&quot;background_background&quot;:&quot;classic&quot;}">
                <div class="elementor-background-overlay"></div>
                <div class="elementor-container elementor-column-gap-wide">
                    <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-5de7eb39"
                        data-id="5de7eb39" data-element_type="column">
                        <div class="elementor-widget-wrap elementor-element-populated">
                            <div class="elementor-element elementor-element-869e3df elementor-widget elementor-widget-spacer"
                                data-id="869e3df" data-element_type="widget" data-widget_type="spacer.default">
                                <div class="elementor-widget-container">
                                    <div class="elementor-spacer">
                                        <div class="elementor-spacer-inner"></div>
                                    </div>
                                </div>
                            </div>
                            <section
                                class="elementor-section elementor-inner-section elementor-element elementor-element-ae96afd elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                                data-id="ae96afd" data-element_type="section">
                                <div class="elementor-container elementor-column-gap-default">
                                    <div class="elementor-column elementor-col-100 elementor-inner-column elementor-element elementor-element-5abb252"
                                        data-id="5abb252" data-element_type="column">
                                        <div class="elementor-widget-wrap elementor-element-populated">
                                            <div class="elementor-element elementor-element-6a5e92f8 animated-slow elementor-invisible elementor-widget elementor-widget-houzez_elementor_section_title"
                                                data-id="6a5e92f8" data-element_type="widget"
                                                data-settings="{&quot;_animation&quot;:&quot;fadeIn&quot;}"
                                                data-widget_type="houzez_elementor_section_title.default">
                                                <div class="elementor-widget-container">
                                                    <div class="houzez_section_title_wrap section-title-module">
                                                        <h2 class="houzez_section_title">@lang("additional.fields.lastandchosenproperties")</h2>
                                                        <p class="houzez_section_subtitle">@lang("additional.fields.lookpropertiesandbuy")</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <section
                                class="elementor-section elementor-inner-section elementor-element elementor-element-3795d949 elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                                data-id="3795d949" data-element_type="section">
                                <div class="elementor-container elementor-column-gap-default">
                                    <div class="elementor-column elementor-col-100 elementor-inner-column elementor-element elementor-element-534503b4"
                                        data-id="534503b4" data-element_type="column">
                                        <div class="elementor-widget-wrap elementor-element-populated">
                                            <div class="elementor-element elementor-element-aca9f31 elementor-widget elementor-widget-houzez_elementor_properties_carousel_v1"
                                                data-id="aca9f31" data-element_type="widget"
                                                data-widget_type="houzez_elementor_properties_carousel_v1.default">
                                                <div class="elementor-widget-container">
                                                    <div
                                                        class="property-carousel-module houzez-carousel-arrows-gPe1m houzez-carousel-cols-4 property-carousel-module-v1-4cols">
                                                        <div class="property-carousel-buttons-wrap">
                                                            <button type="button"
                                                                class="slick-prev-js-gPe1m slick-prev btn-primary-outlined">Prev</button>
                                                            <button type="button"
                                                                class="slick-next-js-gPe1m slick-next btn-primary-outlined">Next</button>
                                                        </div>
                                                        <div class="listing-view grid-view">
                                                            <div id="houzez-properties-carousel-gPe1m" data-token="gPe1m"
                                                                class="houzez-properties-carousel-js houzez-all-slider-wrap card-deck">
                                                                @foreach(products(session()->get("setting_id"),'setting_id') as $product)
                                                                <div class="item-listing-wrap item-listing-wrap-v3">
                                                                    <div class="item-wrap item-wrap-v3 item-wrap-no-frame">
                                                                        <div class="listing-image-wrap">
                                                                            <div class="listing-thumb">
                                                                                <a target="_self"
                                                                                    href="{{ route("frontend.show",['slug'=>$product->slugs[app()->getLocale().'_slug'],'page'=>'products']) }}"
                                                                                    class="listing-featured-thumb hover-effect">
                                                                                    <img fetchpriority="high"
                                                                                        decoding="async" width="592"
                                                                                        height="444"
                                                                                        src="{{ getImageUrl($product->images[0],'images') }}"
                                                                                        data-src="{{ getImageUrl($product->images[0],'images') }}"
                                                                                        class="houzez-lazyload img-fluid wp-post-image"
                                                                                        alt="{{ $product->name[app()->getLocale().'_name'] }}" srcset
                                                                                        data-srcset="{{ getImageUrl($product->images[0],'images') }} 592w, {{ getImageUrl($product->images[0],'images') }} 300w, {{ getImageUrl($product->images[0],'images') }} 1024w, {{ getImageUrl($product->images[0],'images') }}, {{ getImageUrl($product->images[0],'images') }} 584w, {{ getImageUrl($product->images[0],'images') }} 800w, {{ getImageUrl($product->images[0],'images') }} 120w, {{ getImageUrl($product->images[0],'images') }} 496w, {{ getImageUrl($product->images[0],'images') }} 1170w"
                                                                                        sizes="(max-width: 592px) 100vw, 592px" />
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                        <h2 class="item-title">
                                                                            <a target="_self"
                                                                                href="{{ route("frontend.show",['slug'=>$product->slugs[app()->getLocale().'_slug'],'page'=>'products']) }}">{{ $product->name[app()->getLocale().'_name'] }}</a>
                                                                        </h2>
                                                                        {{-- <ul
                                                                            class="item-amenities item-amenities-with-icons">
                                                                            <li class="h-beds"><i
                                                                                    class="houzez-icon icon-hotel-double-bed-1 mr-1"></i><span
                                                                                    class="item-amenities-text">Beds:</span>
                                                                                <span class="hz-figure">4</span>
                                                                            </li>
                                                                            <li class="h-baths"><i
                                                                                    class="houzez-icon icon-bathroom-shower-1 mr-1"></i><span
                                                                                    class="item-amenities-text">Baths:</span>
                                                                                <span class="hz-figure">2</span>
                                                                            </li>
                                                                            <li class="h-area"><i
                                                                                    class="houzez-icon icon-ruler-triangle mr-1"></i><span
                                                                                    class="hz-figure">1200</span> <span
                                                                                    class="hz-figure area_postfix">Sq
                                                                                    Ft</span></li>
                                                                            <li class="h-type"><span>Apartment</span></li>
                                                                        </ul> --}}
                                                                        <ul class="item-price-wrap hide-on-list">
                                                                            <li class="item-price"><span
                                                                                    class="price-prefix">
                                                                                </span>{{ $product->prices['price'] }}</li>
                                                                        </ul>
                                                                        <div class="labels-wrap labels-right">
                                                                            <a href="javascript:void(0)"
                                                                                class="label-status label status-color-8">
                                                                                @lang("additional.fields.forsale")
                                                                            </a>
                                                                        </div>
                                                                       
                                                                        <div class="preview_loader"></div>
                                                                    </div>
                                                                    <div class="item-wrap-outside">
                                                                        <h2 class="item-title">
                                                                            <a target="_self"
                                                                                href="{{ route("frontend.show",['slug'=>$product->slugs[app()->getLocale().'_slug'],'page'=>'products']) }}">{{ $product->name[app()->getLocale().'_name'] }}</a>
                                                                        </h2>
                                                                        {{-- <ul
                                                                            class="item-amenities item-amenities-with-icons">
                                                                            <li class="h-beds"><i
                                                                                    class="houzez-icon icon-hotel-double-bed-1 mr-1"></i><span
                                                                                    class="item-amenities-text">Beds:</span>
                                                                                <span class="hz-figure">4</span>
                                                                            </li>
                                                                            <li class="h-baths"><i
                                                                                    class="houzez-icon icon-bathroom-shower-1 mr-1"></i><span
                                                                                    class="item-amenities-text">Baths:</span>
                                                                                <span class="hz-figure">2</span>
                                                                            </li>
                                                                            <li class="h-area"><i
                                                                                    class="houzez-icon icon-ruler-triangle mr-1"></i><span
                                                                                    class="hz-figure">1200</span> <span
                                                                                    class="hz-figure area_postfix">Sq
                                                                                    Ft</span></li>
                                                                            <li class="h-type"><span>Apartment</span></li>
                                                                        </ul> --}}
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
                                </div>
                            </section>
                            <div class="elementor-element elementor-element-5d41248f elementor-widget elementor-widget-spacer"
                                data-id="5d41248f" data-element_type="widget" data-widget_type="spacer.default">
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
            @endif
            {{-- Products --}}
{{-- Partners --}}
            @if (
                !empty(partners(session()->get('setting_id'), 'setting_id')) &&
                    count(partners(session()->get('setting_id'), 'setting_id')) > 0)
                <section
                    class="elementor-section elementor-top-section elementor-element elementor-element-2be03584 elementor-section-content-middle elementor-section-stretched elementor-section-full_width elementor-section-height-default elementor-section-height-default"
                    data-id="2be03584" data-element_type="section"
                    data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;,&quot;background_background&quot;:&quot;classic&quot;}">
                    <div class="elementor-background-overlay"></div>
                    <div class="elementor-container elementor-column-gap-wide">
                        <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-439fc813"
                            data-id="439fc813" data-element_type="column">
                            <div class="elementor-widget-wrap elementor-element-populated">
                                <div class="elementor-element elementor-element-2b03bc58 elementor-widget elementor-widget-houzez_elementor_space"
                                    data-id="2b03bc58" data-element_type="widget"
                                    data-widget_type="houzez_elementor_space.default">
                                    <div class="elementor-widget-container">
                                        <div class="houzez-spacer">
                                            <div class="houzez-spacer-inner"></div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </section>
                <section
                    class="elementor-section elementor-top-section elementor-element elementor-element-428fb1b0 elementor-hidden-tablet elementor-hidden-phone elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                    data-id="428fb1b0" data-element_type="section"
                    data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                    <div class="elementor-container elementor-column-gap-default">
                        @foreach (partners(session()->get('setting_id'), 'settin_id') as $partner)
                            <div class="elementor-column elementor-col-20 elementor-top-column elementor-element elementor-element-333ffd1"
                                data-id="333ffd1" data-element_type="column">
                                <div class="elementor-widget-wrap elementor-element-populated">
                                    <div class="elementor-element elementor-element-190dfee8 elementor-widget elementor-widget-image"
                                        data-id="190dfee8" data-element_type="widget" data-widget_type="image.default">
                                        <div class="elementor-widget-container">
                                            <img loading="lazy" decoding="async" width="150" height="60"
                                                src="{{ getImageUrl($partner->image, 'images') }}"
                                                data-src="{{ getImageUrl($partner->image, 'images') }}"
                                                class="houzez-lazyload attachment-large size-large wp-image-16531"
                                                alt="{{ $partner->name[app()->getLocale() . '_name'] }}" srcset
                                                data-srcset />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </section>
            @endif
            {{-- Partners --}}
        </div>
    </section>
@endsection
