<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Support\Facades\Storage;
use App\Traits\ImageManager;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
  use ImageManager;

    public function index()
    {
        $galleries = Gallery::orderBy("created_at", "desc")->get();

        foreach ($galleries as $gallery)
        {
            $gallery->thumbs = sizeof(Storage::disk("public")->allFiles("gallery/{$gallery->title}/thumb"));
        }

        return view('Admin.Gallery.indexPhotos', compact(['galleries']));
    }

    public function create()
    {
        $gallery = new Gallery();
        $gallery->private = true;
        $url = route("galleries.store");
        $method = "post";
        $thumbs = [];

        return view("Admin.Gallery.edit", compact(["gallery", "url", "method", "thumbs"]));
    }

    public function edit(Gallery $gallery)
    {
        $url = route("galleries.update", $gallery->id);
        $method = "put";

        $thumbs = Storage::disk("public")->allFiles("gallery/{$gallery->title}/thumb");

        return view("Admin.Gallery.edit", compact(["gallery", "url", "method", "thumbs"]));

    }

    public function destroy(Gallery $gallery)
    {
        Storage::disk("public")->deleteDirectory("gallery/{$gallery->title}");
        Gallery::destroy($gallery->id);

        return redirect(route("galleries.index"))->with("success", "Galerie supprimée");
    }

    public function deleteGallerySingleImage(Gallery $gallery, Request $request)
    {
      $splitPath = explode("/", $request->get("image"));
      $imageName = end($splitPath);

      $folder = "gallery/".$gallery->title;
      $this->deleteImage($folder, $imageName);

      return redirect(route("galleries.edit", $gallery));
    }
}
