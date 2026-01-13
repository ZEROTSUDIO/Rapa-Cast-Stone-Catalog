<?php

namespace App\Livewire;

use App\Models\Product;
use Illuminate\Support\Str;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Catalogues extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $isCreating = false;

    #[Validate('required|min:3')]
    public $name;

    #[Validate('image|max:10240')] // Removed required to allow editing later if needed, but for create it acts as required if handled in store
    public $image;

    #[Validate('required|min:10')]
    public $description;

    #[Validate('required|exists:categories,id')]
    public $category_id;

    public function create()
    {
        $this->reset(['name', 'image', 'description', 'category_id']);
        $this->isCreating = true;
    }

    public function cancel()
    {
        $this->isCreating = false;
        $this->reset(['name', 'image', 'description', 'category_id']);
    }

    public function store()
    {
        $validated = $this->validate([
            'name' => 'required|min:3',
            'image' => 'required|image|max:10240',
            'description' => 'required|min:10',
            'category_id' => 'required|exists:categories,id',
        ]);

        $imagePath = $this->image->store('products', 'public');

        Product::create([
            'name' => $validated['name'],
            'slug' => Str::slug($validated['name']),
            'category_id' => $validated['category_id'],
            'image' => $imagePath,
            'description' => $validated['description'],
        ]);

        $this->isCreating = false;
        $this->reset(['name', 'image', 'description', 'category_id']);
        session()->flash('status', 'Product successfully created.');
    }

    public function render()
    {
        return view('livewire.catalogues', [
            'catalogues' => Product::latest()->get(),
            'categories' => \App\Models\Category::all()
        ]);
    }
}
