<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function loadFile(Request $request, $key, $path_image, $disk)
    {
        $path_complete = "";
        if ($request->file($key)) {
            $file = $request->file($key);
            $name = "file-" . time() . '.' . $file->getClientOriginalExtension();
            $r2 = Storage::disk($disk)->put(utf8_decode($name), \File::get($file));
            $path_complete = $path_image . '/' . $name;
            return $path_complete;
            /*
            if (!file_exists(public_path().'course')) {
                if(File::makeDirectory(public_path().'course',0777,true)){
                }
                // $r2 = Storage::disk($disk)->put(utf8_decode($name), \File::get($file));
                    $file->move(public_path($path_image), $name);
                    $path_complete = $path_image . '/' . $name;
                    return $path_complete;
            }
            */
        }
        return $path_complete;
    }
}
