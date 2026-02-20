<x-layout
    title="St. John Islands Tours - Pristine Beaches & Nature | Waveshark"
    description="Escape to St. John Islands. Enjoy secluded beaches, crystal clear waters, and exclusive island tours with Waveshark Ventures.">
    <!-- Navbar -->
    <x-header />

    <!-- Remix Icon -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.4.0/fonts/remixicon.css" rel="stylesheet" />

    @push("styles")
    @vite("resources/css/destination.css")
@endpush

<div class="booking-page-font bg-black">

        <!-- Back Button -->
        <a href="{{('/')}}" class="absolute top-2 left-8 z-50 text-white hover:text-gold transition-colors duration-300 bg-white/10 backdrop-blur-md p-3 rounded-full border border-white/20" style="
            margin-top: 7rem;
            margin-left: 1rem;
            ">
            <i class="ri-close-line text-xl"></i>
        </a>

        <!-- HERO SECTION (Contains Search) -->
        <div class="hero" style="background-image: url('{{ asset('images/langkawi.webp') }}');">
            <div class="hero-overlay"></div>
            <!-- Search Content -->
            <div class="search-container">
                <h1 class="search-title">Discover St. John Islands</h1>

                <div class="search-box">
                    <input type="text" class="search-input" placeholder="Search activities (e.g., Jetski, Mangrove Tour)...">
                    <button class="search-btn">
                        <i class="ri-search-line"></i>
                    </button>
                </div>
            </div>
            <div class="scroll-down" onclick="window.scrollTo({top: window.innerHeight, behavior: 'smooth'})">
                <span class="scroll-text">Scroll Down</span>
                <i class="ri-arrow-down-line scroll-icon"></i>
            </div>
        </div>

        <!-- SERVICE CARDS SECTION (GRID) -->
        <div class="tour-grid-section">
            <div class="tour-grid">
                <!-- Service Card 1 -->
                <a href="/stjohnislands/car-rental" class="tour-grid-card">
                    <div class="tg-image" style="background-image: url('{{ asset('images/car-rental.webp') }}');"></div>
                    <div class="tg-content">
                        <h3 class="tg-title">CAR RENTAL</h3>
                        <p class="tg-desc">Rent a car and explore Langkawi's islands and attractions.</p>
                    </div>
                </a>

                <!-- Service Card 2 -->
                <a href="/stjohnislands/island-hopping" class="tour-grid-card">
                    <div class="tg-image" style="background-image: url('{{ asset('images/islands-hopping.webp') }}');"></div>
                    <div class="tg-content">
                        <h3 class="tg-title">ISLANDS HOPPING</h3>
                        <p class="tg-desc">Explore Langkawi's islands and attractions.</p>
                    </div>
                </a>

                <!-- Service Card 3 -->
                <a href="/stjohnislands/airport-transfer" class="tour-grid-card">
                    <div class="tg-image" style="background-image: url('{{ asset('images/airport-transfer.webp') }}');"></div>
                    <div class="tg-content">
                        <h3 class="tg-title">AIRPORT TRANSFER</h3>
                        <p class="tg-desc">Experience a comfortable airport pickup service.</p>
                    </div>
                </a>

                <!-- Service Card 4 -->
                <a href="/stjohnislands/mangrove-tour" class="tour-grid-card">
                    <div class="tg-image" style="background-image: url('{{ asset('images/mangrove-tour.webp') }}');"></div>
                    <div class="tg-content">
                        <h3 class="tg-title">MANGROVE TOUR</h3>
                        <p class="tg-desc">Explore Langkawi's mangrove forests and wildlife.</p>
                    </div>
                </a>

                <!-- Service Card 5 -->
                <a href="/stjohnislands/jetski" class="tour-grid-card">
                    <div class="tg-image" style="background-image: url('{{ asset('images/jetski.webp') }}');"></div>
                    <div class="tg-content">
                        <h3 class="tg-title">JET SKI</h3>
                        <p class="tg-desc">Experience the thrill of jet skiing in Langkawi.</p>
                    </div>
                </a>

                <!-- Service Card 6 -->
                <a href="/stjohnislands/sunset-cruise" class="tour-grid-card">
                    <div class="tg-image" style="background-image: url('{{ asset('images/sunset.webp') }}');"></div>
                    <div class="tg-content">
                        <h3 class="tg-title">SUNSET CRUISE</h3>
                        <p class="tg-desc">Enjoy a beautiful sunset cruise experience.</p>
                    </div>
                </a>
            </div>

        </div>



        <script>
            document.getElementById('waBookingForm').addEventListener('submit', function(e) {
                e.preventDefault();

                const destination = document.getElementById('destination').value;
                const date = document.getElementById('date').value;
                const pax = document.getElementById('pax').value;
                const service = document.getElementById('service').value;

                const message =
                    `Hello, I would like to make a booking:%0A` +
                    `Destination / Activity: ${destination}%0A` +
                    `Date: ${date}%0A` +
                    `Pax: ${pax}%0A` +
                    `Service: ${service}`;

                const phone = '6281219110199'; // WA format internasional
                const url = `https://wa.me/${phone}?text=${message}`;

                window.open(url, '_blank');
            });
        </script>



</x-layout>