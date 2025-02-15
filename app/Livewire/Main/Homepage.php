<?php

namespace App\Livewire\Main;

use App\Models\BundlePlans;
use App\Models\Data;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Throwable;

class Homepage extends Component
{
    #[Layout('layout.user.partials.website-base-user')]


    public $refrence;
    public $package;
    public $number;
    public $user_id;
    public $message;


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

        Data::create([
            'package' => $this->package,
            'number' => '233'.substr($this->number, -9),
            'amount' => $this->package,
            'user_id' => '0',
        ]);
        \sendWithSMSONLINEGH('233'.substr($this->number, -9),
            'Dear Customer your Data your Purchased successfully Your Voucher pin is '.$Voucher.' Happy browsing.');
        session()->flash('message', 'Data Purchased successfully. You will receive an SMS soon with your Voucher Pin');
        $this->resetForm();

    }

    public function render()
    {
        $datas = BundlePlans::all();
        return view('livewire.main.homepage', compact('datas') );
    }
}
