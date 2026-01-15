<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="{{ $metaDescription ?? 'Rapa Cast Stone adalah pabrik dan produsen cast stone berkualitas.' }}">
    <meta name="author" content="{{ $metaAuthor ?? 'Rapa Cast Stone' }}">
    <title>{{ $title ?? 'Rapa Cast Stone - Architectural Stone Furniture' }}</title>

    <link rel="icon" type="image/png" href="{{ asset('img/logo.png') }}">

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
    <x-front.footer></x-front.footer>

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
