@extends('backend.layouts.main')
@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
@endpush
@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
    <script>
        $('select').selectpicker();
    </script>
@endpush
@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>{{ $pageparams['title'] }}</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.index', ['page' => 'welcome']) }}">Dashboard</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.index', ['page' => $pageparams['routename']]) }}">{{ $pageparams['title'] }}</a>
                </li>
            </ol>
        </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox ">
                    <div class="ibox-title">
                        <div class="ibox-tools mb-3">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="fullscreen-link">
                                <i class="fa fa-expand"></i>
                            </a>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                        <div class="row align-items-center">
                            <div class="col-6">
                                <h5>{{ $pageparams['title'] }}</h5>
                            </div>
                            <div class="col-6 text-right">
                                <a href="{{ route('admin.index', ['page' => $pageparams['routename']]) }}"
                                    class="btn btn-w-m btn-default">Geri</a>
                            </div>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <form
                            @if (isset($data) && !empty($data) && isset($data->id)) action="{{ route('admin.store_update', ['page' => $pageparams['routename'], 'id' => $data->id]) }}" @else action="{{ route('admin.store_update', ['page' => $pageparams['routename']]) }}" @endif
                            method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="user_id" value="{{ auth()->id() }}" />
                            <input type="hidden" name="page" value="{{ $pageparams['routename'] }}" />
                            @csrf

                            @include('backend.parts.language_fields', [
                                'name' => in_array('namejson', $pageparams['fields']),
                                'description' => in_array('descjson', $pageparams['fields']),
                                'address' => in_array('addressjson', $pageparams['fields']),
                                'data' => isset($data) && !empty($data) ? $data : null,
                            ])

                            @if (in_array('socialjson', $pageparams['fields']))
                                @include('backend.pages.parts.socialmediafields', [
                                    'data' => $data->social_media ?? null,
                                ])
                            @endif

                            @if (in_array('logojson', $pageparams['fields']))
                                @include('backend.pages.parts.logofields', [
                                    'data' => $data->logos ?? null,
                                ])
                            @endif

                            <div class="row">
                                @include('backend.pages.parts.inputfield', [
                                    'data' => $data->domain ?? null,
                                    'name' => 'domain',
                                    'label' => 'Domen',
                                    'type' => 'text',
                                ])

                                @if (in_array('langsjson', $pageparams['fields']))
                                    @include('backend.pages.parts.langjson', [
                                        'data' => $data->langs ?? null,
                                        'label' => 'İstifadə ediləcək dillər',
                                    ])
                                @endif
                            </div>
                            <br />

                            <button class="btn btn-primary btn-block">Saxla</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
