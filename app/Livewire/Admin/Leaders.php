<?php

namespace App\Livewire\Admin;

use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

class Leaders extends Component
{
    use WithFileUploads;

    #[Layout('layout.admin.partials.website-base-admin')]

    public $modal = false;
    public $edit = false;
    public $first_name;
    public $last_name;
    public $other_names;
    public $position;
    public $department;
    public $image;
    public $leader_id;

    protected $rules = [
        'first_name' => 'required|string',
        'last_name' => 'required|string',
        'other_names' => 'string',
        'position' => 'required|string',
        'department' => 'required',
        'image' => 'required|file|mimes:jpeg,png,jpg,gif,svg,webp|max:5048'

    ];

    public function resetForm()
    {
        $this->first_name = '';
        $this->last_name = '';
        $this->other_names = '';
        $this->position = '';
        $this->department = '';
        $this->image = '';
    }

    public function executeFunctions($id)
    {
        $this->edit($id);
        $this->modal = true;

    }

    public function edit($id)
    {
      $leader =  \App\Models\Leaders::findOrFail($id);
      $this->leader_id = $leader->id;
      $this->first_name = $leader->first_name;
      $this->last_name = $leader->last_name;
      $this->other_names = $leader->other_names;
      $this->position = $leader->position;
      $this->department = $leader->department;
      $this->image = $leader->image;


    }
    public function delete($id)
    {
        \App\Models\Leaders::findOrFail($id)->delete();
    }

    public function create()
    {
        $this->validate();

        $filePath = $this->image->store('leaders', 'public');

        \App\Models\Leaders::create([
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'other_names' => $this->other_names,
            'position' => $this->position,
            'department' => $this->department,
            'image' => $filePath,

        ]);
        session()->flash('message', 'Leader created successfully.');
        $this->resetForm();

    }

    public function toggleModal()
    {
        $this->modal = true;
    }

    public function closeModal()
    {
        $this->modal = false;

    }

    public function render()
    {
        $datas = \App\Models\Leaders::latest()->paginate(10);
        return view('livewire.admin.leaders', compact('datas'));
    }
}
