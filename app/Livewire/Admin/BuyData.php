<?php

namespace App\Livewire\Admin;

use App\Models\Data;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

class BuyData extends Component
{
    #[Layout('layout.admin.partials.website-base-admin')]
    public $refrence;
    public $package = [];
    public $number;
    public $user_id;
    public $message;
    public $quantity = '';


    protected $rules = [
        'package' => 'required',
        'number' => 'required|numeric|digits:10',
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
        $Voucher = random_int(00000000, 9999999999);

        $packageName = match ($this->package) {
            '1' => 'One Ghana For Your Pocket',
            '2' => 'Ashanti Two',
            '5' => 'Blue Up',
            default => 'Unknown Package',
        };


        Data::create([
            'package' => $this->package,
            'number' => '233'.substr($this->number, -9),
            'amount' => $this->package,
            'user_id' => Auth::id(),
        ]);

        \sendWithSMSONLINEGH(
            '233' . substr($this->number, -9),
            'Dear ' . Auth::user()->first_name . ', your data package ' . $packageName . ' has been purchased successfully. ' .
            'Your Voucher pin is ' . $Voucher . '. Happy browsing.'
        );
        session()->flash('message', 'Data Purchased successfully. You will receive an SMS soon with your Voucher Pin');
        $this->resetForm();

    }

    public function render()
    {
        $datas = \App\Models\BundlePlans::all();
        $dataum = \App\Models\Data::where('user_id', Auth::id())->get();

        return view('livewire.admin.buy-data', compact('datas', 'dataum'));
    }
}
