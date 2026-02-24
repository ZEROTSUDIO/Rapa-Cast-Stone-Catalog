<x-front.layout>
    <section class="min-h-screen">
        <!-- Hero Image -->
        <div class="h-[60vh] w-full relative overflow-hidden">
            <img src="{{ $article->image ? asset('storage/' . $article->image) : 'https://images.unsplash.com/photo-1615529182904-14819c35db37?w=1600' }}"
                alt="{{ $article->title }}" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-black/20"></div>
        </div>

        <div class="max-w-4xl mx-auto px-6 -mt-32 relative z-10">
            <div class="bg-white p-10 md:p-16 shadow-xl text-center">
                <p class="text-xs text-[#8B7F6E] tracking-[2px] uppercase mb-6">
                    <a href="{{ url('/articles?topic=' . $article->topic->slug) }}"
                        class="hover:text-[#3A352F] hover:underline">{{ $article->topic->name }}</a>
                    <span class="mx-2">•</span>
                    {{ $article->created_at->format('F d, Y') }}
                </p>

                <h1 class="font-heading text-4xl md:text-5xl lg:text-6xl text-[#3A352F] mb-10 leading-tight">
                    {{ $article->title }}
                </h1>

                @if ($article->author)
                    <div class="flex items-center justify-center gap-3 mb-12 border-b border-[#E8E3D8] pb-12">
                        <span class="text-xs tracking-[1.5px] uppercase text-[#6B5E52]">By
                            {{ $article->author->name }}</span>
                    </div>
                @endif

                <div class="prose prose-stone prose-lg max-w-none text-[#6B5E52] font-light text-left">
                    {!! $article->body !!}
                </div>

                <div class="mt-16 pt-10 border-t border-[#E8E3D8]">
                    <a href="{{ url('/articles') }}"
                        class="inline-block text-xs tracking-[2px] uppercase text-[#3A352F] hover:text-[#B5A693] transition-colors">
                        ← Back to Journal
                    </a>
                </div>
            </div>
        </div>
    </section>
</x-front.layout>
