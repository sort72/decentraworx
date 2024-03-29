<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    @vite('resources/css/app.css')

    @livewireStyles
</head>

<body class="antialiased">
    <section class="w-full bg-white">
        <div class="container px-8 mx-auto max-w-7xl">
            <nav class="flex items-center py-6">
                <a href="{{ route('home') }}" class="flex items-center text-3xl font-semibold leading-none">
                    <img src="{{ asset('/images/logo.png') }}" alt="Logo" class="h-10">
                </a>
                <div class="ml-auto">
                    @if (auth()->check())
                    @if (auth()->user()->type != 'employee')
                    <a href="{{ route('premium-users.index') }}"
                        class="inline-block px-4 py-3 mr-2 text-xs font-semibold leading-none text-black border bg-gradient-to-tr from-yellow-200 to-yellow-400 border-yellow-500 rounded hover:text-yellow-700 hover:border-yellow-300"
                        data-rounded="rounded" data-primary="blue-600">
                        Hojas de vida premium
                    </a>
                    @endif
                    <a href="{{ config('filament.path') . '/' }}"
                        class="inline-block px-4 py-3 mr-2 text-xs font-semibold leading-none text-blue-600 border border-blue-200 rounded hover:text-blue-700 hover:border-blue-300"
                        data-rounded="rounded" data-primary="blue-600">
                        Dashboard
                    </a>
                    @else
                    <a href="{{ config('filament.path') . '/login' }}"
                        class="inline-block px-4 py-3 mr-2 text-xs font-semibold leading-none text-blue-600 border border-blue-200 rounded hover:text-blue-700 hover:border-blue-300"
                        data-rounded="rounded" data-primary="blue-600">Ingresar</a>
                    <a href="{{ config('filament.path') . '/register' }}"
                        class="inline-block px-4 py-3 text-xs font-semibold leading-none text-white bg-primary-600 rounded hover:bg-primary-700"
                        data-rounded="rounded" data-primary="blue-600">Registrate gratis</a>
                    @endif

                </div>
            </nav>
        </div>
    </section>
    @yield('content')
    <section class="box-border pt-5 leading-7 text-gray-900 bg-white border-0 border-gray-200 border-solid pb-7">
        <div class="box-border px-4 mx-auto border-solid md:px-6 lg:px-8 max-w-7xl">
            <div
                class="relative flex flex-col items-start justify-between leading-7 text-gray-900 border-0 border-gray-200 md:flex-row md:items-center">
                <a href="#_"
                    class="left-0 flex items-center justify-center order-first w-full mb-4 font-medium text-gray-900 md:justify-start md:absolute md:w-64 lg:order-none lg:w-auto title-font lg:items-center lg:justify-center md:mb-0">
                    <span class="text-xl font-black leading-none text-gray-900 select-none logo">decentraworx<span
                            class="text-indigo-600">.</span></span>
                </a>
                <ul class="box-border flex mx-auto my-6 space-x-6">
                    <li
                        class="relative mt-2 leading-7 text-left text-gray-900 border-0 border-gray-200 md:border-b-0 md:mt-0">
                        <a href="#_"
                            class="box-border items-center block w-full px-4 text-base font-normal leading-normal text-gray-900 no-underline border-solid cursor-pointer hover:text-blue-600 focus-within:text-blue-700 sm:px-0 sm:text-left">Home</a>
                    </li>
                    <li
                        class="relative mt-2 leading-7 text-left text-gray-900 border-0 border-gray-200 md:border-b-0 md:mt-0">
                        <a href="#_"
                            class="box-border items-center block w-full px-4 text-base font-normal leading-normal text-gray-900 no-underline border-solid cursor-pointer hover:text-blue-600 focus-within:text-blue-700 sm:px-0 sm:text-left">Features</a>
                    </li>
                    <li
                        class="relative mt-2 leading-7 text-left text-gray-900 border-0 border-gray-200 md:border-b-0 md:mt-0">
                        <a href="#_"
                            class="box-border items-center block w-full px-4 text-base font-normal leading-normal text-gray-900 no-underline border-solid cursor-pointer hover:text-blue-600 focus-within:text-blue-700 sm:px-0 sm:text-left">Pricing</a>
                    </li>
                    <li
                        class="relative mt-2 leading-7 text-left text-gray-900 border-0 border-gray-200 md:border-b-0 md:mt-0">
                        <a href="#_"
                            class="box-border items-center block w-full px-4 text-base font-normal leading-normal text-gray-900 no-underline border-solid cursor-pointer hover:text-blue-600 focus-within:text-blue-700 sm:px-0 sm:text-left">Blog</a>
                    </li>
                </ul>
                <div
                    class="box-border right-0 flex justify-center w-full mt-4 space-x-3 border-solid md:w-auto md:justify-end md:absolute md:mt-0">
                    <a href="#_"
                        class="inline-flex items-center leading-7 text-gray-900 no-underline border-0 border-gray-200 cursor-pointer hover:text-blue-700 focus-within:text-blue-700">
                        <svg class="w-7 h-7" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M0 0h24v24H0z" stroke="none" />
                            <path d="M7 10v4h3v7h4v-7h3l1-4h-4V8a1 1 0 011-1h3V3h-3a5 5 0 00-5 5v2H7" />
                        </svg>
                    </a>
                    <a href="#_"
                        class="inline-flex items-center leading-7 text-gray-900 no-underline border-0 border-gray-200 cursor-pointer hover:text-blue-700 focus-within:text-blue-700">
                        <svg class="w-7 h-7" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M0 0h24v24H0z" stroke="none" />
                            <path
                                d="M9 19c-4.3 1.4-4.3-2.5-6-3m12 5v-3.5c0-1 .1-1.4-.5-2 2.8-.3 5.5-1.4 5.5-6a4.6 4.6 0 00-1.3-3.2 4.2 4.2 0 00-.1-3.2s-1.1-.3-3.5 1.3a12.3 12.3 0 00-6.2 0C6.5 2.8 5.4 3.1 5.4 3.1a4.2 4.2 0 00-.1 3.2A4.6 4.6 0 004 9.5c0 4.6 2.7 5.7 5.5 6-.6.6-.6 1.2-.5 2V21" />
                        </svg>
                    </a>
                    <a href="#_"
                        class="inline-flex items-center leading-7 text-gray-900 no-underline border-0 border-gray-200 cursor-pointer hover:text-blue-700 focus-within:text-blue-700">
                        <svg class="w-7 h-7" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M0 0h24v24H0z" stroke="none" />
                            <circle cx="12" cy="12" r="9" />
                            <path
                                d="M9 3.6c5 6 7 10.5 7.5 16.2M6.4 19c3.5-3.5 6-6.5 14.5-6.4M3.1 10.75c5 0 9.814-.38 15.314-5" />
                        </svg>
                    </a>
                    <a href="#_"
                        class="inline-flex items-center leading-7 text-gray-900 no-underline border-0 border-gray-200 cursor-pointer hover:text-blue-700 focus-within:text-blue-700">
                        <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M0 0h24v24H0z" stroke="none" />
                            <rect x="4" y="4" width="16" height="16" rx="4" />
                            <circle cx="12" cy="12" r="3" />
                            <path d="M16.5 7.5v.001" />
                        </svg>
                    </a>
                </div>
            </div>
            <div class="pt-4 mt-4 leading-7 text-center text-gray-600 border-t border-gray-200 md:mt-5 md:pt-5">
                <p class="box-border mt-0 text-sm border-0 border-solid">&copy; 2023 decentraworx. Todos los derechos
                    reservados.</p>
            </div>
        </div>
    </section>
</body>

@livewireScripts

</html>