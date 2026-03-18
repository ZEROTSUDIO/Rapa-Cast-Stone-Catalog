<x-front.layout>
    <section class="pt-40 pb-32 px-6">
        <div class="max-w-7xl mx-auto">
            <p class="text-center text-xs text-[#8B7F6E] tracking-[2px] uppercase mb-4 font-normal">Browse Our</p>
            <h2 class="font-heading text-5xl md:text-6xl text-center mb-12 tracking-wide font-light">Product Catalog</h2>

            <x-front.category-filter :categories="$categories" />

            <div id="products" class="grid md:grid-cols-2 lg:grid-cols-5 gap-8 mt-12">
                @foreach ($catalogs as $catalog)
                    <div class="product-item group" data-category="{{ $catalog->category->name }}">
                        <a href="{{ url('/catalogs/' . $catalog->category->slug . '/' . $catalog->slug) }}"
                            class="block">
                            <div class="overflow-hidden mb-6 shadow-md hover:shadow-xl transition-shadow duration-500">
                                <img src="{{ $catalog->image ? asset('storage/' . $catalog->image) : asset('img/default.jpg') }}"
                                    alt="{{ $catalog->name }}"
                                    class="w-full h-[200px] object-cover transition-transform duration-700 group-hover:scale-105">
                            </div>
                            <h4 class="font-heading text-2xl mb-2 tracking-wide text-[#3A352F]">{{ $catalog->name }}
                            </h4>
                            <p class="text-xs text-[#8B7F6E] tracking-[1.5px] uppercase mb-1">
                                {{ $catalog->category->name }}</p>
                            @if ($catalog->specification)
                                @php
                                    $price =
                                        $catalog->specification['Price'] ?? ($catalog->specification['price'] ?? null);
                                @endphp
                                @if ($price && is_numeric($price))
                                    <p class="text-sm text-[#3A352F] tracking-wide">
                                        {{ Number::currency($price, 'IDR', 'id') }}</p>
                                @elseif ($price)
                                    <p class="text-sm text-[#3A352F] tracking-wide">{{ $price }}</p>
                                @endif
                            @endif

                        </a>
                    </div>
                @endforeach
            </div>

            <div class="mt-16">
                {{ $catalogs->links('vendor.pagination.custom') }}
            </div>
        </div>
    </section>
</x-front.layout>
