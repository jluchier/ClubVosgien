<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Compterendu extends Model
{

    public $fillable = ['title','content'];
    protected $table = "compterendus";

    public function attachments(){
        return $this->morphMany( 'App\Models\Attachment','attachable');
    }
}

