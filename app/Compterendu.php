<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compterendu extends Model
{
    protected $table = "compterendus";
    public $fillable = ['title','content'];

    public function attachments(){
        return $this->morphMany( 'App\Attachment','attachable');
    }
}

