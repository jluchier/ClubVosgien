<?php

namespace App\Http\Controllers;

use App\Gallery;
use Illuminate\Http\Request;
use App\Http\Requests\GalleryRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Input;
use Intervention\Image\Facades\Image;
use function GuzzleHttp\default_ca_bundle;

class GalleryController extends Controller
{


    public function Index()
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

    public function store(GalleryRequest $request)
    {
        dd(Input::get('url'));

        Gallery::insert([
                "title"=>$request->get('title'),
                "description"=>$request->get('description'),
                "private"=>$request->get('private', false),
                "folder"=>$this->storeImageGallery($request),
                "user_id"=>Auth::id(),
            ]
        );
        return redirect(route("galleries.index"))->with("success", "Galerie ajoutée avec succès");

    }

    public function edit(Gallery $gallery)
    {
        $url = route("galleries.update", $gallery->id);
        $method = "put";

        $folders = Storage::disk("public")->allFiles($gallery->folder . "/thumb");

        return view("Admin.Gallery.edit", compact(["gallery", "url", "method", "folders"]));

    }

    public function update(GalleryRequest $request, Gallery $gallery)
    {
        //$galerie = Gallery::find($id);

        $gallery->title = $request->get("title");
        $gallery->description = $request->get("description");
        $gallery->private = $request->get("private", false);

        $pathImage=$this->storeImageGallery($request);

        $gallery->save();

        return redirect(route("galleries.index"))->with("success", "Galerie modifiée avec succès");
    }

    public function destroy(Gallery $gallery)
    {
        Storage::disk("public")->deleteDirectory($gallery->folder);
        Gallery::destroy($gallery->id);

        return redirect(route("galleries.index"))->with("success", "Galerie supprimée");
    }

    private function storeImageGallery (Request $request)
    {
        if ($request->hasFile("folder"))
        {
            if ($request->file('folder')->isValid())
            {
                $out = explode(".", $request->file("folder")->hashName(), 2)[0].".jpg";
                /*$this->resizeImage($request, 800, "gallery/small/".$out);
                $this->resizeImage($request, 1280, "gallery/medium/".$out);
                $this->resizeImage($request, 1920, "gallery/large/".$out);
                */
                $this->resizeImage($request, 128, "gallery/thumb/".$out, true);
                return $out;
            }
        }
        return null;
    }
//$gallery->folder = "Gallery/" . $request->get("title") . "_" . $gallery->id;


    private function resizeImage(Request $request, $size, $out, $fit = false){
        $img = Image::make($request->file('folder')->path())->orientate();

        if ($fit)
        {
            $img->fit($size);
        }
        else {
            $img->widen($size);
        }

        $img->interlace(true)->encode("jpg", 70);
        Storage::disk("public")->put($out, $img);

        //Storage::disk('public')->makeDirectory($gallery->folder);
    }
}
