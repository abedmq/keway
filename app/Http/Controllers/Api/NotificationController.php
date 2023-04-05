<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\NotificationResource;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class NotificationController extends Controller {

    //
    function index(Request $request)
    {
        $user = $request->user();
        return $this->response()->resource(new NotificationResource($user->notifications()->latest()->paginate(20)));
    }

    function read($id, Request $request)
    {
        $notification = $request->user()->notifications()->find($id);
        if ($notification)
            $notification->markAsRead();
        return $this->response()->success('api.success');
    }

    function markAllAsRead(Request $request)
    {
        $request->user()->notifications->markAsRead();
        return $this->response()->success('api.success');
    }


    function updateFirebase(Request $request)
    {
        $this->validate($request, [
            'mobile' => 'required|in:android,ios',
            'token'  => 'required',
        ]);

        $user                = $request->user();
        $token               = $user->currentAccessToken();
        $data                = $request->only('mobile', 'token');
        $data['last_active'] = Carbon::now();
        if ($item = $user->userApps()->where('token_id', $token->id)->first())
        {
            $item->update($data);
        } else
        {
            $data['token_id'] = $token->id;
            $user->userApps()->create($data);
        }
        return $this->response()->success();
    }
}

