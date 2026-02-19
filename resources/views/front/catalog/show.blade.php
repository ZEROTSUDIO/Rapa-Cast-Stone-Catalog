<x-front.layout :title="$catalog->name . ' | Rapa Cast Stone'" :meta-description="'Produk ' .
    $catalog->name .
    ' dari Rapa Cast Stone. Cast stone berkualitas untuk kebutuhan arsitektur dan proyek.'" :canonical="route('catalog.show', [$catalog->category->slug, $catalog->slug])" :og-image="$catalog->images->first()
    ? asset('storage/' . $catalog->images->first()->image_path)
    : asset('img/bg-1.png')">

    <section class="pt-40 pb-32 px-6" x-data="{ activeImage: '{{ $catalog->image ? asset('storage/' . $catalog->image) : asset('img/default.jpg') }}', lightboxOpen: false }">
        <div class="max-w-7xl mx-auto">
            <div class="grid md:grid-cols-12 gap-12 lg:gap-24">
                <!-- Gallery Section -->
                <div class="md:col-span-7">

                    <div class="mb-6 overflow-hidden shadow-lg">
                        <img :src="activeImage" alt="{{ $catalog->name }}" @click="lightboxOpen = true"
                            class="w-full h-[600px] object-cover transition-opacity duration-300">
                    </div>
                    <div class="grid grid-cols-4 gap-4">
                        <!-- Main Image thumbnail -->
                        {{-- <div class="cursor-pointer overflow-hidden border border-transparent hover:border-[#B5A693] transition-all"
                            @click="activeImage = '{{ $catalog->image ? asset('storage/' . $catalog->image) : asset('img/default.jpg') }}'"
                            :class="{ 'border-[#B5A693]': activeImage === '{{ $catalog->image ? asset('storage/' . $catalog->image) : asset('img/default.jpg') }}' }">
                            <img src="{{ $catalog->image ? asset('storage/' . $catalog->image) : asset('img/default.jpg') }}"
                                class="w-full h-24 object-cover">
                        </div> --}}
                        @foreach ($catalog->images as $image)
                            <div class="cursor-pointer overflow-hidden border border-transparent hover:border-[#B5A693] transition-all"
                                @click="activeImage = '{{ asset('storage/' . $image->image_path) }}'"
                                :class="{ 'border-[#B5A693]': activeImage === '{{ asset('storage/' . $image->image_path) }}' }">
                                <img src="{{ asset('storage/' . $image->image_path) }}"
                                    class="w-full h-24 object-cover">
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Product Info -->
                <div class="md:col-span-5">
                    <div class="sticky top-32">
                        <p class="text-xs text-[#8B7F6E] tracking-[2px] uppercase mb-4">{{ $catalog->category->name }} /
                            CAST STONE</p>
                        <h1 class="font-heading text-4xl md:text-5xl mb-8 text-[#3A352F]">{{ $catalog->name }}</h1>

                        <div class="text-[#6B5E52] leading-relaxed mb-10 font-light text-lg">
                            {{ $catalog->description }}
                        </div>

                        <div class="mb-12 space-y-4 border-t border-[#E8E3D8] pt-8">
                            <h4 class="font-heading text-xl mb-4 text-[#3A352F]">Specifications</h4>
                            @if ($catalog->specification)
                                @foreach ($catalog->specification as $key => $value)
                                    <div
                                        class="flex justify-between items-center text-sm border-b border-[#E8E3D8] pb-2 last:border-0">
                                        <span
                                            class="text-[#8B7F6E] uppercase tracking-wide">{{ Str::title(str_replace('_', ' ', $key)) }}</span>
                                        <span class="text-[#3A352F] font-medium">
                                            @if (Str::lower($key) === 'price' && is_numeric($value))
                                                {{ Number::currency($value, 'IDR', 'id') }}
                                            @else
                                                {{ $value }}
                                            @endif
                                        </span>
                                    </div>
                                @endforeach
                            @endif
                        </div>

                        <button
                            class="w-full bg-[#3A352F] text-white py-4 text-xs tracking-[2.5px] uppercase hover:bg-[#6B5E52] transition-colors duration-300 shadow-lg">
                            <a href="{{ url('contact') }}">Ajukan Permintaan</a>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div x-show="lightboxOpen" x-transition.opacity @keydown.escape.window="lightboxOpen = false"
            class="fixed inset-0 z-50 flex items-center justify-center bg-black/80">
            <!-- Click outside to close -->
            <div class="absolute inset-0" @click="lightboxOpen = false"></div>

            <!-- Image -->
            <img :src="activeImage" class="relative max-w-[90vw] max-h-[90vh] object-contain shadow-2xl"
                alt="{{ $catalog->name }}">

            <!-- Close button -->
            <button @click="lightboxOpen = false" class="absolute top-6 right-6 text-white text-3xl leading-none">
                &times;
            </button>
        </div>

    </section>
</x-front.layout>
