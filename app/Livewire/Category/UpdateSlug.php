<?php

namespace App\Livewire\Category;

use App\Models\Category;
use Livewire\Component;

class UpdateSlug extends Component
{
    public $category_id;

    public $slug;

    public $title;

    public $slug_exist;

    public function mount($category_id, $title)
    {
        $this->title = $title;
        $this->category_id = $category_id;
        $this->slug_exist = ! empty($this->title);
        $this->slug = Category::slug($this->title, $this->category_id);
    }

    public function updateSlug()
    {
        $this->slug_exist = ! empty($this->title);
        $this->slug = Category::slug($this->title, $this->category_id);
    }

    public function render()
    {
        return view('livewire.category.update-slug');
    }
}
