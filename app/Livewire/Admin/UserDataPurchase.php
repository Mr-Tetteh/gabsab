<?php

namespace App\Livewire\Admin;

use App\Models\DailyBundle;
use App\Models\Data;
use App\Models\HomeServiceData;
use App\Models\MonthlyBundle;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

class UserDataPurchase extends Component
{
    #[Layout('layout.admin.partials.website-base-admin')]

    public $refrence;

    public $package;

    public $duration;

    public $contact;

    public $user_id;

    public $message;

    public $agentId;

    public $currentStep = 1;
    public $first_name;


    public function nextStep()
    {
        $this->validateStep();
        $this->currentStep++;
    }

    public function validateStep()
    {
        if ($this->currentStep == 1) {
            $this->validate([
                'duration' => 'required',
            ]);
        } elseif ($this->currentStep == 2) {
            $this->validate([
                'contact' => 'required|numeric|digits:10',
                'package' => 'required',

            ]);
        }

    }


    public function previousStep()
    {
        $this->currentStep--;

    }

    protected $rules = [
        'duration' => 'required',
        'package' => 'required',
        'contact' => 'required|numeric|digits:10',
    ];

    public function resetForm()
    {
        $this->package = null;
        $this->duration = null;
        $this->contact = null;
        $this->amount = null;
        $this->user_id = null;

    }

    public function mount()
    {
        $this->contact = Auth::user()->contact;
    }


    public function create()
    {
        $this->validate();
        $Voucher = random_int(00000000, 9999999999);

        Data::create([
            'duration' => $this->duration,
            'package' => $this->package,
            'number' => '233'.substr($this->contact, -9),
            'amount' => $this->package,
            'agentId' => $this->agentId,
            'user_id' => Auth::id()
        ]);
//        sendWithSMSONLINEGH('233'.substr($this->contact, -9),
//            'Dear Customer your '.$this->duration.' Data has been Purchased successfully!! Your Voucher pin is '
//            .$Voucher.' Happy browsing.');
        session()->flash('message', 'Data Purchased successfully. You will receive an SMS soon with your Voucher Pin');
        $this->resetForm();
        $this->redirect('user_data_purchase');


    }


    public function render()
    {
        $datas = DailyBundle::all();
        $weekly = HomeServiceData::all();
        $monthly = MonthlyBundle::all();
        $userDataHistory = Data::where('user_id', Auth::id())->latest()->paginate(10);
        return view('livewire.admin.user-data-purchase', compact('datas', 'weekly', 'monthly', 'userDataHistory'));
    }
}
