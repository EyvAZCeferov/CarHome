@extends('frontend.layouts.app')
@section('title', $title)
@section('content')
    <section class="content-wrap" style="transform: none;">
        <div class="container" style="transform: none;">
            @switch($routename)
                @case('teams')
                    <div class="agent-profile-wrap">
                        <div class="row">
                            @if (isset($data->image) && !empty($data->image))
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <div class="agent-image">
                                        <div class="agent-company-logo">
                                            <img class="img-fluid" src="{{ getImageUrl($setting->logos['logo'], 'images') }}"
                                                alt="{{ $setting->name[app()->getLocale() . '_name'] }}">
                                        </div>

                                        <img fetchpriority="high" width="700" height="700"
                                            src="{{ getImageUrl($data->image, 'images') }}"
                                            data-src="{{ getImageUrl($data->image, 'images') }}" class="img-fluid wp-post-image"
                                            alt="{{ $data->name[app()->getLocale() . '_name'] }}" decoding="async"
                                            srcset="{{ getImageUrl($data->image, 'images') }} 700w, {{ getImageUrl($data->image, 'images') }} 300w, {{ getImageUrl($data->image, 'images') }} 150w, {{ getImageUrl($data->image, 'images') }} 600w, {{ getImageUrl($data->image, 'images') }} 496w"
                                            data-srcset="{{ getImageUrl($data->image, 'images') }} 700w, {{ getImageUrl($data->image, 'images') }} 300w, {{ getImageUrl($data->image, 'images') }} 150w, {{ getImageUrl($data->image, 'images') }} 600w, {{ getImageUrl($data->image, 'images') }} 496w"
                                            sizes="(max-width: 700px) 100vw, 700px">
                                    </div>
                                </div>
                            @endif

                            <div
                                @if (isset($data->image) && !empty($data->image)) class="col-lg-8 col-md-8 col-sm-12" @else class="col-lg-12 col-md-12 col-sm-12" @endif>
                                <div class="agent-profile-top-wrap">
                                    <div class="agent-profile-header">
                                        <h1>{{ $data->name[app()->getLocale().'_name'] }}</h1>
                                    </div>
                                </div>
                                <div class="agent-profile-content">
                                    <ul class="list-unstyled">
                                        <li>
                                            <strong>Agent License:</strong>
                                            090-0348-8346
                                        </li>
                                        <li>
                                            <strong>Tax Number:</strong>
                                            HGT-92384-3434
                                        </li>
                                        <li>
                                            <strong>Service Areas:</strong>
                                            Chicago, Los Angeles, Miami Beach, New York
                                        </li>
                                        <li>
                                            <strong>Specialties:</strong>
                                            Property management, Real estate development, Real estate appraising, Retail leasing,
                                            Apartment brokerage
                                        </li>
                                    </ul>
                                </div>
                                <div class="agent-profile-buttons">
                                    <button type="button" class="btn btn-secondary" data-toggle="modal"
                                        data-target="#realtor-form">
                                        Send Email
                                    </button>
                                    <a href="tel:3214569874" class="btn btn-call">
                                        <span class="hide-on-click">Call</span>
                                        <span class="show-on-click">321 456 9874</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="transform: none;">
                        <div class="col-lg-8 col-md-12 bt-content-wrap">
                            <div class="agent-bio-wrap">
                                <h2>About Samuel Palmer</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus porta justo eget risus
                                    consectetur, non venenatis elit blandit. Mauris vehicula, libero a iaculis fringilla, ipsum
                                    ipsum tincidunt velit, ut convallis velit ante tincidunt dui. Sed iaculis ullamcorper
                                    pellentesque. Nam congue nisi eu orci laoreet, nec tristique dolor scelerisque. Aenean mauris
                                    sem, commodo et accumsan ac, dictum vitae sem. Sed bibendum nunc neque, in auctor enim ultricies
                                    nec. Proin ornare nibh libero, id euismod nulla aliquam et. Nam eget augue ut dolor sagittis
                                    feugiat. Nullam et nibh id lacus mollis laoreet eu et mi.</p>
                                <p></p>
                            </div>

                        </div>
                        <div class="col-lg-4 col-md-12 bt-sidebar-wrap houzez_sticky"
                            style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1px;">

                            <div class="theiaStickySidebar"
                                style="padding-top: 0px; padding-bottom: 1px; position: static; transform: none; top: 0px; left: 1052.55px;">
                                <aside class="sidebar-wrap">
                                    <div class="agent-contacts-wrap">
                                        <h3 class="widget-title">Contact</h3>
                                        <div class="agent-map">
                                            <address>
                                            </address>
                                        </div>
                                        <ul class="list-unstyled">
                                            <li>
                                                <strong>Office</strong>
                                                <a href="tel:3214569865">
                                                    <span class="agent-phone ">321 456 9865</span>
                                                </a>
                                            </li>
                                            <li>
                                                <strong>Mobile</strong>
                                                <a href="tel:3214569874">
                                                    <span class="agent-phone ">321 456 9874</span>
                                                </a>
                                            </li>
                                            <li>
                                                <strong>Fax</strong>
                                                <a href="fax:8976545487">
                                                    <span>897 654 5487</span>
                                                </a>
                                            </li>
                                            <li class="email">
                                                <strong>Email</strong>
                                                <a
                                                    href="../../cdn-cgi/l/email-protection.html#ef9c8e829a8a83af87809a958a95c18c8082">samuel@houzez.com</a>
                                            </li>
                                            <li>
                                                <strong>Website</strong>
                                                <a target="_blank" href="https://houzez.co">https://houzez.co</a>
                                            </li>
                                        </ul>
                                        <p>Find Samuel Palmer on:</p>
                                        <div class="agent-social-media">
                                            <span class="agent-whatsapp">
                                                <a class="btn-whatsapp" target="_blank" href="https://wa.me/3214569874">
                                                    <i class="houzez-icon icon-messaging-whatsapp mr-2"></i>
                                                </a>
                                            </span>
                                        </div>
                                    </div>

                                </aside>
                            </div>
                        </div>
                    </div>
                @break

                @default
            @endswitch

        </div>
    </section>

@endsection
