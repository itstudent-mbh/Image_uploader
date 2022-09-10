<?php

namespace App\Providers;

use App\Http\Controllers\Uploader\FileSystemStorageDriver;
use App\Http\Controllers\Uploader\S3StorageDriver;
use App\Http\Controllers\Uploader\StorageInterface;
use Illuminate\Support\ServiceProvider;

class ImageStorageServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *  bind Storage driver to Storage interface
     * @return void
     */
    public function register()
    {
        // type of drivers can be used
        $driver = array(
            "file_system"=>FileSystemStorageDriver::class,
            "s3"=>S3StorageDriver::class
        );
        $this->app->bind(StorageInterface::class, $driver[config('filesystems.image_storage_driver')]);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
