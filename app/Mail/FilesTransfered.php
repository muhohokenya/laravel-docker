<?php

namespace App\Mail;

use App\Exports\UsersExport;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class FilesTransfered extends Mailable
{
    use Queueable, SerializesModels;

    public $files;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($files)
    {
        $this->files = $files;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $fileName = now()->format('d-m-Y')."-".'transferred-files.xlsx';
        $location = Storage::path($fileName);
        return $this
            ->markdown('emails.files.transferred')
            ->subject('Files to be Transferred and later deleted')
            ->attach($location);
    }
}
