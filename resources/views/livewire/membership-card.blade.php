<div class="relative z-[1] flex flex-col items-center max-w-md p-4 mx-auto my-0 bg-white border-4 border-primary-600
border-solid rounded-lg sm:p-6 md:px-8 md:py-16">
    <h3
        class="m-0 text-2xl font-semibold leading-tight tracking-tight text-black border-0 border-gray-200 sm:text-3xl md:text-4xl text-center">
        Membresía premium
    </h3>
    <h3
        class="m-0 text-xl leading-tight tracking-tight text-black border-0 border-gray-200 sm:text-2xl md:text-2xl text-center">
        30 días
    </h3>
    <div class="flex items-end mt-6 leading-7 text-gray-900 border-0 border-gray-200">
        <p class="box-border m-0 text-6xl font-semibold leading-none border-solid">
            ${{ number_format($price, '0', '.', '.') }}
        </p>
    </div>
    <p class="mt-6 mb-5 text-base leading-normal text-left text-gray-900 border-0 border-gray-200">
        Publica tu hoja de vida en nuestra plataforma y recibe postulaciones de empresas que quieren trabajar contigo.
    </p>
    <ul class="flex-1 p-0 mt-4 leading-7 text-gray-900 border-0 border-gray-200">
        <li class="inline-flex items-center w-full mb-2 font-semibold text-left border-solid">
            <svg class="w-5 h-5 mr-2 font-semibold leading-7 text-primary-600 sm:h-5 sm:w-5 md:h-6 md:w-6"
                data-primary="primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
            Empresas calificadas
        </li>
        <li class="inline-flex items-center w-full mb-2 font-semibold text-left border-solid">
            <svg class="w-5 h-5 mr-2 font-semibold leading-7 text-primary-600 sm:h-5 sm:w-5 md:h-6 md:w-6"
                data-primary="primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
            Más de 100 empresas registradas
        </li>
        <li class="inline-flex items-center w-full mb-2 font-semibold text-left border-solid">
            <svg class="w-5 h-5 mr-2 font-semibold leading-7 text-primary-600 sm:h-5 sm:w-5 md:h-6 md:w-6"
                data-primary="primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
            Aprueba las ofertas que te interesen
        </li>
    </ul>
    <button wire:click='generatePayment' wire:loading.attr="disabled" type="button"
        wire:loading.class="cursor-not-allowed bg-primary-900 hover:bg-primary-900 text-white"
        class="transition-colors inline-flex justify-center w-full px-4 py-3 mt-8 font-sans text-sm leading-none text-center text-primary-600 no-underline bg-transparent border border-primary-600 rounded-md hover:bg-primary-700 hover:border-primary-700 hover:text-white focus-within:bg-primary-700 focus-within:border-primary-700 focus-within:text-white sm:text-base md:text-lg">
        Comprar
    </button>
</div>