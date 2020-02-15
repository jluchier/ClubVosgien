<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attachement extends Model
{
    public $guarded = [];

    public function attachage(){
        return $this->morphTo();
    }
}
