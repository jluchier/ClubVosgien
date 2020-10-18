<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\GalleryRequest;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
	public function Image(Request $request)
	{
		$image = $request->get("image", null);
		$folder = $request->get("folder", null);

		if ($image != null && $folder != null)
		{
			$name = Str::random(40) . ".jpg";

			$original = Image::make($image)
			->interlace(true)
			->encode("jpg", 75);
			Storage::disk("public")->put("gallery/{$folder}/{$name}", $original);

			$thumb = Image::make($image)
			->interlace(true)
			->fit(300)
			->encode("jpg", 75);
			Storage::disk("public")->put("Galerie/Studio/Thumbs/" . $name, $thumb);

			return response()->json(["message" => "Data url saved"], 200);
		}
		return response()->json(["message" => "no image"], 200);
	}

public function Store(GalleryRequest $request)

    {
        $request->validate([
            'title' => 'unique:galleries'
        ]);

         Gallery::insert([
                "title"=>$request->get('title'),
                "dateSortie"=>$request->get('dateSortie'),
                "description"=>$request->get('description'),
                "private"=>$request->get('private', false),
                "folder"=>$this->storeImageGallery($request),
                "user_id"=>Auth::id(),
            ]
        );
        return redirect(route("galleries.index"))->with("success", "Galerie ajoutée avec succès");

    }

 public function Update(GalleryRequest $request, Gallery $gallery)
    {
        $request->validate([
            'title' => 'unique:galleries,id,'.$gallery->id
        ]);

        $gallery->title = $request->get("title");
        $gallery->dateSortie = $request->get("dateSortie");
        $gallery->description = $request->get("description");
        $gallery->private = $request->get("private", false);

        //$pathImage=$this->storeImageGallery($request);

        $gallery->save();

        return redirect(route("galleries.index"))->with("success", "Galerie modifiée avec succès");
    }




}
