<x-layout
    title="Waveshark Ventures - Premier Langkawi Tours & Jetski Rentals"
    description="Experience the best of Langkawi with Waveshark Ventures. We offer premium jetski rentals, island hopping tours, sunset cruises, hotel bookings, and private charters."
    keywords="langkawi tours, jetski rental langkawi, island hopping, sunset cruise, langkawi holiday, water sports langkawi">
    <!-- Page Transition Overlay -->
    <div id="page-transition" class="fixed inset-0 z-[9999] pointer-events-none bg-black opacity-0 transition-opacity duration-500 ease-in-out flex items-center justify-center">
        <div class="relative">
            <div class="absolute inset-0 bg-gold-500 blur-2xl opacity-20 animate-pulse rounded-full"></div>
            <img src="{{ asset('images/logo-waveshart-removebg.webp') }}" width="200" height="96" loading="lazy" decoding="async" class="h-24 w-auto drop-shadow-2xl relative z-10" alt="Loading...">
        </div>
    </div>

    <script>
        function startTransition(url) {
            const overlay = document.getElementById('page-transition');

            // Enable pointer events to block clicks and start fade
            overlay.classList.remove('pointer-events-none');
            overlay.classList.remove('opacity-0');
            overlay.classList.add('opacity-100');

            // Navigate after animation (faster: 500ms match transition)
            setTimeout(() => {
                window.location.href = url;
            }, 600);
        }

        // Fix for back button black screen (bfcache)
        window.addEventListener('pageshow', function(event) {
            const overlay = document.getElementById('page-transition');
            if (overlay) {
                overlay.classList.add('opacity-0');
                overlay.classList.remove('opacity-100');
                // Use small timeout to ensure pointer-events are restored after fade out visual
                setTimeout(() => {
                    overlay.classList.add('pointer-events-none');
                }, 50);
            }
        });
    </script>

    <x-header />

    <!-- Main Content Wrapper -->
    <div x-data="{ 
            hovered: null, 
            expanded: null,
            activeDestination: 0,
            malaysiaDestinations: [
                {
                    name: 'Langkawi',
                    description: 'The Jewel of Kedah. Turqouise waters, limestone cliffs, and ancient rainforests.',
                    image: '{{ asset('images/laut-malay-new.webp') }}',
                    thumbnail: '{{ asset('images/laut-malay-new.webp') }}'
                },
                {
                    name: 'Sabah',
                    description: 'Home to Mount Kinabalu and diverse wildlife. Explore the wild beauty of Borneo.',
                    image: '{{ asset('images/sabah.webp') }}',
                    thumbnail: '{{ asset('images/sabah.webp') }}'
                }
            ],
            initParallax() {
                let ticking = false;
                window.addEventListener('mousemove', (e) => {
                    if (this.expanded) return;
                    if (!ticking) {
                        window.requestAnimationFrame(() => {
                            const mx = (e.clientX / window.innerWidth) - 0.5;
                            const my = (e.clientY / window.innerHeight) - 0.5;
                            document.documentElement.style.setProperty('--mouse-x', `${mx * -20}px`);
                            document.documentElement.style.setProperty('--mouse-y', `${my * -20}px`);
                            ticking = false;
                        });
                        ticking = true;
                    }
                }, { passive: true });
            },
            select(country) {
                this.expanded = country;
            },
            setActive(index) {
                this.activeDestination = index;
            },
            next() {
                this.activeDestination = (this.activeDestination + 1) % this.malaysiaDestinations.length;
            },
            prev() {
                this.activeDestination = (this.activeDestination - 1 + this.malaysiaDestinations.length) % this.malaysiaDestinations.length;
            }
        }"
        x-init="initParallax()"
        :class="{ 'h-screen overflow-hidden': expanded }"
        class="relative min-h-screen bg-black overflow-x-hidden">

        <!-- BACK BUTTON (When Expanded) -->
        <button
            x-show="expanded"
            x-transition.opacity.duration.500ms
            @click="expanded = null"
            class="fixed top-24 left-8 z-50 text-white/70 hover:text-gold-400 flex items-center gap-2 uppercase tracking-widest text-sm backdrop-blur-sm bg-black/30 px-4 py-2 rounded-full border border-white/10"
            style="display: none;">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Back to Selection
        </button>

        <!-- SPLIT HERO SECTION -->
        <div class="relative h-screen w-full flex flex-col md:flex-row transition-all duration-1000 ease-[cubic-bezier(0.22,1,0.36,1)]">


            <!-- LEFT (SINGAPORE) -->
            <div
                x-show="!(expanded === 'malaysia' && window.innerWidth < 768)"
                x-cloak
                class="relative h-1/2 md:h-full transition-all duration-1000 ease-[cubic-bezier(0.22,1,0.36,1)]
                  overflow-hidden cursor-pointer group transform-gpu
                  block md:block"
                style="will-change: width, opacity;"
                :class="{
                'absolute inset-0 z-40 w-full h-full md:relative md:inset-auto md:w-full md:z-20': expanded === 'singapore',
                'md:w-0 h-0 opacity-0': expanded === 'malaysia',
                'md:w-1/2': !expanded
                  }"
                @click="!expanded && select('singapore')">

                <!-- Parallax Wrapper (GPU Accelerated) -->
                <div class="absolute inset-0 w-full h-full transform-gpu will-change-transform transition-transform duration-100 ease-linear"
                    style="transform: translate(var(--mouse-x, 0px), var(--mouse-y, 0px));">

                    <!-- True LCP Optimized Image Structure -->
                    <img
                        src="{{ asset('images/laut-singapore2.webp') }}"
                        srcset="{{ asset('images/laut-singapore2-480w.webp') }} 480w,
                                {{ asset('images/laut-singapore2-800w.webp') }} 800w,
                                {{ asset('images/laut-singapore2-1200w.webp') }} 1200w,
                                {{ asset('images/laut-singapore2.webp') }} 1920w"
                        sizes="(max-width: 768px) 100vw, 50vw"
                        alt="Singapore Islands"
                        fetchpriority="high"
                        loading="eager"
                        decoding="sync"
                        class="w-full h-full object-cover transition-transform duration-700 ease-out transform-gpu will-change-transform"
                        :class="!expanded && hovered === 'singapore' ? 'scale-[1.03]' : 'scale-100'">
                </div>

                <!-- Overlay Gradient -->
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent transition-opacity duration-500"
                    :class="hovered === 'singapore' ? 'opacity-60' : 'opacity-80'">
                </div>

                <!-- Text Content (Preview) -->
                <div class="absolute bottom-20 left-0 right-0 text-center transition-all duration-500 transform"
                    :class="[
                        hovered === 'singapore' ? 'scale-[1.02]' : 'shadow-black',
                        expanded ? 'opacity-0' : 'opacity-100'
                    ]">
                    <h2 class="font-serif text-5xl md:text-7xl text-white font-bold tracking-tighter drop-shadow-2xl">
                        Singapore
                    </h2>
                    <p class="mt-4 text-gold-400 uppercase tracking-[0.3em] text-sm animate-pulse">
                        Discover Innovation
                    </p>
                </div>

                <!-- HIDDEN CONTENT (Shows when expanded) -->
                <div x-show="expanded === 'singapore'"
                    x-transition:enter="transition ease-out duration-1000 delay-300"
                    x-transition:enter-start="opacity-0 translate-y-10"
                    x-transition:enter-end="opacity-100 translate-y-0"
                    class="absolute inset-0 z-30 overflow-y-auto bg-black/80 backdrop-blur-sm">

                    <div class="sg-container">
                        <div class="sg-slide">

                            <!-- Item 1: ST John Island (Using Langkawi Image as requested 'tiru malay') -->
                            <div class="sg-item" style="background-image: url('{{ asset('images/laut-singapore2.webp') }}');">
                                <div class="sg-content">
                                    <div class="sg-name">ST John Island</div>
                                    <div class="sg-des">
                                        A tranquil getaway to experience nature and history.
                                    </div>
                                    <button class="sg-btn" onclick="startTransition('/stjohnislands')">See More</button>
                                </div>
                            </div>


                            <!-- Item 2: Singapore City (Using Sabah Image) -->
                            <div class="sg-item" style="background-image: url('{{ asset('images/laut-singapore2.webp') }}');">
                                <div class="sg-content">
                                    <div class="sg-name">ST John Island</div>
                                    <div class="sg-des">
                                        A tranquil getaway to experience nature and history.
                                    </div>
                                    <button class="sg-btn" onclick="startTransition('/stjohnislands')">See More</button>
                                </div>
                            </div>




                        </div>

                        <div class="sg-button" style="display: none;">
                            <button class="sg-prev" aria-label="Previous destination">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 24px; height: 24px;">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                                </svg>
                            </button>
                            <button class="sg-next" aria-label="Next destination">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 24px; height: 24px;">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- RIGHT (MALAYSIA) -->
            <div
                id="malaysia-card"
                x-show="!(expanded === 'singapore' && window.innerWidth < 768)"
                x-cloak
                class="relative h-1/2 md:h-full transition-none md:transition-all duration-1000 ease-[cubic-bezier(0.22,1,0.36,1)]
                    overflow-hidden cursor-pointer group transform-gpu
                    block md:block"
                style="will-change: width, opacity;"
                :class="{ 
                        'md:w-full h-full z-20': expanded === 'malaysia', 
                        'md:w-0 h-0 opacity-0': expanded === 'singapore', 
                        'md:w-1/2': !expanded 
                    }"
                @mouseenter="!expanded && (hovered = 'malaysia')"
                @mouseleave="!expanded && (hovered = null)"
                @click="expanded = 'malaysia'">

                <!-- Parallax Wrapper (GPU Accelerated) -->
                <div class="absolute inset-0 w-full h-full transform-gpu will-change-transform transition-transform duration-100 ease-linear"
                    style="transform: translate(var(--mouse-x, 0px), var(--mouse-y, 0px));">

                    <!-- True LCP Optimized Image Structure (Static fallback for preload scanner) -->
                    <img
                        :src="expanded === 'malaysia' ? malaysiaDestinations[activeDestination].image : '{{ asset('images/laut-malay-new.webp') }}'"
                        src="{{ asset('images/laut-malay-new.webp') }}"
                        srcset="{{ asset('images/laut-malay-new-480w.webp') }} 480w,
                                {{ asset('images/laut-malay-new-800w.webp') }} 800w,
                                {{ asset('images/laut-malay-new-1200w.webp') }} 1200w,
                                {{ asset('images/laut-malay-new.webp') }} 1920w"
                        :srcset="expanded === 'malaysia' ? null : '{{ asset('images/laut-malay-new-480w.webp') }} 480w, {{ asset('images/laut-malay-new-800w.webp') }} 800w, {{ asset('images/laut-malay-new-1200w.webp') }} 1200w, {{ asset('images/laut-malay-new.webp') }} 1920w'"
                        sizes="(max-width: 768px) 100vw, 50vw"
                        alt="Malaysia Destinations"
                        loading="eager"
                        decoding="async"
                        class="w-full h-full object-cover transition-transform duration-700 ease-out transform-gpu will-change-transform"
                        :class="!expanded && hovered === 'malaysia' ? 'scale-[1.03]' : 'scale-100'">
                </div>

                <!-- Overlay Gradient -->
                <div
                    class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/40 to-transparent transition-opacity duration-500"
                    :class="hovered === 'malaysia' ? 'opacity-70' : 'opacity-80'">
                </div>

                <!-- Text Content (Preview) -->
                <div
                    class="absolute bottom-20 left-0 right-0 text-center transition-all duration-500 transform"
                    :class="[
                        hovered === 'malaysia' ? 'scale-[1.02]' : 'shadow-black',
                        expanded ? 'opacity-0' : 'opacity-100'
                    ]">
                    <h2 class="font-serif text-5xl md:text-7xl text-white font-bold tracking-tighter drop-shadow-2xl">
                        Malaysia
                    </h2>
                    <p class="mt-4 text-gold-400 uppercase tracking-[0.3em] text-sm animate-pulse">
                        Experience Culture
                    </p>
                </div>

                <!-- HIDDEN CONTENT (Shows when expanded) -->
                <div x-show="expanded === 'malaysia'"
                    x-transition:enter="transition ease-out duration-1000 delay-300"
                    x-transition:enter-start="opacity-0 translate-y-10"
                    x-transition:enter-end="opacity-100 translate-y-0"
                    class="absolute inset-0 z-30 overflow-hidden">

                    <!-- NEW MALAYSIA SLIDER IMPLEMENTATION -->
                    <div class="mys-container">
                        <div class="mys-slide">

                            <!-- Item 1: Sabah -->
                            <div class="mys-item" style="background-image: url('{{ asset('template-slider-malaysia/image/sabah.webp') }}');">
                                <div class="mys-content">
                                    <div class="mys-name">Sabah</div>
                                    <div class="mys-des">
                                        Negeri di Bawah Bayu, rumah bagi Gunung Kinabalu dan hidupan liar yang unik.
                                    </div>
                                    <button class="mys-btn" onclick="startTransition('/sabah')">See More</button>
                                </div>
                            </div>


                            <!-- Item 2: Langkawi -->
                            <div class="mys-item" style="background-image: url('{{ asset('template-slider-malaysia/image/langkawi.webp') }}');">
                                <div class="mys-content">
                                    <div class="mys-name">Langkawi</div>
                                    <div class="mys-des">
                                        Permata Kedah, terkenal dengan pantai pasir putih dan kereta kabel yang menakjubkan.
                                    </div>
                                    <button class="mys-btn" onclick="startTransition('/langkawi')">See More</button>
                                </div>
                            </div>

                            <!-- Item 3: sabah -->

                            <div class="mys-item" style="background-image: url('{{ asset('template-slider-malaysia/image/sabah.webp') }}');">
                                <div class="mys-content">
                                    <div class="mys-name">Sabah</div>
                                    <div class="mys-des">
                                        Terkenal dengan tapak menyelam bertaraf dunia di Sipadan dan budaya yang kaya.
                                    </div>
                                    <button class="mys-btn" onclick="startTransition('/sabah')">See More</button>
                                </div>
                            </div>

                            <!-- Item 4: langkawi -->
                            <div class="mys-item" style="background-image: url('{{ asset('template-slider-malaysia/image/langkawi.webp') }}');">
                                <div class="mys-content">
                                    <div class="mys-name">Langkawi</div>
                                    <div class="mys-des">
                                        Destinasi pelancongan utama dengan legenda Mahsuri dan keindahan alam semulajadi.
                                    </div>
                                    <button class="mys-btn" onclick="startTransition('/langkawi')">See More</button>
                                </div>
                            </div>

                            <!-- Item 5: Sabah -->
                            <div class="mys-item" style="background-image: url('{{ asset('template-slider-malaysia/image/sabah.webp') }}');">
                                <div class="mys-content">
                                    <div class="mys-name">Sabah</div>
                                    <div class="mys-des">
                                        Negeri di Bawah Bayu, rumah bagi Gunung Kinabalu dan hidupan liar yang unik.
                                    </div>
                                    <button class="mys-btn" onclick="startTransition('/booking-sabah')">See More</button>
                                </div>
                            </div>


                            <!-- Item 6: Langkawi -->
                            <div class="mys-item" style="background-image: url('{{ asset('template-slider-malaysia/image/langkawi.webp') }}');">
                                <div class="mys-content">
                                    <div class="mys-name">Langkawi</div>
                                    <div class="mys-des">
                                        Permata Kedah, terkenal dengan pantai pasir putih dan kereta kabel yang menakjubkan.
                                    </div>
                                    <button class="mys-btn" onclick="startTransition('/booking-langkawi')">See More</button>
                                </div>
                            </div>

                        </div>

                        <div class="mys-button">
                            <button class="mys-prev" aria-label="Previous destination">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 24px; height: 24px;">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                                </svg>
                            </button>
                            <button class="mys-next" aria-label="Next destination">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 24px; height: 24px;">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                                </svg>
                            </button>
                        </div>
                    </div>

                </div>

            </div>

            <!-- CENTER LOGO (Absolute - Global) -->
            <div
                class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-50 transition-all duration-700 pointer-events-none"
                :class="{ 'opacity-0 scale-50': expanded, 'opacity-100 scale-100': !expanded }">
                <div class="relative">
                    <div class="absolute inset-0 bg-gold-500 blur-3xl opacity-20 animate-pulse-slow rounded-full transform-gpu will-change-transform"></div>
                    <img src="{{ asset('images/logo-waveshart-removebg.webp') }}" width="256" height="128" loading="eager" decoding="async" class="h-32 w-auto drop-shadow-2xl relative z-10" alt="Center Logo">
                </div>
            </div>

        </div>

        <!-- ================= CONTENT WRAPPER (Hidden when expanded) ================= -->
        <div x-show="!expanded" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">

            <!-- ================= SERVICES ================= -->
            <section class="services" x-data="{ 
                servicePage: 0,
                totalCards: {{ count($landingServices) > 0 ? count($landingServices) : 4 }},
                isMobile: window.innerWidth < 768,
                touchStartX: 0,
                touchEndX: 0,
                minSwipeDistance: 50,
                
                get totalPages() {
                   return Math.ceil(this.totalCards / (this.isMobile ? 2 : 4));
                },
                updateLayout() {
                    const mobile = window.innerWidth < 768;
                    if (this.isMobile !== mobile) {
                         this.isMobile = mobile;
                         this.servicePage = 0;
                    }
                },
                isVisible(index) {
                    const perPage = this.isMobile ? 2 : 4;
                    return index >= this.servicePage * perPage && index < (this.servicePage + 1) * perPage;
                },
                touchStart(e) {
                    this.touchStartX = e.changedTouches ? e.changedTouches[0].screenX : e.screenX;
                },
                touchEnd(e) {
                    this.touchEndX = e.changedTouches ? e.changedTouches[0].screenX : e.screenX;
                    this.handleSwipe();
                },
                handleSwipe() {
                    const distance = this.touchStartX - this.touchEndX;
                    
                    if (Math.abs(distance) < this.minSwipeDistance) return;

                    if (distance > 0) {
                        // Swiped Left -> Next Page
                        if (this.servicePage < this.totalPages - 1) {
                            this.servicePage++;
                        }
                    } else {
                        // Swiped Right -> Prev Page
                        if (this.servicePage > 0) {
                            this.servicePage--;
                        }
                    }
                },
                nextPage() {
                    if (this.servicePage < this.totalPages - 1) {
                        this.servicePage++;
                    } else {
                        // Optional: Wrap around to start?
                        // this.servicePage = 0; 
                    }
                },
                prevPage() {
                    if (this.servicePage > 0) {
                        this.servicePage--;
                    } else {
                        // Optional: Wrap around to end?
                        // this.servicePage = this.totalPages - 1;
                    }
                }
            }"
                x-on:resize.window.debounce.100ms="updateLayout()"
                x-on:touchstart="touchStart($event)"
                x-on:touchend="touchEnd($event)"
                x-on:mousedown="touchStart($event)"
                x-on:mouseup="touchEnd($event)">
                <div class="services-viewport">
                    <!-- Both Mobile and Desktop use filtered grid (no transform) -->
                    <div class="services-grid">
                        @forelse($landingServices as $service)
                        <div class="service-card" x-show="isVisible({{ $loop->index }})" style="padding: 0; border: 1px solid rgba(255,255,255,0.1);">
                            <div style="flex: 1; width: 100%; position: relative; overflow: hidden;">
                                @if($service->image)
                                <img src="{{ asset($service->image) }}" alt="{{ $service->title }}" loading="lazy" decoding="async" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.5s ease; transform: translateZ(0);">
                                @endif
                            </div>
                            <div class="service-content">
                                <h3 class="service-title">{{ $service->title }}</h3>
                                <p class="service-desc">{{ $service->description }}</p>
                            </div>
                        </div>
                        @empty
                       
                        @endforelse
                    </div>
                </div>
                <!-- Pagination Dots Only -->
                <div class="flex items-center justify-center relative z-50">
                    <div class="service-dots">
                        <template x-for="i in totalPages" :key="i">
                            <div class="dot"
                                :class="{ 'active': servicePage === i - 1 }"
                                @click="servicePage = i - 1">
                            </div>
                        </template>
                    </div>
                </div>

            </section>

            <!-- ================= ABOUT ================= -->
            <section class="about" id="about" style="margin-top: -25px;">
                <div class="about-wrapper">

                    <div class="about-img">
                        <img src="images/laut-singapore2.webp" width="300" height="200" loading="lazy" alt="Singapore">
                        <div class="cross tr"></div>
                    </div>

                    <div class="about-content">
                        <div class="cross center-top"></div>
                        <h2>About Us</h2>
                        <p>
                            Welcome to WaveShark Ventures, your premier travel consultant covering Langkawi, Singapore and Sabah based in the heart of Langkawi, Kuah. With years of experience in the travel industry, our trustworthy service and commitment to excellence are made possible by the dedication of our incredible team members. As your dedicated travel consultants, we pride ourselves on delivering professional yet friendly service to every client. We are committed to ensuring that all our tour products is undergo quality control to make sure your island adventure is safe, smooth, and full of happy memories and memorable island experience!
                        </p>
                        <div class="about-buttons">
                            <button class="btn-gold">Booking Now</button>
                            <button class="btn-outline">Why Us?</button>
                        </div>
                    </div>

                    <div class="about-img">
                        <img src="images/laut-malay-new.webp" width="300" height="200" loading="lazy" alt="Malaysia">
                        <div class="cross bl"></div>
                    </div>

                </div>
            </section>


            <!-- ================= TESTIMONY SECTION ================= -->
            <!-- ================= TESTIMONY SECTION ================= -->
            <section class="testimony-section" x-data="{
                activeTestimonial: 0,
                testimonials: [
                    {
                        text: 'An absolutely phenomenal experience! The scenery was breathtaking and the service exceeded all my expectations. Highly recommended for any family vacation.',
                        author: 'Singapore',
                        role: 'TRAVELER'
                    },
                    {
                        text: 'Booking was incredibly easy, the prices were affordable, and our tour guide was exceptionally friendly. I will definitely be using WaveShark\'s services again for my future trips.',
                        author: 'Malaysia',
                        role: 'TRAVELER'
                    },
                    {
                        text: 'A truly unforgettable journey from start to finish. Every detail was perfectly arranged, allowing us to simply relax and enjoy the stunning island views seamlessly.',
                        author: 'Indonesia',
                        role: 'TRAVELER'
                    },
                    {
                        text: 'The most beautiful tropical escape I could have imagined. The pristine beaches and clear turquoise waters made it a perfect holiday. WaveShark made everything so effortless!',
                        author: 'Italy',
                        role: 'TRAVELER'
                    },
                    {
                        text: 'Fantastic customer care and an incredible itinerary. We saw the best hidden gems of the islands, and the knowledgeable local guides really brought the culture to life.',
                        author: 'US',
                        role: 'TRAVELER'
                    },
                    {
                        text: 'An expertly organized adventure that provided brilliant value for money. The accommodation, the transport, and the excursions were all absolutely first class.',
                        author: 'UK',
                        role: 'TRAVELER'
                    },
                    {
                        text: 'A wonderful and seamless travel experience that I will cherish forever.',
                        author: 'China',
                        role: 'TRAVELER'
                    },
                    {
                        text: 'Beautiful views, friendly staff, and the perfect island getaway.',
                        author: 'Korea',
                        role: 'TRAVELER'
                    }
                ],
                next() {
                    this.activeTestimonial = (this.activeTestimonial + 1) % this.testimonials.length;
                },
                prev() {
                    this.activeTestimonial = (this.activeTestimonial - 1 + this.testimonials.length) % this.testimonials.length;
                }
            }">
                <img src="{{ asset('images/sunset.webp') }}" class="testimony-bg absolute inset-0 w-full h-full object-cover" alt="Sunset Background" loading="lazy">
                <div class="testimony-overlay"></div>
                <div class="testimony-content">
                    <h2 class="testimony-title">Testimony</h2>
                    <p class="testimony-subtitle">Happy travelers and what's they are saying?</p>

                    <div class="quote-container relative max-w-4xl mx-auto">
                        <div class="text-center px-4 md:px-12">
                            <div class="relative h-48 md:h-32 flex items-center justify-center overflow-hidden">
                                <template x-for="(testimony, index) in testimonials" :key="index">
                                    <div x-show="activeTestimonial === index"
                                        x-transition:enter="transition ease-out duration-500"
                                        x-transition:enter-start="opacity-0 translate-x-10 scale-95"
                                        x-transition:enter-end="opacity-100 translate-x-0 scale-100"
                                        x-transition:leave="transition ease-in duration-300 transform absolute"
                                        x-transition:leave-start="opacity-100 translate-x-0 scale-100"
                                        x-transition:leave-end="opacity-0 -translate-x-10 scale-95"
                                        class="w-full">

                                        <span class="quote-icon left-quote inline-block relative -top-4">“</span>
                                        <p class="quote-text inline italic text-lg md:text-xl text-gray-200">
                                            <span x-text="testimony.text"></span>
                                        </p>
                                        <span class="quote-icon right-quote inline-block relative top-4">”</span>

                                        <div class="mt-6">
                                            <div class="testimony-author font-bold text-gold-400 text-xl" x-text="'- ' + testimony.author + ' -'"></div>
                                            <div class="text-sm text-gray-400 uppercase tracking-wider" x-text="testimony.role"></div>
                                        </div>
                                    </div>
                                </template>
                            </div>
                        </div>
                    </div>

                    <!-- Navigation Controls (Arrows + Dots) -->
                    <div class="flex items-center justify-center gap-6 mt-8">
                        <!-- Prev Button -->
                        <button @click="prev()" aria-label="Previous testimonial" class="text-white/50 hover:text-white transition-colors p-2 rounded-full hover:bg-white/10">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                            </svg>
                        </button>

                        <!-- Dots -->
                        <div class="flex gap-3">
                            <template x-for="(testimony, index) in testimonials" :key="index">
                                <button @click="activeTestimonial = index"
                                    aria-label="Go to testimonial"
                                    class="w-3 h-3 rounded-full transition-all duration-300"
                                    :class="activeTestimonial === index ? 'bg-gold-500 w-8' : 'bg-white/30 hover:bg-white/50'">
                                </button>
                            </template>
                        </div>

                        <!-- Next Button -->
                        <button @click="next()" aria-label="Next testimonial" class="text-white/50 hover:text-white transition-colors p-2 rounded-full hover:bg-white/10">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                            </svg>
                        </button>
                    </div>
                </div>
            </section>

            <!-- ================= FOOTER ================= -->
            <footer class="site-footer">
                <div class="footer-container">
                    <div class="footer-row">
                        <!-- Column 1: Brand -->
                        <div class="footer-col">
                            <h3 class="footer-logo">WaveShark</h3>
                            <p class="footer-desc">
                                Explore the world with premium experiences. We bring you the best destinations with unforgettable memories.
                            </p>
                            <div class="social-links">
                                <a href="https://www.facebook.com/share/1a4ofAgRwv/" class="social-link" target="_blank" aria-label="Facebook">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z" />
                                    </svg>
                                </a>
                                <a href="https://www.instagram.com/wavesharkventures?igsh=d21zYW10cXp2M3l4" class="social-link" target="_blank" aria-label="Instagram">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                                    </svg>
                                </a>
                                <a href="https://tiktok.com/@wavesharkventures" class="social-link" target="_blank" aria-label="TikTok">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 0 1-5.2 1.74 2.89 2.89 0 0 1 2.31-4.64 2.93 2.93 0 0 1 .88.13V9.4a6.84 6.84 0 0 0-1-.05A6.33 6.33 0 0 0 5 12.01a6.34 6.34 0 0 0 10.86 2.43 5.77 5.77 0 0 0 1.5-3.75V5.53A8.56 8.56 0 0 0 21.03 8.3v-4a4.48 4.48 0 0 1-1.44-1.61z" />
                                    </svg>
                                </a>
                            </div>
                        </div>

                        <!-- Column 2: Quick Links -->
                        <div class="footer-col">
                            <h4 class="footer-title">Quick Links</h4>
                            <ul class="footer-links">
                                <li><a href="#">Home</a></li>
                                <li><a href="#about">About Us</a></li>
                                <li><a href="{{ url('langkawi') }}">Langkawi</a></li>
                                <li><a href="{{ url('sabah') }}">Sabah</a></li>

                            </ul>
                        </div>

                        <!-- Column 3: Tours -->
                        <div class="footer-col">
                            <h4 class="footer-title">Top Tours</h4>
                            <ul class="footer-links">
                                <li><a href="#">Bali, Indonesia</a></li>
                                <li><a href="#">Singapore</a></li>
                                <li><a href="#">Sabah, Malaysia</a></li>
                                <li><a href="#">Marine Park</a></li>
                            </ul>
                        </div>

                        <!-- Column 4: Newsletter -->
                        <div class="footer-col">
                            <h4 class="footer-title">Newsletter</h4>
                            <p class="footer-desc">Subscribe to get the latest updates and offers.</p>
                            <form action="#" class="newsletter-form" onsubmit="event.preventDefault();">
                                <input type="email" placeholder="Enter your email" class="newsletter-input">
                                <button type="submit" class="newsletter-btn">Subscribe</button>
                            </form>
                            <div class="footer-contact mt-4" style="margin-top: 20px;">
                                <p>admin@wavesharktravel.com</p>
                                <p>+60 11-7187 1800</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer-bottom">
                    <div class="footer-bottom-content">
                        <p>&copy; 2026 WaveShark Ventures. All Rights Reserved.</p>
                        <div class="legal-links">
                            <a href="#">Privacy Policy</a>
                            <a href="#">Terms of Service</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <!-- ================= END CONTENT WRAPPER ================= -->

        @push("styles")
        @vite("resources/css/landing.css")
        @endpush

        <script>
            // Execute interactive logic only after the window has fully loaded to free up the main thread during initial paint.
            window.addEventListener('load', () => {

                const container = document.querySelector(".mys-container");
                const next = document.querySelector(".mys-next");
                const prev = document.querySelector(".mys-prev");
                const slide = document.querySelector(".mys-slide");

                if (!container || !next || !prev || !slide) return;

                function updateBackground() {
                    const items = document.querySelectorAll(".mys-item");
                    if (items.length > 1) {
                        const activeItem = items[1];
                        const backgroundImage = activeItem.style.backgroundImage;

                        container.style.backgroundImage = backgroundImage;
                        container.style.backgroundSize = "cover";
                        container.style.backgroundPosition = "center";
                    }
                }

                updateBackground();

                next.addEventListener("click", function() {
                    let items = document.querySelectorAll(".mys-item");
                    slide.appendChild(items[0]);
                    updateBackground();
                });

                prev.addEventListener("click", function() {
                    let items = document.querySelectorAll(".mys-item");
                    slide.prepend(items[items.length - 1]);
                    updateBackground();
                });

                // Singapore Slider Logic
                {
                    const sgContainer = document.querySelector(".sg-container");
                    const sgNext = document.querySelector(".sg-next");
                    const sgPrev = document.querySelector(".sg-prev");
                    const sgSlide = document.querySelector(".sg-slide");

                    if (sgContainer && sgNext && sgPrev && sgSlide) {
                        function sgUpdateBackground() {
                            const items = document.querySelectorAll(".sg-item");
                            if (items.length > 1) {
                                const activeItem = items[1];
                                const backgroundImage = activeItem.style.backgroundImage;

                                sgContainer.style.backgroundImage = backgroundImage;
                                sgContainer.style.backgroundSize = "cover";
                                sgContainer.style.backgroundPosition = "center";
                            }
                        }

                        sgUpdateBackground();

                        sgNext.addEventListener("click", function() {
                            let items = document.querySelectorAll(".sg-item");
                            sgSlide.appendChild(items[0]);
                            sgUpdateBackground();
                        });

                        sgPrev.addEventListener("click", function() {
                            let items = document.querySelectorAll(".sg-item");
                            sgSlide.prepend(items[items.length - 1]);
                            sgUpdateBackground();
                        });
                    }
                }
            }, {
                passive: true
            });
        </script>
</x-layout>