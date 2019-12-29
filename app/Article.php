<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public $fillable = ["title", "content", "image"];

    public function category()
    {
        return $this->belongsTo("App\Category");
    }
}
