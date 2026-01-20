<?php

namespace App\Livewire;

use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Laravel\Facades\Image;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;
use App\Models\ProductImage;

class Catalogues extends Component
{
    use WithFileUploads;
    use WithoutUrlPagination;
    use WithPagination;

    public $isCreating = false;

    #[Validate('required')]
    public $code;

    #[Validate('required|min:3')]
    public $name;

    // NEW: Property to receive file uploads from input
    public $images = [];

    // NEW: Tracks processed uploads with temp URLs before submission
    public $newImages = [];

    // NEW: Collection of existing ProductImage models (for edit mode)
    public $existingImages = [];

    // NEW: Track which existing images should be deleted
    public $removedImageIds = [];

    #[Validate('required|min:10')]
    public $description;

    #[Validate('required|exists:categories,id')]
    public $category_id;

    public $catalogueId;

    public $specifications = [];
    public $isFeatured = false;

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

    // NEW: Automatically triggered when files are uploaded
    public function updatedImages()
    {
        // Validate immediately
        $this->validate([
            'images.*' => 'image|max:10240',
        ]);

        // Process each uploaded file and add to newImages array
        foreach ($this->images as $image) {
            $this->newImages[] = [
                'id' => uniqid('img_', true), // Unique ID for tracking
                'file' => $image,
                'temp_url' => $image->temporaryUrl(),
            ];
        }

        // Clear images property to allow new uploads
        $this->images = [];
    }

    // NEW: Remove a newly uploaded image before form submission
    public function removeNewImage($imageId)
    {
        $this->newImages = array_values(
            array_filter($this->newImages, fn($img) => $img['id'] !== $imageId)
        );
    }

    // NEW: Mark existing image for deletion and remove from display
    public function deleteImage($imageId)
    {
        $this->removedImageIds[] = $imageId;
        $this->existingImages = $this->existingImages->reject(fn($img) => $img->id === $imageId);
    }

    // NEW: Handle drag-and-drop reordering
    public function reorderImages($orderedIds)
    {
        // Reorder new images
        $newOrdered = [];
        foreach ($orderedIds as $index => $id) {
            if (strpos($id, 'new-') === 0) {
                $actualId = str_replace('new-', '', $id);
                foreach ($this->newImages as $img) {
                    if ($img['id'] === $actualId) {
                        $newOrdered[] = $img;
                        break;
                    }
                }
            }
        }
        if (!empty($newOrdered)) {
            $this->newImages = $newOrdered;
        }

        // Reorder existing images in database
        foreach ($orderedIds as $index => $id) {
            if (strpos($id, 'existing-') === 0) {
                $actualId = str_replace('existing-', '', $id);
                ProductImage::where('id', $actualId)->update(['sort_order' => $index]);
            }
        }

        // Refresh existing images collection
        if ($this->catalogueId) {
            $this->existingImages = ProductImage::where('product_id', $this->catalogueId)
                ->orderBy('sort_order')
                ->get();
        }
    }

    public function addCatalogue()
    {
        // Reset everything for new product
        $this->reset([
            'code',
            'name',
            'description',
            'category_id',
            'catalogueId',
            'newImages',
            'existingImages',
            'removedImageIds',
            'images'
        ]);

        // Initialize default specifications
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

        // Reset all form fields
        $this->reset([
            'code',
            'name',
            'description',
            'category_id',
            'catalogueId',
            'specifications',
            'newImages',
            'existingImages',
            'removedImageIds',
            'images'
        ]);
    }

    public function addSpecification()
    {
        $this->specifications[] = ['key' => '', 'value' => ''];
    }

    public function removeSpecification($index)
    {
        unset($this->specifications[$index]);
        $this->specifications = array_values($this->specifications);
    }

    public function createCatalogue()
    {
        $validated = $this->validate([
            'code' => 'required',
            'name' => 'required|min:3',
            'description' => 'required|min:10',
            'category_id' => 'required|exists:categories,id',
            'specifications.*.key' => 'nullable|string|max:100',
            'specifications.*.value' => 'nullable|string|max:500',
        ]);

        // NEW: Process new uploaded images
        $mainImagePath = null;
        $savedImages = [];

        if (!empty($this->newImages)) {
            foreach ($this->newImages as $index => $imgData) {
                $img = $imgData['file'];
                $slug = Str::slug($validated['name']);
                $extension = strtolower($img->getClientOriginalExtension());
                $filename = $slug . '-' . substr(md5(uniqid()), 0, 6) . '.' . $extension;

                // Process image with Intervention
                $processedImage = Image::read($img->getRealPath())
                    ->toWebp(85);

                $path = 'products/' . $filename;
                Storage::disk('public_direct')->put($path, (string) $processedImage);

                $savedImages[] = ['path' => $path, 'order' => $index];

                // First image becomes the main/featured image
                if ($index === 0) {
                    $mainImagePath = $path;
                }
            }
        }

        // Process specifications
        $specs = collect($this->specifications)
            ->filter(fn($spec) => !empty($spec['key']) && !empty($spec['value']))
            ->mapWithKeys(fn($spec) => [$spec['key'] => $spec['value']])
            ->toArray();

        // Create product
        $product = Product::create([
            'code' => $validated['code'],
            'name' => $validated['name'],
            'slug' => Str::slug($validated['name']),
            'category_id' => $validated['category_id'],
            'image' => $mainImagePath, // Main featured image
            'description' => $validated['description'],
            'specification' => $specs,
            'is_featured' => $this->isFeatured,
        ]);

        // Save all images to product_images table
        if (!empty($savedImages)) {
            foreach ($savedImages as $imgData) {
                ProductImage::create([
                    'product_id' => $product->id,
                    'image_path' => $imgData['path'],
                    'sort_order' => $imgData['order'],
                ]);
            }
        }

        $this->isCreating = false;

        // Reset form
        $this->reset([
            'code',
            'name',
            'description',
            'category_id',
            'specifications',
            'newImages',
            'images'
        ]);

        session()->flash('status', 'Product successfully created.');
    }

