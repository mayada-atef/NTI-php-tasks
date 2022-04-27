<?php

namespace App\Http\Services;

use Illuminate\Http\UploadedFile;

class media
{

    public static function uploadImage(UploadedFile $image, string $dir)
    {
        $imageName = $image->hashName();
        $image->move(public_path("assets/images/{$dir}"), $imageName);
        return $imageName;
    }
    public static function deleteImage(string $image, string $dir)
    {
        if (file_exists(public_path("assets/images/{$dir}/$image"))) {
            unlink(public_path("assets/images/{$dir}/$image"));
            return true;
        }
        return false;
    }
}
