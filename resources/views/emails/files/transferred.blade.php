@component('mail::message')
# Leprechaun Scheduled transfer and Deletion

 {{ count($files) }} files have been found the Job Documents folder and are now in the transfer queue.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
