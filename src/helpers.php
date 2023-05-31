<?php

use Illuminate\Http\UploadedFile;
use Intervention\Image\Facades\Image;

if (!function_exists('saveImage')) {
    function saveImage(UploadedFile $image, string $name, string $path)
    {
        $file = Image::make($image);
        $newName = $name . '_' . time() . '.webp';
        $file->save($path . $newName, 80, 'webp');

        return $path . $newName;
    }
}


if (!function_exists("defaultImage")) {
    function defaultImage()
    {
        $imagePath = "/assets/images/default.webp";
        return is_file(public_path() . $imagePath) ? url('/') . $imagePath : "Please add default image to public path assets/images folder";
    }
}
