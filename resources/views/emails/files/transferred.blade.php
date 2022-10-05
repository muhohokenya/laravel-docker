@component('mail::message')
# Leprechaun Scheduled transfer and Deletion

 {{ count($files) }} Files has been found and are now in the transfer Queue

Thanks,<br>
{{ config('app.name') }}
@endcomponent
