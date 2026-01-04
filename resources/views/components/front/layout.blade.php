<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rapa Cast Stone - Architectural Stone Furniture</title>

    <link
        href="https://fonts.googleapis.com/css2?family=Cormorant:wght@300;400;500;600&family=Inter:wght@300;400;500;600&display=swap"
        rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-[#FDFBF7] text-[#3A352F] font-sans">

    <!-- Navigation -->
    <x-front.navbar></x-front.navbar>

    <main>
        {{ $slot }}
    </main>

    <!-- Footer -->
    <footer
        class="bg-gradient-to-br from-[#3A352F] to-[#2D2822] text-white/85 pt-24 pb-12 mt-32 border-t border-[#6B5E52]">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid md:grid-cols-4 gap-12 mb-16">
                <div>
                    <h5 class="font-heading text-xl mb-8 tracking-wider text-white">RAPA CAST STONE</h5>
                    <p class="text-sm leading-relaxed text-white/60 tracking-wide">
                        Crafting exceptional architectural stone furniture since 2010. Each piece embodies quiet luxury
                        and timeless elegance.
                    </p>
                </div>
                <div>
                    <h5 class="font-heading text-lg mb-8 tracking-wider text-white">Explore</h5>
                    <div class="space-y-3">
                        <a href="{{ url('/') }}"
                            class="block text-sm text-white/65 hover:text-[#B5A693] transition-colors tracking-wide">Home</a>
                        <a href="{{ url('/about') }}"
                            class="block text-sm text-white/65 hover:text-[#B5A693] transition-colors tracking-wide">About</a>
                        <a href="{{ url('/catalogs') }}"
                            class="block text-sm text-white/65 hover:text-[#B5A693] transition-colors tracking-wide">Catalog</a>
                        <a href="{{ url('/articles') }}"
                            class="block text-sm text-white/65 hover:text-[#B5A693] transition-colors tracking-wide">Journal</a>
                    </div>
                </div>
                <div>
                    <h5 class="font-heading text-lg mb-8 tracking-wider text-white">Contact</h5>
                    <div class="space-y-3">
                        <a href="mailto:info@rapacaststone.com"
                            class="block text-sm text-white/65 hover:text-[#B5A693] transition-colors tracking-wide">info@rapacaststone.com</a>
                        <a href="tel:+1234567890"
                            class="block text-sm text-white/65 hover:text-[#B5A693] transition-colors tracking-wide">+1
                            (234) 567-890</a>
                        <p class="text-sm text-white/60 mt-6 leading-relaxed tracking-wide">
                            123 Stone Workshop Lane<br>
                            Craftsman District<br>
                            New York, NY 10001
                        </p>
                    </div>
                </div>
                <div>
                    <h5 class="font-heading text-lg mb-8 tracking-wider text-white">Follow</h5>
                    <div class="space-y-3">
                        <a href="#"
                            class="block text-sm text-white/65 hover:text-[#B5A693] transition-colors tracking-wide">Instagram</a>
                        <a href="#"
                            class="block text-sm text-white/65 hover:text-[#B5A693] transition-colors tracking-wide">Pinterest</a>
                        <a href="#"
                            class="block text-sm text-white/65 hover:text-[#B5A693] transition-colors tracking-wide">LinkedIn</a>
                    </div>
                </div>
            </div>
            <div class="pt-8 border-t border-white/15 text-center">
                <p class="text-xs text-white/45 tracking-wider">
                    © 2024 Rapa Cast Stone. All rights reserved.
                </p>
            </div>
        </div>
    </footer>

    <script>
        // Scroll Reveal Animation
        document.addEventListener('DOMContentLoaded', function() {
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -100px 0px'
            };

            const observer = new IntersectionObserver(function(entries) {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('revealed');
                    }
                });
            }, observerOptions);

            document.querySelectorAll('.scroll-reveal').forEach(el => {
                observer.observe(el);
            });
        });
    </script>
</body>

</html>
