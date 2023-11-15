<?php

namespace App\Http\Controllers\Attachement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class AttachementController extends Controller
{
    //
    public function user($filename)
    {
      $path = storage_path() . '/app/public/users/'.$filename;
      if(!File::exists($path)) abort(404);
      $file = File::get($path);
      $type = File::mimeType($path);
      $response = \Response::make($file, 200);
      $response->header("Content-Type", $type);
      return $response;
    }

    public function file($filename)
    {
      $path = storage_path() . '/app/public/files/'.$filename;
      if(!File::exists($path)) abort(404);
      $file = File::get($path);
      $type = File::mimeType($path);
      $response = \Response::make($file, 200);
      $response->header("Content-Type", $type);
      return $response;
    }

    public function admin($filename)
    {
      $path = storage_path() . '/app/public/admin/'.$filename;
      if(!File::exists($path)) abort(404);
      $file = File::get($path);
      $type = File::mimeType($path);
      $response = \Response::make($file, 200);
      $response->header("Content-Type", $type);
      return $response;
    }
}
