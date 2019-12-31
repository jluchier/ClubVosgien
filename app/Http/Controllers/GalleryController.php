<?php

namespace App\Http\Controllers;

use App\Gallery;
use Illuminate\Http\Request;
use App\Http\Requests\GalleryRequest;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class GalleryController extends Controller
{


    public function Index()
    {
        $galeries = Gallery::orderBy("created_at", "desc")->get();
        return view('Admin.Gallery.indexPhotos', compact(['galeries']));
    }


    public function create()
    {
        $gallery = new Gallery();
        $gallery->private = true;

        $url = route("galleries.store");
        $method = "post";

        return view("Admin.Gallery.edit", compact(["gallery", "url", "method"]));

    }

    public function store(Request $request)
    {
        $gallery = new Gallery();

        $gallery->title = $request->get("title");
        $gallery->description = $request->get("description");
        $gallery->private = $request->get("private", false);
        $gallery->folder = "Gallery/" . $request->get("title") . "_" . $gallery->id;

        $gallery->save();

        Storage::disk('public')->makeDirectory($gallery->folder);

        return redirect(route("galleries.index"))->with("success", "Galerie ajoutée avec succès");

    }

    public function edit(Gallery $gallery)
    {
        $url = route("galleries.update", $gallery);
        $method = "put";

        $images = Storage::disk("public")->allFiles($gallery->folder . "/thumb");

        return view("Admin.Gallery.edit", compact(["gallery", "url", "method", "images"]));

    }

    public function update(GalleryRequest $request, Gallery $gallery)
    {
        //$galerie = Gallery::find($id);

        $gallery->title = $request->get("title");
        $gallery->description = $request->get("description");
        $gallery->private = $request->get("private", false);

        $pathImage=$this->storeImageGalerie($request);

        $gallery->save();

        return redirect(route("galleries.index"))->with("success", "Galerie modifiée avec succès");
    }

    public function destroy(Gallery $gallery)
    {
        Storage::disk("public")->deleteDirectory($gallery->folder);
        Gallery::destroy($gallery->id);

        return redirect(route("galleries.index"))->with("success", "Galerie supprimée");
    }

    private function storeImageGalerie (Request $request)
    {
        if ($request->hasFile("image"))
        {
            if ($request->file('image')->isValid())
            {
                $out = explode(".", $request->file("image")->hashName(), 2)[0].".jpg";

                $this->resizeImage($request, 1920, "gallery/large/".$out);
                $this->resizeImage($request, 128, "gallery/thumb/".$out, true);

                return $out;
            }
        }

        return null;
    }

    private function resizeImage(Request $request, $size, $out, $fit = false){
        $img = Image::make($request->file('image')->path())->orientate();

        if ($fit)
        {
            $img->fit($size);
        }
        else {
            $img->widen($size);
        }

        $img->interlace(true)->encode("jpg", 70);
        Storage::disk("public")->put($out, $img);
    }
}
