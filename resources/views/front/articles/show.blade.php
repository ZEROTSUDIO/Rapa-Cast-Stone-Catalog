<x-front.layout>
    <section class="section" style="margin-top: 100px;">
        <div class="container">
            <div class="article-hero-wrapper">
                <img src="{{ $article->image ? asset('images/' . $article->image) : 'https://images.unsplash.com/photo-1615529182904-14819c35db37?w=400' }}"
                    alt="Article" class="article-hero">
            </div>

            <div class="article-body">

                <h1>{{ $article->title }}</h1>
                <div class="article-meta">
                    <p><a href="/articles?topic={{ $article->topic->slug }}">{{ $article->topic->name }}</a>
                        / {{ $article->created_at->format('F Y') }}</p>

                </div>
                <div class="article-content">
                    <p>{{ $article->body }}</p>
                </div>
            </div>
        </div>
    </section>
    </x-layout>
