<?php

namespace App\Http\Controllers;

use App\Exports\DeletedAttachmentsReceivedExport;
use App\Exports\DeletedFilesExport;
use App\Exports\UsersExport;
use App\Mail\AttachmentsReceivedDeletedFiles;
use App\Mail\FilesDeleted;
use App\Mail\FilesTransfered;
use App\Notifications\FilesProcessingNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{

    public function export(Request $request)
    {
        $files = $request->get('data');
        $env = $request->get('env');
        $fileName = now()->format('d-m-Y') . "-" . 'scheduled-files.xlsx';
        Storage::disk('local')->delete($fileName);
        $response = Excel::store(new UsersExport($files), $fileName);


        if ($response) {
            $data = [];
            foreach ($files as $file) {
                array_push($data, [
                    $file['id'],
                    $file['values']['name'],
                    $file['values']['folder'][0]['text'],
                    $file['values']['created'],
                    $file['values']['modified'],
                    $file['values']['documentsize'],
                ]);
            }
            $recipients = [
                'jeremiah.muhoho@thejitu.com',
                'faith.kihara@thejitu.com',
            ];
            foreach ($recipients as $recipient) {
                Mail::to($recipient)
                    ->send(new FilesTransfered($data,$env));
            }

        }
    }

    public function exportAttachmentsReceivedDeletedFiles(Request $request){
        $files = $request->get('data');
        $fileName = now()->format('d-m-Y') . "-" . 'attachment-received-deleted-files.xlsx';
        Storage::disk('local')->delete($fileName);
        $response = Excel::store(new DeletedAttachmentsReceivedExport($files), $fileName);
        if ($response) {
            $data = [];
            foreach ($files as $file) {
                array_push($data, [
                    $file['netsuite_file_id'],
                    $file['netsuite_file_name'],
                    $file['netsuite_created_at'],
                    $file['netsuite_last_modified'],
                    $file['netsuite_file_folder'],
                ]);
            }
            $recipients = [
                'jeremiah.muhoho@thejitu.com',
                'faith.kihara@thejitu.com',
            ];
            foreach ($recipients as $recipient) {
                Mail::to($recipient)
                    ->send(new AttachmentsReceivedDeletedFiles($data));
            }

        }
    }

    public function exportDeletedFiles(Request $request)
    {
        $files = $request->get('data');
        $env = $request->get('env');
        $fileName = now()->format('d-m-Y') . "-" . 'deleted-files.xlsx';
        Storage::disk('local')->delete($fileName);
        $response = Excel::store(new DeletedFilesExport($files), $fileName);

        if ($response) {
            $data = [];
            foreach ($files as $file) {
                array_push($data, [
                    $file['netsuite_id'],
                    $file['name'],
                    $file['job_number'],
                    $file['created'],
                    $file['modified'],
                    $file['size'],
                ]);
            }
            $recipients = [
                'jeremiah.muhoho@thejitu.com',
                'faith.kihara@thejitu.com',
            ];
            foreach ($recipients as $recipient) {
                Mail::to($recipient)
                    ->send(new FilesDeleted($data,$env));
            }

        }
    }



}
