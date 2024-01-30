@extends('layouts.main')

@section('content')
<div class="mb-4 flex justify-end mx-10">
    <a href="{{ route('premium-users.index') }}"
        class="inline-block px-4 py-3 text-sm font-semibold leading-none text-blue-600 rounded border border-blue-400 hover:border-blue-600 ">
        Volver al listado de prospectos
    </a>
</div>
<x-employee-info :user="$user" />

@endsection