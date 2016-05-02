<?php namespace ComicApi\Http\Controllers\Api\V1;

use ComicApi\Comics\Creators\Models\Creator;
use ComicApi\Comics\Creators\Transformers\CreatorTransformer;
use ComicApi\Http\Controllers\Controller;

class CreatorController extends Controller
{

    public function index()
    {
        $creators = Creator::all();

        return $this->jsonResult($creators, CreatorTransformer::class);
    }


    public function show($creators)
    {
        $creator = Creator::find($creators);

        if (empty($creator->id)) {
            return $this->jsonError("Could not find a Creator with this ID");
        }

        return $this->jsonResult($creator, CreatorTransformer::class);
    }

}