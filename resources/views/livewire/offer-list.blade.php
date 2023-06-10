<section class="bg-gray-100">
    <div class="relative">
        <div class="absolute inset-0 w-screen h-full pb-20 transform opacity-50">
            <img src="https://cdn.devdojo.com/images/march2021/bg-gradient.png"
                class="absolute left-0 object-cover w-full h-full" />
        </div>
        <div class="relative px-6 py-8 ml-auto mr-auto bg-top bg-cover sm:py-16 max-w-7xl md:px-24 lg:px-16 lg:py-20">
            <h1 class="text-3xl font-semibold text-center mb-4">
                Ofertas disponibles
            </h1>
            <form wire:submit.prevent class="flex justify-center mb-10">
                <div class="w-full">
                    <input placeholder="Busca una oferta..." wire:model="search"
                        class="form-input w-full border border-gray-300 shadow rounded-lg" />

                    <div class="flex justify-center gap-3 mt-6">
                        <label>
                            <input type="checkbox" wire:model="contract_type" value="0"
                                class="form-checkbox text-indigo-600 border-gray-300 shadow" />
                            Fijo
                        </label>
                        <label>
                            <input type="checkbox" wire:model="contract_type" value="1"
                                class="form-checkbox text-indigo-600 border-gray-300 shadow" />
                            Obra labor
                        </label>
                        <label>
                            <input type="checkbox" wire:model="contract_type" value="2"
                                class="form-checkbox text-indigo-600 border-gray-300 shadow" />
                            Freelance
                        </label>
                    </div>

                    <div class="flex flex-wrap justify-center gap-3 mt-3">
                        <label>
                            <input type="checkbox" wire:model="payment_type" value="0"
                                class="form-checkbox text-indigo-600 border-gray-300 shadow" />
                            Pago por horas
                        </label>
                        <label>
                            <input type="checkbox" wire:model="payment_type" value="1"
                                class="form-checkbox text-indigo-600 border-gray-300 shadow" />
                            Pago por entregables
                        </label>
                        <label>
                            <input type="checkbox" wire:model="payment_type" value="2"
                                class="form-checkbox text-indigo-600 border-gray-300 shadow" />
                            Pago quincenal
                        </label>
                        <label>
                            <input type="checkbox" wire:model="payment_type" value="3"
                                class="form-checkbox text-indigo-600 border-gray-300 shadow" />
                            Pago mensual
                        </label>
                    </div>
                </div>
            </form>
            <div class="relative grid gap-6 bg-top bg-cover sm:grid-cols-2 lg:grid-cols-4">
                @forelse ($offers as $offer)
                <div
                    class="relative p-6 overflow-hidden transition-shadow duration-200 bg-white bg-top bg-cover border border-gray-100 shadow-xl rounded-2xl hover:shadow-2xl">
                    <div class="relative">
                        <div
                            class="absolute flex items-center justify-center w-10 h-10 text-center bg-top bg-cover rounded-full bg-indigo-50">
                            <p class="relative">
                                <svg class="w-5 h-5 text-indigo-500" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z"
                                        clip-rule="evenodd"></path>
                                    <path
                                        d="M2 13.692V16a2 2 0 002 2h12a2 2 0 002-2v-2.308A24.974 24.974 0 0110 15c-2.796 0-5.487-.46-8-1.308z">
                                    </path>
                                </svg>
                            </p>
                        </div>
                        <div class="pl-12">
                            <h3 class="font-bold text-gray-700 leading-none">{{ $offer->name }}</h3>
                            <h5 class="text-sm font-semibold text-gray-500 leading-none pt-0.5  ">
                                {{$offer->area }}
                            </h5>
                        </div>
                    </div>
                    <div class="flex flex-wrap gap-2 mb-2 mt-4">
                        {!! $offer->contract_type_badge !!}
                        <span
                            class='px-2 py-0.5 inline-flex text-xs leading-5 shadow font-semibold rounded-full bg-gray-200 text-gray-600'>
                            ${{ number_format($offer->amount, 0, '', '.') }} /
                            {{ $offer->payment_type_name }}
                        </span>
                    </div>
                    <p class="text-sm leading-5 text-gray-500 mb-4">
                        {{ $offer->details }}
                    </p>
                    <div class="absolute bottom-3 right-4">
                        <a href="{{ route('offers.show', $offer->id) }}"
                            class="text-sm font-semibold text-indigo-600 hover:text-indigo-500">
                            Ver más
                        </a>
                    </div>
                </div>
                @empty
                <div class="mt-4 sm:col-span-2 lg:col-span-4">
                    <h1 class="text-2xl text-center text-gray-500 ">
                        No hay ofertas disponibles
                        @if ($search)
                        con la búsqueda "{{ $search }}". Intenta con otra búsqueda.
                        @endif
                    </h1>
                </div>
                @endforelse
            </div>

            <div class="mt-4">
                {{ $offers->links() }}
            </div>
        </div>
    </div>
</section>