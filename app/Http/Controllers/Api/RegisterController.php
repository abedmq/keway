<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Models\User;
use App\Rules\Mobile;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Resources\UserProfileResource;

class RegisterController extends Controller
{

    //
    function login(Request $request)
    {
        $this->validate($request, [
            'mobile' => 'required',
            'password' => 'required|min:6|max:250',
        ]);

        if (auth()->attempt($request->only('mobile', 'password'))) {
            if (!$request->user()->status) {
                return $this->response()->error('auth.block');
            } elseif (!$request->user()->mobile_verified_at) {
                return $this->response()->error('auth.not_verified');
            }
            $token = $request->user()->createToken('user_token');
            $request->user()->addToFirebase();

            return $this->response()->resource(
                new UserProfileResource($request->user(), $token));
        } else {
            return $this->response()->error('auth.failed');
        }
    }


    function register(Request $request)
    {
        $this->validate($request, [
            'mobile' => ['required', 'unique:users', new Mobile()],
            'name' => 'required',
            'password' => 'required|min:6|max:250',
            'language' => 'nullable|exists:languages,code',
        ]);

        $user = User::create($request->only('mobile', 'password', 'language', 'name'));
        if (!$request->language)
            $user->setLanguage();
        $code = $user->sendMobileCode();
        $user->addToFirebase();

        return $this->response()->success('auth.registered')->withDebuge('code', $code);
    }

    function registerProvider(Request $request)
    {
        $this->validate($request, [
            'name' => 'nullable',
            'mobile' => 'required|unique:users',
            'password' => 'required|min:6|max:250',
            'language' => 'nullable|exists:languages,code',
        ]);

        $data = $request->only('mobile', 'password', 'language', 'name');
        $data['type'] = 'provider';
        $data['status'] = 0;
        $data['is_complete'] = 0;
        $user = User::create($data);
        if (!$request->language)
            $user->setLanguage();
        $code = $user->sendMobileCode();
        $user->addToFirebase();

        return $this->response()->success('auth.registered')->withDebuge('code', $code);
    }


    function resendCode(Request $request)
    {
        $this->validate($request, [
            'mobile' => 'required|exists:users',
        ]);
        $user = User::whereMobile($request->mobile)->first();
        if ($user->mobile_verified_at) {
            return $this->response()->success('auth.active_user');
        }
        if ($user->mobile_code_send->diffInMinutes(Carbon::now()) < config('env.minutes_to_resend')) {
            return $this->response()->error('auth.too_many_resend');
        } else {
            $code = $user->sendMobileCode();
            return $this->response()->success('auth.resend_code')->withDebuge('code', $code);
        }
    }


    function forgetPassword(Request $request)
    {
        $this->validate($request, [
            'mobile' => 'required|exists:users',
        ]);
        $user = User::whereMobile($request->mobile)->first();
        if ($user->mobile_code_send&&$user->mobile_code_send->diffInMinutes(Carbon::now()) < config('env.minutes_to_resend')) {
            return $this->response()->error('auth.too_many_resend');
        } else {
            $code = $user->sendMobileCode('forget_password');
            return $this->response()->success('api.success')->withDebuge('code', $code);
        }
    }

    function resetPassword(Request $request)
    {
        $this->validate($request, [
            'mobile' => 'required|exists:users',
            'password' => 'required|min:6|max:250',
            'code' => 'required',
        ]);
        $user = User::whereMobile($request->mobile)->where('mobile_code', $request->code)->first();
        if ($user) {
            $data = ['password' => $request->password, 'mobile_code' => ''];
            if (!$user->mobile_verified_at)
                $data['mobile_verified_at'] = Carbon::now();
            $user->update($data);
            $user->logout(true);
            $token = $user->createToken('user_token');
            return $this->response()->resource(new UserProfileResource($user, $token))->success('auth.reset_password');
        } else {
            return $this->response()->error('auth.mobile_code_error');
        }
    }

    function checkResetPassword(Request $request)
    {
        $this->validate($request, [
            'mobile' => 'required|exists:users',
            'code' => 'required',
        ]);

        $user = User::whereMobile($request->mobile)->where('mobile_code', $request->code)->first();
        if ($user) {
            return $this->response()->success('auth.success_code');
        } else {
            return $this->response()->error('auth.mobile_code_error');
        }
    }

    function activateMobile(Request $request)
    {
        $this->validate($request, [
            'mobile' => 'required|exists:users',
            'code' => 'required',
        ]);
        $user = User::whereMobile($request->mobile)->first();
        if ($user) {
            if ($user->mobile_verified_at) {
                return $this->response()->success('auth.active_user');
            } else if ($user->mobile_code == $request->code) {

                $user->update(['mobile_verified_at' => Carbon::now(), 'mobile_code' => '']);
                $token = $user->createToken('user_token');
                return new UserProfileResource($user, $token);
            }
        }
        return $this->response()->error('auth.mobile_code_error');
    }

}
