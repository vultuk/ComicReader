<?php namespace ComicApi\Comics\Issues\Transformers;

use ComicApi\Comics\Issues\Models\Issue;
use ComicApi\Transformer\TransformerAbstract;

class IssueTransformer extends TransformerAbstract
{

    public function transform(Issue $data)
    {
        return [
            'id' => $data->id,
            'issueId' => $data->issue_id,
            'title' => $data->title,
            'pageUrl' => "/api/v1/creators/{$data->creator->id}/issues/{$data->id}/pages",
            'pageCount' => $data->pages()->count(),
            'created' => $data->created_at->format('Y-m-d'),
        ];
    }

}