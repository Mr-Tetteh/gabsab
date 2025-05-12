<?php

namespace App\Livewire\Admin;

use Livewire\Attributes\Layout;
use Livewire\Component;

class Locations extends Component
{
    #[Layout('layout.admin.partials.website-base-admin')]
    public $modal = false;

    public $location_name;

    public $latitude;

    public $longitude;

    public $Edit = false;

    public $location_id;

    public function toggleModal()
    {
        $this->modal = true;
    }

    public function closeModal()
    {
        $this->modal = false;
    }

    protected $rules = [
        'location_name' => 'required',
        'latitude' => 'required|numeric',
        'longitude' => 'required|numeric',
    ];

    public function resetForm()
    {
        $this->location_name = '';
        $this->latitude = '';
        $this->longitude = '';
    }

    public function create()
    {
        \App\Models\Locations::create([
            'location_name' => $this->location_name,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
        ]);
        $this->resetForm();
        $this->modal = false;
        session()->flash('message', 'Location Created Successfully.');
    }

    public function executeFunctions($id)
    {
        $this->modal = true;
        $this->edit($id);

    }

    public function edit($id)
    {
        $location = \App\Models\Locations::findOrFail($id);
        $this->location_name = $location->location_name;
        $this->latitude = $location->latitude;
        $this->longitude = $location->longitude;
        $this->location_id = $location->id;
        $this->Edit = true;
    }

    public function update()
    {
        \App\Models\Locations::find($this->location_id)->update([
            'location_name' => $this->location_name,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
        ]);
        $this->resetForm();
        $this->modal = false;
        $this->Edit = false;
        session()->flash('message', 'Location Updated Successfully.');
    }

    public function delete($id)
    {
        \App\Models\Locations::findOrFail($id)->delete();
        session()->flash('message', 'Location Deleted Successfully.');
    }

    public function render()
    {
        $datas = \App\Models\Locations::all();

        return view('livewire.admin.locations', compact('datas'));
    }
}
