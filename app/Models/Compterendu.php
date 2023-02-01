<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use PhpParser\Builder\Class_;
use Illuminate\Http\UploadedFile;

class Compterendu extends Model
{

    public $fillable = ['title', 'content', 'path'];
    protected $table = "compterendus";

    public static function uploadFile(UploadedFile $file)
    {
        $file->title = basename($file);
        $file = $file->storePublicly('CompteRendusFiles', ['disk' => 'public']);
        /* $this->name = basename($file);
        return $this; */
    }

    // public function deleteFile() {
    //     Storage::disk('public')->delete('CompteRendusFile/' . $this->name);
    // }

    // public function getUrlAttribute(){
    //     return Storage::disk('public')->url('/CompteRendusFile/'.$this->name);
    // }



}
