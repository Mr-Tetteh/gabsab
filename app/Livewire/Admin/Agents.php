<?php

namespace App\Livewire\Admin;

use App\Models\Data;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Agents extends Component
{
    #[Layout('layout.admin.partials.website-base-admin')]
    public $modal = false;
    public $id;

    public $package;

    public $number;
    public $amount;
    public $reference;
    public $duration;
    public $agentData = [];
    public function openModal()
    {
        $this->modal = true;
    }

    public function closeModal()
    {
        $this->modal = false;

        $this->id = null;
        $this->amount = null;
        $this->reference = null;
        $this->number = null;
        $this->duration = null;
        $this->package = null;
        $this->agentData = [];

    }

    public function openAgentModal($agentId)
    {
        $this->id = $agentId;
        $this->openModal();
        $this->agentBundleData($agentId);
    }


//    public function agentBundleData($agentId)
//    {
//        $data =  Data::where('agentId', $agentId)->get();
//        return view( )
//
//    }


    public function render()
    {
        $datas = \App\Models\Agents::latest()->paginate(10);
        return view('livewire.admin.agents', compact('datas'));
    }
}
