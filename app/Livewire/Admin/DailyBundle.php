<?php

namespace App\Livewire\Admin;

use Livewire\Attributes\Layout;
use Livewire\Component;

class DailyBundle extends Component
{
    #[Layout('layout.admin.partials.website-base-admin')]
    public $name;

    public $price;

    public $quantity;

    public $adv_1;

    public $adv_2;

    public $adv_3;

    public $adv_4;

    public $adv_5;

    public $unit_id;

    public $isEdit = false;

    protected $rules = [
        'name' => 'required|string|',
        'price' => 'required|numeric',
        'quantity' => 'required',
    ];

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
        \App\Models\DailyBundle::create([
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
        $bundle = \App\Models\DailyBundle::findOrFail($id);
        $this->unit_id = $bundle->id;
        $this->name = $bundle->name;
        $this->price = $bundle->price;
        $this->quantity = $bundle->quantity;
        $this->adv_1 = $bundle->adv_1;
        $this->adv_2 = $bundle->adv_2;
        $this->adv_3 = $bundle->adv_3;
        $this->adv_4 = $bundle->adv_4;
        $this->adv_5 = $bundle->adv_5;
        $this->isEdit = true;
    }

    public function update()
    {
        $this->validate();
        $bundle = \App\Models\DailyBundle::findorFail($this->unit_id);
        $bundle->update([
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
        session()->flash('message', 'Bundle plan successfully updated.');
        $this->isEdit = false;
    }

    public function delete($id)
    {
        \App\Models\DailyBundle::findOrFail($id)->delete();
    }

    public function render()
    {
        $datas = \App\Models\DailyBundle::latest()->paginate(5);

        return view('livewire.admin.daily_bundle-plans', compact('datas'));
    }
}
