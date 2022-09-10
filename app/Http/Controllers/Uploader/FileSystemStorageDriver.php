<?php

namespace App\Http\Controllers\Uploader;


class FileSystemStorageDriver implements StorageInterface
{
    public function upload($image, $image_original_name): string {

        $image_path = $image->storeAs('public/image', $image_original_name);
        $image_path = str_replace('public','storage',$image_path);
        return $image_path;
    }
}
