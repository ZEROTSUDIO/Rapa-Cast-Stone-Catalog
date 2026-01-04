<x-front.layout>
    <!-- Hero Carousel -->

    <section id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

        {{-- Indicators (homepage-only, so keep inline) --}}
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active" aria-current="true"
                aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>

        {{-- Slides --}}
        <div class="carousel-inner">

            <x-front.hero-slide active image="https://images.unsplash.com/photo-1615529182904-14819c35db37?w=1600"
                title="TIMELESS STONE DESIGN" subtitle="Architectural Cast Stone Furniture" :tags="['HANDCRAFTED', 'EXPORT QUALITY', 'NATURAL STONE']" />

            <x-front.hero-slide image="https://images.unsplash.com/photo-1567016432779-094069958ea5?w=1600"
                title="ORGANIC FORMS" subtitle="Bringing Nature Into Your Space" :tags="['SUSTAINABLE', 'MINIMALIST', 'ARTISANAL']" />

            <x-front.hero-slide image="https://images.unsplash.com/photo-1618220179428-22790b461013?w=1600"
                title="SCULPTED ELEGANCE" subtitle="Where Art Meets Function" :tags="['BESPOKE', 'CONTEMPORARY', 'DURABLE']" />

        </div>

        {{-- Controls --}}
        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
            <span class="visually-hidden">Previous</span>
        </button>

        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </section>

    <!-- Category Highlight -->
    <section class="section">
        <div class="container">
            <p class="section-subtitle">Explore Our</p>
            <h2 class="section-title">Collections</h2>
            <div class="row">
                @foreach ($categories as $category)
                    <div class="col-md-4 mb-4">
                        <a href="/catalogs?category={{ $category->slug }}" class="text-decoration-none">
                            <div class="category-card">
                                <img src="{{ $category->image ? asset($category->image) : 'https://images.unsplash.com/photo-1503602642458-232111445657?w=600' }}"
                                    alt="Seating">
                                <div class="category-overlay">
                                    <h3>{{ $category->name }}</h3>
                                    <p>{{ $category->description }}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Featured Products -->
    <section class="section" style="background-color: var(--soft-sand);">
        <div class="container">
            <p class="section-subtitle">Curated Selection</p>
            <h2 class="section-title">Featured Pieces</h2>
            <div class="row">
                <div class="col-md-4">
                    <a href="" class="text-decoration-none">
                        <div class="product-card">
                            <div class="product-image-wrapper">
                                <img src="https://images.unsplash.com/photo-1503602642458-232111445657?w=600"
                                    alt="Product" class="product-image">
                            </div>
                            <h4>Monolith Console</h4>
                            <p>Cast Stone, Polished Finish</p>
                            <p class="product-price">From $2,400</p>
                        </div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="" class="text-decoration-none">
                        <div class="product-card">
                            <div class="product-image-wrapper">
                                <img src="https://images.unsplash.com/photo-1540932239986-30128078f3c5?w=600"
                                    alt="Product" class="product-image">
                            </div>
                            <h4>Terra Dining Table</h4>
                            <p>Natural Stone Top, Oak Base</p>
                            <p class="product-price">From $3,800</p>
                        </div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="" class="text-decoration-none">
                        <div class="product-card">
                            <div class="product-image-wrapper">
                                <img src="https://images.unsplash.com/photo-1567016432779-094069958ea5?w=600"
                                    alt="Product" class="product-image">
                            </div>
                            <h4>Sculptural Pedestal</h4>
                            <p>Hand-Carved Limestone</p>
                            <p class="product-price">From $1,600</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
</x-front.layout>
