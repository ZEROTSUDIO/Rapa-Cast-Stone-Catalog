<x-front.layout>
    <section class="pt-40 pb-32 px-6" x-data="{ activeImage: '{{ $catalog->image ? asset('images/' . $catalog->image) : 'https://images.unsplash.com/photo-1503602642458-232111445657?w=800' }}' }">
        <div class="max-w-7xl mx-auto">
            <div class="grid md:grid-cols-12 gap-12 lg:gap-24">
                <!-- Gallery Section -->
                <div class="md:col-span-7">
                    <div class="mb-6 overflow-hidden shadow-lg">
                        <img :src="activeImage" alt="{{ $catalog->name }}"
                            class="w-full h-[600px] object-cover transition-opacity duration-300">
                    </div>
                    <div class="grid grid-cols-4 gap-4">
                        <!-- Main Image thumbnail -->
                        <div class="cursor-pointer overflow-hidden border border-transparent hover:border-[#B5A693] transition-all"
                            @click="activeImage = '{{ $catalog->image ? asset('images/' . $catalog->image) : 'https://images.unsplash.com/photo-1503602642458-232111445657?w=800' }}'"
                            :class="{ 'border-[#B5A693]': activeImage === '{{ $catalog->image ? asset('images/' . $catalog->image) : 'https://images.unsplash.com/photo-1503602642458-232111445657?w=800' }}' }">
                            <img src="{{ $catalog->image ? asset('images/' . $catalog->image) : 'https://images.unsplash.com/photo-1503602642458-232111445657?w=800' }}"
                                class="w-full h-24 object-cover">
                        </div>
                        <!-- Hardcoded additional thumbnails for demo as in original -->
                        <div class="cursor-pointer overflow-hidden border border-transparent hover:border-[#B5A693] transition-all"
                            @click="activeImage = 'https://images.unsplash.com/photo-1540932239986-30128078f3c5?w=800'"
                            :class="{ 'border-[#B5A693]': activeImage === 'https://images.unsplash.com/photo-1540932239986-30128078f3c5?w=800' }">
                            <img src="https://images.unsplash.com/photo-1540932239986-30128078f3c5?w=200"
                                class="w-full h-24 object-cover">
                        </div>
                        <div class="cursor-pointer overflow-hidden border border-transparent hover:border-[#B5A693] transition-all"
                            @click="activeImage = 'https://images.unsplash.com/photo-1567016432779-094069958ea5?w=800'"
                            :class="{ 'border-[#B5A693]': activeImage === 'https://images.unsplash.com/photo-1567016432779-094069958ea5?w=800' }">
                            <img src="https://images.unsplash.com/photo-1567016432779-094069958ea5?w=200"
                                class="w-full h-24 object-cover">
                        </div>
                        <div class="cursor-pointer overflow-hidden border border-transparent hover:border-[#B5A693] transition-all"
                            @click="activeImage = 'https://images.unsplash.com/photo-1555041469-a586c61ea9bc?w=800'"
                            :class="{ 'border-[#B5A693]': activeImage === 'https://images.unsplash.com/photo-1555041469-a586c61ea9bc?w=800' }">
                            <img src="https://images.unsplash.com/photo-1555041469-a586c61ea9bc?w=200"
                                class="w-full h-24 object-cover">
                        </div>
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
                                @foreach (json_decode($catalog->specification) as $key => $value)
                                    <div
                                        class="flex justify-between items-center text-sm border-b border-[#E8E3D8] pb-2 last:border-0">
                                        <span
                                            class="text-[#8B7F6E] uppercase tracking-wide">{{ Str::title(str_replace('_', ' ', $key)) }}</span>
                                        <span class="text-[#3A352F] font-medium">{{ $value }}</span>
                                    </div>
                                @endforeach
                            @endif
                        </div>

                        <button
                            class="w-full bg-[#3A352F] text-white py-4 text-xs tracking-[2.5px] uppercase hover:bg-[#6B5E52] transition-colors duration-300 shadow-lg">
                            Request Quote
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-front.layout>
