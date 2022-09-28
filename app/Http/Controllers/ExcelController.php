<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use App\Mail\FilesTransfered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{

    public function export(Request $request)
    {
        $files = $request->get('data');
        $fileName = now()->format('d-m-Y')."-".'transferred-files.xlsx';
        $response =  Excel::store(new UsersExport($files), $fileName);


        if($response){
            $data = [];
            foreach ($files as $file) {
                array_push($data,[
                    $file['values']['name'],
                    $file['values']['created'],
                    $file['values']['modified'],
                    $file['values']['documentsize'],
                ]);
            }
            Mail::to('jeremiah.muhoho@thejitu.com')->send(new FilesTransfered($data));
        }
    }
}
