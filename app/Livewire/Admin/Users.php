<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Users extends Component
{
    #[Layout('layout.admin.partials.website-base-admin')]

    public $first_name;
    public $last_name;
    public $email;
    public $contact;
    public $address;
    public $role;
    public $gender;
    public $date_of_birth;



    public function render()
    {
        $datas = User::all();
        return view('livewire.admin.users', compact('datas'));
    }
}
