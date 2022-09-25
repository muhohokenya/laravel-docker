<?php

namespace App\Exports;

use App\Models\User;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
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
            ]);
        }

        $response = Http::post('http://example.com/users', [
            'name' => 'Steve',
            'role' => 'Network Administrator',
        ]);

        $slackUrl = "https://hooks.slack.com/services/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";

        $response = Http::acceptJson()->post($slackUrl,[
            'text' => "Hello from Docker",
        ]);

        return [
            ["File Name", "Created", "Modified",'Size'],
            $data
        ];
    }
}
