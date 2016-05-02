<?php namespace ComicApi\Comics\Issues\Models;

use ComicApi\Comics\Creators\Models\Creator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Issue extends Model
{
    use SoftDeletes;

    public $fillable = [
        'title',
        'issue_id',
    ];

    public function creator()
    {
        return $this->belongsTo(Creator::class);
    }

    public function pages()
    {
        return $this->hasMany(Page::class);
    }

}