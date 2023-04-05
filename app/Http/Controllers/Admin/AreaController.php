<?php

namespace App\Http\Controllers\Admin;
use App\Http\Requests\Admin\CreateUpdateAreaRequest;
use App\Models\Area;
use Illuminate\Http\Request;

class AreaController extends BaseController
{

    protected $modelClass = Area::class;
    protected $title = 'المناطق';
    protected $route = 'areas';
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    function show(Area $area)
    {
        return redirect()->back()->with('msg','لا يوجد تفاصيل');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUpdateAreaRequest $request)
    {
        //
        return $this->saveData($request->validated());
    }


    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Area $area
     * @return \Illuminate\Http\Response
     */
    public function update(CreateUpdateAreaRequest $request, Area $area)
    {
        //
        return $this->saveData($request->validated(),  $area);
    }

    public function saveData($data, $item = null)
    {
        unset($data['image']);
        if (\request()->image) {
            $name = \request()->image->store("original");
            $imgName = resize_image($name);
            if ($imgName)
                $data['image'] = $imgName;
        }
        return parent::saveData($data, $item); // TODO: Change the autogenerated stub
    }
}