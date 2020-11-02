<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    public $fillable = ["title", "dateSortie", "description", "private", "folder"];
    //protected $table = "galleries";

}
