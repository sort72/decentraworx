<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use App\Models\User;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    public function index()
    {
        return view('pages.offers');
    }
    public function show(Request $request, Offer $offer)
    {
        return view('pages.offer', compact('offer'));
    }
    public function apply(Request $request, Offer $offer)
    {
        if ($request->user()->type != 'employee')
            return redirect()->route('offers.show', $offer);

        return view('pages.apply', compact('offer'));
    }
}
