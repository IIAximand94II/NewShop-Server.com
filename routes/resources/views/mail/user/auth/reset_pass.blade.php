@component('mail::message')
# Introduction

Dear, {{ $name }}! Reset your password. Your code: {{ $code }} .

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Dear,<br>
{{ config('app.name') }}
@endcomponent
