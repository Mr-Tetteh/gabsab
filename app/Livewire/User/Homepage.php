<?php

namespace App\Livewire\User;

use App\Models\BundlePlans;
use App\Models\HomeServiceData;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Homepage extends Component
{

    #[Layout('layout.user.partials.website-base-user')]

    public function render()
    {
        $datas = BundlePlans::all();
        $datum  =  HomeServiceData::all();
        return view('livewire.user.homepage', compact('datas', 'datum'));
    }
}
