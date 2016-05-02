<?php namespace ComicApi\Comics\Creators\Transformers;

use ComicApi\Comics\Creators\Models\Creator;
use ComicApi\Transformer\TransformerAbstract;

class CreatorTransformer extends TransformerAbstract
{

    public function transform(Creator $data)
    {
        return [
            'id' => $data->id,
            'name' => $data->name,
            'url' => $data->url,
            'feedUrl' => $data->feed_url,
            'logo' => $data->logo,
            'issueUrl' => "/api/v1/creators/{$data->id}/issues",
            'issueCount' => $data->issues()->count(),
            'created' => $data->created_at->format('Y-m-d'),
        ];
    }

}