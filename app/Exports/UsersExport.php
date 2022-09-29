<?php

namespace App\Exports;

use App\Mail\FilesTransfered;
use App\Models\User;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\FromCollection;

class UsersExport implements FromArray
{
    private $files;

    public function __construct($files)
    {
        $this->files = $files;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function array():array
    {

        $data = [];
        foreach ($this->files as $file) {
            array_push($data,[
                $file['values']['name'],
                $file['values']['created'],
                $file['values']['modified'],
                $file['values']['documentsize'],
                $file['values']['jobNumber'],
            ]);
        }

        return [
            ["File Name","Folder", "Created", "Modified",'Size'],
            $data
        ];
    }
}
