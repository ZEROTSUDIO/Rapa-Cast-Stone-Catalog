<div class="bg-[#F5F1E8] py-8 mb-20 border-t border-b border-[#B5A693]/20">
    <div class="flex flex-wrap justify-center gap-4">
        <a href="/catalogs#products"
            class="px-8 py-3 border border-[#B5A693] text-xs tracking-[2px] uppercase transition-all duration-400 hover:bg-[#6B5E52] hover:text-white hover:border-[#6B5E52]
            {{ request()->missing('category') ? 'bg-[#6B5E52] text-white border-[#6B5E52]' : 'text-[#6B5E52]' }}">
            All
        </a>

        @foreach ($categories as $category)
            <a href="/catalogs?category={{ $category->slug }}#products"
                class="px-8 py-3 border border-[#B5A693] text-xs tracking-[2px] uppercase transition-all duration-400 hover:bg-[#6B5E52] hover:text-white hover:border-[#6B5E52]
                {{ request()->get('category') === $category->slug ? 'bg-[#6B5E52] text-white border-[#6B5E52]' : 'text-[#6B5E52]' }}">
                {{ $category->name }}
            </a>
        @endforeach
    </div>
</div>
