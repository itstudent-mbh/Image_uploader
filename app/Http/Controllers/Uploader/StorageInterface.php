<?php

namespace App\Http\Controllers\Uploader;

/**
 * storage driver interface with  method to upload and another one to delete
 * get image and image base name in upload method and get image path in clear method
 * return string of image path in upload method
 *
 * ******* if add another driver and imaplement this interface you should add driver to driver array in ImageStorageServiceProvider
 */
interface StorageInterface
{
    public function upload($image, $image_original_name) : string;
    public function clear($image_path);
}
