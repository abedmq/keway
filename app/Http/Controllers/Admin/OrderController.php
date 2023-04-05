<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateUpdateStatusRequest;
use App\Http\Requests\Admin\UpdateOrderRequest;
use App\Models\Order;
use App\Models\OrderStatus;
use Carbon\Carbon;
use Carbon\Language;
use Illuminate\Http\Request;

class OrderController extends BaseController
{

    protected $modelClass = Order::class;
    protected $title = 'الطلبات';
    protected $route = 'orders';

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    function show(Order $order)
    {
        return $this->response()->view('admin.orders.show')->with(['item' => $order]);
    }

    function index()
    {
        $query = Order::with('user', 'provider', 'status');
        return $this->all($query);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Status $status
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        //
        $order->service_id=$request->service_id;
        $order->status_id=$request->status_id;
        if ($request->status_id == OrderStatus::CANCEL) {
            $order->cancel_reason_id = $request->cancel_reason_id;
            if ($request->cancel_reason_id == 0) {
                $order->cancel_reason = $request->cancel_reason;
                $order->cancel_reason_id = 0;
            }
            $order->cancel_at = Carbon::now();
        }
        $order->save();
        return $this->response()->success('تم الحفظ بنجاح')->with('clear', 'no');
    }

}
