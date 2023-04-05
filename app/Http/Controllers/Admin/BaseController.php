<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateUpdatePaymentRequest;
use App\Libraries\CustomResponse;
use App\Models\CancelReason;
use App\Models\Language;
use App\Models\User;
use App\Traits\LanguageTrait;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class BaseController extends Controller
{


    private $data = [];
    protected $modelClass = '';
    protected $model;
    protected $title = '';
    protected $route = '';
    protected $viewFolder = '';
    protected $prefix = 'admin.';

    public function __construct()
    {
        $this->data['title'] = $this->title;
        $this->data['route'] = $this->route;
        $this->data['prefix'] = $this->prefix;
        if (!$this->viewFolder)
            $this->viewFolder = $this->route;
        $this->getModel();
    }

    public function response($rs = [], $httpCode = 200): CustomResponse
    {
        return parent::response(array_merge($this->data, $rs), $httpCode);
    }

    function index()
    {
        $query = $this->model->query();
        return $this->all($query);
    }

    function all($query = null, $view = 'index')
    {
        if (method_exists($this->model, 'scopeSearch'))
            $query->search();

        if (in_array(
            LanguageTrait::class,
            array_keys((new \ReflectionClass($this->model))->getTraits())
        )) {
            $query->with('language');
            $query->whereDoesntHave('parent');
        }


        if (\request()->ajax()) {
            return $query->datatable();
        }
        return view($this->prefix . $this->viewFolder . '.' . $view, $this->data);
    }


    public function destroy($id)
    {
        $item = $this->model->findOrFail($id);

        if (method_exists($item, 'deleteItem')) {
            $rs = $item->deleteItem();
        } else {
            $rs = $item->delete();
        }
        if ($rs)
            return $this->response()->success('تم الحذف بنجاح');
        return $this->response()->error('لا يمكن حذف هذا العنصر');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return $this->response()->view($this->prefix . $this->route . '.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $item = $this->model->findOrFail($id);
        return $this->response()->view($this->prefix . $this->route . '.edit', compact('item'));
    }

    function saveData($data, $item = null)
    {
        $model = $this->getModelData($item);
        if (in_array(
            LanguageTrait::class,
            array_keys((new \ReflectionClass($model))->getTraits())
        )) {
            $model->saveWithLang($data);
        } else {
            $model->fill($data);
        }
        $model->save();
        return $this->response()->success('تم الحفظ بنجاح')->with('clear', $item ? 'no' : 'yes');
    }

    function getModelData($item = null)
    {

        if (!$item)
            $model = $this->model;
        elseif (is_int($item))
            $model = $this->model->find($item) ?: $this->model;
        else
            $model = $item;
        return $model;
    }

    function changeStatus($id)
    {
        $item = $this->model->findOrFail($id);
        $item->update(['status' => $item->status ? 0 : 1]);
        return $this->response()->success('admin.success');
    }

    function getModel()
    {
        if (!$this->modelClass)
            throw new \Exception('no model');
        $this->model = new $this->modelClass();
        return $this->model;
    }
}
