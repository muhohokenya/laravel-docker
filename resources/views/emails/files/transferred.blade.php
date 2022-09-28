@component('mail::message')
# Introduction

Files has been transferred successfully

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
