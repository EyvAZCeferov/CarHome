<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RoutesController extends Controller
{
    public function index(Request $request)
    {
        try {
            $page = $request->input("page") ?? 'welcome';
            $pagename = '';
            $title = '';
            $routename = '';
            $fields = [];
            $data = null;
            switch ($page) {
                case 'welcome':
                    $pagename = 'welcome';

                    $data = null;
                    break;
                case 'settings':
                    $pagename = 'settings';
                    $title = 'Parametrlər';
                    $routename = 'settings';
                    $data = settings();
                    $fields = [
                        'logojson',
                        'namejson',
                        'addressjson',
                        'domain',
                        'user_id',
                    ];
                    break;
                case 'blogs':
                    $pagename = 'blogs';
                    $title = 'Bloqlar';
                    $routename = 'blogs';
                    $data = blogs();
                    $fields = [
                        'imagejson',
                        'namejson',
                        'status',
                        'setting',
                        'user_id',
                    ];
                    break;
                case 'standartpages':
                    $pagename = 'standartpages';
                    $title = 'Standart səhifələr';
                    $routename = 'standartpages';
                    $data = standartpages();
                    $fields = [
                        'imagejson',
                        'namejson',
                        'status',
                        'setting',
                        'user_id',
                    ];
                    break;
                case 'sliders':
                    $pagename = 'sliders';
                    $title = 'Slayderlər';
                    $routename = 'sliders';
                    $data = sliders();
                    $fields = [
                        'image_or_video',
                        'namejson',
                        'status',
                        'setting',
                        'user_id',
                    ];
                    break;
            }

            $pageparams = [
                'pagename' => $pagename,
                'title' => $title,
                'routename' => $routename,
                'fields' => $fields
            ];
            return view("backend.pages.index", compact('data', 'pageparams'));
        } catch (\Exception $e) {
            return [$e->getMessage(), $e->getLine()];
        }
    }

    public function create_edit(Request $request)
    {
        try {
            $page = $request->input("page") ?? 'welcome';
            $pagename = '';
            $title = '';
            $routename = '';
            $data = null;
            $fields = [];
            switch ($page) {
                case 'welcome':
                    $pagename = 'welcome';

                    $data = null;
                    break;
                case 'settings':
                    $pagename = 'settings';
                    $title = 'Parametr' . ($request->has("id") && !empty($request->input("id")) ? ' yenilə' : ' əlavə et');
                    $routename = 'settings';
                    $data = $request->has('id') && !empty($request->input("id")) ? settings($request->input("id"), 'id') : null;
                    $fields = [
                        'namejson',
                        'descjson',
                        'addressjson',
                        'socialjson',
                        'logojson',
                        'langsjson',
                        'slug',
                        'domain',
                    ];
                    break;
                case 'blogs':
                    $pagename = 'blogs';
                    $title = 'Bloqlar' . ($request->has("id") && !empty($request->input("id")) ? ' yenilə' : ' əlavə et');
                    $routename = 'blogs';
                    $data = $request->has('id') && !empty($request->input("id")) ? blogs($request->input("id"), 'id') : null;
                    $fields = [
                        'namejson',
                        'descjson',
                        'imagesjson',
                        'order_number',
                        'status',
                        'setting_id',
                        'category_id',
                    ];
                    break;
                case 'standartpages':
                        $pagename = 'standartpages';
                        $title = 'Standart səhifə' . ($request->has("id") && !empty($request->input("id")) ? ' yenilə' : ' əlavə et');
                        $routename = 'standartpages';
                        $data = $request->has('id') && !empty($request->input("id")) ? standartpages($request->input("id"), 'id') : null;
                        $fields = [
                            'namejson',
                            'descjson',
                            'imagesjson',
                            'order_number',
                            'status',
                            'setting_id',
                        ];
                        break;

                case 'sliders':
                    $pagename = 'sliders';
                    $title = 'Slayder' . ($request->has("id") && !empty($request->input("id")) ? ' yenilə' : ' əlavə et');
                    $routename = 'sliders';
                    $data = $request->has('id') && !empty($request->input("id")) ? sliders($request->input("id"), 'id') : null;
                    $fields = [
                        'namejson',
                        'descjson',
                        'image_or_video',
                        'type_of_slider_image_or_video',
                        'button_data',
                        'order_number',
                        'status',
                        'setting_id',
                    ];
                    break;
            }

            $pageparams = [
                'pagename' => $pagename,
                'title' => $title,
                'routename' => $routename,
                'fields' => $fields
            ];
            return view("backend.pages.create_edit", compact('data', 'pageparams'));
        } catch (\Exception $e) {
            return [$e->getMessage(), $e->getLine()];
        }
    }
}
