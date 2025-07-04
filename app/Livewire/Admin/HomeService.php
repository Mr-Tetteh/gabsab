<?php

namespace App\Livewire\Admin;

use App\Models\HomeServiceData;
use Livewire\Attributes\Layout;
use Livewire\Component;

class HomeService extends Component
{
    #[Layout('layout.admin.partials.website-base-admin')]
    public $name;

    public $price;

    public $quantity;

    public $advantage_1;

    public $advantage_2;

    public $advantage_3;

    public $advantage_4;

    public $advantage_5;

    public $isEdit;

    public $unit_id;

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
        $this->advantage_1 = '';
        $this->advantage_2 = '';
        $this->advantage_3 = '';
        $this->advantage_4 = '';
        $this->advantage_5 = '';

    }

    public function create()
    {
        HomeServiceData::create([
            'name' => $this->name,
            'price' => $this->price,
            'quantity' => $this->quantity,
            'advantage_1' => $this->advantage_1,
            'advantage_2' => $this->advantage_2,
            'advantage_3' => $this->advantage_3,
            'advantage_4' => $this->advantage_4,
            'advantage_5' => $this->advantage_5,

        ]);
        $this->restForm();
        $this->restForm();
        session()->flash('message', 'Bundle plan successfully created.');
    }

    public function edit($id)
    {
        $bundle = HomeServiceData::findOrFail($id);
        $this->unit_id = $bundle->id;
        $this->name = $bundle->name;
        $this->price = $bundle->price;
        $this->quantity = $bundle->quantity;
        $this->advantage_1 = $bundle->advantage_1;
        $this->advantage_2 = $bundle->advantage_2;
        $this->advantage_3 = $bundle->advantage_3;
        $this->advantage_4 = $bundle->advantage_4;
        $this->advantage_5 = $bundle->advantage_5;
        $this->isEdit = true;
    }

    public function update()
    {
        $this->validate();
        $bundle = HomeServiceData::findorFail($this->unit_id);
        $bundle->update([
            'name' => $this->name,
            'price' => $this->price,
            'quantity' => $this->quantity,
            'advantage_1' => $this->advantage_1,
            'advantage_2' => $this->advantage_2,
            'advantage_3' => $this->advantage_3,
            'advantage_4' => $this->advantage_4,
            'advantage_5' => $this->advantage_5,
        ]);
        $this->restForm();
        session()->flash('message', 'Bundle plan successfully updated.');
        $this->isEdit = false;
    }

    public function delete($id)
    {
        HomeServiceData::findOrFail($id)->delete();
    }

    public function render()
    {
        $datas = HomeServiceData::latest()->paginate(10);

        return view('livewire.admin.weekly_bundles', compact('datas'));
    }
}
