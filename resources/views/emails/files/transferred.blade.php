@component('mail::message')
# {{ $env  }} Leprechaun Scheduled transfer and Deletion

 {{ count($files) }} files have been found in the Job Documents folder and are now in the transfer queue.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
