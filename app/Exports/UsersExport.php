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
            Log::write('debug', $file['values']['id'],);
            array_push($data,[
                $file['values']['name'],
                $file['values']['folder'][0]['text'],
                $file['values']['created'],
                $file['values']['modified'],
                $file['values']['documentsize'],
            ]);
        }

        return [
            ["File Name","Job Number", "Created", "Modified",'Size'],
            $data
        ];
    }
}
