<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Providers\RouteServiceProvider;
use App\Traits\ResponseTrait;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LoginController extends Controller {

    use ResponseTrait;

    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::ADMIN_HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    protected function guard()
    {
        return auth('admin');
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    protected function authenticated(Request $request, $user)
    {
        return $this->response(['status' => 'success', 'msg' => 'تم التسجيل بنجاح', 'redirect_to' => $this->redirectPath()]);
    }

    protected function sendFailedLoginResponse(Request $request)
    {
        return $this->response(['status' => 'fail', 'msg' => trans('auth.failed')]);
    }

}
