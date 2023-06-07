<?php

namespace App\Http\Livewire;

use App\Filament\Pages\PaymentResult;
use App\Models\UserTransaction;
use Illuminate\Support\Str;
use Livewire\Component;

class PricingCard extends Component
{
    public $title;
    public $quantity;
    public $price;
    public $selected;

    public function render()
    {
        return view('livewire.pricing-card');
    }

    public function generatePayment()
    {
        $transaction = UserTransaction::updateOrCreate([
            'user_id' => auth()->id(),
            'amount' => $this->price,
            'offers' => $this->quantity,
            'payment_status' => 'unpaid'
        ],
        [
            'reference' => Str::random(8),
        ]);

        $this->emit('payNow', [
            'transaction' => $transaction,
            'redirectUrl' => PaymentResult::getUrl(),
            'wompiKey' => env('WOMPI_TEST') ? env('WOMPI_TEST_PUBLIC_KEY') : env('WOMPI_PUBLIC_KEY'),
        ]);
    }
}
