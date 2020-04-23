<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compterendu extends Model
{

    public $fillable = ['title','content'];
    protected $table = "compterendus";

    public function attachments(){
        return $this->morphMany( 'App\Attachment','attachable');
    }
}

