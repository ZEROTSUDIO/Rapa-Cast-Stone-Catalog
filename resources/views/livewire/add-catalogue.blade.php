<div id="advanced-form" class="page animate-slide-in">
    <div class="mb-8">
        <h1 class="text-4xl font-bold text-premium-dark mb-2">
            Tambah Catalog
        </h1>
        <p class="text-gray-500">
            ________________
        </p>
    </div>

    <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
        <div class="bg-gradient-to-r from-gray-50 to-gray-100 px-6 py-4 border-b border-gray-200">
            <h2 class="text-lg font-bold text-premium-dark">
                Informasi Catalog
            </h2>
        </div>
        <div class="p-6">
            <form>
                <div class="mb-6">
                    <label class="block text-sm font-semibold text-premium-dark mb-2">Nama </label>
                    <input type="text"
                        class="w-full px-4 py-3 rounded-lg border-2 border-gray-200 focus:border-gold-accent focus:ring-2 focus:ring-gold-accent/20 outline-none transition-all"
                        placeholder="Enter content title" />
                </div>
                <div class="mb-6">
                    <label class="block text-sm font-semibold text-premium-dark mb-2">Category</label>
                    <select
                        class="w-full px-4 py-3 rounded-lg border-2 border-gray-200 focus:border-gold-accent focus:ring-2 focus:ring-gold-accent/20 outline-none transition-all">
                        <option>Pilih Category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-6">
                    <label class="block text-sm font-semibold text-premium-dark mb-2">Featured Image</label>
                    <div id="imageUpload"
                        class="border-2 border-dashed border-gray-300 rounded-xl p-12 text-center cursor-pointer hover:border-gold-accent hover:bg-gray-50 transition-all duration-300">
                        <i class="fas fa-cloud-upload-alt text-5xl text-gold-accent mb-4"></i>
                        <h5 class="text-lg font-semibold text-gray-700 mb-2">
                            Click to upload image
                        </h5>
                        <p class="text-sm text-gray-500">
                            PNG, JPG, GIF up to 10MB
                        </p>
                    </div>
                    <input type="file" id="imageInput" class="hidden" accept="image/*" />
                </div>
                {{-- <div class="mb-6">
                    <label class="block text-sm font-semibold text-premium-dark mb-2">Content</label>
                    <div id="editor" class="rounded-lg border-2 border-gray-200"></div>
                </div> --}}
                <div class="mb-6">
                    <label class="block text-sm font-semibold text-premium-dark mb-2">Content</label>
                    <div id="editor" class="rounded-lg border-2 border-gray-200"></div>
                </div>
                <div class="mb-6">
                    <label class="block text-sm font-semibold text-premium-dark mb-2">Tags</label>
                    <input type="text"
                        class="w-full px-4 py-3 rounded-lg border-2 border-gray-200 focus:border-gold-accent focus:ring-2 focus:ring-gold-accent/20 outline-none transition-all"
                        placeholder="Enter tags separated by commas" />
                </div>
                <div class="flex gap-3">
                    <button type="submit"
                        class="gradient-gold text-white px-8 py-3 rounded-xl font-semibold shadow-lg hover:shadow-xl transition-all duration-300 hover:scale-105">
                        <i class="fas fa-check-circle mr-2"></i>Publish
                    </button>
                    <button type="button"
                        class="bg-white border-2 border-gray-200 text-ceramic-blue px-8 py-3 rounded-xl font-semibold hover:bg-gray-50 transition-all duration-300">
                        <i class="fas fa-save mr-2"></i>Save Draft
                    </button>
                    <button type="reset"
                        class="bg-white border-2 border-gray-200 text-ceramic-blue px-8 py-3 rounded-xl font-semibold hover:bg-gray-50 transition-all duration-300">
                        <i class="fas fa-times-circle mr-2"></i>Cancel
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
