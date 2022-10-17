<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileSearchController extends Controller
{
    public function search(Request $request){
        $directory = $request->get('folder');
        $basePath = base_path();
        $files = Storage::disk('local_custom')->directories();
        dd($files);
    }
}
