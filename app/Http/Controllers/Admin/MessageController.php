<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateProviderRequest;
use App\Http\Requests\Admin\CreateMessageRequest;
use App\Http\Requests\Admin\UpdateProviderRequest;
use App\Http\Requests\Admin\UpdateMessageRequest;
use App\Models\Message;
use App\Models\Service;
use Carbon\Carbon;
use Google\Auth\Credentials\ServiceAccountCredentials;
use Illuminate\Http\Request;

class MessageController extends BaseController
{

    protected $modelClass = Message::class;
    protected $title = 'رسائل التواصل';
    protected $route = 'messages';

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    function show(Message $message)
    {
        if (\request()->ajax()) {
            if ($message->admin_id)
                $message->update(['admin_id' => auth('admin')->id()]);
            $message->load('admin');
            return  view('admin.messages.details',compact('message'))->render();
        }
        return redirect()->back()->with('msg', 'لا يوجد تفاصيل');
    }

    function index()
    {
        $query = Message::with('user', 'admin')->search();
        return $this->all($query);
    }

}
