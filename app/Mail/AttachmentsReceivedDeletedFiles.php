<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class AttachmentsReceivedDeletedFiles extends Mailable
{
    use Queueable, SerializesModels;

    private $files;

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
        $fileName = now()->format('d-m-Y')."-".'attachment-received-deleted-files.xlsx';
        $location = Storage::path($fileName);
        return $this
            ->markdown('emails.files.attachment-received-deleted-files')
            ->subject("Deleted files from Attachments Received Folder")
            ->attach($location);
    }
}
