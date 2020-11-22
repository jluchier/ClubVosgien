<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Traits\ImageManager;
use Illuminate\Http\Request;
use App\Http\Requests\GalleryRequest;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    use ImageManager;

	public function Image(Request $request)
	{
		$image = $request->get("image", null);
		$folder = $request->get("folder", null);

		if ($image != null && $folder != null)
		{

            $this->storeImage("gallery/{$folder}",$request->get("image"));

			return response()->json(["message" => "Image saved"], 200);
		}
		return response()->json(["message" => "no image"], 200);
	}

    public function Store(GalleryRequest $request)
    {
        $request->validate([
            'title' => 'unique:galleries',
            'dateSortie' => 'unique:galleries'
        ]);

         Gallery::insert([
                "title"=>$request->get('title'),
                "dateSortie"=>$request->get('dateSortie'),
                "description"=>$request->get('description'),
                "private"=>$request->get('private', false),
                "user_id"=>$request->get('user_id')
            ]
        );

         return response()->json(["folder" => $request->get("title")], 200);
    }

    public function Update(GalleryRequest $request, Gallery $gallery)
    {
        $request->validate([
            'title' => 'unique:galleries,id,'.$gallery->id,
            'dateSortie' => 'unique:galleries,id,'.$gallery->id
        ]);

        $newTitle = $request->get("title");

        if ($gallery->title != $newTitle)
        {
            Storage::disk("public")->move("gallery/{$gallery->title}", "gallery/{$newTitle}");
        }

        $gallery->title = $newTitle;
        $gallery->dateSortie = $request->get("dateSortie");
        $gallery->description = $request->get("description");
        $gallery->private = $request->get("private", false);

        $gallery->save();

        return response()->json(["folder" => $request->get("title")], 200);
    }
}
