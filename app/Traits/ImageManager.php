<?php

namespace App\Traits;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

trait ImageManager
{
	private function storeImage($folder, $image)
	{
		if ($image != null && $folder != null)
		{
			$out = Str::random(40) . ".jpg";

			$this->resizeImage($image, 800, "{$folder}/small/{$out}");
			$this->resizeImage($image, 1280, "{$folder}/medium/{$out}");
			$this->resizeImage($image, 1920, "{$folder}/large/{$out}");
			$this->resizeImage($image, 128, "{$folder}/thumb/{$out}", true);
			return $out;
		}

		return null;
	}

	private function resizeImage($image, $size, $out, $fit = false){
		$img = Image::make($image);

		if ($fit)
		{
			$img->fit($size, $size, function ($constraint) {
                $constraint->upsize();
            });
		}
		else {
			$img->resize($size, $size, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
		}

		$img->interlace(true)->encode("jpg", 75);
		Storage::disk("public")->put($out, $img);
	}

	private function deleteImage($folder, $image){

		if ($folder != null && $image != null)
		{
			if (Storage::disk('public')->exists("{$folder}/small/{$image}"))
			{
				Storage::disk('public')->delete([
					"{$folder}/small/{$image}",
					"{$folder}/medium/{$image}",
					"{$folder}/large/{$image}",
					"{$folder}/thumb/{$image}",
				]);
				return true;
			}
		}
		else
		{
			return false;
		}

	}
}
