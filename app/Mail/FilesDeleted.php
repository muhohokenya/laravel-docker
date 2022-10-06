<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class FilesDeleted extends Mailable
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
        $fileName = now()->format('d-m-Y')."-".'deleted-files.xlsx';
        $location = Storage::path($fileName);
        return $this
            ->markdown('emails.files.deleted')
            ->subject("Transferred and deleted files from Job Documents Folder")
            ->attach($location);
    }
}
