<div class="categories-filter filter-bar text-center">

    <a href="/catalogs#products" class="filter-btn {{ request()->missing('category') ? 'active' : '' }}">
        All
    </a>

    @foreach ($categories as $category)
        <a href="/catalogs?category={{ $category->slug }}#products"
            class="filter-btn {{ request()->get('category') === $category->slug ? 'active' : '' }}">
            {{ $category->name }}
        </a>
    @endforeach

</div>
