<x-front.layout>
    <section class="pt-40 pb-32 px-6">
        <div class="max-w-7xl mx-auto">
            <p class="text-center text-xs text-[#8B7F6E] tracking-[2px] uppercase mb-4 font-normal">Read Our</p>
            <h2 class="font-heading text-5xl md:text-6xl text-center mb-20 tracking-wide font-light">Journal</h2>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-10">
                @foreach ($articles as $article)
                    <div class="group cursor-pointer">
                        <div class="overflow-hidden mb-6 shadow-md hover:shadow-xl transition-shadow duration-500">
                            <img src="{{ $article->image ? asset('images/' . $article->image) : 'https://images.unsplash.com/photo-1615529182904-14819c35db37?w=400' }}"
                                alt="{{ $article->title }}"
                                class="w-full h-64 object-cover transition-transform duration-700 group-hover:scale-105">
                        </div>
                        <div class="pr-4">
                            <p class="text-xs text-[#8B7F6E] tracking-[1.5px] uppercase mb-3">
                                <a href="{{ url('/articles?topic=' . $article->topic->slug) }}"
                                    class="hover:text-[#3A352F] transition-colors">{{ $article->topic->name }}</a>
                                <span class="mx-2">/</span>
                                {{ $article->created_at->diffForHumans() }}
                            </p>
                            <a href="{{ url('/articles/' . $article->slug) }}"
                                class="block group-hover:text-[#6B5E52] transition-colors duration-300">
                                <h3 class="font-heading text-3xl mb-3 text-[#3A352F] leading-tight">
                                    {{ $article->title }}</h3>
                            </a>
                            <p class="text-[#6B5E52] font-light leading-relaxed mb-6 line-clamp-3">
                                {{ Str::limit(strip_tags($article->body), 150) }}
                            </p>
                            <a href="{{ url('/articles/' . $article->slug) }}"
                                class="text-xs tracking-[2px] uppercase text-[#3A352F] border-b border-[#3A352F] pb-1 hover:text-[#6B5E52] hover:border-[#6B5E52] transition-all">Read
                                More</a>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-16">
                {{ $articles->links('vendor.pagination.custom') }}
            </div>
        </div>
    </section>
</x-front.layout>
