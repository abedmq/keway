<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\OrderCollection;
use App\Http\Resources\OrderResource;
use App\Http\Resources\ProviderCollection;
use App\Models\Area;
use App\Models\Order;
use App\Models\OrderStatus;
use App\Models\User;
use App\Notifications\CancelOrderNotification;
use App\Notifications\NewOrderNotification;
use App\Notifications\RateOrderNotification;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderController extends Controller
{

    //

    function index(Request $request)
    {
        $this->validate($request, [
            'status' => 'nullable|in:new,in_progress,finished'
        ]);
        $orders = $request->user()->orders()->with('bills', 'cancelReason', 'status', 'payment', 'area', 'service')->latest()->status($request->status)->paginate(20);
        return $this->response()->resource(new OrderCollection($orders));
    }

    function show($id, Request $request)
    {
        $order = $request->user()->orders()->with('bills', 'cancelReason', 'status', 'payment', 'area')->status($request->status)->findOrFail($id);
        return $this->response()->resource(new OrderResource($order));
    }

    function store(Request $request)
    {
        $this->validate($request, [
            'lat' => 'required',
            'lng' => 'required',
            'provider_id' => 'required',
//            'service_id' => 'required|exists:services,id',
        ]);

        if (!$request->user()->canCreateOrder()) {
            return $this->response()->error('api.have_not_finish_order');
        }


        if (!$area = Area::supportLocation($request->lat, $request->lng)->first()) {
            $request->user()->update($request->only('lat', 'lng'));
            return $this->response()->error('api.area_not_support');
        }

        $provider = User::provider()
            ->nearBy($request->lat, $request->lng, config('env.max_provider_km'))
            ->canWork()
            ->find($request->provider_id);
        if (!$provider)
            return $this->response()->error('api.provider_not_available');
        $data = $request->only('lat', 'lng', 'provider_id', 'service_id');
//        $data['status_id']=1;
        $data['area_id'] = $area->id;
        $data['status_id'] = OrderStatus::WAITING;
        $order = $request->user()->orders()->create($data);
        $provider->notify(new NewOrderNotification($order));
        return $this->response()->resource(new OrderResource($order));
    }

    function NearByProviders(Request $request)
    {
        $this->validate($request, [
            'lat' => 'required',
            'lng' => 'required',
//            'service_id' => 'required|exists:services,id',
        ]);

        if (!Area::supportLocation($request->lat, $request->lng)->first()) {
            $request->user()->update($request->only('lat', 'lng'));
            return $this->response()->error('api.area_not_support');
        }


        $providers = User::provider()
            ->nearBy($request->lat, $request->lng, config('env.max_provider_km'))
            ->canWork()
            ->paginate(30);

        return $this->response()->resource(new ProviderCollection($providers));
    }

    function cancelOrder($id, Request $request)
    {
        $this->validate($request, [
            'cancel_reason_id' => 'required',
            'cancel_reason' => 'required_if:cancel_reason_id,0',
        ], [
            'cancel_reason.required_if' => trans('api.cancel_reason_required_if'),
        ]);

        $user = $request->user();
        $order = $user->orders()->findOrFail($id);
        if ($order->canCancel('customer')) {
            $order->update([
                'status_id' => OrderStatus::CANCEL,
                'cancel_reason_id' => $request->cancel_reason_id,
                'cancel_user_id' => $user->id,
                'cancel_reason' => $request->cancel_reason,
                'cancel_at' => Carbon::now(),
            ]);
            $order->provider->notify(new CancelOrderNotification($order, $user));
            return $this->response()->resource(new OrderResource($order))->success('api.cancel_success');
        } else
            return $this->response()->error('api.cancel_denied');
    }

    function rate($id, Request $request)
    {
        $this->validate($request, [
            'rate' => 'required',
            'text' => 'nullable|string:min:0,max:255',
        ]);
        $order = $request->user()->orders()->findOrFail($id);
        if ((!$order->rate) && $order->status_id == OrderStatus::COMPLETE) {
            $order->rate()->create([
                'rate' => $request->rate,
                'text' => $request->text,
                'provider_id' => $order->provider_id,
            ]);
            $order->provider->notify(new RateOrderNotification($order));
            return $this->response()->resource(new OrderResource($order))->success();
        } else
            return $this->response()->error('api.order_cannt_rate');

    }

    function pay($id, Request $request)
    {
        $this->validate($request, [
            'payment_id' => 'required|exists:payment_methods,id',
        ]);

        $order = $request->user()->orders()->findOrFail($id);
        if ($order->status_id == OrderStatus::COMPLETE && (!$order->is_pay_complete)) {
            $order->update([
                'payment_id' => $request->payment_id,
            ]);
            $status = $order->pay();
            if ($status)
                return $this->response()->success();
            else
                return $this->response()->resource(new OrderResource($order))->success('api.pay_error');
        } else
            return $this->response()->error('api.order_pay_error');
    }
}
