<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{

    public function export(Request $request)
    {
        $files = $request->get('data');
        Log::info('Files',$files);
//        return Excel::store(new UsersExport($files), now()."-".'files.xlsx');
    }
}
