<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Currency extends Component
{
    public $symbol;
    public $cid;
    public $price;
    public $decimal;

    public function mount($price = null)
    {
        if ($price) {
            $this->price = intval($price / 100);
            $this->decimal = $price - $this->price * 100;
        } else {
            $this->price = '';
            $this->decimal = '';
        }
        $this->symbol = "$";
        $this->cid = 'USD';
    }

    public function change($cid)
    {
        if (in_array($cid, config('currency.currencies'))) {
            $this->cid = $cid;
            $this->symbol = config('currency.symbols.'.$cid);
        }
    }

    public function render()
    {
        return view('livewire.currency');
    }
}
