<?php namespace ComicApi\Comics\Creators\Models;

use ComicApi\Comics\Issues\Models\Issue;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Creator extends Model
{
    use SoftDeletes;

    public $fillable = [
        'name',
        'url',
        'feed_url',
        'logo',
    ];

    public function issues()
    {
        return $this->hasMany(Issue::class);
    }

}