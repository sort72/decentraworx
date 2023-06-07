<?php

namespace App\Filament\Pages;

use App\Models\UserTransaction;
use Filament\Pages\Page;
use Illuminate\Support\Facades\Http;

class PaymentResult extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.payment-result';

    public UserTransaction $transaction;

    public $message;

    protected static function shouldRegisterNavigation(): bool
    {
        return false;
    }

    public function mount()
    {
        parent::mount();

        if(!request()->id) abort(404);

        $link = env('WOMPI_TEST') ? "https://sandbox.wompi.co/v1/transactions/" : "https://production.wompi.co/v1/transactions/";
        $wompi = Http::get($link . request('id'));

        if($wompi->json('data')['id']) {
            $wompi = $wompi->object()->data;
            // dd($wompi);
            $transaction = UserTransaction::where('reference', $wompi->reference)->firstOrFail();

            if($transaction->payment_status != 'paid')
            {
                if($wompi->status == 'APPROVED')
                {
                    $transaction->update([
                    'payment_status' => 'paid',
                    'transaction_id' => $wompi->id,
                    'payment_method' => $wompi->payment_method_type,
                    'paid_at' => now()
                    ]);

                    $transaction->user()->update([
                        'offers_available' => $transaction->user->offers_available + $transaction->offers
                    ]);

                    // return view('frontend.pages.payment.success');
                    $this->message = ['type' => 'success', 'text' => 'Hemos recibido tu pago. ¡Gracias! Se han añadido ' . $transaction->offers . ' ofertas a tu cuenta.'];
                }
                else if($wompi->status == 'PENDING')
                {
                    $transaction_info = "<b>Número de convenio:</b> " . $wompi->payment_method->extra->business_agreement_code . "<br><b>Referencia de pago:</b> " . $wompi->payment_method->extra->payment_intention_identifier;

                    $transaction->update([
                    'payment_status' => 'pending',
                    'transaction_id' => $wompi->id,
                    'payment_method' => $wompi->payment_method_type,
                    'payment_info'  => $wompi->payment_method->extra->business_agreement_code . '|' . $wompi->payment_method->extra->payment_intention_identifier . '|' . now()->addDays(7),
                    ]);

                    $this->message = ['type' => 'success', 'text' => 'Tu pago se encuentra en espera. ' . $transaction_info];

                }
                else
                {
                    $this->message = ['type' => 'error', 'text' => 'No hemos podido procesar tu pago. Mensaje de error: ' . $wompi->status_message];
                }
            }

            $this->transaction = $transaction;

            // dd($this->message);
        }
        else abort(404);


    }
}
