@if ($setting->domain == 'realestate.globalmart.az')
    <footer class="footer-wrap footer-wrap-v1">
        <div class="footer-top-wrap">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div id="houzez_about_widget-3" class="footer-widget widget widget-wrap widget-about-site">
                            <div class="widget-header">
                                <h3 class="widget-title">@lang('additional.fields.aboutsite')</h3>
                            </div>
                            <div class="widget-body">
                                <div class="widget-content">
                                    @if (
                                        !empty(setting(session()->get('setting_id'))->description) &&
                                            isset(setting(session()->get('setting_id'))->description[app()->getLocale() . '_name']) &&
                                            !empty(setting(session()->get('setting_id'))->description[app()->getLocale() . '_name']))
                                        <p>{{ setting(session()->get('setting_id'))->description[app()->getLocale() . '_name'] }}
                                        </p>
                                    @endif
                                </div>
                                @if (
                                    !empty(standartpages(session()->get('setting_id'), 'setting_id')) &&
                                        count(standartpages(session()->get('setting_id'), 'setting_id')) > 0)
                                    <div class="widget-read-more">
                                        <a
                                            href="{{ route('frontend.show', ['slug' => standartpages(session()->get('setting_id'), 'setting_id')->slugs[app()->getLocale() . '_slug'], 'page' => 'standartpages']) }}">@lang('additional.fields.readmore')
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div id="houzez_contact-7" class="footer-widget widget widget-wrap widget-contact-us">
                            <div class="widget-header">
                                <h3 class="widget-title">@lang('additional.fields.contactus')</h3>
                            </div>
                            <div class="widget-body">
                                <div class="widget-content">
                                    <p></p>
                                    <ul class="list-unstyled contact-list">
                                        @if (
                                            !empty(setting(session()->get('setting_id'), 'setting_id')->address) &&
                                                isset(setting(session()->get('setting_id'), 'setting_id')->address[app()->getLocale() . '_address']) &&
                                                !empty(setting(session()->get('setting_id'), 'setting_id')->address[app()->getLocale() . '_address']))
                                            <li><i class="houzez-icon icon-pin mr-1"></i>
                                                {{ setting(session()->get('setting_id'), 'setting_id')->address[app()->getLocale() . '_address'] }}
                                            </li>
                                        @endif
                                        @if (
                                            !empty(setting(session()->get('setting_id'), 'setting_id')->social_media) &&
                                                isset(setting(session()->get('setting_id'), 'setting_id')->social_media['phone']) &&
                                                !empty(setting(session()->get('setting_id'), 'setting_id')->social_media['phone']))
                                            <li><i class="houzez-icon icon-answer-machine mr-1"></i>
                                                {{ setting(session()->get('setting_id'), 'setting_id')->social_media['phone'] }}
                                            </li>
                                        @endif
                                        @if (
                                            !empty(setting(session()->get('setting_id'), 'setting_id')->social_media) &&
                                                isset(setting(session()->get('setting_id'), 'setting_id')->social_media['email']) &&
                                                !empty(setting(session()->get('setting_id'), 'setting_id')->social_media['email']))
                                            <li><i class="houzez-icon icon-envelope mr-1"></i> <a
                                                    href="mailto:{{ setting(session()->get('setting_id'), 'setting_id')->social_media['email'] }}"><span>{{ setting(session()->get('setting_id'), 'setting_id')->social_media['email'] }}</span></a>
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div id="mc4wp_form_widget-2" class="footer-widget widget widget-wrap widget_mc4wp_form_widget">
                            <div class="widget-header">
                                <h3 class="widget-title">@lang('additional.fields.newsletter')</h3>
                            </div>
                            <form id="mc4wp-form-1" class="mc4wp-form mc4wp-form-1251" method="post" data-id="1251"
                                data-name="Footer Form">
                                @csrf
                                <div class="mc4wp-form-fields">
                                    <div class="row">
                                        <div class="col-lg-8 col-md-8 col-sm-12">
                                            <div class="form-group mb-1">
                                                <div class="input-email input-icon">
                                                    <input class="form-control" type="email" name="email" required
                                                        placeholder="@lang('additional.fields.email')">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-12">
                                            <div class="form-group mb-1">
                                                <button type="submit"
                                                    class="btn btn-primary btn-block">@lang('additional.fields.submit')</button>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </form>
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
                            !empty(setting(session()->get('setting_id'), 'setting_id')) &&
                                !empty(setting(session()->get('setting_id'), 'setting_id')->social_media) &&
                                isset(setting(session()->get('setting_id'), 'setting_id')->social_media['facebook']) &&
                                !empty(setting(session()->get('setting_id'), 'setting_id')->social_media['facebook']))
                            <span>
                                <a class="btn-facebook" target="_blank"
                                    href="{{ setting(session()->get('setting_id'), 'setting_id')->social_media['facebook'] }}">
                                    <i class="houzez-icon icon-social-media-facebook mr-2"></i> </a>
                            </span>
                        @endif
                        @if (
                            !empty(setting(session()->get('setting_id'), 'setting_id')) &&
                                !empty(setting(session()->get('setting_id'), 'setting_id')->social_media) &&
                                isset(setting(session()->get('setting_id'), 'setting_id')->social_media['twitter']) &&
                                !empty(setting(session()->get('setting_id'), 'setting_id')->social_media['twitter']))
                            <span>
                                <a class="btn-twitter" target="_blank"
                                    href="{{ setting(session()->get('setting_id'), 'setting_id')->social_media['twitter'] }}">
                                    <i class="houzez-icon icon-x-logo-twitter-logo-2 mr-2"></i> </a>
                            </span>
                        @endif
                        @if (
                            !empty(setting(session()->get('setting_id'), 'setting_id')) &&
                                !empty(setting(session()->get('setting_id'), 'setting_id')->social_media) &&
                                isset(setting(session()->get('setting_id'), 'setting_id')->social_media['tiktok']) &&
                                !empty(setting(session()->get('setting_id'), 'setting_id')->social_media['tiktok']))
                            <span>
                                <a class="btn-googleplus" target="_blank"
                                    href="{{ setting(session()->get('setting_id'), 'setting_id')->social_media['tiktok'] }}">
                                    <i class="houzez-icon icon-social-tiktok-1 mr-2"></i> </a>
                            </span>
                        @endif
                        @if (
                            !empty(setting(session()->get('setting_id'), 'setting_id')) &&
                                !empty(setting(session()->get('setting_id'), 'setting_id')->social_media) &&
                                isset(setting(session()->get('setting_id'), 'setting_id')->social_media['linkedin']) &&
                                !empty(setting(session()->get('setting_id'), 'setting_id')->social_media['linkedin']))
                            <span>
                                <a class="btn-linkedin" target="_blank"
                                    href="{{ setting(session()->get('setting_id'), 'setting_id')->social_media['linkedin'] }}">
                                    <i class="houzez-icon icon-professional-network-linkedin mr-2"></i> </a>
                            </span>
                        @endif
                        @if (
                            !empty(setting(session()->get('setting_id'), 'setting_id')) &&
                                !empty(setting(session()->get('setting_id'), 'setting_id')->social_media) &&
                                isset(setting(session()->get('setting_id'), 'setting_id')->social_media['instagram']) &&
                                !empty(setting(session()->get('setting_id'), 'setting_id')->social_media['instagram']))
                            <span>
                                <a class="btn-instagram" target="_blank"
                                    href="{{ setting(session()->get('setting_id'), 'setting_id')->social_media['instagram'] }}">
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
@endif
