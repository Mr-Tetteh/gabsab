<?php

namespace App\Livewire\User;

use App\Models\DailyBundle;
use App\Models\MonthlyBundle;
use App\Models\WeeklyBundle;
use App\Models\HomeServiceData;
use App\Models\Locations;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Homepage extends Component
{#[Layout('layout.user.partials.website-base-user')]

    public $modal = false;
    public $first_name;
    public $last_name;
    public $email;
    public $phone;
    public $location;
    public $ghana_post_gps;
    public $contract_type;
    public $additional_info;
    public $status;



protected $rules = [
    'first_name' => 'required',
    'last_name' => 'required',
    'email' => 'required|email',
    'phone' => 'required',
    'location' => 'required',
    'ghana_post_gps' => 'required',
    'contract_type' => 'required',
];
protected $messages = [
    'first_name.required' => 'First Name is required',
    'last_name.required' => 'Last Name is required',
    'email.required' => 'Email is required',
    'phone.required' => 'Phone number is required',
    'location.required' => 'Location is required',
    'ghana_post_gps.required' => 'Ghana post gps is required',
    'contract_type.required' => 'Please select a contract type',
];
    public function toggleModal()
    {
        $this->modal = true;
    }

    public function closeModal()
    {
        $this->modal = false;
    }

    public function resetForm()
    {
        $this->first_name = null;
        $this->last_name = null;
        $this->email = null;
        $this->phone = null;
        $this->location = null;
        $this->ghana_post_gps = null;
        $this->contract_type = null;
        $this->additional_info = null;
        $this->status = null;


    }

    public function create()
    {
        $this->validate();
        WeeklyBundle::create([
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'phone' => $this->phone,
            'location' => $this->location,
            'ghana_post_gps' => $this->ghana_post_gps,
            'contract_type' => $this->contract_type,
            'additional_info' => $this->additional_info,
        ]);
        session()->flash('message', 'Contract message sent successfully.');
        $this->resetForm();
        $this->closeModal();
    }
    public function render()
    {
        $datas = DailyBundle::all();
        $datum  =  HomeServiceData::all();
        $datass = MonthlyBundle::all();
        $maps = Locations::all();
        $leaders = \App\Models\Leaders::all();
        return view('livewire.user.homepage', compact('datas', 'datum', 'maps', 'leaders', 'datass'));
    }
}
