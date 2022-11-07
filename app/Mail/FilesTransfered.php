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
    public $env;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($files,$env)
    {
        $this->files = $files;
        $this->env = $env;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $fileName = now()->format('d-m-Y')."-".'scheduled-files.xlsx';
        $location = Storage::path($fileName);
        return $this
            ->markdown('emails.files.transferred')
            ->subject($this->env." "."Scheduled files for transfer in job Documents folder")
            ->attach($location);
    }
}
