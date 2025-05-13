<?php

namespace App\Livewire\Admin;

use App\Models\Data;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Agents extends Component
{
    #[Layout('layout.admin.partials.website-base-admin')]
    public $modal = false;
    public $id;

    public $package;

    public $number;
    public $amount;
    public $reference;
    public $duration;
    public $agentData = [];




    public function render()
    {
        $datas = \App\Models\Agents::latest()->paginate(10);
        return view('livewire.admin.agents', compact('datas'));
    }
}
