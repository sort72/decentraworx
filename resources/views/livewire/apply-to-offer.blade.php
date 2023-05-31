<div
    class="flex items-center justify-center min-h-screen bg-gray-100 text-gray-900 filament-breezy-auth-component filament-login-page">

    <div class="px-6 -mt-16 md:mt-0 md:px-2 max-w-md space-y-8 w-screen">
        <form wire:submit.prevent="submit"
            class="p-8 space-y-8 bg-white/50 backdrop-blur-xl border border-gray-200 shadow-2xl rounded-2xl relative filament-breezy-auth-card">
            <div class="w-full flex justify-center">
                <div class="filament-brand text-xl font-bold leading-5 tracking-tight">
                    Aplicar a Oferta de {{ $offer->company->name }}
                </div>
            </div>

            <div>
                <p class="mt-2 text-sm text-center">
                    La empresa se contactará contigo vía correo electrónico si eres seleccionado.
                </p>
            </div>

            @if (!$already_applied)
            <div class="flex justify-center gap-3">
                <button type="submit"
                    class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md hover:bg-indigo-500 focus:outline-none">
                    Aplicar</button>
                <a class="inline-flex justify-center px-4 py-2 text-sm font-medium text-gray-500 bg-gray-100 border border-gray-300 rounded-md hover:border-gray-500 focus:outline-none"
                    href="{{ route('home') }}">Cancelar</a>
            </div>
            @else
            <p class="mt-2 text text-center">
                Ya aplicaste a esta oferta. Por favor espera una respuesta mediante correo electrónico.
            </p>
            <div class="flex justify-center">
                <a class="inline-flex justify-center px-4 py-2 text-sm font-medium text-gray-500 bg-gray-100 border border-gray-300 rounded-md hover:border-gray-500 focus:outline-none"
                    href="{{ route('home') }}">Ver otras ofertas</a>
            </div>

            @endif


        </form>



    </div>
</div>