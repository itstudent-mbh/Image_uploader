<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Uploader\StorageInterface;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class StrategyImageUploadController extends Controller
{
    private $driver;
    public function __construct(StorageInterface $driver)
    {
        $this->driver = $driver;
    }

    public function upload_image(Request $request)
    {
        /**
         * get image and validate and upload it in public directory and save details in images table
         */
        $validator = Validator::make($request->all(), [
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        // Return errors
        if ($validator->fails()) {
            $errors = $validator->errors();
            return response()->json([
                'error' => $errors
            ], 400);
        }
        //get image original name
        $image_original_name = $request->file('image')->getClientOriginalName();
        // check database if exist title with same name add random number first of name
        if (Image::where('title',$image_original_name)->first())
            $image_original_name = rand(1,20000) . $image_original_name;

        $image_path = $this->driver->upload($request->file('image'), $image_original_name);

        $image = Image::create([
            'user_id' => auth()->user()->id,
            'title'=> $image_original_name,
            'path'=> $image_path
        ]);


        return response([
            'title'=> $image->title ,
            'path'=> $image->path
        ], Response::HTTP_CREATED);

    }
}
