<x-front.layout>
    <section class="section" style="margin-top: 100px;">
        <div class="container">
            <p class="section-subtitle">Browse Our</p>
            <h2 class="section-title">Product Catalog</h2>
            {{-- @if ($active == true) --}}
            <x-front.category-filter :categories="$categories" />
            {{-- @endif --}}

            <div id="products" class="row">
                @foreach ($catalogs as $catalog)
                    <div class="col-md-4 product-item" data-category="{{ $catalog->category->name }}">
                        <a href="/catalogs/{{ $catalog->category->slug }}/{{ $catalog->slug }}"
                            class="text-decoration-none">
                            <div class="product-card">
                                <div class="product-image-wrapper">
                                    <img src="https://images.unsplash.com/photo-1503602642458-232111445657?w=600"
                                        alt="Product" class="product-image">
                                </div>
                                <h4>{{ $catalog->name }}</h4>
                                <p>{{ $catalog->category->name }}</p>
                                {{-- <p class="product-price">{{ $catalog->price }}</p> --}}
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            {{ $catalogs->links('vendor.pagination.custom') }}
        </div>
    </section>
</x-front.layout>
