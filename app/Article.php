<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public $fillable = ["title", "content"];

    public function category()
    {
        return $this->belongsTo("App\Category");
    }
}
