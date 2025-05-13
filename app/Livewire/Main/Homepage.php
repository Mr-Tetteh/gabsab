<?php

namespace App\Livewire\Main;

use App\Models\Agents;
use App\Models\DailyBundle;
use App\Models\Data;
use App\Models\HomeServiceData;
use App\Models\MonthlyBundle;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Stevebauman\Location\Facades\Location;

class Homepage extends Component
{
    #[Layout('layout.user.partials.website-base-user')]
    public $refrence;

    public $package;

    public $duration;

    public $number;

    public $user_id;

    public $message;

    public $agentId;

    public $currentStep = 1;

    public $modal = false;

    public $firstname;

    public $lastname;

    public $email;

    public $phone;

    public $username;

    public function toggleModal()
    {
        $this->modal = true;
    }

    public function closeModal()
    {
        $this->modal = false;
    }

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
                'number' => 'required|numeric|digits:10',
                'package' => 'required',

            ]);
        }

    }

    public function validateAgent()
    {
        $this->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'phone' => 'required|unique:agents,phone',
            'email' => 'required|unique:agents,email',
            'username' => 'required|unique:agents,username',
        ]);
    }

    public function previousStep()
    {
        $this->currentStep--;

    }

    public function user()
    {
        User::where('id', Auth::id());
    }

    protected $rules = [
        'duration' => 'required',
        'package' => 'required',
        'number' => 'required|numeric|digits:10',
    ];

    public function resetForm()
    {
        $this->package = null;
        $this->duration = null;
        $this->number = null;
        $this->amount = null;
        $this->user_id = null;

    }

    public function resetAgent()
    {
        $this->username = null;
        $this->phone = null;
        $this->firstname = null;
        $this->lastname = null;
        $this->email = null;
    }

    public function create()
    {
        $this->validate();
        $Voucher = random_int(00000000, 9999999999);

        Data::create([
            'duration' => $this->duration,
            'package' => $this->package,
            'number' => '233'.substr($this->number, -9),
            'amount' => $this->package,
            'agentId' => $this->agentId,
            'user_id' => '0',
        ]);
//        sendWithSMSONLINEGH('233'.substr($this->number, -9),
//            'Dear Customer your '.$this->duration.' Data has been Purchased successfully!! Your Voucher pin is '.$Voucher.' Happy browsing.');
        session()->flash('message', 'Data Purchased successfully. You will receive an SMS soon with your Voucher Pin');
        $this->resetForm();
        $this->redirect('/');

    }

    public function createAgent()
    {
        $this->validateAgent();
        Agents::create([
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'email' => $this->email,
            'phone' => $this->phone,
            'username' => $this->username,
        ]);

        $this->resetAgent();
        session()->flash('message', 'You have successfully become an agent. Thank you for connecting with Us!');
        $this->redirect('/');

    }

    public function render()
    {
//        $ip = request()->ip();
//        $response = Http::get("https://ipapi.co/{$ip}/json/");
        $datas = DailyBundle::all();
        $weekly = HomeServiceData::all();
        $monthly = MonthlyBundle::all();
        $agents = Agents::all();

        return view('livewire.main.homepage', compact('datas', 'weekly', 'monthly', 'agents'));
    }
}
