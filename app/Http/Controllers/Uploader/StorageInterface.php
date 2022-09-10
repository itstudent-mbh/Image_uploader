<?php

namespace App\Http\Controllers\Uploader;

interface StorageInterface
{
    public function upload($image, $image_original_name) : string;
}
