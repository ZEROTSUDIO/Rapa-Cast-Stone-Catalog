<x-front.layout>
    <section class="section" style="margin-top: 100px;">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="product-gallery">
                        <div class="main-image-wrapper">
                            {{-- <img id="mainImg" src="https://images.unsplash.com/photo-1503602642458-232111445657?w=800" alt="Product" class="main-image"> --}}
                            <img id="mainImg"
                                src="{{ $catalog->image ? asset('images/' . $catalog->image) : 'https://images.unsplash.com/photo-1503602642458-232111445657?w=800' }}"
                                alt="Product" class="main-image">
                        </div>
                        <div class="thumbnail-grid">
                            <div class="thumbnail-wrapper">
                                <img src="https://images.unsplash.com/photo-1503602642458-232111445657?w=200"
                                    class="thumbnail active" onclick="changeImage(this)">
                            </div>
                            <div class="thumbnail-wrapper">
                                <img src="https://images.unsplash.com/photo-1540932239986-30128078f3c5?w=200"
                                    class="thumbnail" onclick="changeImage(this)">
                            </div>
                            <div class="thumbnail-wrapper">
                                <img src="https://images.unsplash.com/photo-1567016432779-094069958ea5?w=200"
                                    class="thumbnail" onclick="changeImage(this)">
                            </div>
                            <div class="thumbnail-wrapper">
                                <img src="https://images.unsplash.com/photo-1555041469-a586c61ea9bc?w=200"
                                    class="thumbnail" onclick="changeImage(this)">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="product-info">
                        <p class="meta">{{ $catalog->category->name }} / CAST STONE</p>
                        <h1>{{ $catalog->name }}</h1>
                        <p class="description">
                            {{ $catalog->description }}
                        </p>
                        <div class="specs">
                            <h4>Specifications</h4>
                            @if ($catalog->specification)
                                @foreach ($catalog->specification as $key => $value)
                                    <div class="spec-item">
                                        <span>{{ Str::title(str_replace('_', ' ', $key)) }}</span>
                                        <span>{{ $value }}</span>
                                    </div>
                                @endforeach
                            @endif
                        </div>

                        <button class="cta-button">Request Quote</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </x-layout>
