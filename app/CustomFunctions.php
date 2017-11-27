<?php

namespace App;

use Faker\Provider\Image;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

// Here will be stored all custom functions that can be used in most of the other classes
class CustomFunctions extends Model
{
     /**
     * Upload the given file on the server
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $path
     * @param  array  $files
     */
    public function uploadFiles($request, $path, $files)
    {
        $foldername = $this->createFolderName($path);
        $filenames = [];

        foreach($files as $file)
        {
            // in case multiple files are being uploaded
            if(is_array($request->$file))
            {
                foreach ($request->$file as $key=>$val) {
                    $filenames[$file][] = $this->createNameAndUpload($foldername, $val);
                }
                continue;
            }

            // if the request contains the given image
            if($request->hasFile($file))
                $filenames[$file] = $this->createNameAndUpload($foldername, request()->file($file));
        }      

        return $filenames;
    }

    /**
     * Create proper file name and store the file
     * 
     * @param  string  $folder 
     * @param  string  $file   
     * @return string  $filename
     */
    public function createNameAndUpload($folder, $file)
    {
        $md5Name = md5_file($file->getRealPath());
        $guessExtension = $file->guessExtension();
        $filename = $md5Name.'.'.$guessExtension;
        $file->storeAs($folder, $filename);

        return $filename;
    }

     /**
     * Create folder (if doesn't exist) where the images will be stored
     *
     * @return string  $foldername
     */
    public function createFolderName($foldername)
    {
        if(file_exists($foldername) == false)
            Storage::makeDirectory($foldername, 0775, true);

        return $foldername;
    }

}
