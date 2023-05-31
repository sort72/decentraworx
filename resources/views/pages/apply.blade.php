@extends('layouts.main')

@section('content')

<section>
    <div class="grid grid-cols-2">
        <div>
            <livewire:apply-to-offer :offer="$offer" />
        </div>
        <x-offer-info :applying="true" :offer="$offer" />
    </div>
</section>

@endsection