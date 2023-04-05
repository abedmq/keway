<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\OrderResource;
use App\Models\OrderStatus;
use App\Models\PaymentMethod;
use App\Notifications\ApproveOrderNotification;
use App\Notifications\AriveOrderNotification;
use App\Notifications\CancelOrderNotification;
use App\Notifications\CheckOrderNotification;
use App\Notifications\FinishOrderNotification;
use App\Notifications\StartCheckOrderNotification;
use App\Notifications\StopOrderNotification;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ProviderOrderController extends Controller
{

    //

    function index(Request $request)
    {
        $orders = $request->user()->orders()->with('bills', 'cancelReason', 'status', 'payment', 'area', 'service')
            ->latest()
            ->status($request->status)->paginate(20);
        return $this->response()->resource(new OrderCollection($orders));
    }

    function approve($id, Request $request)
    {
        $order = $request->user()->orders()->findOrFail($id);
        if ($order->status_id == OrderStatus::WAITING) {
            $order->update([
                'status_id' => OrderStatus::APPROVED,
            ]);
            $order->user->notify(new ApproveOrderNotification($order));
            return $this->response()->resource(new OrderResource($order))->success('api.order_approve_success');
        } else
            return $this->response()->error('api.order_approve_error');
    }

//
    function inWay($id, Request $request)
    {
        $order = $request->user()->orders()->findOrFail($id);
        if ($order->status_id == OrderStatus::APPROVED) {
            $order->update([
                'status_id' => OrderStatus::IN_WAY,
            ]);
            $order->user->notify(new ApproveOrderNotification($order));
            return $this->response()->resource(new OrderResource($order))->success();
        } else
            return $this->response()->error('api.order_in_way_error');
    }

    function arrive($id, Request $request)
    {
        $order = $request->user()->orders()->findOrFail($id);
        if ($order->status_id == OrderStatus::IN_WAY) {
            $order->update([
                'status_id' => OrderStatus::ARRIVE,
                'arrive_at'=>Carbon::now()
            ]);
            $order->user->notify(new AriveOrderNotification($order));
            return $this->response()->resource(new OrderResource($order))->success();
        } else
            return $this->response()->error('api.order_arrive_error');
    }

    function startCheck($id, Request $request)
    {
        $order = $request->user()->orders()->findOrFail($id);
        if ($order->status_id == OrderStatus::ARRIVE) {
            $order->update([
                'status_id' => OrderStatus::CHECK,
            ]);
            $order->user->notify(new StartCheckOrderNotification($order));
            return $this->response()->resource(new OrderResource($order))->success();
        } else
            return $this->response()->error('api.order_check_error');
    }

    function changeAvailable(Request $request)
    {
        $this->validate($request, [
            'status' => 'required|in:1,0',
        ]);
        $request->user()->update(['is_available' => $request->status]);
        return $this->response()->success();
    }

    function check($id, Request $request)
    {
        $this->validate($request, [
            'estimated_time' => 'required|numeric|min:0|max:100',
            'estimated_price_parts' => 'nullable|integer|min:0|max:5000',
            'check_description' => 'nullable|max:5000',
        ]);

        $order = $request->user()->orders()->findOrFail($id);
        if ($order->check_at) {
            return $this->response()->error('api.checked_before');
        }
        if ($order->status_id == OrderStatus::CHECK) {
            $order->update([
                'check_at' => Carbon::now(),
                'estimated_time' => $request->estimated_time,
                'estimated_price_parts' => $request->estimated_price_parts,
                'check_description' => $request->check_description,
            ]);
            $order->user->notify(new CheckOrderNotification($order));
            return $this->response()->resource(new OrderResource($order));
        } else
            return $this->response()->error('api.order_check_error');
    }

    function startWork($id, Request $request)
    {
        $order = $request->user()->orders()->findOrFail($id);

        if ($order->status_id == OrderStatus::CHECK || $order->status_id == OrderStatus::WORKING) {

            $data = [
                'complete_at' => Carbon::now(),
                'is_working' => 1,
            ];
            if ($order->status_id == OrderStatus::CHECK) {
                $data['start_at'] = Carbon::now();
                $data['status_id'] = OrderStatus::WORKING;
            }
            $order->update($data);
            $order->changeFirestore();
            $order->user->notify(new StartCheckOrderNotification($order));
            return $this->response()->resource(new OrderResource($order))->success();
        } else {
            return $this->response()->error('api.order_start_error');
        }
    }


    function stopWork($id, Request $request)
    {
        $order = $request->user()->orders()->findOrFail($id);

        if ($order->is_working) {
            $data = [
                'duration' => $order->duration + $order->complete_at->diffInMilliseconds(Carbon::now()),
                'is_working' => 0,
            ];
            $order->update($data);
            $order->getTotalPrice();

            $order->changeFirestore();
            $order->user->notify(new StopOrderNotification($order));
            return $this->response()->resource(new OrderResource($order))->success();
        } else {
            return $this->response()->error('api.stop_order_error');
        }
    }


    function finish($id, Request $request)
    {
        $order = $request->user()->orders()->findOrFail($id);
        if ($order->status_id == OrderStatus::CHECK) {
            $order->update([
                'status_id' => OrderStatus::COMPLETE,
                'is_working' => 0,
                'complete_at' => Carbon::now(),
            ]);

            $order->getTotalPrice();
            $order->changeFirestore();

            $order->user->notify(new FinishOrderNotification($order));
            return $this->response()->resource(new OrderResource($order));
        } else {
            return $this->response()->error('api.order_finish_error');
        }
    }


    function finishWithBills($id, Request $request)
    {
        $this->validate($request, [
            'bring_times' => 'nullable|integer|min:0|max:10',
            'bought_price' => 'nullable|numeric|min:0|max:5000',
            'bills' => 'nullable|array',
            'bills.*' => 'image',
        ]);
        $order = $request->user()->orders()->findOrFail($id);

        if ($order->status_id == OrderStatus::WORKING) {
            $data = [
                'duration' => $order->duration + ($order->is_working ? ($order->complete_at->diffInMilliseconds(Carbon::now())) : 0),
                'is_working' => 0,
                'status_id' => OrderStatus::COMPLETE,
                'complete_at' => Carbon::now(),
                'bring_times' => $request->bring_times ?? 0,
                'bought_price' => $request->bought_price ?: $request->amount ?: 0,
            ];
            $order->update($data);
            $order->getTotalPrice();
            if (sizeof($request->bills ?? [])) {
                $images = [];
                foreach ($request->bills as $bill) {
                    $name = $bill->store("public/original");
                    $imgName = resize_image($name);
                    if ($imgName) {
                        $images[] = ['image' => $imgName, 'size' => $bill->getSize(), 'ext' => $bill->getClientOriginalExtension(), 'type' => 'bill'];
                    }
                }
                $order->images()->createMany($images);
            }
            $order->changeFirestore();
            $order->user->notify(new FinishOrderNotification($order));
            return $this->response()->resource(new OrderResource($order));
        } else {
            return $this->response()->error('api.order_add_bill_error');
        }
    }

    function pay($id, Request $request)
    {
        $this->validate($request, [
//            'amount' => 'required|integer|min:0',
        ]);
        $order = $request->user()->orders()->findOrFail($id);

        if ($order->status_id == OrderStatus::COMPLETE && (!$order->is_pay_complete)) {
            if ($order->payment_id == PaymentMethod::CACHE) {
                if (floor($order->total_price) == $request->amount || 1) {
                    $discount = ($order->total_price - floor($order->total_price));
                    $order->update(['discount' => $discount, 'is_pay_complete' => 1, 'company_profits' => $order->company_profits - $discount]);
                    $order->addProviderMoney();
                    return $this->response()->resource(new OrderResource($order))->success();
                } else
                    return $this->response()->error('api.valid_order_amount');
            } else
                return $this->response()->error('api.pay_not_cache');
        } else
            return $this->response()->error('api.order_pay_error');
    }


//
//

    function cancelOrder($id, Request $request)
    {
        $this->validate($request, [
            'cancel_reason_id' => 'required',
            'cancel_reason' => 'required_if:cancel_reason_id,0',
        ], [
            'cancel_reason.required_if' => trans('api.cancel_reason_required_if'),
        ]);

        $order = $request->user()->orders()->findOrFail($id);
        if ($order->canCancel('provider')) {
            $order->update([
                'status_id' => OrderStatus::CANCEL,
                'cancel_reason_id' => $request->cancel_reason_id,
                'cancel_reason' => $request->cancel_reason,
                'cancel_user_id' => $request->user()->id,
                'cancel_at' => Carbon::now(),
            ]);

            $order->user->notify(new CancelOrderNotification($order, $request->user()));
            return $this->response()->resource(new OrderResource($order))->success('api.cancel_success');
        } else
            return $this->response()->error('api.cancel_denied');
    }
}
