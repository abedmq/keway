<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ImagesController extends Controller
{

    private $photos_path;

    public function __construct()
    {
        $this->photos_path = storage_path('app/images');
        $this->cache = storage_path('app/cache');
    }


    /**
     * Display all of the images.
     *
     * @return \Illuminate\Http\Response
     */


    function uploadImageCK(Request $request)
    {
        if ($request->hasFile('file')) {
            $name = $request->file->store('original');
            $file = resize_image($name);
            return response(['status' => true, 'filename' => url(get_images_group($file)['med']??'')]);
        }
    }

}
