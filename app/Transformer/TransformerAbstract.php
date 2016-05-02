<?php namespace ComicApi\Transformer;

use Illuminate\Support\Collection;

abstract class TransformerAbstract
{

    public static function transformer($data, $transformClass = null)
    {
        $returnArray = [];
        $thisClass = is_null($transformClass) ? new static() : new $transformClass;

        if ($data instanceof Collection || is_array($data)) {
            foreach ($data as $singleItem) {
                $returnArray[] = $thisClass->transform($singleItem);
            }

            return $returnArray;
        }

        return $thisClass->transform($data);
    }

}