<?php

namespace App\Livewire\Admin;

use App\Models\Data;
use Carbon\Carbon;
use Livewire\Attributes\Layout;
use Livewire\Component;
use phpDocumentor\Reflection\Types\Integer;

class AgentsHistory extends Component
{
    #[Layout('layout.admin.partials.website-base-admin')]

    public $package ;
    public $duration;

    public $number;

    public $amount;

    public $quantity;
    public $refrence;

    public function render()
    {
        $now = Carbon::now();

        $allData = Data::with('agent')->whereNotNull('agentId')->latest()->whereMonth('created_at', $now->month)
            ->whereYear('created_at', $now->year)->get();

        $datas = $allData->groupBy('agentId');

        return view('livewire.admin.agents-history', compact('datas'));
    }
}
