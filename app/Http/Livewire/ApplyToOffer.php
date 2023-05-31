<?php

namespace App\Http\Livewire;

use App\Models\Offer;
use Livewire\Component;

class ApplyToOffer extends Component
{
    public Offer $offer;
    public $already_applied = false;

    public function render()
    {
        $this->already_applied = $this->offer->employees()->where('user_id', auth()->user()->id)->exists();
        return view('livewire.apply-to-offer');
    }

    public function submit()
    {
        $this->offer->employees()->attach(auth()->user()->id);

        $this->already_applied = true;
    }
}
