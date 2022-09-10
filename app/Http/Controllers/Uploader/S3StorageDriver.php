<?php

namespace App\Http\Controllers\Uploader;

use Illuminate\Support\Facades\Storage;

/**
 *
 * get image and image base name
 * upluad image to Amazon S3 platform
 * return image path
 */

class S3StorageDriver implements StorageInterface
{
    public function upload($image, $image_original_name): string {

        $path = $image->storeAs('images', $image_original_name,'s3');
        return $path;
    }

    public function clear($image_path){
        Storage::disk('s3')->delete($image_path);
    }
}

