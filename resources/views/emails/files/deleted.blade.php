@component('mail::message')
# Job Documents Deleted Files.

 {{ count($files) }} have been deleted and transferred from the job documents folder.


Thanks,<br>
{{ config('app.name') }}
@endcomponent
