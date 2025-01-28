<?php

namespace App\Livewire\Main;

use App\Models\Data;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Twilio\Rest\Client;

class Homepage extends Component
{
    #[Layout('layout.user.partials.website-base-user')]


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

        Data::create([
            'package' => $this->package,
            'number' => $this->number,
            'amount' => $this->amount,
            'user_id' => '0',
        ]);
        session()->flash('message', 'Data Purchased successfully. You will receive an SMS soon with your Voucher Pin');
        $this->resetForm();
        $this->sendSms();

    }

    public function sendSms()
    {
        $number = \App\Models\Data::whereDate('created_at', Carbon::today())->pluck('number')->last();
        $receiverNumber = '+233' . $number;
        $message = 'Voucher Pin is UIJKSDFH84ERFDW. Happy Browsing. 😊🥳🎉 ';

        $sid = env('TWILIO_SID');
        $token = env('TWILIO_TOKEN');
        $fromNumber = env('TWILIO_FROM');

        try {
            $client = new Client($sid, $token);
            $client->messages->create($receiverNumber, [
                'from' => $fromNumber,
                'body' => $message
            ]);

            return 'SMS Sent Successfully.';
        } catch (Exception $e) {
            return 'Error: ' . $e->getMessage();
        }
    }

    public function render()
    {
        return view('livewire.main.homepage');
    }
}
