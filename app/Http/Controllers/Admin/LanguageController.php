<?php

namespace App\Http\Controllers\Admin;
use App\Http\Requests\Admin\CreateUpdateLanguageRequest;
use App\Models\Language ;
use Illuminate\Http\Request;

class LanguageController extends BaseController
{

    protected $modelClass = Language ::class;
    protected $title = 'اللغات';
    protected $route = 'languages';

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    function show(Language $language)
    {
        return redirect()->back()->with('msg','لا يوجد تفاصيل');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUpdateLanguageRequest $request)
    {
        //
        $data=$request->validated();
        $data['status']=0;

        return $this->saveData($data);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Status $language
     * @return \Illuminate\Http\Response
     */
    public function update(CreateUpdateLanguageRequest $request, Language $language)
    {
        //
        return $this->saveData($request->validated(), $language);
    }
}
