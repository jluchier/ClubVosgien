<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use PhpParser\Builder\Class_;

class Compterendu extends Model
{

    public $fillable = ['title', 'content', 'path'];
    protected $table = "compterendus";

    public function attachables()
    {
        return $this->morphMany(Attachment::class, 'attachable');
    }
}
