<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class Attachment extends Model
{
    public $guarded = [];
    public $appends = ['url'];

    public function attachable()
    {
        return $this->morphTo();
    }

    // public function uploadFile (UploadedFile $file){
    //     $file = $file->storePublicly('CompteRendusFile',['disk' => 'public']);
    //     $this->name = basename($file);
    //     return $this;
    // }
    // public function deleteFile() {
    //     Storage::disk('public')->delete('CompteRendusFile/' . $this->name);
    // }

    // public function getUrlAttribute(){
    //     return Storage::disk('public')->url('/CompteRendusFile/'.$this->name);
    // }
}
