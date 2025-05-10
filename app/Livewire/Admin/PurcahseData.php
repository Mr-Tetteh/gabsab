<?php

namespace App\Livewire\Admin;

use Livewire\Attributes\Layout;
use Livewire\Component;

class PurcahseData extends Component
{
    #[Layout('layout.admin.partials.website-base-admin')]
    public $refrence;

    public $packages = [];
    public $duration;

    public $number;

    public $amount;

    public $quantity = '';

    public $user_id;

    public function render()
    {
        $datas = \App\Models\Data::latest()->paginate(10);

        return view('livewire.admin.purcahse-data', compact('datas'));
    }
}
