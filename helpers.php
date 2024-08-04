<?php

use App\Models\User;
use App\Models\Blogs;
use App\Models\Categories;
use App\Models\ContactUs;
use App\Models\Faqs;
use App\Models\Products;
use App\Models\ProductServices;
use App\Models\Services;
use App\Models\Settings;
use App\Models\Sliders;
use App\Models\StandartPages;
use App\Models\Teams;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Cache;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;
use Stichoza\GoogleTranslate\GoogleTranslate;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

if (!function_exists('getImageUrl')) {
    function getImageUrl($image, $clasore)
    {
        $url = public_path('uploads/' . $clasore . '/' . $image);
        try {
            $tempurl = '/uploads/' . $clasore . '/' . $image;
            return url($tempurl);
        } catch (\Exception $e) {
            Log::info([
                '----------------GET IMAGE ERROR-----------------',
                $e->getMessage(),
                $e->getLine()
            ]);
            return url($tempurl);
        }
    }
}

if (!function_exists('strip_tags_with_whitespace')) {
    function strip_tags_with_whitespace($string, $allowable_tags = null)
    {
        $string = str_replace('<', ' <', $string);
        $string = preg_replace('/\p{Z}/u', ' ', $string);
        $string = str_replace(['&nbsp;', '\u{A0}'], ' ', $string);
        $string = strip_tags($string, $allowable_tags);
        $string = preg_replace('/\s+/', ' ', $string);
        $string = trim($string);

        return $string;
    }
}

if (!function_exists('createRandomCode')) {
    function createRandomCode($type = "int", $length = 4)
    {
        if ($type == "int") {
            if ($length == 4) {
                return random_int(1000, 9999);
            }
        } elseif ($type == "string") {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            return $randomString;
        }
    }
}

if (!function_exists('dbdeactive')) {
    function dbdeactive()
    {
        DB::connection()->disconnect();
        Cache::flush();
    }
}

if (!function_exists('image_upload')) {
    function image_upload($image, $clasor, $imagename = null)
    {
        try {
            $filename = $imagename ?? time() . '.' . $image->extension();
            $image->storeAs($clasor, $filename, 'uploads');
            return $filename;
        } catch (\Exception $e) {
            Log::info([
                '------------------IMAGE UPLOAD ERROR-----------------',
                $e->getMessage(),
                $e->getLine(),
            ]);
        }
    }
}

if (!function_exists('file_upload')) {
    function file_upload($file, $clasor, $name = null)
    {
        $filename = $name ?? time() . '.' . $file->getClientOriginalExtension();
        $file->storeAs($clasor, $filename, 'uploads');
        return $filename;
    }
}

if (!function_exists('delete_image')) {

    function delete_image($image, $clasor)
    {
        if (Storage::disk('uploads')->exists($clasor . '/' . $image)) {
            Storage::disk('uploads')->delete($clasor . '/' . $image);
            return true;
        }
        return false;
    }
}

if (!function_exists("translateWithFallback")) {
    function translateWithFallback($text, $targetLanguage)
    {
        try {
            return trim(GoogleTranslate::trans($text, $targetLanguage));
        } catch (\Exception $e) {
            return $text;
        }
    }
}

if (!function_exists('settings')) {
    function settings($key = null, $type = null)
    {
        $model = Settings::orderBy('id', 'DESC');
        if (isset($key) && !empty($key)) {
            if ($type == 'domain')
                $model = $model->where('domain', $key);
            else
                $model = $model->where("id", $key);

            $model = $model->first();
        } else {
            $model = $model->get();
        }
        return Cache::rememberForever("settings" . $key . $type . Session::getId(), fn () => $model);
    }
}

if (!function_exists('categories')) {
    function categories($key = null, $type = null)
    {
        $model = Categories::orderBy('id', 'DESC');
        if (isset($key) && !empty($key)) {
            if ($type == 'setting_id')
                $model = $model->where('setting_id', $key)->get();
            else if ($type == 'slug')
                $model = $model->where('slugs->az_slug', $key)->where('slugs->en_slug', $key)->where('slugs->ru_slug', $key)->first();
            else if($type=='id')
                $model = $model->where("id", $key)->first();
        } else {
            $model = $model->get();
        }
        return Cache::rememberForever("categories" . $key . $type, fn () => $model);
    }
}

if (!function_exists('standartpages')) {
    function standartpages($key = null, $type = null)
    {
        $model = StandartPages::orderBy('id', 'DESC');
        if (isset($key) && !empty($key)) {
            if ($type == 'setting_id')
                $model = $model->where('setting_id', $key)->get();
            else if ($type == 'slug')
                $model = $model->where('slugs->az_slug', $key)->where('slugs->en_slug', $key)->where('slugs->ru_slug', $key)->first();
            else if($type=='id')
                $model = $model->where("id", $key)->first();
        } else {
            $model = $model->get();
        }
        return Cache::rememberForever("standartpages" . $key . $type, fn () => $model);
    }
}

if (!function_exists('blogs')) {
    function blogs($key = null, $type = null)
    {
        $model = Blogs::orderBy('id', 'DESC');
        if (isset($key) && !empty($key)) {
            if ($type == 'setting_id')
                $model = $model->where('setting_id', $key)->get();
            else if ($type == 'slug')
                $model = $model->where("slugs->az_slug", $key)->orWhere("slugs->ru_slug", $key)->orWhere("slugs->en_slug", $key)->first();
            else
                $model = $model->where("id", $key)->first();
        } else {
            $model = $model->get();
        }
        return Cache::rememberForever("blogs" . $key . $type . Session::getId(), fn () => $model);
    }
}

if (!function_exists('users')) {
    function users($key = null)
    {
        $model = User::orderBy('id', 'DESC');
        if (isset($key) && !empty($key)) {
            $model = $model->where('id', $key)->first();
        } else {
            $model = $model->get();
        }
        return Cache::rememberForever("users" . $key, fn () => $model);
    }
}
