<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateUpdatePaymentRequest;
use App\Models\PaymentMethod;
use Illuminate\Http\Request;

class PaymentMethodController extends BaseController
{

    protected $modelClass = PaymentMethod ::class;
    protected $title = 'طرق الدفع';
    protected $route = 'payments';

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    function show(PaymentMethod $payment)
    {
        return redirect()->back()->with('msg', 'لا يوجد تفاصيل');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUpdatePaymentRequest $request)
    {
        //
        return $this->saveData($request->validated());
    }


    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Payment $payment
     * @return \Illuminate\Http\Response
     */
    public function update(CreateUpdatePaymentRequest $request, PaymentMethod $payment)
    {
        //
        return $this->saveData($request->validated(), $payment);
    }
}
