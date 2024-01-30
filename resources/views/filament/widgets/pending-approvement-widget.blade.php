<x-filament::widget>
    @if (auth()->user()->type == 'employee' && !auth()->user()->is_approved)
    <x-filament::card>
        <h2 class="grid flex-1 text-base font-semibold leading-6 text-gray-950">
            Tu cuenta está pendiente de aprobación, por favor espera a que un administrador la apruebe, estamos
            revisando tu información.
        </h2>


    </x-filament::card>
    @endif
</x-filament::widget>