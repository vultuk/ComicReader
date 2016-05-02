<?php namespace ComicApi\Http\Controllers\Api\V1;

use ComicApi\Comics\Creators\Models\Creator;
use ComicApi\Comics\Issues\Transformers\IssueTransformer;
use ComicApi\Http\Controllers\Controller;

class IssueController extends Controller
{

    public function index($creatorId)
    {
        $creator = Creator::find($creatorId);

        if (empty($creator->id)) {
            return $this->jsonError("Could not find a Creator with this ID");
        }

        return $this->jsonResult($creator->issues()->latest()->get(), IssueTransformer::class);
    }


    public function show($creatorId, $issueId)
    {
        $creator = Creator::find($creatorId);

        if (empty($creator->id)) {
            return $this->jsonError("Could not find a Creator with this ID");
        }

        $selectedIssue = $creator->issues()->where('id', $issueId)->first();

        if (empty($selectedIssue)) {
            return $this->jsonError("Could not find a Issue with this ID");
        }

        return $this->jsonResult($selectedIssue, IssueTransformer::class);
    }
    
}