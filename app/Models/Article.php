<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory;  
    public $fillable = ["title", "content", "image","category_id", "dateEvent"];

    public function category()
    {
        return $this->belongsTo("App\Models\Category");
    }

    public function scopeWhereCategory($query, $name)
    {
        return $query->join("categories", function ($join) use ($name)
        {
            $join->on("articles.category_id", "=", "categories.id")
                ->where("categories.name", $name);
        });
    }
}
