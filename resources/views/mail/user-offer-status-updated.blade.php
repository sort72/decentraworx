@component('mail::message')
# Hola {{ $userOffer->user->name }}

@if ($userOffer->status == 'approved')
¡Tu oferta para el trabajo {{ $userOffer->offer->name }} ha sido aprobada!

Detalles de la oferta:

- Nombre: {{ $userOffer->offer->name }}
- Área: {{ $userOffer->offer->area }}
- Tipo de contrato: {{ $userOffer->offer->contract_type_name }}
- Salario: ${{ number_format($userOffer->offer->amount, 0, '', '.') }} / {{ $userOffer->offer->payment_type_name }}
- Detalles: {{ $userOffer->offer->details }}

¡Felicitaciones!

Ponte en contacto con la empresa para coordinar los detalles de tu nuevo trabajo.

- Nombre: {{ $userOffer->offer->company->name }}
- Email: {{ $userOffer->offer->company->email }}
- Teléfono: {{ $userOffer->offer->company->phone }}
- Dirección: {{ $userOffer->offer->company->address }}

@else
Tu oferta para el trabajo {{ $userOffer->offer->name }} ha sido rechazada.

¡Lo sentimos!

En {{ config('app.name') }}, puedes buscar otras ofertas de trabajo.

@component('mail::button', ['url' => route('home')])
Ver otras ofertas
@endcomponent
@endif

Atentamente, <br />
{{ config('app.name') }}
@endcomponent
