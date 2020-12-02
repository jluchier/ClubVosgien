<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    public $fillable = ["title", "dateSortie", "description", "private", "folder", "user_id"];
    protected $dateFormat = 'd-m-y';
}
