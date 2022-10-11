<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\FromCollection;

class DeletedAttachmentsReceivedExport implements FromArray
{
    private $files;

    public function __construct($files)
    {
        $this->files = $files;
    }


    public function array(): array
    {
        $data = [];
        foreach ($this->files as $file) {
            array_push($data,[
                $file['netsuite_file_id'],
                $file['netsuite_file_name'],
                $file['netsuite_created_at'],
                $file['netsuite_last_modified'],
                $file['netsuite_file_folder'],
            ]);

        }

        return [
            ["Id","File Name","Created", "Modified",'Folder'],
            $data
        ];
    }
}
