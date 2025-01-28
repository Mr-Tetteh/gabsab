<?php

namespace App\Livewire\Admin;

use Carbon\Carbon;
use Exception;
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
        $this->sendSms();
    }

    public function sendWithSMSONLINEGH($receiver, string $massage, string $sender = "Ashanti Hotspot")
    {
        try {
            $url = env('SMS_GH_ONLINE_BASE_URL') . '/v5/sms/send';
            $headers = [
                'Content-Type:application/json',
                'Authorization:key ' . env('SMS_GH_ONLINE_KEY'),
            ];

            $payload = [
                "text" => $massage,
                "type" => 0,
                "sender" => $sender,
                "destinations" => [$receiver]
            ];

            if (env('APP_DEBUG')) {
                return curlPostNoSSL($url, $payload, $headers);
            }

            return Http::withHeaders($headers)->post($url, $payload)->json();

        } catch (Throwable $throwable) {
            return $throwable->getMessage();
        }
    }


    public function sendSms()
    {
        $number = \App\Models\Data::whereDate('created_at', Carbon::today())->pluck('number')->first();
        logger($number);
        /*

        $receiverNumber = '+233 559724772';
        $message = 'hi testing';

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
        }*/
    }

    public function render()
    {
        $user = Auth::user()->id;
        $datas = \App\Models\Data::where('user_id', $user)->get();
        return view('livewire.admin.data', compact('datas'));
    }
}
