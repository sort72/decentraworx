<x-filament::page :class="\Illuminate\Support\Arr::toCssClasses([
        'filament-resources-list-records-page',
        'filament-resources-' . str_replace('/', '-', $this->getResource()::getSlug()),
    ])">
    {{ \Filament\Facades\Filament::renderHook('resource.pages.list-records.table.start') }}

    @if (auth()->user()->type == 'company')
    <div class="flex justify-between gap-4">
        <div class="bg-primary-100 rounded-lg px-3 py-1 shadow">
            Tienes {{ auth()->user()->offers_available }} publicaciones disponibles.
        </div>
        <a href="{{ $this->payRoute() }}"
            class="bg-primary-500 text-white hover:bg-primary-700 rounded-lg px-3 py-1 shadow">Comprar
            publicaciones</a>
    </div>

    @endif

    {{ $this->table }}

    {{ \Filament\Facades\Filament::renderHook('resource.pages.list-records.table.end') }}
</x-filament::page>
