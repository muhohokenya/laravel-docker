<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;

class Welcome extends Controller
{
    public function index(){
        $files = File::all();

        $data = [
            'files'=>$files
        ];
        return view('dashboard',$data);
    }
}
