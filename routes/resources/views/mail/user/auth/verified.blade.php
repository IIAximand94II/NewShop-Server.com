@component('mail::message')
# Introduction

Dear, {{ $name }}}, verify your account.

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
