<x-front.layout>
    <!-- Hero Section -->
    <x-carousel :totalSlides="3">
        <x-front.hero-slide :index="0" image="https://images.unsplash.com/photo-1615529182904-14819c35db37?w=1600"
            title="TIMELESS STONE DESIGN" subtitle="Architectural Cast Stone Furniture" :tags="['HANDCRAFTED', 'EXPORT QUALITY', 'NATURAL STONE']" />

        <x-front.hero-slide :index="1" image="https://images.unsplash.com/photo-1567016432779-094069958ea5?w=1600"
            title="ORGANIC FORMS" subtitle="Bringing Nature Into Your Space" :tags="['SUSTAINABLE', 'MINIMALIST', 'ARTISANAL']" />

        <x-front.hero-slide :index="2" image="https://images.unsplash.com/photo-1618220179428-22790b461013?w=1600"
            title="SCULPTED ELEGANCE" subtitle="Where Art Meets Function" :tags="['BESPOKE', 'CONTEMPORARY', 'DURABLE']" />
    </x-carousel>

    <!-- Collections -->
    <section class="py-32 px-6">
        <div class="max-w-7xl mx-auto">
            <p class="text-center text-xs text-[#8B7F6E] tracking-[2px] uppercase mb-4 font-normal">Explore Our</p>
            <h2 class="font-heading text-5xl md:text-6xl text-center mb-20 tracking-wide font-light">Collections</h2>

            <div class="grid md:grid-cols-3 gap-6 scroll-reveal">
                @foreach ($categories as $category)
                    <a href="{{ url('/catalogs?category=' . $category->slug) }}" class="block">
                        <div
                            class="category-card group relative h-[550px] overflow-hidden cursor-pointer shadow-lg hover:shadow-2xl transition-all duration-600 hover:-translate-y-2">
                            <img src="{{ $category->image ? asset($category->image) : 'https://images.unsplash.com/photo-1555041469-a586c61ea9bc?w=800' }}"
                                alt="{{ $category->name }}" class="category-image w-full h-full object-cover">
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-[#3A352F]/85 to-transparent flex items-end">
                                <div class="p-10 text-white">
                                    <h3 class="font-heading text-4xl mb-2">{{ $category->name }}</h3>
                                    <p class="text-xs tracking-[1.5px] uppercase opacity-90">
                                        {{ Str::limit($category->description, 30) }}</p>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Featured Products -->
    <section class="py-32 px-6 bg-[#F5F1E8]">
        <div class="max-w-7xl mx-auto">
            <p class="text-center text-xs text-[#8B7F6E] tracking-[2px] uppercase mb-4 font-normal">Curated Selection
            </p>
            <h2 class="font-heading text-5xl md:text-6xl text-center mb-20 tracking-wide font-light">Featured Pieces
            </h2>

            <div class="grid md:grid-cols-3 gap-12 scroll-reveal">
                <div class="product-card group">
                    <div class="overflow-hidden mb-8 shadow-lg">
                        <img src="https://images.unsplash.com/photo-1503602642458-232111445657?w=600" alt="Product"
                            class="product-image w-full h-[500px] object-cover">
                    </div>
                    <h4 class="font-heading text-3xl mb-3 tracking-wide">Monolith Console</h4>
                    <p class="text-sm text-[#8B7F6E] mb-5 tracking-wide">Cast Stone, Polished Finish</p>
                    <p class="text-sm text-[#6B5E52] tracking-wide">From $2,400</p>
                </div>

                <div class="product-card group">
                    <div class="overflow-hidden mb-8 shadow-lg">
                        <img src="https://images.unsplash.com/photo-1540932239986-30128078f3c5?w=600" alt="Product"
                            class="product-image w-full h-[500px] object-cover">
                    </div>
                    <h4 class="font-heading text-3xl mb-3 tracking-wide">Terra Dining Table</h4>
                    <p class="text-sm text-[#8B7F6E] mb-5 tracking-wide">Natural Stone Top, Oak Base</p>
                    <p class="text-sm text-[#6B5E52] tracking-wide">From $3,800</p>
                </div>

                <div class="product-card group">
                    <div class="overflow-hidden mb-8 shadow-lg">
                        <img src="https://images.unsplash.com/photo-1567016432779-094069958ea5?w=600" alt="Product"
                            class="product-image w-full h-[500px] object-cover">
                    </div>
                    <h4 class="font-heading text-3xl mb-3 tracking-wide">Sculptural Pedestal</h4>
                    <p class="text-sm text-[#8B7F6E] mb-5 tracking-wide">Hand-Carved Limestone</p>
                    <p class="text-sm text-[#6B5E52] tracking-wide">From $1,600</p>
                </div>
            </div>
        </div>
    </section>
</x-front.layout>
