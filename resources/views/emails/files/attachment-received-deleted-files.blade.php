@component('mail::message')
# Deleted files from Attachments Received Folder

The {{count($files)}}files attached has been deleted from Attachment Received Folder

Thanks,<br>
{{ config('app.name') }}
@endcomponent
