@component('mail::message')
# {{ $env }} Job Documents Deleted Files.

 {{ count($files) }} Have been deleted and transferred from the job documents folder.


Thanks,<br>
{{ config('app.name') }}
@endcomponent
