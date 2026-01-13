<?php

namespace App\Livewire;

use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;

class Catalogues extends Component
{
    use WithPagination;
    use WithoutUrlPagination;
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
    public $catalogueId;

    // Filter Properties
    public $search = '';
    public $categoryFilter = '';

    public $perPage = 8;

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function updatedCategoryFilter()
    {
        $this->resetPage();
    }

    public function resetFilters()
    {
        $this->reset(['search', 'categoryFilter']);
        $this->resetPage();
    }

    public function updatedPerPage()
    {
        $this->resetPage();
    }

    public function addCatalogue()
    {
        $this->reset(['name', 'image', 'description', 'category_id', 'catalogueId']);
        $this->isCreating = true;
    }

    public function cancel()
    {
        $this->isCreating = false;
        $this->reset(['name', 'image', 'description', 'category_id', 'catalogueId']);
    }

    public function createCatalogue()
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
        session()->flash('status', 'Product successfully created.');
    }

    public function updateCatalogue()
    {
        $this->validate([
            'name' => 'required|min:3',
            'image' => 'nullable|image|max:10240',
            'description' => 'required|min:10',
            'category_id' => 'required|exists:categories,id',
        ]);

        $product = Product::findOrFail($this->catalogueId);

        $data = [
            'name' => $this->name,
            'slug' => Str::slug($this->name),
            'category_id' => $this->category_id,
            'description' => $this->description,
        ];

        if ($this->image) {
            // Delete old image
            if ($product->image) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($product->image);
            }
            $data['image'] = $this->image->store('products', 'public');
        }

        $product->update($data);

        $this->isCreating = false;
        $this->reset(['name', 'image', 'description', 'category_id', 'catalogueId']);
        session()->flash('status', 'Product successfully updated.');
    }

    public function editCatalogue($id)
    {
        $product = Product::findOrFail($id);
        $this->catalogueId = $id;
        $this->isCreating = true;
        $this->resetValidation();
        $this->resetErrorBag();

        $this->name = $product->name;
        // Don't set image property as it expects a temporary uploaded file object
        // We handle displaying the existing image in the view logic
        $this->reset('image');
        $this->description = $product->description;
        $this->category_id = $product->category_id;
    }


    public function deleteCatalogue($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        session()->flash('status', 'Product successfully deleted.');
    }

    // public function scopeFilter(Builder $query): void
    // {
    //     if (request('search')) {
    //         $query->where('name', 'like', '%' . request('search') . '%');
    //     }
    //     if (request('category')) {
    //         $query->whereHas('category', function ($query) {
    //             $query->where('slug', request('category'));
    //         });
    //     }
    // }

    public function render()
    {
        $query = Product::with('category');

        if ($this->search) {
            $query->where('name', 'like', '%' . $this->search . '%');
        }

        if ($this->categoryFilter) {
            $query->where('category_id', $this->categoryFilter);
        }

        return view('livewire.catalogues', [
            'catalogues' => $query->latest()->paginate($this->perPage),
            'categories' => \App\Models\Category::all()
        ]);
    }
}