    public function updateCatalogue()
    {
        $validated = $this->validate([
            'code' => 'required',
            'name' => 'required|min:3',
            'description' => 'required|min:10',
            'category_id' => 'required|exists:categories,id',
            'specifications.*.key' => 'nullable|string|max:100',
            'specifications.*.value' => 'nullable|string|max:500',
        ]);

        $product = Product::findOrFail($this->catalogueId);

        // NEW: Delete removed images from storage and database
        if (!empty($this->removedImageIds)) {
            foreach ($this->removedImageIds as $imgId) {
                $image = ProductImage::find($imgId);
                if ($image) {
                    // Delete file from storage
                    if (Storage::disk('public_direct')->exists($image->image_path)) {
                        Storage::disk('public_direct')->delete($image->image_path);
                    }

                    // Delete database record
                    $image->delete();
                }
            }
        }

        // NEW: Process and save new uploaded images
        $newMainImage = null;
        $currentMaxOrder = ProductImage::where('product_id', $this->catalogueId)->max('sort_order') ?? -1;

        if (!empty($this->newImages)) {
            foreach ($this->newImages as $index => $imgData) {
                $img = $imgData['file'];
                $slug = Str::slug($validated['name']);
                $extension = strtolower($img->getClientOriginalExtension());
                $filename = $slug . '-' . substr(md5(uniqid()), 0, 6) . '.' . $extension;

                // Process image
                $processedImage = Image::read($img->getRealPath())
                    ->toWebp(85);

                $path = 'products/' . $filename;
                Storage::disk('public_direct')->put($path, (string) $processedImage);

                // Save to database
                ProductImage::create([
                    'product_id' => $this->catalogueId,
                    'image_path' => $path,
                    'sort_order' => $currentMaxOrder + 1 + $index,
                ]);

                // If no existing images, set first new image as main
                if ($index === 0 && $this->existingImages->isEmpty()) {
                    $newMainImage = $path;
                }
            }
        }

        // Process specifications
        $specs = collect($this->specifications)
            ->filter(fn($spec) => !empty($spec['key']) && !empty($spec['value']))
            ->mapWithKeys(fn($spec) => [$spec['key'] => $spec['value']])
            ->toArray();

        // Prepare update data
        $updateData = [
            'code' => $validated['code'],
            'name' => $validated['name'],
            'slug' => Str::slug($validated['name']),
            'category_id' => $validated['category_id'],
            'description' => $validated['description'],
            'specification' => $specs,
            'is_featured' => $this->isFeatured,
        ];

        // Update main image if needed
        if ($newMainImage) {
            $updateData['image'] = $newMainImage;
        } elseif ($this->existingImages->isNotEmpty()) {
            // Set first existing image as main
            $updateData['image'] = $this->existingImages->first()->image_path;
        } else {
            // No images at all
            $updateData['image'] = null;
        }

        $product->update($updateData);

        $this->isCreating = false;

        // Reset form
        $this->reset([
            'code',
            'name',
            'description',
            'category_id',
            'catalogueId',
            'specifications',
            'newImages',
            'existingImages',
            'removedImageIds',
            'images'
        ]);

        session()->flash('status', 'Product successfully updated.');
    }

    public function editCatalogue($id)
    {
        $product = Product::findOrFail($id);

        $this->catalogueId = $id;
        $this->isCreating = true;
        $this->resetValidation();
        $this->resetErrorBag();

        // Load product data
        $this->code = $product->code;
        $this->name = $product->name;
        $this->description = $product->description;
        $this->category_id = $product->category_id;
        $this->isFeatured = $product->is_featured;

        // NEW: Load existing images
        $this->existingImages = $product->images()->orderBy('sort_order')->get();

        // Reset upload-related properties
        $this->reset(['images', 'newImages', 'removedImageIds']);

        // Load specifications
        if ($product->specification && is_array($product->specification)) {
            $this->specifications = collect($product->specification)
                ->map(fn($value, $key) => ['key' => $key, 'value' => $value])
                ->values()
                ->toArray();
        } else {
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

        // Delete all product images from storage
        foreach ($product->images as $image) {
            if (Storage::disk('public_direct')->exists($image->image_path)) {
                Storage::disk('public_direct')->delete($image->image_path);
            }
        }

        // Delete main image if different from product images
        if ($product->image && Storage::disk('public_direct')->exists($product->image)) {
            Storage::disk('public_direct')->delete($product->image);
        }

        $product->delete();
        session()->flash('status', 'Product successfully deleted.');
    }

    public function toggleFeatured($id)
    {
        $product = Product::findOrFail($id);
        $product->update(['is_featured' => !$product->is_featured]);
        session()->flash('status', 'Product featured status updated.');
    }

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
            'categories' => \App\Models\Category::all(),
        ]);
    }
}
