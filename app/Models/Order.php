<?php

namespace App\Models;

use App\Helpers\Datatable;
use App\Notifications\PayOrderNotification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    use HasFactory, Datatable;


    protected $attributes
        = [
            'status_id' => 1,
        ];
    protected $guarded = [];

    protected $dates
        = [
            'start_at',
            'complete_at',
            'check_at',
            'cancel_at',
            'arrive_at'
        ];

    protected $dateFormat = 'Y-m-d H:i:s';

    protected $casts
        = [
            'payment_data' => 'array',
        ];


    function user()
    {
        return $this->belongsTo(User::class);
    }

    function cancelReason()
    {
        return $this->belongsTo(CancelReason::class);
    }

    function area()
    {
        return $this->belongsTo(Area::class)->withDefault(['id' => 0]);
    }

    function provider()
    {
        return $this->belongsTo(User::class, 'provider_id');
    }

    function status()
    {
        return $this->belongsTo(OrderStatus::class);
    }

    function payment()
    {
        return $this->belongsTo(PaymentMethod::class, 'payment_id');
    }

    function service()
    {
        return $this->belongsTo(Service::class, 'service_id', 'id');
    }

    function images()
    {
        return $this->hasMany(OrderImage::class);
    }

    function rate()
    {
        return $this->hasOne(Rate::class);
    }

    function bills()
    {
        return $this->hasMany(OrderImage::class)->where('type', 'bill');
    }

    function histories()
    {
        return $this->hasMany(OrderHistory::class);
    }

    function scopeActive($q)
    {
        $q->whereIn('status_id', [OrderStatus::WAITING, OrderStatus::APPROVED, OrderStatus::CHECK, OrderStatus::IN_WAY, OrderStatus::ARRIVE, OrderStatus::WORKING]);
    }

    function scopeStatus($q, $status)
    {
        if ($status) {
//            new,in_progress,finished
            if ($status == 'new')
                $q->where('status_id', [OrderStatus::WAITING]);
            if ($status == 'in_progress')
                $q->active()->where('status_id', '!=', OrderStatus::WAITING);
            if ($status == 'finished')
                $q->whereIn('status_id', [OrderStatus::CANCEL, OrderStatus::COMPLETE]);

        }
    }

    function canCancel($type)
    {
        if ($type == 'customer')

            return in_array($this->status_id, [OrderStatus::WAITING, OrderStatus::APPROVED, OrderStatus::IN_WAY]);
        else
            return in_array($this->status_id, [OrderStatus::WAITING, OrderStatus::APPROVED, OrderStatus::IN_WAY, OrderStatus::ARRIVE, OrderStatus::WORKING]);
    }

    function getEstimatePrice()
    {
        if ($this->estimated_time && $this->estimated_price_parts) {
            $workPrice = intval($this->estimated_time) * ($this->hour_price);
            $total = $workPrice + intval($this->estimated_price_parts);
            $added = $total * intval(settings('added_estimate_price') ?? 0);
            return $workPrice + $total + $added;
        }
        return 0;
    }

    function getTotalPrice($save = true)
    {
        $workPrice = $this->getDurationInHour() * ($this->hour_price);
        $bringPrice = $this->bring_times * intval($this->price_pre_bring);
        $checkPrice = intval($this->check_price ?? 0);
        $partPrice = intval($this->bought_price ?? 0);

        $totalPrice = $workPrice + $bringPrice + $checkPrice + $partPrice;
        $providerProfit = custom_format(($workPrice + $checkPrice) * ((100 - $this->company_profit_rate) / 100));
        if ($save) {
            $this->update([
                'total_price' => custom_format($totalPrice),
                'company_profits' => custom_format(($workPrice + $checkPrice) * ($this->company_profit_rate / 100)),
                'provider_profit' => $providerProfit + $bringPrice,
                'total_provider_money' => $partPrice + $bringPrice + $providerProfit,
            ]);
        }

        return $totalPrice;
//        tax_rate

    }

    function getDurationInHour()
    {
        $hours = round($this->duration / (30 * 60 * 1000)) / 2;
        return $hours > .5 ? $hours : .5;
    }

    public function reload()
    {
        $instance = new static;

        $instance = $instance->newQuery()->find($this->{$this->primaryKey});

        $this->attributes = $instance->attributes;

        $this->original = $instance->original;
    }

    function pay()
    {
        if ($this->payment_id == PaymentMethod::CARDS) {
            //TO DO handle card pay
            $this->update(['is_pay_complete' => 1]);
            $this->addProviderMoney();
        }

        $this->provider->notify(new PayOrderNotification($this));
        return true;
    }

    function addProviderMoney()
    {
        if ($this->payment_id == PaymentMethod::CACHE) {
            $this->provider->moneyTransfer()->create([
                'order_id' => $this->id,
                'type' => 'debit',
                'type_detail' => 'company_profit',
                'amount' => $this->company_profits,
            ]);
        } else {
            $this->provider->moneyTransfer()->create([
                'order_id' => $this->id,
                'type' => 'creditor',
                'type_detail' => 'provider_money',
                'amount' => $this->total_provider_money,
            ]);
        }
        return true;
    }

    function scopeSearch($q)
    {
        $query = request('query')['query'] ?? '';
        if ($query) {
            $q->where('id', $query);
            $q->orWhereHas('user', function ($q) use ($query) {
                $q->search($query);
            });
            $q->orWhereHas('provider', function ($q) use ($query) {
                $q->search($query);
            });
        }
    }

    function getCancelReason()
    {
        return $this->cancelReason ? $this->cancelReason->getTrans('title') : $this->cancel_reason;
    }

    function changeFirestore()
    {
        $this->user->addToFirebase($this);
        $this->provider->addToFirebase($this);
    }
}
