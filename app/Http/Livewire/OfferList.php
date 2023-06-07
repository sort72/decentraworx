<?php

namespace App\Http\Livewire;

use App\Models\Offer;
use Livewire\Component;
use Livewire\WithPagination;

class OfferList extends Component
{
    use WithPagination;

    public $search = '';
    public $contract_type = [];
    public $payment_type = [];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $offers = Offer::select('*');

        if ($this->search) {
            $offers = $offers->where('name', 'like', "%{$this->search}%")
                        ->orWhere('area', 'like', "%{$this->search}%")
                        ->orWhere('knowledge', 'like', "%{$this->search}%")
                        ->orWhere('details', 'like', "%{$this->search}%")
                        ->orWhere('location', 'like', "%{$this->search}%")
                        ->orWhere('amount', 'like', "%{$this->search}%")
                        ->orWhereHas('company', function ($query) {
                            $query->where('name', 'like', "%{$this->search}%");
                        })
                    ;
        }
        if(count($this->contract_type) > 0)
        {
            $offers = $offers->whereIn('contract_type', $this->contract_type);
        }
        if(count($this->payment_type) > 0)
        {
            $offers = $offers->whereIn('payment_type', $this->payment_type);
        }

        $offers = $offers->orderBy('created_at', 'desc')->paginate(10);

        return view('livewire.offer-list', compact('offers'));
    }
}
