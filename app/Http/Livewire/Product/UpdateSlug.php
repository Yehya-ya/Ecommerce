<?php

namespace App\Http\Livewire\Product;

use App\Models\Product;
use Livewire\Component;

class UpdateSlug extends Component
{
    public $product_id;

    public $slug;

    public $title;

    public $slug_exist;

    public function mount($product_id, $title)
    {
        $this->title = $title;
        $this->product_id = $product_id;
        $this->slug_exist = ! empty($this->title);
        $this->slug = Product::slug($this->title, $this->product_id);
    }

    public function updateSlug()
    {
        $this->slug_exist = ! empty($this->title);
        $this->slug = Product::slug($this->title, $this->product_id);
    }

    public function render()
    {
        return view('livewire.product.update-slug');
    }
}
