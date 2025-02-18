<?php

namespace App\Livewire\Admin;

use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Data extends Component
{
    #[Layout('layout.admin.partials.website-base-admin')]
    public $refrence;
    public $packages = [];
    public $number;
    public $amount;
    public $quantity = '';
    public $user_id;
    public $calculatedTotal = 0; // New property for live total

    protected $rules = [
        'packages' => 'required|array|min:1',
        'number' => 'required|numeric|digits:10',
        'quantity' => 'required|string',
        'amount' => 'required|numeric',
    ];

    protected $messages = [
        'packages.required' => 'Please select at least one data package.',
        'packages.array' => 'Invalid package selection.',
        'number.required' => 'Phone number is required.',
        'number.digits' => 'Phone number must be 10 digits.',
        'amount.required' => 'Amount is required.',
        'amount.numeric' => 'Amount must be a number.',
        'quantity.required' => 'Quantity is required.',
    ];

    public function updated($propertyName)
    {
        if ($propertyName === 'packages' || $propertyName === 'quantity') {
            $this->calculateTotal();
        }
    }

    public function mount()
    {
        $this->calculateTotal(); // Initialize total on component mount
    }

    private function calculateTotal()
    {
        $total = 0;

        if (!empty($this->packages) && !empty($this->quantity)) {
            $quantityArray = array_map('trim', explode(',', $this->quantity));

            if (count($quantityArray) === count($this->packages)) {
                foreach ($this->packages as $index => $package) {
                    if (isset($quantityArray[$index]) && is_numeric($quantityArray[$index]) && $quantityArray[$index] > 0) {
                        $total += (float)$package * (float)$quantityArray[$index];
                    }
                }
            }
        }

        $this->calculatedTotal = $total;
        $this->amount = $total; // Update the amount field as well
    }

    public function resetForm()
    {
        $this->packages = [];
        $this->number = null;
        $this->amount = null;
        $this->user_id = null;
        $this->quantity = '';
        $this->calculatedTotal = 0;
    }

    public function create()
    {
        $this->validate();

        $quantityArray = array_map('trim', explode(',', $this->quantity));

        if (count($quantityArray) !== count($this->packages)) {
            $this->addError('quantity', 'Number of quantities must match number of selected packages');
            return;
        }

        foreach ($quantityArray as $qty) {
            if (!is_numeric($qty) || $qty <= 0) {
                $this->addError('quantity', 'All quantities must be valid positive numbers. Please refresh the page');
                return;
            }
        }

        \App\Models\Data::create([
            'package' => json_encode($this->packages),
            'number' => '233'.substr($this->number, -9),
            'amount' => $this->amount,
            'quantity' => json_encode($quantityArray),
            'user_id' => Auth::user()->id,
        ]);

        session()->flash('message', 'Data Purchased successfully. Please wait while we process');
//        sendWithSMSONLINEGH('233'.substr($this->number, -9), 'Hello '. Auth::user()->first_name .
//            ' your Data your Purchased successfully we will send you the Voucher pins within the next 30 min');
        $this->resetForm();
    }

    public function render()
    {
        $user = Auth::user()->id;
        $datas = \App\Models\Data::where('user_id', $user)->latest()->paginate(10);
        $new_datas = \App\Models\BundlePlans::all();
        return view('livewire.admin.data', compact('datas', 'new_datas'));
    }
}
