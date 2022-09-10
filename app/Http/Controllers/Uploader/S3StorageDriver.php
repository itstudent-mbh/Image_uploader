<?php

namespace App\Http\Controllers\Uploader;

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
}

