<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $fillable = ["name"];

    public function articles()
    {
        return $this->hasMany("App\Models\Article");
    }
}
