<x-front.layout title="Rapa Cast Stone | Design & Produsen Batu Cor"
    meta-description="Rapa Cast Stone adalah pabrik cast stone atau batu cor yang memproduksi vas, akuarium, paving, dan elemen arsitektur berkualitas untuk rumah dan proyek.">>
    <!-- Hero Section -->
    <x-front.carousel :totalSlides="3">
        <x-front.hero-slide :index="0" image="{{ asset('img/bg-1.png') }}" title="DESAIN BATU COR ABADI"
            subtitle="PRODUK BATU COR UNTUK ARSITEKTUR DAN FURNITURE" :tags="['HANDCRAFTED', 'KUALITAS EKSPOR', 'MATERIAL ALAMI']" />

        <x-front.hero-slide :index="1" image="{{ asset('img/bg-2.jpeg') }}" title="DESAIN ORGANIK"
            subtitle="MENGHASILKAN NUANSA ALAMI KE DALAM RUANGAN" :tags="['SUSTAINABLE', 'MINIMALIS', 'KERAJINAN']" />

        <x-front.hero-slide :index="2" image="{{ asset('img/bg-3.png') }}" title="KEINDAHAN TERUKIR"
            subtitle="PERPADUAN ANTARA SENI DAN FUNGSI" :tags="['CUSTOM', 'KONTEMPORER', 'TAHAN LAMA']" />
    </x-front.carousel>

    <!-- Value Proposition -->
    <section class="py-24 px-6 bg-white">
        <div class="max-w-7xl mx-auto">
            <p class="text-center text-xs text-[#8B7F6E] tracking-[2px] uppercase mb-4 font-normal">Nilai Utama
            </p>
            <h2 class="font-heading text-5xl md:text-6xl text-center mb-20 tracking-wide font-light">Mengapa Pilih Kami
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-12 text-center">
                <div>
                    <p class="text-xs tracking-[2px] uppercase text-[#8B7F6E] mb-4">Craft</p>
                    <h3 class="font-heading text-2xl mb-3 font-light">Handcrafted</h3>
                    <p class="text-sm text-[#6B5E52] leading-relaxed">
                        Setiap produk dicetak dan diselesaikan secara manual, menjaga karakter dan detail alami.
                    </p>
                </div>

                <div>
                    <p class="text-xs tracking-[2px] uppercase text-[#8B7F6E] mb-4">Quality</p>
                    <h3 class="font-heading text-2xl mb-3 font-light">Siap Ekspor</h3>
                    <p class="text-sm text-[#6B5E52] leading-relaxed">
                        Dirancang untuk daya tahan dan konsistensi, dipercayai untuk proyek lokal maupuninternasional.
                    </p>
                </div>

                <div>
                    <p class="text-xs tracking-[2px] uppercase text-[#8B7F6E] mb-4">Material</p>
                    <h3 class="font-heading text-2xl mb-3 font-light">Batu Alam</h3>
                    <p class="text-sm text-[#6B5E52] leading-relaxed">
                        Batu Cor menggabungkan kekuatan mineral dengan kontrol permukaan yang terperinci.
                    </p>
                </div>

                <div>
                    <p class="text-xs tracking-[2px] uppercase text-[#8B7F6E] mb-4">Service</p>
                    <h3 class="font-heading text-2xl mb-3 font-light">Bespoke</h3>
                    <p class="text-sm text-[#6B5E52] leading-relaxed">
                        Dimensi, finishing, dan spesifikasi khusus tersedia setelah permintaan.
                    </p>
                </div>
            </div>
        </div>
    </section>


    <!-- Collections -->
    <section class="py-32 px-6">
        <div class="max-w-7xl mx-auto">
            <p class="text-center text-xs text-[#8B7F6E] tracking-[2px] uppercase mb-4 font-normal">Jelajahi</p>
            <h2 class="font-heading text-5xl md:text-6xl text-center mb-20 tracking-wide font-light">Koleksi Kami</h2>

            <div class="grid md:grid-cols-3 gap-6 scroll-reveal">
                @foreach ($categories as $category)
                    <a href="{{ url('/catalogs?category=' . $category->slug) }}" class="block">
                        <div
                            class="category-card group relative h-[550px] overflow-hidden cursor-pointer shadow-lg hover:shadow-2xl transition-all duration-600 hover:-translate-y-2">
                            <img src="{{ $category->image ? asset('storage/' . $category->image) : asset('img/default.jpg') }}"
                                class="category-image w-full h-full object-cover">
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-[#3A352F]/85 to-transparent flex items-end">
                                <div class="p-10 text-white">
                                    <h3 class="font-heading text-4xl mb-2">{{ $category->name }}</h3>
                                    <p class="text-xs tracking-[1.5px] uppercase opacity-90">
                                        {{ Str::limit($category->description, 30) }}</p>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Our Process -->
    <section class="py-32 px-6 bg-[#F5F1E8]">
        <div class="max-w-7xl mx-auto">
            <p class="text-center text-xs text-[#8B7F6E] tracking-[2px] uppercase mb-4">
                How It’s Made
            </p>
            <h2 class="font-heading text-5xl md:text-6xl text-center mb-24 tracking-wide font-light">
                Tahapan Produksi
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-x-12 gap-y-24 justify-center mb-16">
                <!-- 01 Design -->
                <div class="flex flex-col">
                    <div class="overflow-hidden mb-8 shadow-lg">
                        <img src="https://images.unsplash.com/photo-1503387762-592deb58ef4e?w=800"
                            class="w-full h-[320px] object-cover" alt="Design Process">
                    </div>
                    <span class="text-xs tracking-[2px] uppercase text-[#8B7F6E]">01</span>
                    <h4 class="font-heading text-2xl mt-4 mb-3 font-light">Design</h4>
                    <p class="text-sm text-[#6B5E52] leading-relaxed">
                        Proporsi dan bentuk dirancang dengan mempertimbangkan fungsi arsitektural dan keseimbangan
                        ruang.
                    </p>
                </div>

                <!-- 02 Molding -->
                <div class="flex flex-col">
                    <div class="overflow-hidden mb-8 shadow-lg">
                        <img src="https://images.unsplash.com/photo-1581091870627-3b4c2c1c6f56?w=800"
                            class="w-full h-[320px] object-cover" alt="Molding Process">
                    </div>
                    <span class="text-xs tracking-[2px] uppercase text-[#8B7F6E]">02</span>
                    <h4 class="font-heading text-2xl mt-4 mb-3 font-light">Molding</h4>
                    <p class="text-sm text-[#6B5E52] leading-relaxed">
                        Cetakan presisi dibuat untuk menjaga tekstur permukaan dan akurasi struktur.
                    </p>
                </div>

                <!-- 03 Casting -->
                <div class="flex flex-col">
                    <div class="overflow-hidden mb-8 shadow-lg">
                        <img src="https://images.unsplash.com/photo-1581091215367-59ab6c29d6f6?w=800"
                            class="w-full h-[320px] object-cover" alt="Casting Process">
                    </div>
                    <span class="text-xs tracking-[2px] uppercase text-[#8B7F6E]">03</span>
                    <h4 class="font-heading text-2xl mt-4 mb-3 font-light">Casting</h4>
                    <p class="text-sm text-[#6B5E52] leading-relaxed">
                        Campuran berbasis mineral dituangkan, dipadatkan, dan dibiarkan mengeras secara alami.
                    </p>
                </div>

                <!-- 04 Finishing -->
                <div class="flex flex-col">
                    <div class="overflow-hidden mb-8 shadow-lg">
                        <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?w=800"
                            class="w-full h-[320px] object-cover" alt="Finishing Process">
                    </div>
                    <span class="text-xs tracking-[2px] uppercase text-[#8B7F6E]">04</span>
                    <h4 class="font-heading text-2xl mt-4 mb-3 font-light">Finishing</h4>
                    <p class="text-sm text-[#6B5E52] leading-relaxed">
                        Permukaan diamplas, dipoles, atau diberi tekstur sepenuhnya secara manual.
                    </p>
                </div>

                <!-- 05 Delivery -->
                <div class="flex flex-col">
                    <div class="overflow-hidden mb-8 shadow-lg">
                        <img src="https://images.unsplash.com/photo-1604014237800-1c9102c219da?w=800"
                            class="w-full h-[320px] object-cover" alt="Packaging and Delivery">
                    </div>
                    <span class="text-xs tracking-[2px] uppercase text-[#8B7F6E]">05</span>
                    <h4 class="font-heading text-2xl mt-4 mb-3 font-light">Delivery</h4>
                    <p class="text-sm text-[#6B5E52] leading-relaxed">
                        Setiap produk dikemas dengan aman untuk pengiriman lokal maupun ekspor.
                    </p>
                </div>
            </div>
    </section>



    <!-- Featured Products -->
    <section class="py-32 px-6 ">
        <div class="max-w-7xl mx-auto">
            <p class="text-center text-xs text-[#8B7F6E] tracking-[2px] uppercase mb-4 font-normal">Pilihan Terbaik
            </p>
            <h2 class="font-heading text-5xl md:text-6xl text-center mb-20 tracking-wide font-light">Produk Ungulan
            </h2>

            <div class="grid md:grid-cols-3 gap-12 scroll-reveal">
                @foreach ($featuredProducts as $product)
                    <div class="product-card group">
                        <div class="overflow-hidden mb-8 shadow-lg">
                            <img src="{{ $product->image_url }}" alt="{{ $product->name }}"
                                class="product-image w-full h-[500px] object-cover">
                        </div>
                        <h4 class="font-heading text-3xl mb-3 tracking-wide">{{ $product->name }}</h4>
                        <p class="text-sm text-[#8B7F6E] mb-5 tracking-wide">
                            {{ Str::limit(strip_tags($product->description), 50) }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>



    <!-- Soft CTA -->
    <section class="py-32 px-6">
        <div class="max-w-4xl mx-auto text-center">
            <p class="text-xs text-[#8B7F6E] tracking-[2px] uppercase mb-6">
                Untuk Proyek & Ruang Privat
            </p>

            <h2 class="font-heading text-4xl md:text-5xl mb-10 font-light tracking-wide">
                Dirancang untuk Menyatu dengan Arsitektur
            </h2>

            <p class="text-sm text-[#6B5E52] max-w-2xl mx-auto mb-14 leading-relaxed">
                Koleksi kami dirancang untuk hunian, hospitality, dan lingkungan arsitektural
                yang mengutamakan kejujuran material dan proporsi.
            </p>

            <div class="flex justify-center gap-6">
                <a href="{{ url('catalogs') }}"
                    class="px-10 py-4 border border-[#3A352F] text-sm tracking-[2px] uppercase hover:bg-[#3A352F] hover:text-white transition">
                    Lihat Katalog Lengkap
                </a>

                <a href="{{ url('contact') }}"
                    class="px-10 py-4 text-sm tracking-[2px] uppercase text-[#6B5E52] hover:text-[#3A352F] transition">
                    Ajukan Produk Kustom
                </a>
            </div>
        </div>
    </section>
</x-front.layout>
