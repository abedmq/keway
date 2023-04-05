<?php

namespace App\Http\Controllers\Admin;
use App\Http\Requests\Admin\CreateUpdateStatusRequest;
use App\Models\OrderStatus;
use Illuminate\Http\Request;

class StatusController extends BaseController
{

    protected $modelClass = OrderStatus::class;
    protected $title = 'الحالة';
    protected $route = 'status';

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    function show(OrderStatus $status)
    {
        return redirect()->back()->with('msg','لا يوجد تفاصيل');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUpdateStatusRequest $request)
    {
        //
        return $this->saveData($request->validated());
    }


    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Status $status
     * @return \Illuminate\Http\Response
     */
    public function update(CreateUpdateStatusRequest $request, OrderStatus $status)
    {
        //
        return $this->saveData($request->validated(), $status);
    }

}
