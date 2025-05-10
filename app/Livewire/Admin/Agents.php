<?php

namespace App\Livewire\Admin;

use Livewire\Attributes\Layout;
use Livewire\Component;

class Agents extends Component
{
    #[Layout('layout.admin.partials.website-base-admin')]

    public $modal;
    public function render()
    {
        $datas = \App\Models\Agents::latest()->paginate(10);
        return view('livewire.admin.agents', compact('datas'));
    }
}
