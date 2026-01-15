<div id="table" class="page animate-slide-in" x-data="{ showDeleteModal: false, deleteId: null }">
    <div class="mb-8">
        <h1 class="text-4xl font-bold text-premium-dark mb-2">
            Catalogue
        </h1>
        <p class="text-gray-500">
            @if ($isCreating)
                {{ $catalogueId ? 'Edit Data Product' : 'Tambah Data Product' }}
            @else
                Data Tabel Product
            @endif
        </p>
    </div>

    @if ($isCreating)
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden animate-slide-in">
            <div
                class="bg-gradient-to-r from-gray-50 to-gray-100 px-6 py-4 border-b border-gray-200 justify-between flex">
                <h2 class="text-lg font-bold text-premium-dark">
                    Informasi Catalog
                </h2>
                <button wire:click="cancel"
                    class="gradient-gold text-white px-4 py-2 rounded-lg font-semibold shadow-md hover:shadow-lg transition-all duration-300 hover:scale-105">
                    <i class="fas fa-arrow-left mr-2"></i>Kembali
                </button>
            </div>
            <div class="p-6">
                <form wire:submit.prevent="{{ $catalogueId ? 'updateCatalogue' : 'createCatalogue' }}">
                    <div class="mb-6">
                        <label class="block text-sm font-semibold text-premium-dark mb-2">Nama </label>
                        <input wire:model="name" type="text"
                            class="w-full px-4 py-3 rounded-lg border-2 border-gray-200 focus:border-gold-accent focus:ring-2 focus:ring-gold-accent/20 outline-none transition-all"
                            placeholder="Nama Product" />
                        @error('name')
                            <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <label class="block text-sm font-semibold text-premium-dark mb-2">Category</label>
                        <select wire:model="category_id"
                            class="w-full px-4 py-3 rounded-lg border-2 border-gray-200 focus:border-gold-accent focus:ring-2 focus:ring-gold-accent/20 outline-none transition-all">
                            <option>Pilih Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <label for="image" class="block text-sm font-semibold text-premium-dark mb-2">Featured
                            Image</label>
                        <div id="imageUpload" @click="$refs.image.click()"
                            class="relative border-2 border-dashed border-gray-300 rounded-xl p-12 text-center cursor-pointer hover:border-gold-accent hover:bg-gray-50 transition-all duration-300 flex flex-col justify-center items-center overflow-hidden min-h-[250px]">

                            <div wire:loading wire:target="image"
                                class="absolute inset-0 bg-white/90 flex flex-col justify-center items-center z-10 backdrop-blur-sm">
                                <i class="fas fa-circle-notch fa-spin text-4xl text-gold-accent mb-3"></i>
                                <p class="text-gray-600 font-semibold animate-pulse">Uploading Image...</p>
                            </div>

                            @if ($image)
                                <img src="{{ $image->temporaryUrl() }}"
                                    class="max-h-[300px] w-full object-contain rounded-lg shadow-sm" />
                                <p class="text-xs text-gray-500 mt-2 bg-white/80 px-3 py-1 rounded-full shadow-sm">Click
                                    to change</p>
                            @elseif($catalogueId && \App\Models\Product::find($catalogueId)->image)
                                <img src="{{ asset('storage/' . \App\Models\Product::find($catalogueId)->image) }}"
                                    class="max-h-[300px] w-full object-contain rounded-lg shadow-sm" />
                                <p class="text-xs text-gray-500 mt-2 bg-white/80 px-3 py-1 rounded-full shadow-sm">Click
                                    to change</p>
                            @else
                                <i class="fas fa-cloud-upload-alt text-5xl text-gold-accent mb-4"></i>
                                <h5 class="text-lg font-semibold text-gray-700 mb-2">
                                    Click to upload image
                                </h5>
                                <p class="text-sm text-gray-500">
                                    PNG, JPG, GIF up to 10MB
                                </p>
                            @endif
                        </div>
                        <input wire:model.live="image" x-ref="image" type="file" id="image" class="hidden"
                            accept="image/*" />
                        @error('image')
                            <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <label class="block text-sm font-semibold text-premium-dark mb-2">Deskripsi</label>
                        <textarea wire:model="description" cols="30" rows="10"
                            class="w-full px-4 py-3 rounded-lg border-2 border-gray-200 focus:border-gold-accent focus:ring-2 focus:ring-gold-accent/20 outline-none transition-all"></textarea>
                        @error('description')
                            <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Product Specifications Section --}}
                    <div class="mb-6">
                        <div class="flex justify-between items-center mb-4">
                            <label class="block text-sm font-semibold text-premium-dark">Product Specifications</label>
                            <button type="button" wire:click="addSpecification"
                                class="text-sm gradient-gold text-white px-4 py-2 rounded-lg font-semibold shadow-md hover:shadow-lg transition-all duration-300 hover:scale-105">
                                <i class="fas fa-plus-circle mr-1"></i>Add Specification
                            </button>
                        </div>

                        <div class="space-y-3">
                            @foreach ($specifications as $index => $spec)
                                <div wire:key="spec-{{ $index }}"
                                    class="flex gap-3 items-start p-4 bg-gray-50 rounded-xl border-2 border-gray-200 hover:border-gold-accent/50 transition-all duration-300">
                                    <div class="flex-1 grid grid-cols-1 md:grid-cols-2 gap-3">
                                        <div>
                                            <input type="text" wire:model="specifications.{{ $index }}.key"
                                                placeholder="Specification Name (e.g., Color)"
                                                class="w-full px-4 py-2.5 rounded-lg border-2 border-gray-200 focus:border-gold-accent focus:ring-2 focus:ring-gold-accent/20 outline-none transition-all text-sm" />
                                            @error('specifications.' . $index . '.key')
                                                <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div>
                                            <input type="text" wire:model="specifications.{{ $index }}.value"
                                                placeholder="Value (e.g., White, Gray, Black)"
                                                class="w-full px-4 py-2.5 rounded-lg border-2 border-gray-200 focus:border-gold-accent focus:ring-2 focus:ring-gold-accent/20 outline-none transition-all text-sm" />
                                            @error('specifications.' . $index . '.value')
                                                <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <button type="button" wire:click="removeSpecification({{ $index }})"
                                        class="mt-0.5 text-red-600 hover:text-red-800 hover:bg-red-50 p-2.5 rounded-lg transition-all duration-300"
                                        title="Remove specification">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            @endforeach

                            @if (empty($specifications))
                                <div class="text-center py-8 text-gray-400">
                                    <i class="fas fa-list-ul text-3xl mb-2"></i>
                                    <p class="text-sm">No specifications added yet. Click "Add Specification" to start.
                                    </p>
                                </div>
                            @endif
                        </div>

                        <p class="text-xs text-gray-500 mt-3">
                            <i class="fas fa-info-circle mr-1"></i>Add product specifications like color, weight,
                            material, or any custom attributes. Empty fields will be ignored.
                        </p>
                    </div>

                    <div class="flex gap-3">
                        <button type="submit"
                            class="gradient-gold text-white px-8 py-3 rounded-xl font-semibold shadow-lg hover:shadow-xl transition-all duration-300 hover:scale-105">
                            <i class="fas fa-check-circle mr-2"></i>{{ $catalogueId ? 'Update' : 'Save' }}
                        </button>
                        <button type="button" wire:click="cancel"
                            class="bg-white border-2 border-gray-200 text-ceramic-blue px-8 py-3 rounded-xl font-semibold hover:bg-gray-50 transition-all duration-300">
                            <i class="fas fa-times-circle mr-2"></i>Cancel
                        </button>
                    </div>
                </form>
            </div>
        </div>
    @else
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
            <div
                class="bg-gradient-to-r from-gray-50 to-gray-100 px-6 py-4 border-b border-gray-200 flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                <h2 class="text-lg font-bold text-premium-dark">
                    Catalogue
                </h2>
                <button wire:click="addCatalogue"
                    class="gradient-gold text-white px-4 py-2 rounded-lg font-semibold shadow-md hover:shadow-lg transition-all duration-300 hover:scale-105 w-full md:w-auto">
                    <i class="fas fa-plus-circle mr-2"></i>Add New
                </button>
            </div>
            <!-- Filters -->
            <div class="bg-gray-50 rounded-xl p-6 mb-6">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-6 gap-4">
                    <div class="lg:col-span-2">
                        <label class="block text-sm font-semibold text-premium-dark mb-2">Search</label>
                        <input type="text"
                            class="w-full px-4 py-2.5 rounded-lg border-2 border-gray-200 focus:border-gold-accent focus:ring-2 focus:ring-gold-accent/20 outline-none transition-all"
                            wire:model.live.debounce.300ms="search" placeholder="Search products..." />
                    </div>
                    {{-- <div>
                        <label class="block text-sm font-semibold text-premium-dark mb-2">Date</label>
                        <input type="date"
                            class="w-full px-4 py-2.5 rounded-lg border-2 border-gray-200 focus:border-gold-accent focus:ring-2 focus:ring-gold-accent/20 outline-none transition-all" />
                    </div> --}}
                    <div class="lg:col-span-2">
                        <label class="block text-sm font-semibold text-premium-dark mb-2">Category</label>
                        <select wire:model.live="categoryFilter"
                            class="w-full px-4 py-2.5 rounded-lg border-2 border-gray-200 focus:border-gold-accent focus:ring-2 focus:ring-gold-accent/20 outline-none transition-all">
                            <option value="">All Categories</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex items-end gap-2 mt-4 lg:mt-0">
                        <button wire:click="$refresh"
                            class="flex-1 md:flex-none flex items-center justify-center gradient-gold text-white px-6 py-2.5 rounded-lg font-semibold shadow-md hover:shadow-lg transition-all duration-300">
                            <i class="fas fa-filter mr-2"></i>Filter
                        </button>
                        <button wire:click="resetFilters"
                            class="flex-1 md:flex-none flex items-center justify-center bg-white border-2 border-gray-200 text-ceramic-blue px-6 py-2.5 rounded-lg font-semibold hover:bg-gray-50 transition-all duration-300">
                            <i class="fas fa-redo mr-2"></i>Reset
                        </button>
                    </div>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gradient-to-r from-marble-gray to-marble-white">
                        <tr>
                            <th
                                class="hidden sm:table-cell px-6 py-4 text-left text-xs font-bold text-premium-dark uppercase tracking-wider w-20">
                                ID</th>
                            <th
                                class="px-6 py-4 text-left text-xs font-bold text-premium-dark uppercase tracking-wider">
                                Nama</th>
                            <th
                                class="px-6 py-4 text-left text-xs font-bold text-premium-dark uppercase tracking-wider">
                                Kategori</th>
                            <th
                                class="px-6 py-4 text-left text-xs font-bold text-premium-dark uppercase tracking-wider">
                                Gambar</th>
                            <th
                                class="hidden md:table-cell px-6 py-4 text-left text-xs font-bold text-premium-dark uppercase tracking-wider w-1/3">
                                Deskripsi</th>
                            <th
                                class="px-6 py-4 text-left text-xs font-bold text-premium-dark uppercase tracking-wider">
                                Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @foreach ($catalogues as $catalogue)
                            <tr class="hover:bg-gold-accent/5 transition-colors duration-200">
                                <td class="hidden sm:table-cell px-6 py-4 text-sm text-gray-800">{{ $catalogue->id }}
                                </td>
                                <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $catalogue->name }}</td>
                                <td class="px-6 py-4 text-sm text-gray-600">
                                    {{ $catalogue->category->name ?? 'Uncategorized' }}</td>
                                <td class="px-6 py-4">
                                    <img src="{{ $catalogue->image ? asset('storage/' . $catalogue->image) : asset('img/default.jpg') }}"
                                        alt="{{ $catalogue->name }}"
                                        class="w-16 h-16 md:w-24 md:h-24 object-cover rounded-md shadow-sm">
                                </td>
                                <td class="hidden md:table-cell px-6 py-4 text-sm text-gray-600 truncate max-w-xs">
                                    {{ $catalogue->description }}</td>
                                <td class="px-6 py-4">
                                    <div class="flex gap-2">
                                        <button class="text-yellow-600 hover:text-yellow-800 transition-colors"
                                            title="View"><a
                                                href="{{ url('/catalogs/' . $catalogue->category->slug . '/' . $catalogue->slug) }}"
                                                target="_blank"><i class="fas fa-eye"></i></a></button>
                                        <button wire:click="editCatalogue({{ $catalogue->id }})"
                                            class="text-blue-600 hover:text-blue-800 transition-colors"
                                            title="Edit"><i class="fas fa-edit"></i></button>
                                        <button @click="showDeleteModal = true; deleteId = {{ $catalogue->id }}"
                                            class="text-red-600 hover:text-red-800 transition-colors"
                                            title="Delete"><i class="fas fa-trash"></i></button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        {{-- Pagination --}}
        <div class="mt-6 px-8">
            {{ $catalogues->links('vendor.pagination.table-pagination') }}
        </div>
    @endif

    {{-- Delete Confirmation Modal --}}
    <x-admin.delete-modal method="deleteCatalogue" message="Are you sure you want to delete this product?" />

</div>
