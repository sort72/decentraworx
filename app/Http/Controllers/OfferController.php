<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    public function index()
    {
        $offers = Offer::orderBy('created_at', 'desc')->paginate(10);
        return view('pages.offers', compact('offers'));
    }
    public function show(Request $request, Offer $offer)
    {
        return view('pages.offer', compact('offer'));
    }
    public function apply(Request $request, Offer $offer)
    {
        if($request->user()->type != 'employee') return redirect()->route('offers.show', $offer);

        return view('pages.apply', compact('offer'));
    }
}
