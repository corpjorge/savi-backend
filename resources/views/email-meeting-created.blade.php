@component('mail::message')
# Datos de tu cita

**Asesor:** {{ $meetings->admin->name}}\
**Fecha:** {{$meetings->date}}

@component('mail::button', ['url' => config('app.url')])
Unirse a la reunión
@endcomponent

Gracias,<br>
{{ config('app.name') }}
@endcomponent

