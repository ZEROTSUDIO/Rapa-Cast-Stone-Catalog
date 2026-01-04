<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rapa Cast Stone - Architectural Stone Furniture</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Cormorant:wght@300;400;500;600&family=Inter:wght@300;400;500&display=swap"
        rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
</head>

<body>
    <!-- Navigation -->
    <x-front.navbar></x-front.navbar>
    <main>{{ $slot }}</main>


    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <h5>RAPA CAST STONE</h5>
                    <p class="footer-text">
                        Crafting exceptional architectural stone furniture since 2010. Each piece embodies quiet luxury
                        and timeless elegance.
                    </p>
                </div>
                <div class="col-md-2 mb-4">
                    <h5>Explore</h5>
                    <a href="/">Home</a>
                    <a href="/about">About</a>
                    <a href="/catalogue">Catalog</a>
                    <a href="/articles">Journal</a>
                </div>
                <div class="col-md-3 mb-4">
                    <h5>Contact</h5>
                    <a href="mailto:info@rapacaststone.com">info@rapacaststone.com</a>
                    <a href="tel:+1234567890">+1 (234) 567-890</a>
                    <p class="footer-text" style="margin-top: 1.5rem;">
                        123 Stone Workshop Lane<br>
                        Craftsman District<br>
                        New York, NY 10001
                    </p>
                </div>
                <div class="col-md-3 mb-4">
                    <h5>Follow</h5>
                    <a href="#">Instagram</a>
                    <a href="#">Pinterest</a>
                    <a href="#">LinkedIn</a>
                </div>
            </div>
            <div class="row mt-5 pt-4" style="border-top: 1px solid rgba(255,255,255,0.15);">
                <div class="col-12 text-center">
                    <p style="color: rgba(255,255,255,0.45); font-size: 0.8rem; margin: 0; letter-spacing: 1px;">
                        © 2024 Rapa Cast Stone. All rights reserved.
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
</body>

</html>
