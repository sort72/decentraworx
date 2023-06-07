<?php

use App\Models\UserTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/wompi-hook', function(Request $request) {
    $debug_messages = [];
    $debug_messages[] = "Wompi Event Fired";
    $data = $request->all();
    if(isset($data['event']) && $data['event'] == 'transaction.updated')
    {
        $transaction = $data['data']['transaction'];
        $debug_messages[] = 'Reference: ' . $transaction['reference'];
        $debug_messages[] = 'Status: ' . $transaction['status'];

        $invoice = UserTransaction::where('reference', $transaction['reference'])->first();

        if($transaction['status'] == 'APPROVED')
        {
            if($invoice)
            {
                if($invoice->payment_status == 'unpaid' || $invoice->payment_status == 'pending')
                {
                  $invoice->update([
                    'payment_status' => 'paid',
                    'transaction_id' => $request->id,
                    'payment_method' => $transaction['payment_method_type'],
                    'paid_at' => now()
                  ]);

                  $invoice->user()->update([
                    'offers_available' => $invoice->user->offers_available + $invoice->offers
                  ]);

                  $debug_messages[] = "Factura marcada como pagada.";

                }
                else $debug_messages[] = "La factura ya fue pagada.";
            }
            else
            {
              $debug_messages[] = "No se pudo encontrar la referencia asociada a la factura.";
            }
        }
    }
    Log::debug('Wompi Hook', ['debug_messages' => $debug_messages]);
    return response($debug_messages, 200);
});
