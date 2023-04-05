<?php


use Intervention\Image\Facades\Image;

function settings($key, $defaultValue = false)
{
    $settings = Cache::remember('settings', 5000,
        function () {
            return \App\Models\Setting::get()->pluck('value', 'key')->toArray();
        }
    );
    return (isset($settings[$key]) ? $settings[$key] : ($defaultValue ?: ''));
}

function resize_image($name)
{
    $imgName = \Illuminate\Support\Str::replaceFirst('public/original/', '', $name);
    $imgName = \Illuminate\Support\Str::replaceFirst('original/', '', $imgName);
    $path = storage_path("app/$name");
    if (file_exists($path)) {
        $img = Image::make($path);
        image_resize_width($imgName, $img, 100);
        image_resize_width($imgName, $img, 400);
        image_resize_width($imgName, $img, 800);
        image_resize_width($imgName, $img, 1200);
        return $imgName;
    }
    return false;
}

function image_resize_width($name, $img, $with)
{
    $tmpImg = clone $img;
    $tmpImg->resize($with, null, function ($constraint) {
        $constraint->aspectRatio();
    });
    $newPath = storage_path("app/public/$with");
    if (!file_exists($newPath)) {
        mkdir($newPath);
    }
    $newPath .= "/" . $name;
    $tmpImg->save($newPath);
    return $newPath;
}

function get_images_group($id, $sizes = ['thump' => 100, 'low' => 400, 'med' => 800, 'high' => 1200])
{
    $images = [];
    foreach ($sizes as $key => $size) {
        if (!$id) {
            $images[$key] = '';
        } else {
            $path = storage_path("app/public/$size/$id");
            if (file_exists($path)) {
                $images[$key] = url("storage/$size/$id");
            }
        }
    }
    if ($id)
        $images['original'] = url('storage/original/' . $id);
    else
        $images['original'] = '';
    return $images;
}

function get_default_language_id()
{
    return \Illuminate\Support\Facades\Cache::remember('default_language', 3000, function () {
        return \App\Models\Language::where('is_default', 1)->first()->id;
    });
}

function get_language_id_by_code($code)
{
    return \Illuminate\Support\Facades\Cache::remember('language' . $code, 3000, function () use ($code) {
        return \App\Models\Language::where('code', $code)->first()->id;
    });
}

function custom_format($number)
{
    return number_format($number, 2, '.', '');
}
