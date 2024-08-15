@if ($setting->domain == 'realestate.globalmart.az')
    <footer class="footer-wrap footer-wrap-v1">
        <div class="footer-top-wrap">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div id="houzez_about_widget-3" class="footer-widget widget widget-wrap widget-about-site">
                            <div class="widget-header">
                                <h3 class="widget-title text-white">@lang('additional.fields.aboutsite')</h3>
                            </div>
                            <div class="widget-body">
                                <div class="widget-content text-white">
                                    @if (
                                        !empty(settings(session()->get('setting_id'))->description) &&
                                            isset(settings(session()->get('setting_id'))->description[app()->getLocale() . '_description']) &&
                                            !empty(settings(session()->get('setting_id'))->description[app()->getLocale() . '_description']))
                                        <p>{!! settings(session()->get('setting_id'))->description[app()->getLocale() . '_description'] !!}</p>
                                    @endif
                                </div>
                                @if (
                                    !empty(standartpages(session()->get('setting_id'), 'setting_id')) &&
                                        count(standartpages(session()->get('setting_id'), 'setting_id')) > 0)
                                    <div class="widget-read-more">
                                        <a
                                            href="{{ route('frontend.show', ['slug' => standartpages(session()->get('setting_id'), 'setting_id')[0]->slugs[app()->getLocale() . '_slug'], 'page' => 'standartpages']) }}">@lang('additional.fields.readmore')
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div id="houzez_contact-7" class="footer-widget widget widget-wrap widget-contact-us">
                            <div class="widget-header">
                                <h3 class="widget-title text-white">@lang('additional.fields.contactus')</h3>
                            </div>
                            <div class="widget-body">
                                <div class="widget-content">
                                    <p></p>
                                    <ul class="list-unstyled contact-list text-white">
                                        @if (
                                            !empty(settings(session()->get('setting_id'), 'setting_id')->address) &&
                                                isset(settings(session()->get('setting_id'), 'setting_id')->address[app()->getLocale() . '_address']) &&
                                                !empty(settings(session()->get('setting_id'), 'setting_id')->address[app()->getLocale() . '_address']))
                                            <li><i class="houzez-icon icon-pin mr-1"></i>
                                                {{ settings(session()->get('setting_id'), 'setting_id')->address[app()->getLocale() . '_address'] }}
                                            </li>
                                        @endif
                                        @if (
                                            !empty(settings(session()->get('setting_id'), 'setting_id')->social_media) &&
                                                isset(settings(session()->get('setting_id'), 'setting_id')->social_media['phone']) &&
                                                !empty(settings(session()->get('setting_id'), 'setting_id')->social_media['phone']))
                                            <li><i class="houzez-icon icon-answer-machine mr-1"></i>
                                                {{ settings(session()->get('setting_id'), 'setting_id')->social_media['phone'] }}
                                            </li>
                                        @endif
                                        @if (
                                            !empty(settings(session()->get('setting_id'), 'setting_id')->social_media) &&
                                                isset(settings(session()->get('setting_id'), 'setting_id')->social_media['email']) &&
                                                !empty(settings(session()->get('setting_id'), 'setting_id')->social_media['email']))
                                            <li><i class="houzez-icon icon-envelope mr-1"></i> <a
                                                    href="mailto:{{ settings(session()->get('setting_id'), 'setting_id')->social_media['email'] }}"><span>{{ settings(session()->get('setting_id'), 'setting_id')->social_media['email'] }}</span></a>
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="footer-bottom-wrap footer-bottom-wrap-v1">
            <div class="container">
                <div class="d-flex justify-content-between">
                    <div class="footer-copyright">
                        &copy; Developed By <a href="https://globalmart.az">Globalmart Group </a></div>
                    <div class="footer-nav">
                        <ul id="footer-menu" class="nav">
                            @foreach (standartpages(session()->get('setting_id'), 'setting_id') as $page)
                                <li id="menu-item-750"
                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-750">
                                    <a
                                        href="{{ route('frontend.show', ['slug' => $page->slugs[app()->getLocale() . '_slug'], 'page' => 'standartpages']) }}">
                                        {{ $page->name[app()->getLocale() . '_name'] }}
                                    </a>
                                </li>
                            @endforeach

                        </ul>
                    </div>
                    <div class="footer-social">
                        @if (
                            !empty(settings(session()->get('setting_id'), 'setting_id')) &&
                                !empty(settings(session()->get('setting_id'), 'setting_id')->social_media) &&
                                isset(settings(session()->get('setting_id'), 'setting_id')->social_media['facebook']) &&
                                !empty(settings(session()->get('setting_id'), 'setting_id')->social_media['facebook']))
                            <span>
                                <a class="btn-facebook" target="_blank"
                                    href="{{ settings(session()->get('setting_id'), 'setting_id')->social_media['facebook'] }}">
                                    <i class="houzez-icon icon-social-media-facebook mr-2"></i> </a>
                            </span>
                        @endif
                        @if (
                            !empty(settings(session()->get('setting_id'), 'setting_id')) &&
                                !empty(settings(session()->get('setting_id'), 'setting_id')->social_media) &&
                                isset(settings(session()->get('setting_id'), 'setting_id')->social_media['twitter']) &&
                                !empty(settings(session()->get('setting_id'), 'setting_id')->social_media['twitter']))
                            <span>
                                <a class="btn-twitter" target="_blank"
                                    href="{{ settings(session()->get('setting_id'), 'setting_id')->social_media['twitter'] }}">
                                    <i class="houzez-icon icon-x-logo-twitter-logo-2 mr-2"></i> </a>
                            </span>
                        @endif
                        @if (
                            !empty(settings(session()->get('setting_id'), 'setting_id')) &&
                                !empty(settings(session()->get('setting_id'), 'setting_id')->social_media) &&
                                isset(settings(session()->get('setting_id'), 'setting_id')->social_media['tiktok']) &&
                                !empty(settings(session()->get('setting_id'), 'setting_id')->social_media['tiktok']))
                            <span>
                                <a class="btn-googleplus" target="_blank"
                                    href="{{ settings(session()->get('setting_id'), 'setting_id')->social_media['tiktok'] }}">
                                    <i class="houzez-icon icon-social-tiktok-1 mr-2"></i> </a>
                            </span>
                        @endif
                        @if (
                            !empty(settings(session()->get('setting_id'), 'setting_id')) &&
                                !empty(settings(session()->get('setting_id'), 'setting_id')->social_media) &&
                                isset(settings(session()->get('setting_id'), 'setting_id')->social_media['linkedin']) &&
                                !empty(settings(session()->get('setting_id'), 'setting_id')->social_media['linkedin']))
                            <span>
                                <a class="btn-linkedin" target="_blank"
                                    href="{{ settings(session()->get('setting_id'), 'setting_id')->social_media['linkedin'] }}">
                                    <i class="houzez-icon icon-professional-network-linkedin mr-2"></i> </a>
                            </span>
                        @endif
                        @if (
                            !empty(settings(session()->get('setting_id'), 'setting_id')) &&
                                !empty(settings(session()->get('setting_id'), 'setting_id')->social_media) &&
                                isset(settings(session()->get('setting_id'), 'setting_id')->social_media['instagram']) &&
                                !empty(settings(session()->get('setting_id'), 'setting_id')->social_media['instagram']))
                            <span>
                                <a class="btn-instagram" target="_blank"
                                    href="{{ settings(session()->get('setting_id'), 'setting_id')->social_media['instagram'] }}">
                                    <i class="houzez-icon icon-social-instagram mr-2"></i> </a>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <div class="back-to-top-wrap">
        <a href="#top" id="scroll-top" class="btn btn-primary btn-back-to-top">
            <i class="houzez-icon icon-arrow-up-1"></i>
        </a>
    </div>
    @php
        $setting_id = session()->get('setting_id');
        $settings = settings($setting_id, 'setting_id');
        $whatsapp = $settings->social_media['whatsapp'] ?? null;
    @endphp

    @if (!empty($settings->social_media) && !empty($whatsapp))
        <a class="whatsappbuttontoupper" href="https://api.whatsapp.com/send?phone={{ $whatsapp }}"><i class="fa fa-whatsapp"></i></a>
    @endif

@endif
