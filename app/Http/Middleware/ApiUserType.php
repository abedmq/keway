<?php

namespace App\Http\Middleware;

use App\Libraries\CustomResponse;
use Closure;
use Illuminate\Http\Request;

class ApiUserType
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next,$type)
    {
        if($type!=$request->user()->type)
            return (new CustomResponse([], 401))->error('api.user_type_error');
        return $next($request);
    }
}
