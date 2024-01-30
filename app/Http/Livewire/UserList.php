<?php

namespace App\Http\Livewire;

use App\Models\Offer;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UserList extends Component
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
        $users = User::select('*')->where('employee_premium_until', '>', now())
            ->where('type', 'employee');

        if ($this->search) {
            $users = $users->where('name', 'like', "%{$this->search}%")
                ->orWhere('social_media', 'like', "%{$this->search}%")
                ->orWhere('professional', 'like', "%{$this->search}%")
                ->orWhereHas('category', function ($query) {
                    $query->where('name', 'like', "%{$this->search}%");
                })
            ;
        }


        $users = $users->orderBy('created_at', 'desc')->paginate(10);

        return view('livewire.user-list', compact('users'));
    }
}
