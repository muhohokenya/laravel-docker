<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\User;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function register(Request $request){
        User::query()->create([
            'name'=>$request->get('name'),
            'email'=>$request->get('email'),
            'password'=>bcrypt($request->get('password')),
        ]);
    }
    public function issueToken(){
        $token = User::query()
            ->where('email','muhohoweb@gmail.com')
            ->first()
            ->createToken('laravel-docker');
        return ['token' => $token->plainTextToken];
    }
    public function index(){
        return User::all();
    }
}
