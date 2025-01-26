<?php

namespace App\Livewire\Admin;

use App\Models\Wallet;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Livewire\Attributes\Layout;
use Livewire\Component;


class TopUps extends Component
{
    #[Layout('layout.admin.partials.website-base-admin')]
    public $provider;
    public $phone_number;
    public $amount;

    protected $rules = [
        'provider' => 'required|string',
        'phone_number' => 'required|numeric|digits:10',
        'amount' => 'required|numeric'
    ];


    public function resetField()
    {
        $this->provider = '';
        $this->phone_number = '';
        $this->amount = '';
    }

    public function create()
    {
        $this->validate();

        Wallet::create([
            'user_id' => Auth::user()->id,
            'provider' => $this->provider,
            'phone_number' => $this->phone_number,
            'amount' => $this->amount,
        ]);
        session()->flash('message', 'Wallet loaded successfully.');
        $this->resetField();
    }

    public function render()
    {
        $user_id = auth()->user()->id;
        $wallets = Wallet::all()->where('user_id', $user_id);
        return view('livewire.admin.top-ups', compact('wallets'));
    }
}
