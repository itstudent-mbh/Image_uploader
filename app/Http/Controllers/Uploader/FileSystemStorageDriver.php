<?php

namespace App\Http\Controllers\Uploader;

use Illuminate\Support\Facades\Storage;

/**
 *
 * get image and image base name
 * upluad image to public directory
 * return image path
 */
class FileSystemStorageDriver implements StorageInterface
{
    public function upload($image, $image_original_name): string {

        $image_path = $image->storeAs('public/image', $image_original_name);
        $image_path = str_replace('public','storage',$image_path);
        return $image_path;
    }

    public function clear($image_path){
        if(file_exists(public_path($image_path))){
            unlink(public_path($image_path));
        }
    }

}
