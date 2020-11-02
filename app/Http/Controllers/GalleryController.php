<?php

namespace App\Http\Controllers;

use App\Gallery;
use Illuminate\Http\Request;
use App\Http\Requests\GalleryRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Input;
use Intervention\Image\Facades\Image;
use function GuzzleHttp\default_ca_bundle;

class GalleryController extends Controller
{

    public function index()
    {
        $galleries = Gallery::orderBy("created_at", "desc")->get();
        return view('Admin.Gallery.indexPhotos', compact(['galleries']));
    }


    public function create()
    {
        $gallery = new Gallery();
        $gallery->private = true;
        $url = route("galleries.store");
        $method = "post";
        return view("Admin.Gallery.edit", compact(["gallery", "url", "method"]));

    }

  

    public function edit(Gallery $gallery)
    {
        $url = route("galleries.update", $gallery->id);
        $method = "put";

        $folders = Storage::disk("public")->allFiles($gallery->folder . "/thumb");

        return view("Admin.Gallery.edit", compact(["gallery", "url", "method", "folders"]));

    }

   

    public function destroy(Gallery $gallery)
    {
        Storage::disk("public")->deleteDirectory("gallery\{$gallery->title}");
        Gallery::destroy($gallery->id);

        return redirect(route("galleries.index"))->with("success", "Galerie supprimée");
    }
}
