<div id="table" class="page animate-slide-in">
    <div class="mb-8">
        <h1 class="text-4xl font-bold text-premium-dark mb-2">
            Catalogue
        </h1>
        <p class="text-gray-500">Data Tabel Product</p>
    </div>

    <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
        <div
            class="bg-gradient-to-r from-gray-50 to-gray-100 px-6 py-4 border-b border-gray-200 flex justify-between items-center">
            <h2 class="text-lg font-bold text-premium-dark">
                Catalogue
            </h2>
            <a href="{{ url('admin/catalogues/add') }}">
                <button
                    class="gradient-gold text-white px-4 py-2 rounded-lg font-semibold shadow-md hover:shadow-lg transition-all duration-300 hover:scale-105">
                    <i class="fas fa-plus-circle mr-2"></i>Add New
                </button>
            </a>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gradient-to-r from-marble-gray to-marble-white">
                    <tr>
                        <th
                            class="px-6 py-4 text-left text-xs font-bold text-premium-dark uppercase tracking-wider w-20">
                            ID
                        </th>
                        <th
                            class="px-6 py-4 text-left text-xs font-bold text-premium-dark uppercase tracking-wider w-1/5">
                            Nama
                        </th>
                        <th
                            class="px-6 py-4 text-left text-xs font-bold text-premium-dark uppercase tracking-wider w-1/6">
                            Kategori
                        </th>
                        <th
                            class="px-6 py-4 text-left text-xs font-bold text-premium-dark uppercase tracking-wider w-32">
                            Gambar
                        </th>
                        <th
                            class="px-6 py-4 text-left text-xs font-bold text-premium-dark uppercase tracking-wider w-1/3">
                            Deskripsi
                        </th>
                        <th
                            class="px-6 py-4 text-left text-xs font-bold text-premium-dark uppercase tracking-wider w-32">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    <tr class="hover:bg-gold-accent/5 transition-colors duration-200">
                        @foreach ($catalogues as $catalogue)
                            <td class="px-6 py-4 text-sm text-gray-800">
                                {{ $catalogue->id }}
                            </td>
                            <td class="px-6 py-4 text-sm font-medium text-gray-900">
                                {{ $catalogue->name }}
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600">
                                {{ $catalogue->category->name ?? 'Uncategorized' }}
                            </td>
                            <td class="px-6 py-4">
                                <img src="{{ $catalogue->image ? asset('storage/' . $catalogue->image) : asset('storage/' . $catalogue->image) }}"
                                    alt="{{ $catalogue->name }}" class="w-24 h-24 object-cover">
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600 truncate max-w-xs">
                                {{ $catalogue->description }}
                            </td>
                            <td class="px-6 py-4">
                                <button class="text-blue-600 hover:text-blue-800 mr-3">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="text-red-600 hover:text-red-800">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
