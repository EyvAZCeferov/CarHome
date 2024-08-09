<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Settings;
use App\Models\Sliders;
use App\Models\Blogs;
use App\Models\Categories;
use App\Models\Faqs;
use App\Models\Partners;
use App\Models\Products;
use App\Models\ProductServices;
use App\Models\Services;
use App\Models\StandartPages;
use App\Models\Teams;
use App\Models\User;
use App\Models\WhyChooseUs;

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
                    break;
                case 'blogs':
                    $data = $request->has("id") && !empty($request->input("id")) ? blogs($request->input("id"), 'id') : new Blogs();
                    break;
                case 'standartpages':
                    $data = $request->has("id") && !empty($request->input("id")) ? standartpages($request->input("id"), 'id') : new StandartPages();
                    break;
                case 'sliders':
                    $data = $request->has("id") && !empty($request->input("id")) ? sliders($request->input("id"), 'id') : new Sliders();
                    break;
                case 'faqs':
                    $data = $request->has("id") && !empty($request->input("id")) ? faqs($request->input("id"), 'id') : new Faqs();
                    break;
                case 'managers':
                    $data = $request->has("id") && !empty($request->input("id")) ? users($request->input("id"), 'id') : new User();
                    break;
                case 'categories':
                    $data = $request->has("id") && !empty($request->input("id")) ? categories($request->input("id"), 'id') : new Categories();
                    break;
                case 'teams':
                    $data = $request->has("id") && !empty($request->input("id")) ? teams($request->input("id"), 'id') : new Teams();
                    break;
                case 'whychooseus':
                    $data = $request->has("id") && !empty($request->input("id")) ? whychooseus($request->input("id"), 'id') : new WhyChooseUs();
                    break;
                case 'services':
                    $data = $request->has("id") && !empty($request->input("id")) ? services($request->input("id"), 'id') : new Services();
                    break;
                case 'products':
                    $data = $request->has("id") && !empty($request->input("id")) ? products($request->input("id"), 'id') : new Products();
                    break;
                case 'partners':
                    $data = $request->has("id") && !empty($request->input("id")) ? partners($request->input("id"), 'id') : new Partners();
                    break;
            }

            if (($request->has("user_id") && !empty($request->input("user_id"))) && $page != 'managers')
                $data->user_id = $request->input("user_id");

            if ($request->has("setting_id") && !empty($request->input("setting_id")))
                $data->setting_id = $request->input("setting_id");

            if ($request->has("category_id") && !empty($request->input("category_id")))
                $data->category_id = $request->input("category_id");

            if ($request->has("top_service_id") && !empty($request->input("top_service_id")))
                $data->top_service_id = $request->input("top_service_id");

            if ($request->has("order_number") && !empty($request->input("order_number")))
                $data->order_number = $request->input("order_number") ?? 1;

            if ($request->has("status") && !empty($request->input("status")))
                $data->status = $request->input("status") == 'on' ? true : false;

            if ($request->has("prices") && !empty($request->input("prices")))
                $data->prices = $request->input("prices") ?? ['price' => 0, 'endirim_price' => 0];

            if ($request->hasFile("image_or_video") && !empty($request->image_or_video))
                $data->image_or_video = image_upload($request->image_or_video, 'images');

            if ($request->hasFile("image") && !empty($request->image))
                $data->image = image_upload($request->image, 'images');

            if ($request->hasFile("video") && !empty($request->video))
                $data->video = image_upload($request->video, 'images');

            if ($request->has("type_of") && !empty($request->input("type_of")))
                $data->type_of = $request->input("type_of") ?? 'image';

            if ($request->has("name") && !empty($request->input("name")))
                $data->name = $request->input("name");

            if ($request->has("emailuser") && !empty($request->input("emailuser")))
                $data->email = $request->input("emailuser");

            if ($request->has("password") && !empty($request->input("password")))
                $data->password = bcrypt($request->input("password"));

            if ($request->has("top_category_id") && !empty($request->input("top_category_id")))
                $data->top_category_id = bcrypt($request->input("top_category_id"));

            if ($request->has("button_data") && !empty($request->input("button_data")))
                $data->button_data = $request->input("button_data") ?? [];

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
                    'az_slug' => $request->input("az_slug") ?? Str::slug(trim($name['az_name'])),
                    'ru_slug' => $request->input("ru_slug") ?? Str::slug(trim($name['ru_name'])),
                    'en_slug' => $request->input("en_slug") ?? Str::slug(trim($name['en_name'])),
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
                $images = !empty($data->images) && count($data->images) > 0 ? $data->images : [];

                foreach ($request->images as $image) {
                    $image = image_upload($image, 'images');
                    array_push($images, $image);
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

            if ($request->has("services") && !empty($request->input("services"))) {
                $prservs = null;
                if (!empty($data) && isset($data->id))
                    $prservs = product_has_service(null, $data->id);

                if (!empty($prservs) && count($prservs) > 0) {
                    foreach ($prservs as $prs) {
                        $prs->delete();
                    }
                }

                foreach ($request->services as $serv) {
                    $product_has_service = new ProductServices();
                    $product_has_service->product_id = $data->id;
                    $product_has_service->service_id = $serv;
                    $product_has_service->user_id = $request->input("user_id") ?? auth()->id();
                    $product_has_service->save();
                }
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
                case 'sliders':
                    $data = sliders($request->input("id"));
                    break;
                case 'faqs':
                    $data = faqs($request->input("id"));
                    break;
                case 'managers':
                    $data = users($request->input("id"));
                    break;
                case 'categories':
                    $data = categories($request->input("id"));
                    break;
                case 'teams':
                    $data = teams($request->input("id"));
                    break;
                case 'whychooseus':
                    $data = whychooseus($request->input("id"));
                    break;
                case 'services':
                    $data = services($request->input("id"));
                    break;
                case 'products':
                    $data = products($request->input("id"));
                    break;
                case 'partners':
                    $data = partners($request->input("id"));
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
    public function delete_image(Request $request)
    {
        try {
            $data = collect();
            switch ($request->input("routename")) {
                case 'blogs':
                    $data = blogs($request->input("id"), 'id');
                case 'standartpages':
                    $data = standartpages($request->input("id"), 'id');
                case 'categories':
                    $data = categories($request->input("id"), 'id');
                case 'whychooseus':
                    $data = whychooseus($request->input("id"), 'id');
                case 'services':
                    $data = services($request->input("id"), 'id');
                case 'products':
                    $data = products($request->input("id"), 'id');
            }

            if (!empty($data) && isset($data->id)) {
                $images = $data->images ?? [];
                $image = $request->input("image");
                if (($key = array_search($image, $images)) !== false) {
                    unset($images[$key]);
                }

                $images = array_values($images);
                $data->images = $images;

                $data->update();
                return response()->json(['status' => 'success', 'message' => "Silindi"]);
            } else {
                return response()->json(['status' => 'warning', 'message' => "Məlumat tapılmadı"]);
            }
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage(), 'line' => $e->getLine()]);
        } finally {
            dbdeactive();
        }
    }
}
