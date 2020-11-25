<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public $fillable = ["title", "content", "image","category_id"];

    public function category()
    {
        return $this->belongsTo("App\Models\Category");
    }
}
