<?php

namespace App\Http\Controllers\Uploader;

/**
 * storage driver interface with one method to upload
 * get image and image base name in upload method
 * return string of image path
 *
 * ******* if add another driver and imaplement this interface you should add driver to driver array in ImageStorageServiceProvider
 */
interface StorageInterface
{
    public function upload($image, $image_original_name) : string;
}
