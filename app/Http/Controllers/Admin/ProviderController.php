<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CreateProviderRequest;
use App\Http\Requests\Admin\CreateUserRequest;
use App\Http\Requests\Admin\UpdateProviderRequest;
use App\Http\Requests\Admin\UpdateUserRequest;
use App\Models\Service;
use App\Models\User;
use Carbon\Carbon;
use Google\Auth\Credentials\ServiceAccountCredentials;
use Illuminate\Http\Request;

class ProviderController extends BaseController
{

    protected $modelClass = User::class;
    protected $title = 'مزودي الخدمات';
    protected $route = 'providers';

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    function show(User $user)
    {
        return redirect()->back()->with('msg', 'لا يوجد تفاصيل');
//        $query = $user->users()->search();
//        return parent::index($query); // TODO: Change the autogenerated stub
    }

    function profit(User $user)
    {

        $query = $user->moneyTransfer()->search()->with('order', 'provider');
        return $this->all($query, 'profits');
    }

    function index()
    {
        $query = User::provider()->with('services', 'language')->search()->complete();
        return $this->all($query);
    }

    function wait()
    {
        $query = User::provider()->with('language', 'services')->isComplete()->search()->complete(0);
        return $this->all($query, 'new');
    }

    function accept($id)
    {
        $user = User::findOrFail($id);
        $user->update(['is_complete' => 1]);
        return $this->response()->success('admin.success');
    }

    public function create()
    {
        //
        $services = Service::get();
        return $this->response()->view('admin.providers.create')->with(compact('services'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProviderRequest $request)
    {
        //
        $data = $request->validated();
        $data['mobile_verified_at'] = Carbon::now();
        $data['is_complete'] = 1;
        $data['type'] = 'provider';

        return $this->saveData($data);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $item = User::with('services')->find($id);
        $services = Service::all();
        return $this->response()->with(compact('item', 'services'))->view('admin.providers.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param User $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProviderRequest $request, User $provider)
    {
        //
        return $this->saveData($request->validated(), $provider);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return \Illuminate\Http\Response
     */


    function saveData($data, $item = null)
    {
        $model = $this->getModelData($item);
        unset($data['image']);
        if (\request()->image) {
            $name = \request()->image->store("original");
            $imgName = resize_image($name);
            if ($imgName)
                $data['image'] = $imgName;
        }
        $model->fill($data);
        $model->save();
        $model->services()->sync(\request()->services_id);

        return $this->response()->success('تم الحفظ بنجاح')->with('clear', 'no');
    }

}
