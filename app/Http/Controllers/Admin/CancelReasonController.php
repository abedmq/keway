<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateUpdateCancelReasonRequest as Request;
use App\Models\CancelReason ;
//use Illuminate\Http\Request;

class CancelReasonController extends BaseController
{

    protected $modelClass = CancelReason::class;
    protected $title = 'اسباب الالغاء';
    protected $route = 'cancels';

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    function show(CancelReason $cancel)
    {
        return redirect()->back()->with('msg', 'لا يوجد تفاصيل');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        return $this->saveData($request->validated());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Payment $cancel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CancelReason $cancel)
    {
        //
        return $this->saveData($request->validated(), $cancel);
    }
}
