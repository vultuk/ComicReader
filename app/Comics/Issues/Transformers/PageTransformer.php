<?php namespace ComicApi\Comics\Issues\Transformers;

use ComicApi\Comics\Issues\Models\Page;
use ComicApi\Transformer\TransformerAbstract;

class PageTransformer extends TransformerAbstract
{

    public function transform(Page $page)
    {
        return [
            'id' => $page->id,
            'title' => $page->title,
            'imageUrl' => $page->image_url,
        ];
    }

}