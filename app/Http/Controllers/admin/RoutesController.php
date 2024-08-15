<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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
                case 'faqs':
                    $pagename = 'faqs';
                    $title = 'F.A.Q.S';
                    $routename = 'faqs';
                    $data = faqs();
                    $fields = [
                        'namejson',
                        'status',
                        'setting',
                        'user_id',
                    ];
                    break;
                case 'managers':
                    $pagename = 'managers';
                    $title = 'İdarəçilər';
                    $routename = 'managers';
                    $data = users();
                    $fields = [
                        'name',
                        'email',
                    ];
                    break;
                case 'categories':
                    $pagename = 'categories';
                    $title = 'Kateqoriyalar';
                    $routename = 'categories';
                    $data = categories();
                    $fields = [
                        'imagejson',
                        'namejson',
                        'status',
                        'top_category_id',
                        'user_id',
                        'setting',
                    ];
                    break;
                case 'teams':
                    $pagename = 'teams';
                    $title = 'Komanda';
                    $routename = 'teams';
                    $data = teams();
                    $fields = [
                        'image',
                        'namejson',
                        'status',
                        'user_id',
                        'setting',
                    ];
                    break;
                case 'whychooseus':
                    $pagename = 'whychooseus';
                    $title = 'Niyə bizi seçirsiz';
                    $routename = 'whychooseus';
                    $data = whychooseus();
                    $fields = [
                        'imagejson',
                        'namejson',
                        'status',
                        'user_id',
                        'setting',
                    ];
                    break;
                case 'contactus':
                    $pagename = 'contactus';
                    $title = 'Bizimlə əlaqə';
                    $routename = 'contactus';
                    $data = contactus();
                    $fields = [
                        'user_info',
                        'ip_address',
                        'metta',
                        'setting',
                    ];
                    break;
                case 'services':
                    $pagename = 'services';
                    $title = 'Xidmətlər';
                    $routename = 'services';
                    $data = services();
                    $fields = [
                        'imagejson',
                        'video',
                        'namejson',
                        'status',
                        'user_id',
                        'setting',
                    ];
                    break;
                case 'products':
                    $pagename = 'products';
                    $title = 'Məhsullar';
                    $routename = 'products';
                    $data = products();
                    $fields = [
                        'imagejson',
                        'namejson',
                        'pricejson',
                        'category_id',
                        'status',
                        'user_id',
                        'setting',
                    ];
                    break;
                case 'partners':
                    $pagename = 'partners';
                    $title = 'Partnyorlar';
                    $routename = 'partners';
                    $data = partners();
                    $fields = [
                        'image',
                        'namejson',
                        'status',
                        'user_id',
                        'setting',
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
                        'slugjson',
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
                        'slugjson',
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
                case 'faqs':
                    $pagename = 'faqs';
                    $title = 'F.A.Q.S' . ($request->has("id") && !empty($request->input("id")) ? ' yenilə' : ' əlavə et');
                    $routename = 'faqs';
                    $data = $request->has('id') && !empty($request->input("id")) ? faqs($request->input("id"), 'id') : null;
                    $fields = [
                        'namejson',
                        'descjson',
                        'order_number',
                        'status',
                        'setting_id',
                    ];
                    break;
                case 'managers':
                    $pagename = 'managers';
                    $title = 'İdarəçi' . ($request->has("id") && !empty($request->input("id")) ? ' yenilə' : ' əlavə et');
                    $routename = 'managers';
                    $data = $request->has('id') && !empty($request->input("id")) ? users($request->input("id"), 'id') : null;
                    $fields = [
                        'name',
                        'email',
                        'password',
                    ];
                    break;
                case 'categories':
                    $pagename = 'categories';
                    $title = 'Kateqoriya' . ($request->has("id") && !empty($request->input("id")) ? ' yenilə' : ' əlavə et');
                    $routename = 'categories';
                    $data = $request->has('id') && !empty($request->input("id")) ? categories($request->input("id"), 'id') : null;
                    $fields = [
                        'namejson',
                        'slugjson',
                        'descjson',
                        'imagesjson',
                        'order_number',
                        'status',
                        'setting_id',
                        'top_category_id',
                    ];
                    break;
                case 'teams':
                    $pagename = 'teams';
                    $title = 'Komanda üzvü' . ($request->has("id") && !empty($request->input("id")) ? ' yenilə' : ' əlavə et');
                    $routename = 'teams';
                    $data = $request->has('id') && !empty($request->input("id")) ? teams($request->input("id"), 'id') : null;
                    $fields = [
                        'namejson',
                        'slugjson',
                        'descjson',
                        'socialjson',
                        'image',
                        'order_number',
                        'status',
                        'setting_id',
                    ];
                    break;
                case 'whychooseus':
                    $pagename = 'whychooseus';
                    $title = 'Niyə bizi seçməlisiniz' . ($request->has("id") && !empty($request->input("id")) ? ' yenilə' : ' əlavə et');
                    $routename = 'whychooseus';
                    $data = $request->has('id') && !empty($request->input("id")) ? whychooseus($request->input("id"), 'id') : null;
                    $fields = [
                        'namejson',
                        'descjson',
                        'imagesjson',
                        'order_number',
                        'status',
                        'setting_id',
                    ];
                    break;
                case 'contactus':
                    $pagename = 'contactus';
                    $title = 'Bizimlə əlaqə' . ($request->has("id") && !empty($request->input("id")) ? ' yenilə' : ' əlavə et');
                    $routename = 'contactus';
                    $data = $request->has('id') && !empty($request->input("id")) ? contactus($request->input("id"), 'id') : null;
                    $fields = [
                        'user_info',
                        'ip_address',
                        'meta',
                        'setting_id',
                    ];
                    break;
                case 'services':
                    $pagename = 'services';
                    $title = 'Xidmət' . ($request->has("id") && !empty($request->input("id")) ? ' yenilə' : ' əlavə et');
                    $routename = 'services';
                    $data = $request->has('id') && !empty($request->input("id")) ? services($request->input("id"), 'id') : null;
                    $fields = [
                        'namejson',
                        'slugjson',
                        'descjson',
                        'imagesjson',
                        'video',
                        'top_service_id',
                        'order_number',
                        'status',
                        'setting_id',
                    ];
                    break;
                case 'products':
                    $pagename = 'products';
                    $title = 'Məhsul' . ($request->has("id") && !empty($request->input("id")) ? ' yenilə' : ' əlavə et');
                    $routename = 'products';
                    $data = $request->has('id') && !empty($request->input("id")) ? products($request->input("id"), 'id') : null;
                    $fields = [
                        'namejson',
                        'slugjson',
                        'descjson',
                        'addressjson',
                        'imagesjson',
                        'pricejson',
                        'category_id',
                        'order_number',
                        'services_id',
                        'status',
                        'setting_id',
                    ];
                    break;
                case 'partners':
                    $pagename = 'partners';
                    $title = 'Partnyor' . ($request->has("id") && !empty($request->input("id")) ? ' yenilə' : ' əlavə et');
                    $routename = 'partners';
                    $data = $request->has('id') && !empty($request->input("id")) ? partners($request->input("id"), 'id') : null;
                    $fields = [
                        'namejson',
                        'slugjson',
                        'image',
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
    public function frontindex(Request $request){
        try {
            $page = $request->input("page") ?? 'welcome';
            $pagename = '';
            $title = '';
            $routename = '';
            $data = null;
            $pageparameters=[];

            if(!Session::has("setting_id") || empty(Session::get("setting_id"))){
                $host = $request->getHost();
                $all = settings();

                if (!empty($all) && count($all) > 0) {
                    foreach ($all as $set) {
                        if (strpos($host, $set->domain) !== false) {
                            Session::put('domain', $set->domain);
                            Session::put('setting_id', $set->domain);
                        }
                    }
                }
            }

            switch ($page) {
                case 'welcome':
                    $pagename = 'welcome';
                    $title = trans("additional.routename.welcome");
                break;
                case 'standartpage':
                    $data = standartpages($request->slug,'slug');
                    $pagename = 'standartpage';
                    $title = $data->name[app()->getLocale().'_name'];
                break;
                case 'blogs':
                    $data = blogs($request->slug,'setting_id');
                    $pagename = 'blogs';
                    $title = trans("additional.routename.blogs");
                break;
                case 'blog':
                    $data = blogs($request->slug,'slug');
                    $pagename = 'blog';
                    $title = $data->name[app()->getLocale().'_name'];
                break;
                case 'products':
                    $data = products($request->slug,'setting_id');
                    $pagename = 'products';
                    $title = trans("additional.routename.products_houses");
                case 'services':
                    $data = services($request->slug,'setting_id');
                    $pagename = 'services';
                    $title = trans("additional.routename.services");
                break;
                case 'product':
                    $data = products($request->slug,'slug');
                    $pagename = 'product';
                    $title = $data->name[app()->getLocale().'_name'];
                break;
                case 'service':
                    $data = services($request->slug,'slug');
                    $pagename = 'service';
                    $title = $data->name[app()->getLocale().'_name'];
                break;
                case 'partner':
                    $data = partners($request->slug,'slug');
                    $pagename = 'partner';
                    $title = $data->name[app()->getLocale().'_name'];
                break;
            }

            return view('frontend.'.$pagename,compact("page",'routename','title','data','pageparameters'));
        }catch (\Exception $e) {
            return [$e->getMessage(), $e->getLine()];
        }
    }
    public function frontshow(Request $request,$slug){
        try{
            $page = $request->input("page")?? 'welcome';
            $title = '';
            $routename = '';
            $data = null;
            $setting=settings(session()->get("setting_id"));

            switch ($page) {
                case 'teams':
                    $routename = 'teams';
                    $data=teams($slug,'slug');
                    $title = trans("additional.routename.team").' '.$data->name[app()->getLocale().'_name'];
                break;
                case 'services':
                    $routename = 'services';
                    $data=services($slug,'slug');
                    $title = trans("additional.routename.service").' '.$data->name[app()->getLocale().'_name'];
                break;
                case 'blogs':
                    $routename = 'blogs';
                    $data=blogs($slug,'slug');
                    $title = trans("additional.routename.blog").' '.$data->name[app()->getLocale().'_name'];
                break;
                case 'products':
                    $routename = 'products';
                    $data=products($slug,'slug');
                    $title = trans("additional.routename.product_house").' '.$data->name[app()->getLocale().'_name'];
                break;
                case 'standartpages':
                    $routename = 'standartpages';
                    $data=standartpages($slug,'slug');
                    $title = $data->name[app()->getLocale().'_name'];
                break;
            }

            return view('frontend.showpage',compact("page",'routename','title','data','setting'));
        }catch(\Exception $e){
            return response()->json(['status'=>'error','message'=>$e->getMessage(),'line'=>$e->getLine()]);
        }
    }
}
