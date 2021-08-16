<?php

namespace App\Http\Livewire\Category;

use App\Models\Category;
use Livewire\Component;

class CreateSlug extends Component
{
    public $slug;
    public $title;
    public $slug_exist;

    public function mount()
    {
        $this->slug_exist = !empty($this->title);
        $this->slug = Category::slug($this->title);
    }

    public function updateSlug()
    {
        $this->slug_exist = !empty($this->title);
        $this->slug = Category::slug($this->title);
    }

    public function render()
    {
        return view('livewire.category.create-slug');
    }
}
