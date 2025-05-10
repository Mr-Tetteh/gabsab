<?php

namespace App\Livewire\Admin;

use App\Models\HomeServiceData;
use App\Models\WeeklyBundle;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Weekly extends Component
{
    #[Layout('layout.admin.partials.website-base-admin')]
    public $modal = false;

    public $name;

    public $price;

    public $quantity;

    public $adv_1;

    public $adv_2;

    public $adv_3;

    public $adv_4;

    public $adv_5;

    public $isEdit = false;

    public $unit_id;

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

    public function restForm()
    {
        $this->name = '';
        $this->price = '';
        $this->quantity = '';
        $this->adv_1 = '';
        $this->adv_2 = '';
        $this->adv_3 = '';
        $this->adv_4 = '';
        $this->adv_5 = '';

    }

    public function create()
    {
        WeeklyBundle::create([
            'name' => $this->name,
            'price' => $this->price,
            'quantity' => $this->quantity,
            'adv_1' => $this->adv_1,
            'adv_2' => $this->adv_2,
            'adv_3' => $this->adv_3,
            'adv_4' => $this->adv_4,
            'adv_5' => $this->adv_5,
        ]);
        $this->restForm();
        session()->flash('message', 'Bundle plan successfully created.');

    }

    public function edit($id)
    {
        $bundle = WeeklyBundle::findOrFail($id);
        $this->unit_id = $bundle->id;
        $this->name = $bundle->name;
        $this->price = $bundle->price;
        $this->quantity = $bundle->quantity;
        $this->adv_1 = $bundle->adv_1;
        $this->adv_2 = $bundle->adv_2;
        $this->adv_3 = $bundle->adv_3;
        $this->adv_4 = $bundle->adv_4;
        $this->adv_5 = $bundle->adv_5;
    }

    public function update()
    {
        WeeklyBundle::findOrFail($this->contract_id)->update([
            'contract_type' => $this->contract_type,
            'status' => $this->status,
        ]);
        $this->closeModal();

    }

    public function render()
    {
        $datas = WeeklyBundle::latest()->paginate(10);
        $datum = HomeServiceData::all();

        return view('livewire.admin.weekly_bundles', compact('datas', 'datum'));
    }
}
