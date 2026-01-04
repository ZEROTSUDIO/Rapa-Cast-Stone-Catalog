@props([
    'id' => 'heroCarousel',
    'interval' => 5000,
])

<section id="{{ $id }}" class="carousel slide carousel-fade" data-bs-ride="carousel"
    data-bs-interval="{{ $interval }}">
    {{-- Indicators will be rendered based on slot count --}}
    <div class="carousel-indicators">
        {{ $indicators ?? '' }}
    </div>

    <div class="carousel-inner">
        {{ $slot }}
    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#{{ $id }}" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#{{ $id }}" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</section>
