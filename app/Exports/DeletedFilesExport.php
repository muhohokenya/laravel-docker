<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\FromCollection;

class DeletedFilesExport implements FromArray
{
    private $files;

    public function __construct($files)
    {
        $this->files = $files;
    }

    public function array():array{
        $data = [];
        foreach ($this->files as $file) {
            array_push($data,[
                $file['netsuite_id'],
                $file['name'],
                $file['job_number'],
                $file['created'],
                $file['modified'],
                $file['size'],
            ]);

        }

        return [
            ["Id","File Name","Job Number", "Created", "Modified",'Size'],
            $data
        ];
    }
}
