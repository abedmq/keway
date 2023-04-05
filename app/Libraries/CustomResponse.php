<?php

namespace App\Libraries;

use App\Http\Resources\UserProfileResource;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\Response;

class CustomResponse implements Responsable
{

    private $with = [];
    private $redirect;
    private $route;
    private $viewName;
    private $httpCode = 200;
    private $status = 'success';

    public function __construct($rs, $httpCode = 200)
    {
        $this->httpCode = $httpCode;
        $this->with = $rs;
    }

    function route($name): self
    {
        $this->redirect = route($name);
        $this->route = ($name);
        return $this;
    }

    function view($name, $var = []): self
    {
        $this->viewName = $name;
        $this->with = array_merge($this->with, $var);
        return $this;
    }

    function success($msg = 'api.success'): self
    {
        $this->with['msg'] = $msg;
        return $this;
    }

    function resource($resource): self
    {
        $this->resource = $resource;
        $this->with['msg'] = 'api.success';
        return $this;
    }

    function error($msg, $title = ''): self
    {
        $this->with['error'] = $msg;
        $this->status('fail');
        return $this;
    }

    function with($key, $value=null): self
    {
        if(is_array($key)){
            foreach ($key as $k=>$item) {
                $this->with[$k] = $item;
            }
        }else
        $this->with[$key] = $value;
        return $this;
    }


    function withDebuge($key, $value): self
    {
        if (config('app.debug'))
            $this->with[$key] = $value;
        return $this;
    }

    function withAll($data): self
    {
        $this->with = array_merge($this->with, $data);
        return $this;
    }

    function status($status): self
    {
        $this->status = $status;
        return $this;
    }


    public function toResponse($request)
    {
        if (request()->ajax() || !$request->acceptsHtml()) {
            $data['status'] = $this->status == 'success';
            if ($this->redirect)
                $data['redirect'] = $this->redirect;
            foreach ($this->with as $key => $val) {
                $data[$key] = $val;
            }
            if ($this->status == 'fail') {
                $data['error'] = $this->with['error'];
                $data['msg'] = trans($this->with['error']) ?? '';
            } else
                $data['msg'] = trans($this->with['msg']) ?? '';

            if (isset($this->resource)) {
                if(isset($this->resource->toArray($request)['data']))
                    return $this->resource;
                $data['data'] = $this->resource;
            }
            return \response($data);

        } else {
            if ($this->route)
                $response = redirect()->route($this->route);
            else if ($this->viewName)
                $response = view($this->viewName);
            else
                $response = redirect()->back();
            foreach ($this->with as $key => $val)
                $response->with($key, $val);

            return $response;
        }
    }

}
