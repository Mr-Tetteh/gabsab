<?php

namespace App\Livewire\Admin;

use App\Models\ContractFroms;
use App\Models\HomeServiceData;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Contracts extends Component
{
    #[Layout('layout.admin.partials.website-base-admin')]

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
    public $contract_id;

    protected $listeners = ['executeFunctions'];

    public function executeFunctions($id)
    {
        $this->edit($id);
        $this->toggleModal();
    }

    public function toggleModal()
    {
        $this->modal = true;
    }

    public function closeModal()
    {
        $this->modal = false;
    }

    public function edit($id)
    {
       $contract =  ContractFroms::findOrFail($id);
       $this->contract_id = $contract->id;
       $this->first_name = $contract->first_name;
       $this->last_name = $contract->last_name;
       $this->email = $contract->email;
       $this->phone = $contract->phone;
       $this->location = $contract->location;
       $this->ghana_post_gps = $contract->ghana_post_gps;
       $this->contract_type = $contract->contract_type;
       $this->additional_info = $contract->additional_info;
    }

    public function update()
    {
        ContractFroms::findOrFail($this->contract_id)->update([
            'contract_type' => $this->contract_type,
            'status' => $this->status,
        ]);
        $this->closeModal();

    }
    public function render()
    {
        $datas = ContractFroms::latest()->paginate(10);
        $datum = HomeServiceData::all();
        return view('livewire.admin.contracts', compact('datas', 'datum'));
    }
}
