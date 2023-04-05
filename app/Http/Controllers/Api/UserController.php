<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserProfileResource;
use App\Models\Language;
use App\Models\Message;
use App\Models\User;
use App\Models\UserSetting;
use App\Notifications\SendCodeNotification;
use App\Rules\Mobile;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    //
    function profile(Request $request)
    {
        return new UserProfileResource($request->user());
    }

    function updateProfile(Request $request)
    {
        $this->validate($request, [
            'name' => '',
            'password' => 'nullable|min:6,max:255',
            'old_password' => '',
            'image' => 'nullable|image|max:4096',
            'identity_image' => 'nullable|image|max:4096',
            'mobile' => ['nullable', new Mobile(), 'unique:users'],
            'language' => 'nullable|exists:languages,code',
            'services_id' => 'nullable|array',
            'services_id.*' => 'nullable|exists:services,id',
            'lat' => '',
            'lng' => 'required_with:lat',
        ], [
            'services_id.*.exists' => 'الرجاء اختيار خدمة صحيحة',
        ]);
        $data = $request->only('name');
        $user = $request->user();

        if ($request->password) {
            if (Hash::check($request->old_password, $user->password)) {
                $data['password'] = $request->password;
            } else {
                return $this->response()->error('api.error_old_password');
            }
        }
        if ($request->mobile) {
            $data['new_mobile'] = $request->mobile;
            $user->sendMobileCode('new_mobile');

        }

        if ($request->image) {
            $name = $request->image->store("public/original");
            $imgName = resize_image($name);
            if ($imgName)
                $data['image'] = $imgName;
        }
        if ($request->identity_image) {
            $name = $request->identity_image->store("public/original");
            $imgName = resize_image($name);
            if ($imgName)
                $data['identity_image'] = $imgName;
        }

        if ($request->language) {
            $data['language_id'] = Language::whereCode($request->language)->first()->id;
        }

        if ($request->lat && $user->isProvider()) {
            $data['lat'] = $request->lat;
            $data['lng'] = $request->lng;
        }

        if ($request->services_id && $user->isProvider()) {
            $user->services()->sync($request->services_id);
        }

        $user->update($data);
        return $this->response()->resource(new UserProfileResource($user));
    }

    function activateNewMobile(Request $request)
    {
        $this->validate($request, [
            'code' => 'required',
        ]);
        $user = $request->user();

        if (!$user->new_mobile) {
            return $this->response()->error('auth.active_user');
        } else if ($user->mobile_code == $request->code) {
            $user->update(['mobile_verified_at' => Carbon::now(), 'mobile_code' => '', 'mobile' => $user->new_mobile, 'new_mobile' => '']);
            return new UserProfileResource($user);
        } else {
            return $this->response()->error('auth.mobile_code_error');
        }
    }


    function logout(Request $request)
    {
        $request->user()->logout(!$request->other_devices);
        return $this->response()->success($request->other_devices ? 'api.logout_all' : 'api.logout');
    }


    function contactUs(Request $request)
    {
        $this->validate($request, [
            'message' => 'required',
            'email' => 'required|email',
        ]);
        $user = $request->user();
        if ($user->messages()->where('created_at', '>', Carbon::now()->subHour())->first()) {
            return $this->response()->error('api.contact_send_before');
        } else {
            $user->messages()->create($request->only('message', 'email'));
            return $this->response()->success();
        }
    }

    function changeSetting(Request $request)
    {
        $this->validate($request, [
            'key' => 'required|in:' . implode(UserSetting::AVAILABLE),
            'value' => 'required',
        ]);
        $user = $request->user();
        $user->settings()->where('key', $request->key)->update(['value' => $request->value]);
        return $this->response()->success('api.success');
    }

}
