<?php

namespace App\Livewire\Admin;

use App\Models\Data;
use Livewire\Attributes\Layout;
use Livewire\Component;

class AgentsWorkHistory extends Component
{
    #[Layout('layout.admin.partials.website-base-admin')]

    public $package ;
    public $duration;

    public $number;

    public $amount;

    public $quantity;

    public function render()
    {
        $agent = Data::with('agent')->latest()->get();

        $datas = $agent->groupBy('agentId');
        return view('livewire.admin.agents-work-history', compact('datas'));
    }
}
