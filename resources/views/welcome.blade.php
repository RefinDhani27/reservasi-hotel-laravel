<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Bintang Lima Nusantara</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;1,400&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; overflow-x: hidden; }
        h1, h2, h3, h4, .font-serif { font-family: 'Playfair Display', serif; }
        
        /* Kelas CSS untuk Animasi Scroll */
        .reveal {
            opacity: 0;
            transform: translateY(50px);
            transition: all 0.8s ease-out;
        }
        .reveal.active {
            opacity: 1;
            transform: translateY(0);
        }
        
        /* Efek Parallax Khusus untuk Mobile jika bg-fixed tidak didukung dengan baik */
        @media (max-width: 768px) {
            .bg-fixed { background-attachment: scroll; }
        }
    </style>
</head>
<body class="antialiased bg-gray-50 text-gray-800">

    <nav class="fixed w-full z-50 top-0 py-5 px-8 flex justify-between items-center text-white bg-black bg-opacity-30 backdrop-blur-sm transition-all duration-300">
        <div class="text-2xl font-serif font-bold tracking-wider">HOTEL<span class="text-yellow-400">LUXE</span></div>
        
        <div class="hidden md:flex space-x-8 font-medium text-sm uppercase tracking-wide">
            <a href="#beranda" class="hover:text-yellow-400 transition">Beranda</a>
            <a href="#tentang" class="hover:text-yellow-400 transition">Tentang Kami</a>
            <a href="#fasilitas" class="hover:text-yellow-400 transition">Fasilitas</a>
            <a href="#kamar" class="hover:text-yellow-400 transition">Kamar</a>
            <a href="#kontak" class="hover:text-yellow-400 transition">Kontak</a>
        </div>

        <div class="space-x-4 font-medium">
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}" class="bg-yellow-500 hover:bg-yellow-600 text-gray-900 px-6 py-2 rounded-full transition shadow-lg text-sm font-bold">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="hover:text-yellow-400 transition text-sm">Masuk</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="bg-yellow-500 hover:bg-yellow-600 text-gray-900 px-6 py-2 rounded-full transition shadow-lg text-sm font-bold">Daftar</a>
                    @endif
                @endauth
            @endif
        </div>
    </nav>

    <section id="beranda" class="relative w-full h-screen bg-cover bg-center bg-fixed flex items-center justify-center" 
         style="background-image: url('https://images.unsplash.com/photo-1542314831-c6a4d27ce6a2?q=80&w=2070&auto=format&fit=crop');">
        
        <div class="absolute inset-0 bg-black bg-opacity-50"></div>
        
        <div class="relative z-10 text-center px-4 text-white reveal">
            <h2 class="text-sm uppercase tracking-[0.3em] mb-4 text-yellow-400 font-semibold">Selamat Datang di</h2>
            <h1 class="text-5xl md:text-7xl font-bold mb-6 drop-shadow-lg">Kemewahan Tanpa Batas</h1>
            <p class="text-lg md:text-xl font-light mb-10 max-w-2xl mx-auto drop-shadow-md">Temukan kenyamanan sejati dan pengalaman menginap tak terlupakan di jantung kota.</p>
            <a href="#kamar" class="bg-yellow-500 hover:bg-yellow-600 text-gray-900 font-bold py-4 px-10 rounded-full text-lg transition shadow-2xl transform hover:scale-105 inline-block">
                Jelajahi Kamar
            </a>
        </div>
    </section>

    <section id="tentang" class="py-24 px-8 max-w-7xl mx-auto">
        <div class="flex flex-col md:flex-row items-center gap-16">
            <div class="md:w-1/2 reveal">
                <h2 class="text-sm uppercase tracking-widest text-yellow-600 mb-2 font-bold">Sejarah Kami</h2>
                <h3 class="text-4xl font-bold text-gray-900 mb-6">Harmoni antara Tradisi dan Modernitas</h3>
                <p class="text-gray-600 mb-6 leading-relaxed">
                    Berdiri sejak tahun 2010, Hotel Luxe Nusantara didedikasikan untuk memberikan layanan perhotelan bertaraf internasional tanpa meninggalkan kehangatan budaya lokal. Setiap sudut hotel kami dirancang untuk memanjakan indera Anda.
                </p>
                <p class="text-gray-600 leading-relaxed mb-8">
                    Dari lobi yang megah hingga pemandangan kota yang menakjubkan dari jendela kamar Anda, kami menjanjikan pengalaman yang tidak hanya nyaman, tetapi juga menginspirasi.
                </p>
                <img src="https://images.unsplash.com/photo-1582719508461-905c673771fd?q=80&w=600&auto=format&fit=crop" alt="Signature" class="w-48 opacity-80">
            </div>
            <div class="md:w-1/2 relative reveal" style="transition-delay: 0.2s;">
                <img src="https://images.unsplash.com/photo-1551882547-ff40c0d129df?q=80&w=800&auto=format&fit=crop" alt="Lobby" class="rounded-xl shadow-2xl z-10 relative">
                <div class="absolute -bottom-8 -left-8 w-full h-full border-4 border-yellow-500 rounded-xl z-0 hidden md:block"></div>
            </div>
        </div>
    </section>

    <section id="fasilitas" class="relative py-24 bg-cover bg-center bg-fixed text-white" style="background-image: url('https://images.unsplash.com/photo-1566073771259-6a8506099945?q=80&w=2070&auto=format&fit=crop');">
        <div class="absolute inset-0 bg-gray-900 bg-opacity-80"></div>
        
        <div class="relative z-10 max-w-7xl mx-auto px-8">
            <div class="text-center mb-16 reveal">
                <h2 class="text-sm uppercase tracking-widest text-yellow-400 mb-2">Fasilitas Eksklusif</h2>
                <h3 class="text-4xl font-bold">Layanan Tanpa Kompromi</h3>
                <div class="w-24 h-1 bg-yellow-500 mx-auto mt-6"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 text-center">
                <div class="reveal">
                    <div class="bg-gray-800 bg-opacity-50 p-8 rounded-xl hover:bg-yellow-500 hover:text-gray-900 transition duration-300 group">
                        <div class="text-5xl mb-4 group-hover:scale-110 transition">🍽️</div>
                        <h4 class="text-xl font-bold mb-2">Restoran Bintang 5</h4>
                        <p class="text-sm opacity-80">Sajian kuliner lokal dan internasional dari koki pemenang penghargaan.</p>
                    </div>
                </div>
                <div class="reveal" style="transition-delay: 0.1s;">
                    <div class="bg-gray-800 bg-opacity-50 p-8 rounded-xl hover:bg-yellow-500 hover:text-gray-900 transition duration-300 group">
                        <div class="text-5xl mb-4 group-hover:scale-110 transition">🏊‍♂️</div>
                        <h4 class="text-xl font-bold mb-2">Infinity Pool</h4>
                        <p class="text-sm opacity-80">Kolam renang air hangat dengan pemandangan kota 360 derajat.</p>
                    </div>
                </div>
                <div class="reveal" style="transition-delay: 0.2s;">
                    <div class="bg-gray-800 bg-opacity-50 p-8 rounded-xl hover:bg-yellow-500 hover:text-gray-900 transition duration-300 group">
                        <div class="text-5xl mb-4 group-hover:scale-110 transition">💆‍♀️</div>
                        <h4 class="text-xl font-bold mb-2">Spa & Wellness</h4>
                        <p class="text-sm opacity-80">Relaksasi tubuh dan pikiran dengan terapis profesional kami.</p>
                    </div>
                </div>
                <div class="reveal" style="transition-delay: 0.3s;">
                    <div class="bg-gray-800 bg-opacity-50 p-8 rounded-xl hover:bg-yellow-500 hover:text-gray-900 transition duration-300 group">
                        <div class="text-5xl mb-4 group-hover:scale-110 transition">🚗</div>
                        <h4 class="text-xl font-bold mb-2">Layanan Antar-Jemput</h4>
                        <p class="text-sm opacity-80">Layanan VIP bandara siap sedia 24 jam untuk kenyamanan Anda.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="kamar" class="py-24 px-8 max-w-7xl mx-auto">
        <div class="text-center mb-16 reveal">
            <h2 class="text-sm uppercase tracking-widest text-gray-500 mb-2">Akomodasi Kami</h2>
            <h3 class="text-4xl font-bold text-gray-900">Kamar & Suite Pilihan</h3>
            <div class="w-24 h-1 bg-yellow-500 mx-auto mt-6"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
            @forelse($featuredRooms as $index => $room)
                <div class="bg-white rounded-xl shadow-lg overflow-hidden group hover:shadow-2xl transition duration-300 reveal" style="transition-delay: {{ $index * 0.1 }}s;">
                    <div class="h-64 overflow-hidden relative">
                        <img src="https://images.unsplash.com/photo-1611892440504-42a792e24d32?q=80&w=800&auto=format&fit=crop" alt="Room" 
                             class="w-full h-full object-cover transform group-hover:scale-110 transition duration-700">
                        <div class="absolute top-4 right-4 bg-white px-3 py-1 text-sm font-bold text-gray-900 rounded-full shadow">
                            No. {{ $room->room_number }}
                        </div>
                    </div>
                    
                    <div class="p-8">
                        <h4 class="text-2xl font-bold text-gray-900 mb-2">{{ $room->room_type }}</h4>
                        <p class="text-yellow-600 font-bold text-xl mb-4">Rp {{ number_format($room->price_per_night, 0, ',', '.') }} <span class="text-sm text-gray-500 font-normal">/ malam</span></p>
                        <p class="text-gray-600 mb-6 line-clamp-3">
                            {{ $room->description ?? 'Kamar mewah dengan fasilitas lengkap untuk kenyamanan menginap Anda. Dilengkapi dengan layanan kamar 24 jam.' }}
                        </p>
                        
                        <a href="{{ route('dashboard') }}" class="block text-center border-2 border-gray-900 text-gray-900 hover:bg-gray-900 hover:text-white font-semibold py-3 px-4 rounded transition">
                            Pesan Sekarang
                        </a>
                    </div>
                </div>
            @empty
                <div class="col-span-3 text-center py-12 text-gray-500 reveal">
                    Belum ada kamar yang tersedia saat ini. Admin sedang menyiapkan kamar terbaik untuk Anda!
                </div>
            @endforelse
        </div>
    </section>

    <section id="kontak" class="py-20 bg-gray-100 reveal">
        <div class="max-w-4xl mx-auto px-8 text-center">
            <h3 class="text-3xl font-bold text-gray-900 mb-6 font-serif">Siap Untuk Pengalaman Tak Terlupakan?</h3>
            <p class="text-gray-600 mb-8 text-lg">Tim kami siap membantu merencanakan kunjungan Anda. Hubungi kami untuk permintaan khusus atau reservasi grup.</p>
            <div class="flex flex-col md:flex-row justify-center gap-4">
                <a href="mailto:info@hotelluxe.com" class="bg-gray-900 hover:bg-gray-800 text-white font-bold py-3 px-8 rounded-full transition">
                    📧 info@hotelluxe.com
                </a>
                <a href="tel:+628123456789" class="border-2 border-gray-900 text-gray-900 font-bold py-3 px-8 rounded-full transition hover:bg-gray-200">
                    📞 +62 812-3456-7890
                </a>
            </div>
        </div>
    </section>

    <footer class="bg-gray-900 text-gray-300 py-16 px-8">
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-4 gap-12">
            <div class="md:col-span-1">
                <div class="text-2xl font-serif font-bold text-white tracking-wider mb-6">HOTEL<span class="text-yellow-400">LUXE</span></div>
                <p class="text-sm opacity-80 mb-6">Standar baru kemewahan di pusat kota. Temukan harmoni sejati hanya bersama kami.</p>
            </div>
            <div>
                <h4 class="text-white font-bold uppercase tracking-wider mb-6">Tautan Cepat</h4>
                <ul class="space-y-3 text-sm">
                    <li><a href="#beranda" class="hover:text-yellow-400 transition">Beranda</a></li>
                    <li><a href="#tentang" class="hover:text-yellow-400 transition">Tentang Kami</a></li>
                    <li><a href="#kamar" class="hover:text-yellow-400 transition">Daftar Kamar</a></li>
                    <li><a href="#kontak" class="hover:text-yellow-400 transition">Hubungi Kami</a></li>
                </ul>
            </div>
            <div>
                <h4 class="text-white font-bold uppercase tracking-wider mb-6">Bantuan</h4>
                <ul class="space-y-3 text-sm">
                    <li><a href="#" class="hover:text-yellow-400 transition">Syarat & Ketentuan</a></li>
                    <li><a href="#" class="hover:text-yellow-400 transition">Kebijakan Privasi</a></li>
                    <li><a href="#" class="hover:text-yellow-400 transition">FAQ</a></li>
                </ul>
            </div>
            <div>
                <h4 class="text-white font-bold uppercase tracking-wider mb-6">Buletin Kami</h4>
                <p class="text-sm opacity-80 mb-4">Dapatkan promo eksklusif langsung ke kotak masuk Anda.</p>
                <div class="flex">
                    <input type="email" placeholder="Email Anda" class="w-full px-4 py-2 text-gray-900 rounded-l focus:outline-none">
                    <button class="bg-yellow-500 hover:bg-yellow-600 text-gray-900 font-bold px-4 py-2 rounded-r transition">Kirim</button>
                </div>
            </div>
        </div>
        <div class="max-w-7xl mx-auto border-t border-gray-800 mt-12 pt-8 text-center text-sm opacity-60">
            &copy; {{ date('Y') }} Hotel Luxe Nusantara. Dibuat dengan ❤️ sebagai Portofolio Full-Stack.
        </div>
    </footer>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Mengambil semua elemen dengan class 'reveal'
            const reveals = document.querySelectorAll('.reveal');

            // Fungsi untuk memicu animasi saat elemen masuk layar
            const revealOnScroll = function(entries, observer) {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('active');
                        // Optional: Unobserve setelah muncul agar animasinya hanya jalan 1x
                        observer.unobserve(entry.target); 
                    }
                });
            };

            // Mengatur Observer
            const observer = new IntersectionObserver(revealOnScroll, {
                root: null,
                threshold: 0.15, // Animasi mulai saat 15% elemen terlihat
                rootMargin: "0px 0px -50px 0px"
            });

            // Memasang observer ke setiap elemen 'reveal'
            reveals.forEach(reveal => {
                observer.observe(reveal);
            });
        });
    </script>
</body>
</html>