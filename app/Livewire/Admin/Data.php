<?php

namespace App\Livewire\Admin;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Data extends Component
{
    #[Layout('layout.admin.partials.website-base-admin')]

    public $refrence;
    public $package;
    public $number;
    public $amount;
    public $user_id;


    protected $rules = [
        'package' => 'required',
        'number' => 'required|numeric|digits:10',
        'amount' => 'required|numeric',
    ];

    public function resetForm()
    {
        $this->package = null;
        $this->number = null;
        $this->amount = null;
        $this->user_id = null;



    }
    public function create()
    {
        $this->validate();

        \App\Models\Data::create([
            'package' => $this->package,
            'number' => $this->number,
            'amount' => $this->amount,
            'user_id' => Auth::user()->id,
        ]);
        session()->flash('message', 'Data Purchased successfully. Please wait while we process');
        $this->resetForm();
    }
    public function render()
    {
        $user = Auth::user()->id;
        $datas = \App\Models\Data::where('user_id', $user)->get();
        return view('livewire.admin.data', compact('datas'));
    }
}
