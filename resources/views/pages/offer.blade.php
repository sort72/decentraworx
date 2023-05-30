@extends('layouts.main')

@section('content')
<section class="bg-white">
    <div class="items-center w-full px-0 py-10 sm:py-12 md:py-16 mx-auto md:px-12 lg:px-16 xl:px-32 max-w-7xl relative">
        <div class="lg:text-center md:px-0 px-10">
            <h2 class="text-3xl font-extrabold text-black lg:text-7xl tracking-tighter">Premium Features</h2>
            <p class="max-w-2xl lg:mx-auto mt-4 text-lg leading-7 tracking-tight text-neutral-600">Tails has some cool
                features that allow you to build some awesome Tailwind Websites. Check out a few of them below.</p>
            <ul class="grid grid-cols-1 gap-4 mt-6 lg:mt-12 list-none lg:gap-6 lg:grid-cols-3 lg:px-12" role="list">
                <li class="text-base text-neutral-500">
                    <strong class="text-black">Projects</strong> — Easily organize sites and pages into separate
                    projects.
                </li>
                <li class="text-base text-neutral-500">
                    <strong class="text-black">Pages</strong> — Add multiple pages to your project and add page
                    settings.
                </li>
                <li class="text-base text-neutral-500">
                    <strong class="text-black">Tailwind V3</strong> — Build your sites with the latest version of
                    TailwindCSS.
                </li>
            </ul>
        </div>
        <div
            class="grid items-start grid-cols-1 mt-10 lg:mt-12 gap-16 md:grid-cols-2 bg-neutral-50 md:rounded-2xl lg:rounded-[4rem] p-10 lg:p-20">
            <div class="relative">
                <h3 class="text-3xl font-extrabold text-black lg:text-5xl tracking-tighter">Prebuilt <br /> components
                </h3>
                <p class="text-neutral-500 text-lg max-w-2xl mt-4">Tails has some cool features that allow you to build
                    some awesome Tailwind Websites. Check out a few of them below.</p>
                <ul class="list-none mt-6 space-y-4" role="list">
                    <li>
                        <div class="relative flex items-start">
                            <svg class="text-blue-500 h-5 w-5 translate-y-0.5 shrink-0" fill="none" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg" stroke="currentColor" stroke-width="1.5">
                                <path d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                                    stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                            <p class="text-neutral-500 text-sm leading-6 ml-2"><strong
                                    class="font-semibold text-neutral-900">Streamline Your Coding Experience</strong> —
                                Our SaaS programming product offers a wide range of features to meet the needs of every
                                developer.</p>
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
                                    class="font-semibold text-neutral-900">Advanced Tools for Every Developer</strong> —
                                We understand the importance of security when itcomes to your code and projects.</p>
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
                                    class="font-semibold text-neutral-900">Protecting Your Data</strong> — Our SaaS
                                programming product is designed with the modern developer in mind.</p>
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
                                    class="font-semibold text-neutral-900">The Future of Coding is Here</strong> — We're
                                passionate about helping developers succeed and we're committed to providing the best
                                possible experience for our users.</p>
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
                                    class="font-semibold text-neutral-900">Improved Collaboration for Faster
                                    Results</strong> — Our SaaS programming product offers a powerful platform that
                                makes coding easier, faster and more efficient.</p>
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
                                    class="font-semibold text-neutral-900">Premium Build Times</strong> — Using the
                                latest Vite bundler, your builds will be less than a few hundred milliseconds. It will
                                seem instant.</p>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="h-auto mt-12 lg:mt-0 md:max-w-full max-w-sm mx-auto relative">
                <img alt="Phone Mockup" class=" relative z-20"
                    src="https://cdn.devdojo.com/images/february2023/iphone-mockup.png" />
                <div class="absolute inset-0 w-full p-3 h-full z-10">
                    <div
                        class="relative w-full h-full bg-gradient-to-b from-gray-400 via-gray-400 to-gray-600 rounded-[2rem] lg:rounded-[3rem]">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection