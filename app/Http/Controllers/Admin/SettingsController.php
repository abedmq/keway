<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;

class SettingsController extends BaseController
{


    protected $modelClass = Setting::class;
    protected $title = 'الاعدادات';
    protected $route = 'settings';

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($query = null)
    {
        return $this->response()->view('admin.settings.index');
    }

    function update(Request $request)
    {
        $this->validate($request, [
            'logo' => (!settings('logo') ? "required" : "nullable") . '|image',
            'image' => (!settings('image') ? "required" : "nullable") . '|image',
        ]);
        $data = $request->except('logo', 'image');
        if ($request->logo) {
            $name = $request->logo->store('original');
            $data['logo'] = resize_image($name);
        }
        if ($request->image) {
            $name = $request->image->store('original');
            $data['image'] = resize_image($name);
        }

        Setting::addORUpdate($data);
        return $this->response()->success("تم الحفظ بنجاح");
    }
}
