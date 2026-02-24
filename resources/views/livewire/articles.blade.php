<div class="page animated-slide-in" x-data="{ showDeleteModal: false, deleteId: null }">
    <div class="mb-8">
        <h1 class="text-4xl font-bold text-premium-dark mb-2">
            Articles
        </h1>
        <p class="text-gray-500">
            @if ($isCreating)
                {{ $articleId ? 'Edit Data Artikel' : 'Tambah Data Artikel' }}
            @else
                Data Tabel Artikel
            @endif
        </p>
    </div>

    @if ($isCreating)
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden animate-slide-in">
            <div
                class="bg-gradient-to-r from-gray-50 to-gray-100 px-6 py-4 border-b border-gray-200 justify-between flex">
                <h2 class="text-lg font-bold text-premium-dark">Informasi Artikel</h2>
                <button wire:click="cancel"
                    class="gradient-gold text-white px-4 py-2 rounded-lg font-semibold shadow-md hover:shadow-lg transition-all duration-300 hover:scale-105">
                    <i class="fas fa-arrow-left mr-2"></i>Kembali
                </button>
            </div>
            <div class="p-6">
                <form wire:submit.prevent="{{ $articleId ? 'updateArticle' : 'createArticle' }}">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Left Column: Basic Info -->
                        <div class="space-y-6">
                            <div>
                                <label for="title" class="block text-sm font-semibold text-premium-dark mb-2">Judul
                                    Artikel</label>
                                <input type="text" id="title" wire:model="title"
                                    class="w-full px-4 py-3 rounded-lg border-2 border-gray-200 focus:border-gold-accent focus:ring-2 focus:ring-gold-accent/20 outline-none transition-all"
                                    placeholder="Judul Artikel">
                                @error('title')
                                    <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                                @enderror
                            </div>

                            <div>
                                <label for="topic"
                                    class="block text-sm font-semibold text-premium-dark mb-2">Topic</label>
                                <select wire:model="topic_id"
                                    class="w-full px-4 py-3 rounded-lg border-2 border-gray-200 focus:border-gold-accent focus:ring-2 focus:ring-gold-accent/20 outline-none transition-all">
                                    <option value="">Pilih Option</option>
                                    @foreach ($topics as $topic)
                                        <option value="{{ $topic->id }}">{{ $topic->name }}</option>
                                    @endforeach
                                </select>
                                @error('topic_id')
                                    <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Featured Image Upload -->
                            <div class="space-y-2">
                                <label class="block text-sm font-semibold text-premium-dark mb-2">Featured Image</label>

                                {{-- Upload Box --}}
                                <div @click="$refs.imageInput.click()"
                                    class="relative border-2 border-dashed border-gray-300 rounded-xl p-6 text-center cursor-pointer hover:border-gold-accent hover:bg-gray-50 transition-all duration-300">

                                    {{-- Loading Indicator --}}
                                    <div wire:loading wire:target="image"
                                        class="absolute inset-0 bg-white/90 flex flex-col justify-center items-center z-10 backdrop-blur-sm rounded-xl">
                                        <i class="fas fa-circle-notch fa-spin text-3xl text-gold-accent mb-2"></i>
                                        <p class="text-xs text-gray-600 font-semibold animate-pulse">Uploading...</p>
                                    </div>

                                    @if ($imagePreview || $existingImage)
                                        <div class="relative group mx-auto w-full max-w-[200px]">
                                            <img src="{{ $imagePreview ?: asset('storage/' . $existingImage) }}"
                                                class="w-full h-40 object-cover rounded-lg shadow-md border-2 border-gray-100">
                                            <button type="button" wire:click="removeImage"
                                                class="absolute -top-2 -right-2 bg-red-500 text-white p-1.5 rounded-full shadow-lg opacity-0 group-hover:opacity-100 transition-opacity">
                                                <i class="fas fa-times text-xs"></i>
                                            </button>
                                        </div>
                                    @else
                                        <i class="fas fa-cloud-upload-alt text-4xl text-gold-accent mb-3"></i>
                                        <h5 class="text-sm font-semibold text-gray-700">Click to upload featured image
                                        </h5>
                                        <p class="text-xs text-gray-500 mt-1">PNG, JPG up to 5MB</p>
                                    @endif
                                </div>

                                <input type="file" wire:model="image" class="hidden" x-ref="imageInput"
                                    accept="image/*">
                                @error('image')
                                    <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Right Column: Content Editor -->
                        <div class="space-y-2" wire:ignore>
                            <label class="block text-sm font-semibold text-premium-dark mb-2">Isi Artikel</label>
                            <div x-data="{
                                content: @entangle('content'),
                                init() {
                                    let quill = new Quill(this.$refs.quillEditor, {
                                        theme: 'snow',
                                        placeholder: 'Tulis isi artikel di sini...',
                                        modules: {
                                            toolbar: [
                                                [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
                                                ['bold', 'italic', 'underline', 'strike'],
                                                ['blockquote', 'code-block'],
                                                [{ 'list': 'ordered' }, { 'list': 'bullet' }],
                                                [{ 'script': 'sub' }, { 'script': 'super' }],
                                                [{ 'indent': '-1' }, { 'indent': '+1' }],
                                                [{ 'direction': 'rtl' }],
                                                [{ 'color': [] }, { 'background': [] }],
                                                [{ 'align': [] }],
                                                ['link', 'image', 'video'],
                                                ['clean']
                                            ]
                                        }
                                    });
                                    quill.root.innerHTML = this.content || '';
                                    quill.on('text-change', () => {
                                        this.content = quill.root.innerHTML;
                                    });
                                }
                            }">
                                <div x-ref="quillEditor" class="bg-white rounded-lg border-2 border-gray-200 pb-12"
                                    style="min-height: 300px;"></div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-8 flex justify-end gap-3">
                        <button type="button" wire:click="cancel"
                            class="bg-white border-2 border-gray-200 text-gray-700 px-6 py-2.5 rounded-lg font-semibold hover:bg-gray-50 transition-all">
                            Batal
                        </button>
                        <button type="submit"
                            class="gradient-gold text-white px-8 py-2.5 rounded-lg font-semibold shadow-md hover:shadow-lg transition-all duration-300 hover:scale-105">
                            <i class="fas fa-save mr-2"></i>Simpan Artikel
                        </button>
                    </div>
                </form>
            </div>
        </div>
    @else
        <!-- Table View -->
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden animate-slide-in">
            <div
                class="bg-gradient-to-r from-gray-50 to-gray-100 px-6 py-4 border-b border-gray-200 flex justify-between items-center">
                <h2 class="text-lg font-bold text-premium-dark">Daftar Artikel</h2>
                <button wire:click="addArticle"
                    class="gradient-gold text-white px-4 py-2 rounded-lg font-semibold shadow-md hover:shadow-lg transition-all duration-300 hover:scale-105">
                    <i class="fas fa-plus mr-2"></i>Tambah Artikel
                </button>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50 border-b border-gray-200">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">
                                Image</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">
                                Judul Artikel</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">
                                Topic</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">
                                Created At</th>
                            <th
                                class="px-6 py-4 text-center text-xs font-bold text-gray-500 uppercase tracking-wider px-6">
                                Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse ($articles as $article)
                            <tr class="hover:bg-gray-50/50 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="w-16 h-12 rounded overflow-hidden shadow-sm border border-gray-100">
                                        <img src="{{ $article->image ? asset('storage/' . $article->image) : asset('img/placeholder-article.jpg') }}"
                                            class="w-full h-full object-cover">
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm font-semibold text-gray-900">{{ $article->title }}</div>
                                    <div class="text-xs text-gray-500 mt-0.5">
                                        {{ Str::limit(strip_tags($article->body), 60) }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span
                                        class="px-2.5 py-1 rounded-full text-xs font-medium bg-gold-accent/10 text-gold-accent border border-gold-accent/20">
                                        {{ $article->topic->name ?? 'Uncategorized' }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-xs text-gray-500">
                                    {{ $article->created_at->format('d M Y') }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    <div class="flex justify-center gap-2">
                                        <button wire:click="editArticle({{ $article->id }})"
                                            class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg transition-colors"
                                            title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button @click="showDeleteModal = true; deleteId = {{ $article->id }}"
                                            class="p-2 text-red-600 hover:bg-red-50 rounded-lg transition-colors"
                                            title="Delete">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-12 text-center">
                                    <div class="flex flex-col items-center">
                                        <i class="fas fa-newspaper text-4xl text-gray-200 mb-3"></i>
                                        <p class="text-gray-400 font-medium">Belum ada data artikel</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if ($articles->hasPages())
                <div class="px-6 py-4 border-t border-gray-100 bg-gray-50">
                    {{ $articles->links() }}
                </div>
            @endif
        </div>
    @endif

    {{-- Delete Modal Placeholder --}}
    <x-admin.delete-modal method="deleteArticle" message="Apakah Anda yakin ingin menghapus artikel ini?" />

</div>
