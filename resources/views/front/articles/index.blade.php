<x-front.layout>
    <section class="section" style="margin-top: 100px;">
        <div class="container">
            <p class="section-subtitle">Read Our</p>
            <h2 class="section-title">Journal</h2>
            @foreach ($articles as $article)
                <div class="article-card">
                    <div class="article-image-wrapper">
                        <img src="{{ $article->image ? asset('images/' . $article->image) : 'https://images.unsplash.com/photo-1615529182904-14819c35db37?w=400' }}"
                            alt="Article">
                    </div>
                    <div class="article-content">
                        <p class="article-meta"> <a
                                href="/articles?topic={{ $article->topic->slug }}">{{ $article->topic->name }}</a>
                            /
                            {{ $article->created_at->diffForHumans() }} by <a
                                href="/articles?author={{ $article->author->username }}">{{ $article->author->name }}</a>
                        </p>
                        <a href="/articles/{{ $article->slug }}">
                            <h3>{{ $article->title }}</h3>
                        </a>
                        <p class="article-excerpt">
                            {{ Str::limit($article->body, 255) }}
                        </p>
                        <a href="/articles/{{ $article->slug }}" class="read-more">Read More →</a>
                    </div>
                </div>
            @endforeach
        </div>
        {{ $articles->links('vendor.pagination.custom') }}
    </section>
    </x-layout>
