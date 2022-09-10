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
     *
     * @return void
     */
    public function register()
    {
        $driver = array(
            "file_system"=>FileSystemStorageDriver::class,
             "s3"=>S3StorageDriver::class
            );
        $this->app->bind(StorageInterface::class, $driver[env('IMAGE_STORAGE_DRIVER')]);
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
