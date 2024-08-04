<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Settings;
use App\Models\Blogs;
use App\Models\StandartPages;

class FunctionsController extends Controller
{
    public function store_update(Request $request)
    {
        try {
            $page = $request->input("page") ?? 'welcome';
            $data = collect();
            switch ($page) {
                case 'settings':
                    $data = $request->has("id") && !empty($request->input("id")) ? settings($request->input("id"), 'id') : new Settings();
                case 'blogs':
                    $data = $request->has("id") && !empty($request->input("id")) ? blogs($request->input("id"), 'id') : new Blogs();
                case 'standartpages':
                    $data = $request->has("id") && !empty($request->input("id")) ? standartpages($request->input("id"), 'id') : new StandartPages();
                case 'sliders':
                    $data = $request->has("id") && !empty($request->input("id")) ? sliders($request->input("id"), 'id') : new Sliders();
            }

            if ($request->has("user_id") && !empty($request->input("user_id")))
                $data->user_id = $request->input("user_id");

            if ($request->has("setting_id") && !empty($request->input("setting_id")))
                $data->setting_id = $request->input("setting_id");

            if ($request->has("category_id") && !empty($request->input("category_id")))
                $data->category_id = $request->input("category_id");

            if ($request->has("order_number") && !empty($request->input("order_number")))
                $data->order_number = $request->input("order_number")??1;

            if ($request->has("status") && !empty($request->input("status")))
                $data->status = $request->input("status")=='on'?true:false;

            if ($request->has("image_or_video") && !empty($request->input("image_or_video")))
                $data->image_or_video = image_upload($request->image_or_video,'images');

            if ($request->has("type_of") && !empty($request->input("type_of")))
                $data->type_of = $request->input("type_of")??'image';

            if ($request->has("button_data") && !empty($request->input("button_data")))
                $data->button_data = $request->input("button_data")??[];

            if ($request->has("az_name") && !empty($request->input("az_name"))) {
                $name = [
                    'az_name' => trim($request->az_name) ?? " ",
                    'ru_name' => $request->ru_name ?? translateWithFallback($request->az_name, 'ru'),
                    'en_name' => $request->en_name ?? translateWithFallback($request->az_name, 'en'),
                ];
                $data->name = $name;
            }

            if ($request->has("az_address") && !empty($request->input("az_address"))) {
                $address = [
                    'az_address' => trim($request->az_address) ?? " ",
                    'ru_address' => $request->ru_address ?? translateWithFallback($request->az_address, 'ru'),
                    'en_address' => $request->en_address ?? translateWithFallback($request->az_address, 'en'),
                ];
                $data->address = $address;
            }

            if ($request->has("az_description") && !empty($request->input("az_description"))) {
                $description = [
                    'az_description' => trim($request->az_description) ?? " ",
                    'ru_description' => $request->ru_description ?? translateWithFallback($request->az_description, 'ru'),
                    'en_description' => $request->en_description ?? translateWithFallback($request->az_description, 'en'),
                ];
                $data->description = $description;
            }

            if ($request->has("az_slug") && !empty($request->input("az_slug"))) {
                $slugs = [
                    'az_slug' => Str::slug(trim($name['az_name'])),
                    'ru_slug' => Str::slug(trim($name['ru_name'])),
                    'en_slug' => Str::slug(trim($name['en_name'])),
                ];
                $data->slugs = $slugs;
            }

            if ($request->has("logo") && !empty($request->logo)) {
                $logos = [];
                $logo = null;
                $logo_white = null;
                if ($request->hasFile('logo')) {
                    $logo = image_upload($request->file("logo"), 'images');
                }

                if ($request->hasFile('logo_white')) {
                    $logo_white = image_upload($request->file("logo_white"), 'images');
                }

                $logos = ['logo' => $logo, 'logo_white' => $logo_white];
                $data->logos = $logos;
            }

            if ($request->has("images") && !empty($request->images)) {
                $images = !empty($data->images) && count($data->images)>0 ? $data->images : [];

                foreach($request->images as $image){
                    $image = image_upload($image,'images');
                    array_push($images,$image);
                }

                $images = array_values($images);
                $data->images = $images;
            }

            if ($request->has("domain") && !empty($request->input("domain"))) {
                $data->domain = $request->input("domain");
            }

            if (
                ($request->has("twitter") && !empty($request->input("twitter"))) ||
                ($request->has("facebook") && !empty($request->input("facebook"))) ||
                ($request->has("linkedin") && !empty($request->input("linkedin"))) ||
                ($request->has("instagram") && !empty($request->input("instagram"))) ||
                ($request->has("tiktok") && !empty($request->input("tiktok"))) ||
                ($request->has("telegram") && !empty($request->input("telegram"))) ||
                ($request->has("whatsapp") && !empty($request->input("whatsapp"))) ||
                ($request->has("phone") && !empty($request->input("phone"))) ||
                ($request->has("email") && !empty($request->input("email"))) ||
                ($request->has("maps_google") && !empty($request->input("maps_google")))
            ) {
                $social_media = [
                    'twitter' => isset($request->twitter) && !empty($request->twitter) ? $request->twitter : " ",
                    'facebook' => isset($request->facebook) && !empty($request->facebook) ? $request->facebook : " ",
                    'linkedin' => isset($request->linkedin) && !empty($request->linkedin) ? $request->linkedin : " ",
                    'instagram' => isset($request->instagram) && !empty($request->instagram) ? $request->instagram : " ",
                    'tiktok' => isset($request->tiktok) && !empty($request->tiktok) ? $request->tiktok : " ",
                    'telegram' => isset($request->telegram) && !empty($request->telegram) ? $request->telegram : " ",
                    'whatsapp' => isset($request->whatsapp) && !empty($request->whatsapp) ? $request->whatsapp : " ",
                    'phone' => isset($request->phone) && !empty($request->phone) ? $request->phone : " ",
                    'email' => isset($request->email) && !empty($request->email) ? $request->email : " ",
                    'maps_google' => isset($request->maps_google) && !empty($request->maps_google) ? $request->maps_google : " ",
                ];
                $data->social_media = $social_media;
            }

            if ($request->has("langs") && !empty($request->input("langs"))) {
                $data->langs = $request->input("langs");
            }

            if ($request->has("id") && !empty($request->input("id")))
                $data->update();
            else
                $data->save();

            return redirect(route('admin.index', ['page' => $request->input("page")]))->with("success", 'Uğurlu');
        } catch (\Exception $e) {
            return [$e->getMessage(), $e->getLine()];
        } finally {
            dbdeactive();
        }
    }
    public function destroy(Request $request)
    {
        try {
            $page = $request->input("page") ?? 'welcome';
            $data = null;
            switch ($page) {
                case 'settings':
                    $data = settings($request->input("id"));
                    break;
                case 'blogs':
                    $data = blogs($request->input("id"));
                    break;
                case 'standartpages':
                    $data = standartpages($request->input("id"));
                    break;
            }

            if (!empty($data) && isset($data->id)) {
                $data->delete();
            }

            return redirect(route("admin.index", ['page' => $page]))->with('success', 'Uğurlu');
        } catch (\Exception $e) {
            return [$e->getMessage(), $e->getLine()];
        } finally {
            dbdeactive();
        }
    }
    public function delete_image(Request $request){
        try{
            $data = collect();
            switch($request->input("routename")){
                case 'blogs':
                    $data = blogs($request->input("id"),'id');
                case 'standartpages':
                    $data = standartpages($request->input("id"),'id');
            }

            if(!empty($data) && isset($data->id)){
                $images = $data->images ?? [];
                $image = $request->input("image");
                if(($key = array_search($image, $images)) !== false) {
                    unset($images[$key]);
                }

                $images = array_values($images);
                $data->images=$images;

                $data->update();
                return response()->json(['status'=>'success','message'=>"Silindi"]);
            }else{
                return response()->json(['status'=>'warning','message'=>"Məlumat tapılmadı"]);
            }
        }catch(\Exception $e){
            return response()->json(['status'=>'error','message'=>$e->getMessage(),'line'=>$e->getLine()]);
        } finally{
            dbdeactive();
        }
    }
}
