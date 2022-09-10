<?php

namespace App\Http\Controllers\Uploader;


class S3StorageDriver implements StorageInterface
{
    public function upload($image, $image_original_name): string {

        $path = $image->storeAs('images', $image_original_name,'s3');
        return $path;
    }
}

