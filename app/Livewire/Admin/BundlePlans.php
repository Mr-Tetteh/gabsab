<?php

namespace App\Livewire\Admin;

use Livewire\Attributes\Layout;
use Livewire\Component;

class BundlePlans extends Component
{
    #[Layout('layout.admin.partials.website-base-admin')]

    public $name;
    public $price;
    public $quantity;
    public $devices;
    public $adv_1;
    public $adv_2;
    public $adv_3;
    public $adv_4;
    public $adv_5;
    public $adv_6;
    public $adv_7;
    public $adv_8;
    public $adv_9;
    public $adv_10;
    public $adv_11;
    public $adv_12;
    public $adv_13;
    public $adv_14;
    public $adv_15;
    public $unit_id;
    public $isEdit = false;

    protected $rules = [
        'name' => 'required|string|',
        'price' => 'required|numeric',
        'quantity' => 'required',
        'devices' => 'required',
    ];

    public function restForm()
    {
        $this->name = '';
        $this->price = '';
        $this->quantity = '';
        $this->devices = '';
        $this->adv_1 = '';
        $this->adv_2 = '';
        $this->adv_3 = '';
        $this->adv_4 = '';
        $this->adv_5 = '';
        $this->adv_6 = '';
        $this->adv_7 = '';
        $this->adv_8 = '';
        $this->adv_9 = '';
        $this->adv_10 = '';
        $this->adv_11 = '';
        $this->adv_12 = '';
        $this->adv_13 = '';
        $this->adv_14 = '';
        $this->adv_15 = '';

    }

    public function create()
    {
        \App\Models\BundlePlans::create([
            'name' => $this->name,
            'price' => $this->price,
            'quantity' => $this->quantity,
            'devices' => $this->devices,
            'adv_1' => $this->adv_1,
            'adv_2' => $this->adv_2,
            'adv_3' => $this->adv_3,
            'adv_4' => $this->adv_4,
            'adv_5' => $this->adv_5,
            'adv_6' => $this->adv_6,
            'adv_7' => $this->adv_7,
            'adv_8' => $this->adv_8,
            'adv_9' => $this->adv_9,
            'adv_10' => $this->adv_10,
            'adv_11' => $this->adv_11,
            'adv_12' => $this->adv_12,
            'adv_13' => $this->adv_13,
            'adv_14' => $this->adv_14,
            'adv_15' => $this->adv_15,
        ]);
        $this->restForm();
        session()->flash('message', 'Bundle plan successfully created.');
    }
    public function edit($id)
    {
        $bundle = \App\Models\BundlePlans::findOrFail($id);
        $this->unit_id = $bundle->id;
        $this->name = $bundle->name;
        $this->price = $bundle->price;
        $this->devices = $bundle->devices;
        $this->quantity = $bundle->quantity;
        $this->adv_1 = $bundle->adv_1;
        $this->adv_2 = $bundle->adv_2;
        $this->adv_3 = $bundle->adv_3;
        $this->adv_4 = $bundle->adv_4;
        $this->adv_5 = $bundle->adv_5;
        $this->adv_6 = $bundle->adv_6;
        $this->adv_7 = $bundle->adv_7;
        $this->adv_8 = $bundle->adv_8;
        $this->adv_9 = $bundle->adv_9;
        $this->adv_10 = $bundle->adv_10;
        $this->adv_11 = $bundle->adv_11;
        $this->adv_12 = $bundle->adv_12;
        $this->adv_13 = $bundle->adv_13;
        $this->adv_14 = $bundle->adv_14;
        $this->adv_15 = $bundle->adv_15;
        $this->isEdit = true;
    }

    public function update()
    {
        $this->validate();
        $bundle = \App\Models\BundlePlans::findorFail($this->unit_id);
        $bundle->update([
            'name' => $this->name,
            'price' => $this->price,
            'quantity' => $this->quantity,
            'devices' => $this->devices,
            'adv_1' => $this->adv_1,
            'adv_2' => $this->adv_2,
            'adv_3' => $this->adv_3,
            'adv_4' => $this->adv_4,
            'adv_5' => $this->adv_5,
            'adv_6' => $this->adv_6,
            'adv_7' => $this->adv_7,
            'adv_8' => $this->adv_8,
            'adv_9' => $this->adv_9,
            'adv_10' => $this->adv_10,
            'adv_11' => $this->adv_11,
            'adv_12' => $this->adv_12,
            'adv_13' => $this->adv_13,
            'adv_14' => $this->adv_14,
            'adv_15' => $this->adv_15,
        ]);
        $this->restForm();
        session()->flash('message', 'Bundle plan successfully updated.');
        $this->isEdit = false;
    }

    public function delete($id)
    {
        \App\Models\BundlePlans::findOrFail($id)->delete();
    }
    public function render()
    {
        $datas = \App\Models\BundlePlans::latest()->paginate(5);
        return view('livewire.admin.bundle-plans', compact('datas'));
    }
}
