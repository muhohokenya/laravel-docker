<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileSearchController extends Controller
{
    public function search(Request $request){
        $directory = $request->get('folder');
        $files = Storage::allFiles($directory);
        dd(public_path());
    }
}
