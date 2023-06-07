<x-filament::page>
    <section
        class="py-8 leading-7 text-gray-900 bg-white sm:py-12 md:py-16 lg:py-24 border border-gray-300 shadow-sm rounded-xl">
        <div class="box-border px-4 mx-auto border-solid sm:px-6 md:px-6 lg:px-8 max-w-7xl">
            <div class="flex flex-col items-center leading-7 text-center text-gray-900 border-0 border-gray-200">
                <h2
                    class="box-border m-0 text-3xl font-semibold leading-tight tracking-tight text-black border-solid sm:text-4xl md:text-5xl">
                    Transacción {{ $transaction->reference }} {{ __($transaction->payment_status) }}
                </h2>
                <p class="box-border mt-2 text-xl text-gray-900 border-solid sm:text-2xl">
                    {{ $message['text'] ?? '' }}
                </p>
            </div>
        </div>
    </section>
</x-filament::page>
