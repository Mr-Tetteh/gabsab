<?php

namespace App\Livewire\Admin;

use Livewire\Attributes\Layout;
use Livewire\Component;

class Leaders extends Component
{
    #[Layout('layout.admin.partials.website-base-admin')]

    public $modal;
    public $edit = false;
    public $first_name;
    public $last_name;
    public $other_names;
    public $position;
    public $department;
    public $image;

    public function render()
    {
        $datas = \App\Models\Leaders::latest()->paginate(10);
        return view('livewire.admin.leaders', compact('datas'));
    }
}
