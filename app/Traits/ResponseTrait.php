<?php

namespace App\Traits;

use App\Libraries\CustomResponse;

trait ResponseTrait {

    function response($rs = [], $httpCode = 200): CustomResponse
    {
        return new CustomResponse($rs, $httpCode);
    }
}