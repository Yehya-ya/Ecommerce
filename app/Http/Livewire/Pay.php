<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class Pay extends Component
{
    public $product;
    public $count;
    public $price;

    public function mount($product_id)
    {
        $this->product = Product::find($product_id);

        if ($this->product) {
            $this->price = $this->product->price;
            $this->count = 1;
        }else{
            $this->price = 0;
            $this->count = 0;
        }

    }

    public function render()
    {
        return view('livewire.pay');
    }

    public function increment()
    {
        if ($this->product && $this->product->stock > $this->count) {
            $this->count++;
            $this->price = $this->product->price * $this->count;
        }
    }

    public function decrement()
    {
        if ($this->product && $this->count > 1) {
            $this->count--;
            $this->price = $this->product->price * $this->count;
            Log::warning($this->price);
        }
    }
}
