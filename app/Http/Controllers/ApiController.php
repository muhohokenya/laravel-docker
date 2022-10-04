<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\User;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function issueToken(){
        $token = User::query()->where('email','muhohoweb@gmail.com')->first()
            ->createToken('laravel-docker');
        return ['token' => $token->plainTextToken];
    }
    public function index(){
        return File::all();
    }
}
