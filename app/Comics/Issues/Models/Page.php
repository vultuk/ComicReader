<?php namespace ComicApi\Comics\Issues\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model
{
    use SoftDeletes;

    public $fillable = [
        'title',
        'image_url',
    ];

    public function issue()
    {
        return $this->belongsTo(Issue::class);
    }

}