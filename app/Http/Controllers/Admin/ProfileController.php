<?php


namespace App\Http\Controllers\Admin;


use App\Http\Requests\Admin\ProfileRequest;
use App\Models\Admin;
use App\Models\Field;
use Illuminate\Support\Facades\Hash;

class ProfileController extends BaseController {

    protected $modelClass = Admin::class;
    protected $title      = 'الملف الشخصي';
    protected $route      = 'profiles';

    function index($query = null)
    {
        $user = auth('admin')->user();
        return $this->response()->view('admin.profile.index', compact('user'));
    }

    function update(ProfileRequest $request)
    {
        $data = $request->only('name');
        if ($request->password)
            $data['password'] = Hash::make($request->password);
        if ($request->image)
            $data['image'] = $request->file('image')->store('images');
        return $this->saveData($data, auth('admin')->user());
    }
}