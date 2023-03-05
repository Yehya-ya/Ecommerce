<?php

namespace App\Http\Livewire\Product;

use App\Models\Product;
use Livewire\Component;

class CreateSlug extends Component
{
    public $slug;

    public $title;

    public $slug_exist;

    public function mount()
    {
        $this->slug_exist = ! empty($this->title);
        $this->slug = Product::slug($this->title);
    }

    public function updateSlug()
    {
        $this->slug_exist = ! empty($this->title);
        $this->slug = Product::slug($this->title);
    }

    public function render()
    {
        return view('livewire.product.create-slug');
    }
}
