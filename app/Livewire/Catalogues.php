<?php

namespace App\Livewire;

use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class Catalogues extends Component
{
    use WithFileUploads;
    use WithoutUrlPagination;
    use WithPagination;

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

    // Specifications as array of key-value pairs
    public $specifications = [];

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
        // Initialize with default specifications
        $this->specifications = [
            ['key' => 'Color', 'value' => ''],
            ['key' => 'Weight', 'value' => ''],
            ['key' => 'Material', 'value' => ''],
            ['key' => 'Size/Dimensions', 'value' => ''],
        ];
        $this->isCreating = true;
    }

    public function cancel()
    {
        $this->isCreating = false;
        $this->reset(['name', 'image', 'description', 'category_id', 'catalogueId', 'specifications']);
    }

    public function addSpecification()
    {
        $this->specifications[] = ['key' => '', 'value' => ''];
    }

    public function removeSpecification($index)
    {
        unset($this->specifications[$index]);
        $this->specifications = array_values($this->specifications); // Re-index array
    }

    public function createCatalogue()
    {
        $validated = $this->validate([
            'name' => 'required|min:3',
            'image' => 'required|image|max:10240',
            'description' => 'required|min:10',
            'category_id' => 'required|exists:categories,id',
            'specifications.*.key' => 'nullable|string|max:100',
            'specifications.*.value' => 'nullable|string|max:500',
        ]);

        $imagePath = $this->image->store('products', 'public');

        // Convert specifications array to associative array, filtering empty entries
        $specs = collect($this->specifications)
            ->filter(fn ($spec) => ! empty($spec['key']) && ! empty($spec['value']))
            ->mapWithKeys(fn ($spec) => [$spec['key'] => $spec['value']])
            ->toArray();

        Product::create([
            'name' => $validated['name'],
            'slug' => Str::slug($validated['name']),
            'category_id' => $validated['category_id'],
            'image' => $imagePath,
            'description' => $validated['description'],
            'specification' => $specs,
        ]);

        $this->isCreating = false;
        $this->reset(['name', 'image', 'description', 'category_id', 'specifications']);
        session()->flash('status', 'Product successfully created.');
    }

    public function updateCatalogue()
    {
        $this->validate([
            'name' => 'required|min:3',
            'image' => 'nullable|image|max:10240',
            'description' => 'required|min:10',
            'category_id' => 'required|exists:categories,id',
            'specifications.*.key' => 'nullable|string|max:100',
            'specifications.*.value' => 'nullable|string|max:500',
        ]);

        $product = Product::findOrFail($this->catalogueId);

        // Convert specifications array to associative array, filtering empty entries
        $specs = collect($this->specifications)
            ->filter(fn ($spec) => ! empty($spec['key']) && ! empty($spec['value']))
            ->mapWithKeys(fn ($spec) => [$spec['key'] => $spec['value']])
            ->toArray();

        $data = [
            'name' => $this->name,
            'slug' => Str::slug($this->name),
            'category_id' => $this->category_id,
            'description' => $this->description,
            'specification' => $specs,
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
        $this->reset(['name', 'image', 'description', 'category_id', 'catalogueId', 'specifications']);
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

        // Load specifications - convert from associative array to indexed array with key-value pairs
        if ($product->specification && is_array($product->specification)) {
            $this->specifications = collect($product->specification)
                ->map(fn ($value, $key) => ['key' => $key, 'value' => $value])
                ->values()
                ->toArray();
        } else {
            // Initialize with defaults if no specifications exist
            $this->specifications = [
                ['key' => 'Color', 'value' => ''],
                ['key' => 'Weight', 'value' => ''],
                ['key' => 'Material', 'value' => ''],
                ['key' => 'Size/Dimensions', 'value' => ''],
            ];
        }
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
            $query->where('name', 'like', '%'.$this->search.'%');
        }

        if ($this->categoryFilter) {
            $query->where('category_id', $this->categoryFilter);
        }

        return view('livewire.catalogues', [
            'catalogues' => $query->latest()->paginate($this->perPage),
            'categories' => \App\Models\Category::all(),
        ]);
    }
}
