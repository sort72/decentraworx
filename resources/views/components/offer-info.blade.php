<section class="bg-white">
    <div class="items-center w-full px-0 py-10 sm:py-12 md:py-16 mx-auto md:px-12 lg:px-16 xl:px-32 max-w-7xl relative">
        <div class="lg:text-center md:px-0 px-10">
            <h2 class="text-3xl font-extrabold text-black lg:text-7xl tracking-tighter">{{$offer->name}}</h2>
            <p class="max-w-2xl lg:mx-auto mt-4 text-2xl leading-7 tracking-tighter text-neutral-600">
                {{ $offer->area }} en {{ $offer->company->name }}
            </p>
            <ul class="grid grid-cols-1 gap-4 mt-6 lg:mt-12 list-none lg:gap-6 lg:grid-cols-3 lg:px-12" role="list">
                <li class="text-base text-neutral-500">
                    <strong class="text-black">Pago por {{ $offer->payment_type_name }}</strong> — Transparencia y
                    seguridad.
                </li>
                <li class="text-base text-neutral-500">
                    <strong class="text-black">${{ number_format($offer->amount, 0, '', '.') }} / {{
                        $offer->payment_type_name }}</strong> — Además de grandes beneficios y prestaciones.
                </li>
                <li class="text-base text-neutral-500">
                    <strong class="text-black">Contrato: {{ $offer->contract_type_name }}</strong> — Acorde a la ley
                    colombiana.
                </li>
            </ul>
        </div>
        <div
            class="grid items-start grid-cols-1 mt-10 lg:mt-12 gap-16 bg-neutral-50 md:rounded-2xl lg:rounded-[4rem] p-10 lg:p-20">
            <div class="relative">
                <h3 class="text-3xl text-black lg:text-2xl tracking-tighter">{{ $offer->details }}
                </h3>
                <p class="text-neutral-500 text-lg max-w-2xl mt-4">Con Decentraworx, estás siempre protegido y vas a la
                    fija.</p>
                <ul class="list-none mt-6 space-y-4" role="list">
                    <li>
                        <div class="relative flex items-start">
                            <svg class="text-blue-500 h-5 w-5 translate-y-0.5 shrink-0" fill="none" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg" stroke="currentColor" stroke-width="1.5">
                                <path d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                                    stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                            <p class="text-neutral-500 text-sm leading-6 ml-2"><strong
                                    class="font-semibold text-neutral-900">Contratos amparados por la Ley</strong> —
                                Cuando inicias labores con una empresa, la ley colombiana te protege, además que recibes
                                todas las prestaciones sociales.</p>
                        </div>
                    </li>
                    <li>
                        <div class="relative flex items-start">
                            <svg class="text-blue-500 h-5 w-5 translate-y-0.5 shrink-0" fill="none" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg" stroke="currentColor" stroke-width="1.5">
                                <path d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                                    stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                            <p class="text-neutral-500 text-sm leading-6 ml-2"><strong
                                    class="font-semibold text-neutral-900">Tus datos están seguros</strong> —
                                Sólamente compartimos tus datos con las empresas que nos autorices.</p>
                        </div>
                    </li>
                    <li>
                        <div class="relative flex items-start">
                            <svg class="text-blue-500 h-5 w-5 translate-y-0.5 shrink-0" fill="none" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg" stroke="currentColor" stroke-width="1.5">
                                <path d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                                    stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                            <p class="text-neutral-500 text-sm leading-6 ml-2"><strong
                                    class="font-semibold text-neutral-900">Trabaja como quieras, en lo que te
                                    gusta</strong> — Encuentra la oferta que se ajsute a tus necesidades y
                                conocimientos.</p>
                        </div>
                    </li>
                    <li class="lg:block md:hidden">
                        <div class="relative flex items-start">
                            <svg class="text-blue-500 h-5 w-5 translate-y-0.5 shrink-0" fill="none" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg" stroke="currentColor" stroke-width="1.5">
                                <path d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                                    stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                            <p class="text-neutral-500 text-sm leading-6 ml-2"><strong
                                    class="font-semibold text-neutral-900">Grandes socios</strong> — Nuestras empresas
                                asociadas son líderes en su sector, con salarios ultra competitivos.</p>
                        </div>
                    </li>
                </ul>
                @if (!$applying)
                <div class="mt-7 flex justify-end">
                    <a href="{{ route('offers.apply', $offer) }}"
                        class="inline-block px-4 py-3 text-xl font-semibold leading-none text-white bg-blue-600 rounded hover:bg-blue-700 ">¿Estás
                        listo? ¡Aplica ahora!</a>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>