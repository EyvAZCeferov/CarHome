@extends('frontend.layouts.app')
@section('title', $title)
@section('content')
    
        <section class="content-wrap" style="transform: none;">
            <div class="container" style="transform: none;">
                <section class="blog-wrap houzez-blog-top">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 bt-content-wrap">
                                @if(!empty($data) && count($data)>0)
                                @foreach($data as $dat)
                                <div class="article-wrap w-100">
                                    <article class="post-wrap w-100">
                                        @if(!empty($dat->images) && count($dat->images))
                                        <div class="post-thumbnail-wrap">
                                            <a
                                                href="{{ route("frontend.show",['slug'=>$dat->slugs[app()->getLocale().'_slug']]) }}">
                                                <img fetchpriority="high" width="1024" height="768"
                                                    src="{{ getImageUrl($dat->images[0],'images') }}"
                                                    data-src="{{ getImageUrl($dat->images[0],'images') }}"
                                                    class="houzez-lazyload img-fluid wp-post-image" alt decoding="async"
                                                    srcset
                                                    data-srcset="{{ getImageUrl($dat->images[0],'images') }} 1024w, {{ getImageUrl($dat->images[0],'images') }} 300w, {{ getImageUrl($dat->images[0],'images') }} 768w, {{ getImageUrl($dat->images[0],'images') }} 592w, {{ getImageUrl($dat->images[0],'images') }} 584w, {{ getImageUrl($dat->images[0],'images') }} 800w, {{ getImageUrl($dat->images[0],'images') }} 120w, {{ getImageUrl($dat->images[0],'images') }} 496w, {{ getImageUrl($dat->images[0],'images') }} 1170w"
                                                    sizes="(max-width: 1024px) 100vw, 1024px" />
                                            </a>
                                        </div>
                                        @endif
                                        <div class="post-inner-wrap">
                                            <div class="post-title-wrap">
                                                <h2>
                                                    <a
                                                        href="{{ route("frontend.show",['slug'=>$dat->slugs[app()->getLocale().'_slug']]) }}">{{ $dat->name[app()->getLocale().'_name'] }}</a>
                                                </h2>
                                            </div>
                                            <div class="post-excerpt-wrap">
                                                <p>
                                                    {{ mb_substr(strip_tags_with_whitespace($dat->description[app()->getLocale() . '_description']), 0, 50) }}...
                                                </p>
                                            </div>
                                        </div>
                                        <div class="post-footer-wrap">
                                            <div class="d-flex">
                                                <ul class="list-unstyled list-inline author-meta flex-grow-1">
                                                   
                                                    <li class="list-inline-item">
                                                        <i class="houzez-icon icon-calendar-3 mr-1"></i> {{$dat->created_at->format('d.m.Y')}}
                                                    </li>
                                                    @if(!empty($dat->category) && isset($dat->category->id))
                                                    <li class="list-inline-item">
                                                        <i class="houzez-icon icon-tags mr-1"></i>
                                                        <a href="javascript:void(0)"
                                                            rel="category tag">{{ $dat->category->name[app()->getLocale().'_name'] }}</a>
                                                    </li>
                                                    @endif
                                                </ul>
                                                <a class="btn btn-primary"
                                                    href="{{ route("frontend.show",['slug'=>$dat->slugs[app()->getLocale().'_slug']]) }}">@lang("additional.fields.readmore")</a>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                                @endforeach
                                @else 
                                    <p class="text-center text-danger">@lang("additional.fields.notfound")</p>
                                @endif

                            </div>
                            
                        </div>
                    </div>
                </section>
            </div>
        </section>
@endsection
