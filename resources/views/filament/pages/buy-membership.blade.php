<x-filament::page>
    <script type="text/javascript" src="https://checkout.wompi.co/widget.js"></script>
    <section
        class="py-8 leading-7 text-gray-900 bg-white sm:py-12 md:py-16 lg:py-24 border border-gray-300 shadow-sm rounded-xl">
        <div class="flex justify-start -mt-6 sm:-mt-10 lg:-mt-20 mx-4">
            @if (is_null(auth()->user()->employee_premium_until))
            <div class="bg-primary-100 rounded-lg px-3 py-1 shadow">
                Actualmente no tienes una membresía activa.
            </div>
            @elseif(auth()->user()->employee_premium_until > now())
            <div class="bg-green-200 rounded-lg px-3 py-1 shadow">
                Tu membresía está activa hasta el {{ auth()->user()->employee_premium_until->format('d/m/Y') }}.
            </div>
            @else
            <div class="bg-orange-200 rounded-lg px-3 py-1 shadow">
                Tu membresía expiró el {{ auth()->user()->employee_premium_until->format('d/m/Y') }}.
            </div>
            @endif
        </div>
        <div class="box-border px-4 mx-auto border-solid sm:px-6 md:px-6 lg:px-8 max-w-7xl">
            <div class="flex flex-col items-center leading-7 text-center text-gray-900 border-0 border-gray-200">
                <h2
                    class="box-border m-0 text-3xl font-semibold leading-tight tracking-tight text-black border-solid sm:text-4xl md:text-5xl">
                    Membresía premium
                </h2>
                <p class="box-border mt-2 text-xl text-gray-900 border-solid sm:text-2xl">
                    Destaca entre los otros postulantes y consigue el trabajo de tus sueños.
                </p>
            </div>
            <div
                class="flex justify-center gap-4 mt-4 leading-7 text-gray-900 border-0 border-gray-200 sm:mt-6 sm:gap-6 md:mt-8 md:gap-0 xl:grid-cols-3">
                <livewire:membership-card />
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            /*
            $wompi.initialize(function ( data, error ) {
                if ( error === null ) {
                    var sessionId = data.sessionId
                    // `sessionId` current un string, por ejemplo: "1289_1696830983722-ab493d40c02e-278bab34-323va3"
                }
            })*/

            Livewire.on('payNow', data => {
                console.log(data);
                var checkout = new WidgetCheckout({
                    currency: 'COP',
                    amountInCents: data.transaction.amount * 100,
                    reference: data.transaction.reference,
                    publicKey: data.wompiKey,
                    redirectUrl: data.redirectUrl, // Opcional
                })

                checkout.open(function ( result ) {
                    var transaction = result.transaction
                    // console.log('Transaction object: ', transaction)
                    window.location.replace(transaction.redirectUrl + '?id=' + transaction.id)
                })
            })
        }, false);
    </script>

</x-filament::page>