<?php namespace ComicApi\Http\Controllers\Api\V1;

use ComicApi\Comics\Creators\Models\Creator;
use ComicApi\Comics\Issues\Transformers\PageTransformer;
use ComicApi\Http\Controllers\Controller;

class PageController extends Controller
{

    public function index($creatorId, $issueId)
    {
        $creator = Creator::find($creatorId);

        if (empty($creator->id)) {
            return $this->jsonError("Could not find a Creator with this ID");
        }

        $selectedIssue = $creator->issues()->where('id', $issueId)->first();

        if (empty($selectedIssue)) {
            return $this->jsonError("Could not find a Issue with this ID");
        }

        return $this->jsonResult($selectedIssue->pages, PageTransformer::class);
    }

}