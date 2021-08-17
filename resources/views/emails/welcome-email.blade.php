@component('mail::message')
# Moonpost

Welcome to the Moonpost family.

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

All the best ,<br>
{{ config('app.name') }}
@endcomponent
