<?php

namespace ComicApi\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use Illuminate\Support\Collection;

class Controller extends BaseController
{
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;


    protected function jsonResult($data, $transformer = null, $code = 200)
    {
        if (!is_null($transformer)) {
            $data = $transformer::transformer($data);
        }

        return response()->json([
            'success' => true,
            'data' => $data,
        ], $code);
    }

    protected function jsonError($message, $code=404)
    {
        return response()->json([
            'success' => false,
            'message' => $message,
        ], $code);
    }

}
