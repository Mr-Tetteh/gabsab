<?php

namespace App\Livewire\Admin;

use App\Models\MonthlyBundle;
use Illuminate\Http\Request;
use Livewire\Attributes\Layout;
use Livewire\Component;

class MonthlyBundles extends Component
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
        $this->adv_1 = '';
        $this->adv_2 = '';
        $this->adv_3 = '';
        $this->adv_4 = '';
        $this->adv_5 = '';
        $this->unit_id = '';
        $this->isEdit = false;

    }

    public function create()
    {
       MonthlyBundle::create([
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
        $data = MonthlyBundle::findOrFail($id);
        $this->unit_id = $data->id;
        $this->name = $data->name;
        $this->price = $data->price;
        $this->quantity = $data->quantity;
        $this->adv_1 = $data->adv_1;
        $this->adv_2 = $data->adv_2;
        $this->adv_3 = $data->adv_3;
        $this->adv_4 = $data->adv_4;
        $this->adv_5 = $data->adv_5;
        $this->isEdit = true;


    }

    public function update()
    {
        MonthlyBundle::findOrFail($this->unit_id)->update([
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
    }

    public function delete($id)
    {
        MonthlyBundle::findOrFail($id)->delete();
        session()->flash('message', 'Bundle plan successfully deleted.');
    }
    public function render()
    {
        $datas = \App\Models\MonthlyBundle::latest()->paginate(10);
        return view('livewire.admin.monthly-bundles', compact('datas'));
    }
}
