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
    public $user_id;
    public $modal;
    public $isEdit = false;


    public function resetForm()
    {
        $this->first_name = '';
        $this->last_name = '';
        $this->email = '';
        $this->contact = '';
        $this->address = '';
        $this->role = '';
        $this->gender = '';
        $this->date_of_birth = '';


    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $this->user_id = $user->id;
        $this->first_name = $user->first_name;
        $this->last_name = $user->last_name;
        $this->email = $user->email;
        $this->contact = $user->contact;
        $this->address = $user->address;
        $this->role = $user->role;

        $this->isEdit = true;

    }

    protected $listeners = ['executeFunctions'];


    public function executeFunctions($id)
    {
        $this->edit($id);
        $this->toggleModal();
    }
    public function toggleModal()
    {
        $this->modal = true;
    }

    public function closeModal()
    {
        $this->modal = false;
    }

    public function updateRole()
    {
        $this->validate([
            'role' => 'required',
        ]);

        $user = User::find($this->user_id);
        $user->update([
           'role' => $this->role,
       ]);
       session()->flash('message', 'User Role Updated Successfully.');
       $this->resetForm();
       $this->isEdit = false;
       $this->modal = false;
    }

    public function render()
    {
        $datas = User::latest()->paginate(10);
        return view('livewire.admin.users', compact('datas'));
    }
}
