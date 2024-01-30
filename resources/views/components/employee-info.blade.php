<section class="bg-white">
    <div class="items-center w-full px-0 py-10 sm:py-12 md:py-16 mx-auto md:px-12 lg:px-16 xl:px-32 max-w-7xl relative">
        <div class="lg:text-center md:px-0 px-10">
            <h2 class="text-3xl font-extrabold text-black lg:text-7xl tracking-tighter">{{$user->name}}</h2>
            <p class="max-w-2xl lg:mx-auto mt-4 text-2xl leading-7 tracking-tighter text-neutral-600">
                {{ $user->professional }}
            </p>
            <p class="max-w-2xl lg:mx-auto mt-4 text-xl leading-7 tracking-tighter text-neutral-600">
                {{ $user->comments }}
            </p>
            <ul class="grid grid-cols-1 gap-4 mt-6 lg:mt-12 list-none lg:gap-6 lg:grid-cols-3 lg:px-12" role="list">
                <li class="text-base text-neutral-500">
                    <strong class="text-black">{{ $user->category->name }}</strong>
                </li>
                <li class="text-base text-neutral-500">
                    @if (auth()->check())
                    <a href="mailto:{{ $user->email }}?subject=Quiero trabajar contigo&body=Hola, {{ $user->name }}!"
                        class="text-blue-500 hover:text-blue-600 hover:underline">
                        {{ $user->email }}
                    </a>
                    @else
                    <a href="{{ config('filament.path') . '/' }}"
                        class="text-blue-500 hover:text-blue-600 hover:underline">
                        Ver correo
                    </a>
                    @endif
                </li>
                <li class="text-base text-neutral-500">
                    <strong class="text-black">Hoja de vida:</strong> —
                    @if (auth()->check())
                    @if ($user->cv)
                    <a href="{{ asset('storage/' . $user->cv) }}" target="_blank"
                        class="text-blue-500 hover:text-blue-600 hover:underline">
                        Ver hoja de vida
                    </a>
                    @endif
                    @else
                    <a href="{{ config('filament.path') . '/' }}"
                        class="text-blue-500 hover:text-blue-600 hover:underline">
                        Ver hoja de vida
                    </a>
                    @endif
                </li>
            </ul>
        </div>
        <div
            class="grid items-start grid-cols-1 mt-10 lg:mt-12 gap-16 bg-neutral-50 md:rounded-2xl lg:rounded-[4rem] p-10 lg:p-20">
            <div class="relative">
                <h3 class="text-3xl text-black lg:text-2xl tracking-tighter">{{ $user->details }}
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
                                    class="font-semibold text-neutral-900">Prospectos certificados</strong> —
                                Todos nuestros postulantes pasan un proceso de validación antes de estar disponibles,
                                así validamos que sus datos son reales.</p>
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
                                Sólamente compartimos tus datos con los prospectos que nos autorices.</p>
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
                                    class="font-semibold text-neutral-900">Consigue el prospecto que necesitas</strong>
                                — Escoge entre más de 1.000 postulantes.</p>
                        </div>
                    </li>
                    <li class="lg:block md:hidden">
                        <div class="relative flex items-start">
                            <svg class="text-blue-500 h-5 w-5 translate-y-0.5 shrink-0" fill="none" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg" stroke="currentColor" stroke-width="1.5">
                                <path d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                                    stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                            <p class="text-blue-400 text-base leading-6 ml-2 font-semibold "><strong
                                    class="font-semibold text-blue-400">Prospecto Premium</strong> — Este es un
                                prospecto premium, superior al promedio.</p>
                        </div>
                    </li>
                </ul>
                @if (auth()->check())
                <div class="mt-7 flex justify-end">
                    <a href="mailto:{{ $user->email }}?subject=Quiero trabajar contigo&body=Hola, {{ $user->name }}!"
                        class="inline-block px-4 py-3 text-xl font-semibold leading-none text-white bg-primary-600 rounded hover:bg-primary-700 ">
                        ¿Quieres trabajar con {{ $user->name }}? ¡Contáctalo aquí!
                    </a>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>