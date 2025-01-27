<?php

namespace App\Livewire\Admin;

use Livewire\Attributes\Layout;
use Livewire\Component;

class PurcahseData extends Component
{
    #[Layout('layout.admin.partials.website-base-admin')]

    public function render()
    {
        $datas = \App\Models\Data::all();
        return view('livewire.admin.purcahse-data', compact('datas'));
    }
}
