<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AreaCollection;
use App\Http\Resources\AreaResource;
use App\Http\Resources\CancelReasonResource;
use App\Http\Resources\MetadataResource;
use App\Http\Resources\PaymentMethodResource;
use App\Http\Resources\ServiceCollection;
use App\Http\Resources\ServiceResource;
use App\Http\Resources\SliderResource;
use App\Http\Resources\StatusResource;
use App\Models\Area;
use App\Models\CancelReason;
use App\Models\OrderStatus;
use App\Models\PaymentMethod;
use App\Models\Service;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class HomeController extends Controller
{

    //
    function metadata()
    {
        return new MetadataResource(['']);
    }

    function sliders()
    {
        $sliders = Slider::sort()->active()->default()->get();
        return $this->response()->resource(new SliderResource($sliders));
    }

    function status()
    {
        $sliders = OrderStatus::default()->get();
        return $this->response()->resource(new StatusResource($sliders));
    }

    function services()
    {
        $services = Service::sort()->active()->default()->get();
        return $this->response()->resource(new ServiceCollection($services));
    }

    function areas()
    {
        $areas = Area::sort()->active()->default()->get();
        return $this->response()->resource((new AreaCollection($areas)));
    }

    function paymentsMethod()
    {
        $paymentsMethod = PaymentMethod::sort()->active()->default()->get();
        return $this->response()->resource(new PaymentMethodResource($paymentsMethod));
    }

    function cancelReasons()
    {
        $cancelReasons = CancelReason::sort()->active()->default()->get();
        return $this->response()->resource(new CancelReasonResource($cancelReasons));
    }


}
