<x-layout
    title="Waveshark Ventures - Premier Langkawi Tours & Jetski Rentals"
    description="Experience the best of Langkawi with Waveshark Ventures. We offer premium jetski rentals, island hopping tours, sunset cruises, hotel bookings, and private charters."
    keywords="langkawi tours, jetski rental langkawi, island hopping, sunset cruise, langkawi holiday, water sports langkawi">
    <!-- Page Transition Overlay -->
    <div id="page-transition" class="fixed inset-0 z-[9999] pointer-events-none bg-black opacity-0 transition-opacity duration-500 ease-in-out flex items-center justify-center">
        <div class="relative">
            <div class="absolute inset-0 bg-gold-500 blur-2xl opacity-20 animate-pulse rounded-full"></div>
            <img src="{{ asset('images/logo-waveshart-removebg.png') }}" class="h-24 w-auto drop-shadow-2xl relative z-10" alt="Loading...">
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
                    image: '{{ asset('images/laut-malay-new.jpg') }}',
                    thumbnail: '{{ asset('images/laut-malay-new.jpg') }}'
                },
                {
                    name: 'Sabah',
                    description: 'Home to Mount Kinabalu and diverse wildlife. Explore the wild beauty of Borneo.',
                    image: '{{ asset('images/sabah.jpg') }}',
                    thumbnail: '{{ asset('images/sabah.jpg') }}'
                }
            ],
            mouseX: 0,
            mouseY: 0,
            handleMove(e) {
                if (this.expanded) return;
                this.mouseX = (e.clientX / window.innerWidth) - 0.5;
                this.mouseY = (e.clientY / window.innerHeight) - 0.5;
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
        @mousemove.window="handleMove"
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

                <!-- Background Image -->
                <div
                    class="absolute inset-0 bg-cover bg-center transition-transform duration-700 ease-out"
                    :style="`
                    background-image: url('{{ asset('images/laut-singapore2.jpg') }}');
                    transform: ${
                    !expanded && hovered === 'singapore'
                        ? 'scale(1.02)'
                        : 'scale(1.0) translate(' + (mouseX * -20) + 'px, ' + (mouseY * -20) + 'px)'
                    };
                `"></div>

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
                            <div class="sg-item" style="background-image: url('{{ asset('images/laut-singapore2.jpg') }}');">
                                <div class="sg-content">
                                    <div class="sg-name">ST John Island</div>
                                    <div class="sg-des">
                                        A tranquil getaway to experience nature and history.
                                    </div>
                                    <button class="sg-btn" onclick="startTransition('/stjohnislands')">See More</button>
                                </div>
                            </div>


                            <!-- Item 2: Singapore City (Using Sabah Image) -->
                            <div class="sg-item" style="background-image: url('{{ asset('images/laut-singapore2.jpg') }}');">
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
                            <button class="sg-prev">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 24px; height: 24px;">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                                </svg>
                            </button>
                            <button class="sg-next">
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

                <!-- Background Image (Dynamic) -->
                <div
                    class="absolute inset-0 bg-cover bg-center transition-all duration-1000 ease-out"
                    :style="`
                        background-image: url('${expanded === 'malaysia' ? malaysiaDestinations[activeDestination].image : '{{ asset('images/laut-malay-new.jpg') }}'}');
                        transform: ${
                            !expanded && hovered === 'malaysia'
                                ? 'scale(1.02)'
                                : 'scale(1.0) translate(' + (mouseX * -20) + 'px, ' + (mouseY * -20) + 'px)'
                        };
                    `">
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
                            <div class="mys-item" style="background-image: url('{{ asset('template-slider-malaysia/image/sabah.jpg') }}');">
                                <div class="mys-content">
                                    <div class="mys-name">Sabah</div>
                                    <div class="mys-des">
                                        Negeri di Bawah Bayu, rumah bagi Gunung Kinabalu dan hidupan liar yang unik.
                                    </div>
                                    <button class="mys-btn" onclick="startTransition('/sabah')">See More</button>
                                </div>
                            </div>


                            <!-- Item 2: Langkawi -->
                            <div class="mys-item" style="background-image: url('{{ asset('template-slider-malaysia/image/langkawi.jpg') }}');">
                                <div class="mys-content">
                                    <div class="mys-name">Langkawi</div>
                                    <div class="mys-des">
                                        Permata Kedah, terkenal dengan pantai pasir putih dan kereta kabel yang menakjubkan.
                                    </div>
                                    <button class="mys-btn" onclick="startTransition('/langkawi')">See More</button>
                                </div>
                            </div>

                            <!-- Item 3: sabah -->

                            <div class="mys-item" style="background-image: url('{{ asset('template-slider-malaysia/image/sabah.jpg') }}');">
                                <div class="mys-content">
                                    <div class="mys-name">Sabah</div>
                                    <div class="mys-des">
                                        Terkenal dengan tapak menyelam bertaraf dunia di Sipadan dan budaya yang kaya.
                                    </div>
                                    <button class="mys-btn" onclick="startTransition('/sabah')">See More</button>
                                </div>
                            </div>

                            <!-- Item 4: langkawi -->
                            <div class="mys-item" style="background-image: url('{{ asset('template-slider-malaysia/image/langkawi.jpg') }}');">
                                <div class="mys-content">
                                    <div class="mys-name">Langkawi</div>
                                    <div class="mys-des">
                                        Destinasi pelancongan utama dengan legenda Mahsuri dan keindahan alam semulajadi.
                                    </div>
                                    <button class="mys-btn" onclick="startTransition('/langkawi')">See More</button>
                                </div>
                            </div>

                            <!-- Item 5: Sabah -->
                            <div class="mys-item" style="background-image: url('{{ asset('template-slider-malaysia/image/sabah.jpg') }}');">
                                <div class="mys-content">
                                    <div class="mys-name">Sabah</div>
                                    <div class="mys-des">
                                        Negeri di Bawah Bayu, rumah bagi Gunung Kinabalu dan hidupan liar yang unik.
                                    </div>
                                    <button class="mys-btn" onclick="startTransition('/booking-sabah')">See More</button>
                                </div>
                            </div>


                            <!-- Item 6: Langkawi -->
                            <div class="mys-item" style="background-image: url('{{ asset('template-slider-malaysia/image/langkawi.jpg') }}');">
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
                            <button class="mys-prev">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width: 24px; height: 24px;">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                                </svg>
                            </button>
                            <button class="mys-next">
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
                    <div class="absolute inset-0 bg-gold-500 blur-3xl opacity-20 animate-pulse-slow rounded-full"></div>
                    <img src="{{ asset('images/logo-waveshart-removebg.png') }}" class="h-32 w-auto drop-shadow-2xl relative z-10" alt="Center Logo">
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
                                <img src="{{ asset($service->image) }}" alt="{{ $service->title }}" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.5s ease;">
                                @endif
                            </div>
                            <div class="service-content">
                                <h3 class="service-title">{{ $service->title }}</h3>
                                <p class="service-desc">{{ $service->description }}</p>
                            </div>
                        </div>
                        @empty
                        <!-- Fallback/Default Content if no dynamic services exist -->
                        <div class="service-card" x-show="isVisible(0)" style="padding: 0; border: 1px solid rgba(255,255,255,0.1);">
                            <div style="flex: 1; width: 100%; position: relative; overflow: hidden;">
                                <img src="{{ asset('images/car-rental.png') }}" alt="Tour Packages" style="width: 100%; height: 100%; object-fit: cover;">
                            </div>
                            <div class="service-content">
                                <h3 class="service-title">Tour Packages</h3>
                                <p class="service-desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            </div>
                        </div>
                        <div class="service-card" x-show="isVisible(1)" style="padding: 0; border: 1px solid rgba(255,255,255,0.1);">
                            <div style="flex: 1; width: 100%; position: relative; overflow: hidden;">
                                <img src="{{ asset('images/flight.png') }}" alt="Flight Booking" style="width: 100%; height: 100%; object-fit: cover;">
                            </div>
                            <div class="service-content">
                                <h3 class="service-title">Flight Booking</h3>
                                <p class="service-desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            </div>
                        </div>
                        <div class="service-card" x-show="isVisible(2)" style="padding: 0; border: 1px solid rgba(255,255,255,0.1);">
                            <div style="flex: 1; width: 100%; position: relative; overflow: hidden;">
                                <img src="{{ asset('images/hotel.png') }}" alt="Hotel Booking" style="width: 100%; height: 100%; object-fit: cover;">
                            </div>
                            <div class="service-content">
                                <h3 class="service-title">Hotel Booking</h3>
                                <p class="service-desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            </div>
                        </div>
                        <div class="service-card" x-show="isVisible(3)" style="padding: 0; border: 1px solid rgba(255,255,255,0.1);">
                            <div style="flex: 1; width: 100%; position: relative; overflow: hidden;">
                                <img src="{{ asset('images/destination.png') }}" alt="Destination Booking" style="width: 100%; height: 100%; object-fit: cover;">
                            </div>
                            <div class="service-content">
                                <h3 class="service-title">Destination Booking</h3>
                                <p class="service-desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            </div>
                        </div>
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
                        <img src="images/laut-singapore2.jpg">
                        <div class="cross tr"></div>
                    </div>

                    <div class="about-content">
                        <div class="cross center-top"></div>
                        <h2>About Us</h2>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt facere aut quibusdam beatae. Cum blanditiis odit nulla nisi, magni harum aliquam officia, aperiam odio sunt quas cupiditate in officiis molestias maiores repudiandae illo recusandae mollitia et a iste omnis. Laborum quis vitae unde sint possimus eaque accusantium, sunt magnam minus itaque explicabo a cumque asperiores, numquam, reprehenderit voluptatibus odit totam iure ipsa veritatis. Obcaecati odio tempore expedita fuga distinctio quas minus, ipsam rem numquam earum sequi alias adipisci culpa deserunt, excepturi, dolor sed corporis ut placeat iusto maxime! Amet veritatis omnis aut itaque voluptatibus nisi natus qui accusamus ex quae.
                        </p>
                        <div class="about-buttons">
                            <button class="btn-gold">SEKARANG</button>
                            <button class="btn-outline">KENAPA KAMI?</button>
                        </div>
                    </div>

                    <div class="about-img">
                        <img src="images/laut-malay-new.jpg">
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
                        text: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.',
                        author: 'Febrian',
                        role: 'Traveler'
                    },
                    {
                        text: 'Pengalaman yang sangat luar biasa! Pemandangan indah dan pelayanan sangat memuaskan. Sangat direkomendasikan untuk liburan keluarga.',
                        author: 'Sarah Johnson',
                        role: 'Tourist'
                    },
                    {
                        text: 'Booking mudah, harga terjangkau, dan tour guide yang sangat ramah. Pasti akan kembali lagi menggunakan layanan WaveShark.',
                        author: 'Michael Tan',
                        role: 'Backpacker'
                    }
                ],
                next() {
                    this.activeTestimonial = (this.activeTestimonial + 1) % this.testimonials.length;
                },
                prev() {
                    this.activeTestimonial = (this.activeTestimonial - 1 + this.testimonials.length) % this.testimonials.length;
                }
            }">
                <div class="testimony-bg" style="background-image: url('{{ asset('images/pangkalan-islands.jpg') }}');"></div>
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
                        <button @click="prev()" class="text-white/50 hover:text-white transition-colors p-2 rounded-full hover:bg-white/10">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                            </svg>
                        </button>

                        <!-- Dots -->
                        <div class="flex gap-3">
                            <template x-for="(testimony, index) in testimonials" :key="index">
                                <button @click="activeTestimonial = index"
                                    class="w-3 h-3 rounded-full transition-all duration-300"
                                    :class="activeTestimonial === index ? 'bg-gold-500 w-8' : 'bg-white/30 hover:bg-white/50'">
                                </button>
                            </template>
                        </div>

                        <!-- Next Button -->
                        <button @click="next()" class="text-white/50 hover:text-white transition-colors p-2 rounded-full hover:bg-white/10">
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
                                <a href="https://www.facebook.com/share/1a4ofAgRwv/" class="social-link" target="_blank">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z" />
                                    </svg>
                                </a>
                                <a href="https://www.instagram.com/wavesharkventures?igsh=d21zYW10cXp2M3l4" class="social-link" target="_blank">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                                    </svg>
                                </a>
                                <a href="https://tiktok.com/@wavesharkventures" class="social-link" target="_blank">
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
                                <p>info@waveshark.com</p>
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

        <style>
            /* Scoped Styles for Malaysia Slider (mys) */
            .mys-container {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                width: 100%;
                height: 100%;
                background: #000;
                transition: background-image 0.5s ease-in-out;
            }

            .mys-container::before {
                content: "";
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(0, 0, 0, 0.4);
                z-index: 0;
                pointer-events: none;
            }

            .mys-container .mys-slide .mys-item {
                width: 200px;
                height: 300px;
                position: absolute;
                top: 50%;
                transform: translate(0, -50%);
                border-radius: 20px;
                box-shadow: 0 30px 50px rgba(0, 0, 0, 0.5);
                background-position: 50% 50%;
                background-size: cover;
                display: inline-block;
                transition: 1s cubic-bezier(0.5, 0, 0.5, 1);
                z-index: 10;
            }

            .mys-slide .mys-item:nth-child(1),
            .mys-slide .mys-item:nth-child(2) {
                top: 0;
                left: 0;
                transform: translate(0, 0);
                border-radius: 0;
                width: 100%;
                height: 100%;
                z-index: 5;
            }

            .mys-slide .mys-item:nth-child(3) {
                left: 50%;
                z-index: 15;
            }

            .mys-slide .mys-item:nth-child(4) {
                left: calc(50% + 220px);
                z-index: 14;
            }

            .mys-slide .mys-item:nth-child(5) {
                left: calc(50% + 440px);
                z-index: 13;
            }

            .mys-slide .mys-item:nth-child(n + 6) {
                left: calc(50% + 660px);
                opacity: 0;
                z-index: 12;
            }

            .mys-item .mys-content {
                position: absolute;
                top: 50%;
                left: 100px;
                width: 400px;
                text-align: left;
                color: #eee;
                transform: translate(0, -50%);
                font-family: system-ui;
                display: none;
                z-index: 20;
            }

            .mys-slide .mys-item:nth-child(2) .mys-content {
                display: block;
            }

            .mys-content .mys-name {
                font-size: 60px;
                text-transform: uppercase;
                font-weight: bold;
                opacity: 0;
                animation: mys-animate 1s cubic-bezier(0.25, 0.46, 0.45, 0.94) 1 forwards;
                text-shadow: 0 5px 15px rgba(0, 0, 0, 0.5);
                font-family: 'Playfair Display', serif;
            }

            .mys-content .mys-des {
                margin-top: 10px;
                margin-bottom: 20px;
                font-size: 18px;
                opacity: 0;
                animation: mys-animate 1s cubic-bezier(0.25, 0.46, 0.45, 0.94) 0.3s 1 forwards;
                text-shadow: 0 2px 5px rgba(0, 0, 0, 0.5);
            }

            /* Buttons */
            .mys-content .mys-btn {
                padding: 12px 30px;
                border: none;
                cursor: pointer;
                opacity: 0;
                animation: mys-animate 1s cubic-bezier(0.25, 0.46, 0.45, 0.94) 0.6s 1 forwards;
                background: white;
                color: black;
                font-weight: bold;
                text-transform: uppercase;
                border-radius: 4px;
                transition: all 0.3s;
            }

            .mys-content .mys-btn:hover {
                background: #d4af37;
                color: white;
            }

            @keyframes mys-animate {
                from {
                    opacity: 0;
                    transform: scale(1.02);
                    filter: blur(5px);
                }

                to {
                    opacity: 1;
                    transform: scale(1);
                    filter: blur(0);
                }
            }

            .mys-button {
                width: 100%;
                text-align: center;
                position: absolute;
                bottom: 50px;
                z-index: 50;
            }

            .mys-button button {
                width: 50px;
                height: 50px;
                border-radius: 50%;
                border: 1px solid rgba(255, 255, 255, 0.3);
                cursor: pointer;
                margin: 0 10px;
                transition: 0.3s;
                background: rgba(0, 0, 0, 0.3);
                color: white;
                backdrop-filter: blur(5px);
                display: inline-flex;
                justify-content: center;
                align-items: center;
                font-size: 20px;
            }

            .mys-button button:hover {
                background: #d4af37;
                color: #fff;
                border-color: #d4af37;
            }

            /* REMOVED STYLES RESTORED BELOW FOR SINGAPORE SLIDER */
            /* Scoped Styles for Singapore Slider (sg) */
            .sg-container {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                width: 100%;
                height: 100%;
                background: #000;
                transition: background-image 0.5s ease-in-out;
            }

            .sg-container::before {
                content: "";
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(0, 0, 0, 0.4);
                z-index: 0;
                pointer-events: none;
            }

            .sg-container .sg-slide .sg-item {
                width: 200px;
                height: 300px;
                position: absolute;
                top: 50%;
                transform: translate(0, -50%);
                border-radius: 20px;
                box-shadow: 0 30px 50px rgba(0, 0, 0, 0.5);
                background-position: 50% 50%;
                background-size: cover;
                display: inline-block;
                transition: 1s cubic-bezier(0.5, 0, 0.5, 1);
                z-index: 10;
            }

            /* Ensure first item (active) takes full screen */
            .sg-slide .sg-item:nth-child(1) {
                top: 0;
                left: 0;
                transform: translate(0, 0);
                border-radius: 0;
                width: 100%;
                height: 100%;
                z-index: 5;
            }

            .sg-item .sg-content {
                position: absolute;
                top: 50%;
                left: 100px;
                width: 400px;
                text-align: left;
                color: #eee;
                transform: translate(0, -50%);
                font-family: system-ui;
                display: none;
                /* Overridden inline for single item */
                z-index: 20;
            }

            .sg-content .sg-name {
                font-size: 60px;
                text-transform: uppercase;
                font-weight: bold;
                opacity: 0;
                animation: sg-animate 1s cubic-bezier(0.25, 0.46, 0.45, 0.94) 1 forwards;
                text-shadow: 0 5px 15px rgba(0, 0, 0, 0.5);
                font-family: 'Playfair Display', serif;
            }

            .sg-content .sg-des {
                margin-top: 10px;
                margin-bottom: 20px;
                font-size: 18px;
                opacity: 0;
                animation: sg-animate 1s cubic-bezier(0.25, 0.46, 0.45, 0.94) 0.3s 1 forwards;
                text-shadow: 0 2px 5px rgba(0, 0, 0, 0.5);
            }

            .sg-content .sg-btn {
                padding: 12px 30px;
                border: none;
                cursor: pointer;
                opacity: 0;
                animation: sg-animate 1s cubic-bezier(0.25, 0.46, 0.45, 0.94) 0.6s 1 forwards;
                background: white;
                color: black;
                font-weight: bold;
                text-transform: uppercase;
                border-radius: 4px;
                transition: all 0.3s;
            }

            .sg-content .sg-btn:hover {
                background: #d4af37;
                color: white;
            }

            @keyframes sg-animate {
                from {
                    opacity: 0;
                    transform: scale(1.02);
                    filter: blur(5px);
                }

                to {
                    opacity: 1;
                    transform: scale(1);
                    filter: blur(0);
                }
            }

            /* MOBILE MEDIA QUERY FOR SINGAPORE */
            @media (max-width: 768px) {
                .sg-container .sg-slide .sg-item {
                    width: 160px;
                    height: 220px;
                    border-radius: 15px;
                    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.5);
                    opacity: 1;
                    /* Always visible for single item */
                }

                /* Active item (Only 1 for Singapore) */
                .sg-slide .sg-item:nth-child(1) {
                    top: 50%;
                    left: 50%;
                    transform: translate(-50%, -50%) scale(1.2);
                    opacity: 1;
                    z-index: 100;
                    width: 180px;
                    height: 250px;
                    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.6);
                }

                .sg-item .sg-content {
                    display: none;
                }

                /* Show content for active item */
                .sg-slide .sg-item:nth-child(1) .sg-content {
                    display: block;
                    position: absolute;
                    top: 100%;
                    left: 50%;
                    transform: translateX(-50%);
                    width: 300px;
                    text-align: center;
                    padding-top: 20px;
                }

                .sg-content .sg-name {
                    font-size: 32px;
                    color: #fff;
                }

                .sg-content .sg-des {
                    font-size: 14px;
                    color: #ddd;
                }

                .sg-content .sg-btn {
                    padding: 8px 16px;
                    font-size: 14px;
                }
            }

            @media (max-width: 768px) {
                .mys-container .mys-slide .mys-item {
                    width: 160px;
                    height: 220px;
                    border-radius: 15px;
                    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.5);
                    opacity: 0.5;
                }

                .mys-slide .mys-item:nth-child(1) {
                    top: 50%;
                    left: 0%;
                    transform: translate(-50%, -50%) scale(0.8);
                    opacity: 0;
                }

                .mys-slide .mys-item:nth-child(2) {
                    top: 50%;
                    left: 50%;
                    transform: translate(-50%, -50%) scale(1.2);
                    opacity: 1;
                    z-index: 100;
                    width: 180px;
                    height: 250px;
                    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.6);
                }

                .mys-slide .mys-item:nth-child(3) {
                    top: 50%;
                    left: 100%;
                    transform: translate(-50%, -50%) scale(0.8);
                    opacity: 0;
                }

                .mys-slide .mys-item:nth-child(n + 4) {
                    left: 200%;
                    opacity: 0;
                }

                .mys-item .mys-content {
                    display: none;
                }

                .mys-slide .mys-item:nth-child(2) .mys-content {
                    display: block;
                    position: absolute;
                    top: 100%;
                    left: 50%;
                    transform: translateX(-50%);
                    width: 300px;
                    text-align: center;
                    padding-top: 20px;
                }

                .mys-content .mys-name {
                    font-size: 32px;
                    color: #fff;
                }

                .mys-content .mys-des {
                    font-size: 14px;
                    color: #ddd;
                }

                .mys-content .mys-btn {
                    padding: 8px 16px;
                    font-size: 14px;
                }

                .mys-button {
                    width: 100%;
                    bottom: auto;
                    top: 50%;
                    transform: translateY(-50%);
                    justify-content: space-between;
                    padding: 0 10px;
                    display: flex;
                    pointer-events: none;
                }

                .mys-button button {
                    pointer-events: auto;
                    width: 40px;
                    height: 40px;
                    font-size: 16px;
                }
            }
        </style>
        <style>
            /* Scoped Styles for Singapore Slider (sg) */
            .sg-container {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                width: 100%;
                height: 100%;
                background: #000;
                transition: background-image 0.5s ease-in-out;
            }

            .sg-container::before {
                content: "";
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(0, 0, 0, 0.4);
                z-index: 0;
                pointer-events: none;
            }

            .sg-container .sg-slide .sg-item {
                width: 200px;
                height: 300px;
                position: absolute;
                top: 50%;
                transform: translate(0, -50%);
                border-radius: 20px;
                box-shadow: 0 30px 50px rgba(0, 0, 0, 0.5);
                background-position: 50% 50%;
                background-size: cover;
                display: inline-block;
                transition: 1s cubic-bezier(0.5, 0, 0.5, 1);
                z-index: 10;
            }

            .sg-slide .sg-item:nth-child(1),
            .sg-slide .sg-item:nth-child(2) {
                top: 0;
                left: 0;
                transform: translate(0, 0);
                border-radius: 0;
                width: 100%;
                height: 100%;
                z-index: 5;
            }

            .sg-slide .sg-item:nth-child(3) {
                left: 50%;
                z-index: 15;
            }

            .sg-slide .sg-item:nth-child(4) {
                left: calc(50% + 220px);
                z-index: 14;
            }

            .sg-slide .sg-item:nth-child(5) {
                left: calc(50% + 440px);
                z-index: 13;
            }

            .sg-slide .sg-item:nth-child(n + 6) {
                left: calc(50% + 660px);
                opacity: 0;
                z-index: 12;
            }

            .sg-item .sg-content {
                position: absolute;
                top: 50%;
                left: 100px;
                width: 400px;
                text-align: left;
                color: #eee;
                transform: translate(0, -50%);
                font-family: system-ui;
                display: none;
                z-index: 20;
            }

            .sg-slide .sg-item:nth-child(2) .sg-content {
                display: block;
            }

            .sg-content .sg-name {
                font-size: 60px;
                text-transform: uppercase;
                font-weight: bold;
                opacity: 0;
                animation: sg-animate 1s cubic-bezier(0.25, 0.46, 0.45, 0.94) 1 forwards;
                text-shadow: 0 5px 15px rgba(0, 0, 0, 0.5);
                font-family: 'Playfair Display', serif;
            }

            .sg-content .sg-des {
                margin-top: 10px;
                margin-bottom: 20px;
                font-size: 18px;
                opacity: 0;
                animation: sg-animate 1s cubic-bezier(0.25, 0.46, 0.45, 0.94) 0.3s 1 forwards;
                text-shadow: 0 2px 5px rgba(0, 0, 0, 0.5);
            }

            .sg-content .sg-btn {
                padding: 12px 30px;
                border: none;
                cursor: pointer;
                opacity: 0;
                animation: sg-animate 1s cubic-bezier(0.25, 0.46, 0.45, 0.94) 0.6s 1 forwards;
                background: white;
                color: black;
                font-weight: bold;
                text-transform: uppercase;
                border-radius: 4px;
                transition: all 0.3s;
            }

            .sg-content .sg-btn:hover {
                background: #d4af37;
                color: white;
            }

            @keyframes sg-animate {
                from {
                    opacity: 0;
                    transform: scale(1.02);
                    filter: blur(5px);
                }

                to {
                    opacity: 1;
                    transform: scale(1);
                    filter: blur(0);
                }
            }

            .sg-button {
                width: 100%;
                text-align: center;
                position: absolute;
                bottom: 50px;
                z-index: 50;
            }

            .sg-button button {
                width: 50px;
                height: 50px;
                border-radius: 50%;
                border: 1px solid rgba(255, 255, 255, 0.3);
                cursor: pointer;
                margin: 0 10px;
                transition: 0.3s;
                background: rgba(0, 0, 0, 0.3);
                color: white;
                backdrop-filter: blur(5px);
                display: inline-flex;
                justify-content: center;
                align-items: center;
                font-size: 20px;
            }

            .sg-button button:hover {
                background: #d4af37;
                color: #fff;
                border-color: #d4af37;
            }

            @media (max-width: 768px) {
                .sg-container .sg-slide .sg-item {
                    width: 160px;
                    height: 220px;
                    border-radius: 15px;
                    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.5);
                    opacity: 0.5;
                }

                .sg-slide .sg-item:nth-child(1) {
                    top: 50%;
                    left: 0%;
                    transform: translate(-50%, -50%) scale(0.8);
                    opacity: 0;
                }

                .sg-slide .sg-item:nth-child(2) {
                    top: 50%;
                    left: 50%;
                    transform: translate(-50%, -50%) scale(1.2);
                    opacity: 1;
                    z-index: 100;
                    width: 180px;
                    height: 250px;
                    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.6);
                }

                .sg-slide .sg-item:nth-child(3) {
                    top: 50%;
                    left: 100%;
                    transform: translate(-50%, -50%) scale(0.8);
                    opacity: 0;
                }

                .sg-slide .sg-item:nth-child(n + 4) {
                    left: 200%;
                    opacity: 0;
                }

                .sg-item .sg-content {
                    display: none;
                }

                .sg-slide .sg-item:nth-child(2) .sg-content {
                    display: block;
                    position: absolute;
                    top: 100%;
                    left: 50%;
                    transform: translateX(-50%);
                    width: 300px;
                    text-align: center;
                    padding-top: 20px;
                }

                .sg-content .sg-name {
                    font-size: 32px;
                    color: #fff;
                }

                .sg-content .sg-des {
                    font-size: 14px;
                    color: #ddd;
                }

                .sg-content .sg-btn {
                    padding: 8px 16px;
                    font-size: 14px;
                }

                .sg-button {
                    width: 100%;
                    bottom: auto;
                    top: 50%;
                    transform: translateY(-50%);
                    justify-content: space-between;
                    padding: 0 10px;
                    display: flex;
                    pointer-events: none;
                }

                .sg-button button {
                    pointer-events: auto;
                    width: 40px;
                    height: 40px;
                    font-size: 16px;
                }
            }
        </style>

        <style>
            :root {
                --gold: #d4af37;
                --dark: #000;
                --gray: #9ca3af;
            }

            /* ================= SERVICES ================= */
            /* ================= SERVICES DESKTOP ================= */
            .services {
                padding: 100px 40px;
                overflow: hidden;
            }

            .services-viewport {
                overflow: visible;
                width: 100%;
                max-width: 1200px;
                margin: 0 auto;
            }

            .services-grid {
                display: grid;
                grid-template-columns: repeat(4, 1fr);
                gap: 25px;
                justify-content: center;
                width: 100%;
                /* No transform on desktop, we filter items instead */
                transform: none !important;
            }

            .service-card {
                border: 1px solid rgba(255, 255, 255, 0.1);
                height: 420px;
                text-align: center;
                transition: .3s;
                display: flex;
                flex-direction: column;
                overflow: hidden;
                background: #000;
            }

            .service-dots {
                display: flex;
                justify-content: center;
                gap: 10px;
                margin-top: 40px;
            }

            .dot {
                width: 10px;
                height: 10px;
                border-radius: 50%;
                background-color: rgba(255, 255, 255, 0.3);
                cursor: pointer;
                transition: background-color 0.3s;
            }

            .dot.active {
                background-color: var(--gold);
            }

            .service-card:hover {
                border-color: var(--gold);
                transform: translateY(-5px);
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
            }

            .service-content {
                background: #000;
                padding: 1.5rem;
                text-align: center;
                border-top: 1px solid rgba(255, 255, 255, 0.1);
                width: 100%;
            }

            .service-title {
                color: white;
                margin-bottom: 0.5rem;
                font-size: 1.25rem;
                font-weight: bold;
                text-transform: uppercase;
                letter-spacing: 1px;
            }

            .service-desc {
                color: #9ca3af;
                font-size: 0.875rem;
                margin: 0 auto;
                line-height: 1.5;
            }

            /* ================= ABOUT ================= */
            .about {
                padding: 100px 40px;
                /* Standardized */
                position: relative;
            }

            .about-wrapper {
                max-width: 1200px;
                margin: auto;
                display: flex;
                align-items: center;
                justify-content: center;
                gap: 80px;
                position: relative;
            }

            .about-img {
                width: 300px;
                height: 400px;
                position: relative;
            }

            .about-img img {
                width: 100%;
                height: 100%;
                object-fit: cover;
                filter: brightness(75%);
            }

            .about-content {
                max-width: 420px;
                text-align: center;
                position: relative;
            }

            .about-content h2 {
                color: var(--gold);
                font-size: 36px;
                margin-bottom: 25px;
            }

            .about-content p {
                font-size: 12px;
                color: var(--gray);
                line-height: 1.8;
                text-align: justify;
                margin-bottom: 35px;
            }

            .about-buttons {
                display: flex;
                justify-content: center;
                gap: 20px;
            }

            .btn-gold {
                background: var(--gold);
                color: black;
                padding: 12px 32px;
                font-size: 11px;
                font-weight: bold;
                letter-spacing: 2px;
                border: none;
                cursor: pointer;
            }

            .btn-outline {
                background: transparent;
                border: 1px solid var(--gold);
                color: var(--gold);
                padding: 12px 32px;
                font-size: 11px;
                font-weight: bold;
                letter-spacing: 2px;
                cursor: pointer;
            }

            /* ================= CROSS DECOR ================= */
            .cross {
                width: 22px;
                height: 22px;
                position: absolute;
            }

            .cross::before,
            .cross::after {
                content: "";
                position: absolute;
                background: var(--gold);
            }

            .cross::before {
                width: 100%;
                height: 1px;
                top: 50%;
                left: 0;
            }

            .cross::after {
                height: 100%;
                width: 1px;
                left: 50%;
                top: 0;
            }

            .tl {
                top: -12px;
                left: -12px;
            }

            .tr {
                top: -12px;
                right: -12px;
            }

            .bl {
                bottom: -12px;
                left: -12px;
            }

            .br {
                bottom: -12px;
                right: -12px;
            }

            .center-top {
                top: -18px;
                left: 50%;
                transform: translateX(-50%);
            }

            /* ================= SERVICES MOBILE SLIDER ================= */

            @media (max-width: 768px) {
                .services {
                    padding: 60px 0;
                    /* Standardized Mobile */
                    overflow: hidden;
                    position: relative;
                }

                .services-viewport {
                    overflow: hidden;
                    width: 100%;
                    padding-bottom: 30px;
                    /* Space for dots */
                }

                .services-grid {
                    display: grid;
                    grid-template-columns: repeat(2, 1fr);
                    gap: 15px;
                    /* Gap between cards */
                    margin: 0;
                    width: 100%;
                    transform: none !important;
                    /* Disable slider transform */
                    padding: 0 10px;
                    box-sizing: border-box;
                    justify-content: center;
                }

                .service-card {
                    height: 280px;
                    /* Mobile height */
                    flex-shrink: 0;
                    padding: 0;
                    /* Override with 0 */
                    border: 1px solid rgba(255, 255, 255, 0.1);
                    width: auto !important;
                    /* Override min-width */
                }

                /* Resize text for mobile cards */
                .service-title {
                    font-size: 14px !important;
                    margin-bottom: 5px !important;
                }

                .service-desc {
                    font-size: 10px !important;
                    line-height: 1.3 !important;
                    display: -webkit-box;
                    -webkit-line-clamp: 2;
                    -webkit-box-orient: vertical;
                    overflow: hidden;
                }

                .service-content {
                    padding: 1rem !important;
                }

                .services-grid::-webkit-scrollbar {
                    display: none;
                }

                /* PAGINATION DOTS */
                .service-dots {
                    display: flex;
                    justify-content: center;
                    gap: 10px;
                    margin-top: 5px;
                    width: auto;
                }
            }

            /* ================= ABOUT MOBILE ================= */
            @media (max-width: 768px) {

                .about-wrapper {
                    flex-direction: column;
                    gap: 40px;
                }

                /* sembunyikan SEMUA gambar dulu */
                .about-img {
                    display: none;
                }

                /* tampilkan HANYA 1 gambar (yang pertama) */
                .about-img:first-child {
                    display: block;
                    width: 100%;
                    height: 260px;
                }

                .about-img:first-child img {
                    width: 100%;
                    height: 100%;
                    object-fit: cover;
                }

                /* rapihin konten */
                .about-content {
                    max-width: 100%;
                    padding: 0 10px;
                }

                .about-content p {
                    text-align: left;
                }

                /* hilangkan dekor cross biar clean */
                .cross {
                    display: none;
                }
            }

            /* ================= TOUR PACKAGE SLIDER ================= */
            .tour-package {
                padding: 100px 40px;
                /* Standardized */
                text-align: center;
                max-width: 1400px;
                /* Wider for slider */
                margin: auto;
                position: relative;
            }

            .tour-slider-container {
                position: relative;
                padding: 0 40px;
                /* Space for arrows */
            }

            .tour-track-wrapper {
                overflow: hidden;
                width: 100%;
            }

            .tour-track {
                display: flex;
                transition: transform 0.5s ease-in-out;
            }

            .tour-slide-item {
                flex-shrink: 0;
                padding: 0 10px;
                /* Gap between cards */
                box-sizing: border-box;
            }

            .tour-card {
                position: relative;
                aspect-ratio: 3/4;
                background-size: cover;
                background-position: center;
                overflow: hidden;
                cursor: pointer;
                border-radius: 4px;
                /* Optional slight roundness */
            }

            /* Reuse existing styles */
            .section-title {
                color: var(--gold);
                font-size: 32px;
                margin-bottom: 50px;
                text-transform: capitalize;
            }

            .tour-overlay {
                position: absolute;
                bottom: 0;
                left: 0;
                width: 100%;
                height: 60px;
                background: linear-gradient(to top, rgba(0, 0, 0, 0.9), transparent);
                display: flex;
                align-items: center;
                justify-content: center;
                transition: 0.3s;
            }

            .tour-info h3 {
                color: #ccc;
                font-size: 14px;
                font-weight: normal;
            }

            .tour-border {
                position: absolute;
                top: 10px;
                left: 10px;
                right: 10px;
                bottom: 10px;
                border: 1px solid rgba(212, 175, 55, 0.5);
                pointer-events: none;
                transition: 0.3s;
            }

            .tour-card:hover .tour-border {
                border-color: var(--gold);
            }

            /* Navigation Arrows */
            .nav-arrow {
                position: absolute;
                top: 50%;
                transform: translateY(-50%);
                background: rgba(0, 0, 0, 0.5);
                border: 1px solid var(--gold);
                color: var(--gold);
                width: 40px;
                height: 40px;
                border-radius: 50%;
                cursor: pointer;
                z-index: 10;
                display: flex;
                align-items: center;
                justify-content: center;
                transition: 0.3s;
            }

            .nav-arrow:hover {
                background: var(--gold);
                color: black;
            }

            .left-arrow {
                left: 0;
            }

            .right-arrow {
                right: 0;
            }

            .tour-dots {
                display: flex;
                justify-content: center;
                gap: 10px;
            }

            .dot {
                width: 10px;
                height: 10px;
                background-color: #333;
                border-radius: 50%;
                display: inline-block;
                cursor: pointer;
                transition: 0.3s;
            }

            .dot.active {
                background-color: var(--gold);
            }

            /* Hide mobile grid tweaks since we use slider now */
            @media (max-width: 768px) {
                .tour-slider-container {
                    padding: 0;
                }

                .tour-card {
                    /* Big-big images on mobile (taller) */
                    aspect-ratio: 2/3;
                }

                .tour-package {
                    padding: 60px 10px;
                    /* Standardized Mobile */
                }
            }

            /* ================= CTA SECTION ================= */
            .cta-section {
                padding: 100px 40px;
                /* Standardized */
                max-width: 1200px;
                margin: auto;
            }

            .cta-banner {
                width: 100%;
                height: 300px;
                background-size: cover;
                background-position: center;
            }

            /* ================= TOUR & CTA MOBILE ================= */
            @media (max-width: 768px) {
                .cta-banner {
                    height: 150px;
                }
            }

            .mt-custom {
                margin-top: 35px;
            }

            .mt-custom {
                margin-top: 35px;
            }

            /* ================= TESTIMONY SECTION ================= */
            .testimony-section {
                position: relative;
                width: 100%;
                min-height: 500px;
                display: flex;
                align-items: center;
                justify-content: center;
                text-align: center;
                color: #fff;
                overflow: hidden;
            }

            .testimony-bg {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background-size: cover;
                background-position: center;
                z-index: 1;
            }

            .testimony-overlay {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(0, 0, 0, 0.85);
                /* Dark overlay */
                z-index: 2;
            }

            .testimony-content {
                position: relative;
                z-index: 3;
                max-width: 800px;
                padding: 40px;
            }

            .testimony-title {
                color: var(--gold);
                /* Use the gold variable */
                font-size: 40px;
                /* Increased from 32px */
                margin-bottom: 20px;
            }

            .testimony-subtitle {
                color: #ccc;
                font-size: 20px;
                /* Increased from 16px */
                margin-bottom: 50px;
            }

            .quote-container {
                position: relative;
                display: inline-block;
                padding: 0 40px;
            }

            .quote-text {
                font-size: 24px;
                /* Increased from 18px */
                line-height: 1.6;
                font-style: italic;
                color: #ddd;
            }

            .quote-icon {
                color: var(--gold);
                font-size: 60px;
                font-family: serif;
                /* Better looking quotes */
                line-height: 0;
                position: absolute;
            }

            .left-quote {
                top: 10px;
                left: 0;
            }

            .right-quote {
                bottom: -10px;
                right: 0;
            }

            .testimony-author {
                margin-top: 30px;
                font-size: 20px;
                /* Increased from 16px */
                color: var(--gold);
            }

            @media (max-width: 768px) {
                .testimony-section {
                    min-height: 400px;
                }

                .testimony-title {
                    font-size: 32px;
                    /* Increased from 28px */
                }

                .quote-text {
                    font-size: 20px;
                    /* Increased from 16px */
                }

                .quote-container {
                    padding: 0 20px;
                }

                .quote-icon {
                    font-size: 40px;
                }

                .testimony-subtitle {
                    font-size: 16px;
                }
            }

            /* ================= FOOTER ================= */
            .site-footer {
                background-color: #050505;
                color: #ccc;
                padding: 80px 0 0;
                font-family: 'Arial', sans-serif;
            }

            .footer-container {
                max-width: 1200px;
                margin: auto;
                padding: 0 40px;
            }

            .footer-row {
                display: flex;
                flex-wrap: wrap;
                justify-content: space-between;
                gap: 40px;
            }

            .footer-col {
                flex: 1;
                min-width: 250px;
                margin-bottom: 40px;
            }

            .footer-logo {
                color: var(--gold);
                font-size: 28px;
                margin-bottom: 20px;
                font-weight: bold;
                text-transform: uppercase;
                letter-spacing: 2px;
            }

            .footer-desc {
                line-height: 1.6;
                margin-bottom: 20px;
                font-size: 14px;
            }

            .footer-title {
                color: #fff;
                font-size: 18px;
                margin-bottom: 25px;
                position: relative;
                padding-bottom: 10px;
            }

            .footer-title::after {
                content: '';
                position: absolute;
                left: 0;
                bottom: 0;
                width: 50px;
                height: 2px;
                background-color: var(--gold);
            }

            .footer-links {
                list-style: none;
                padding: 0;
            }

            .footer-links li {
                margin-bottom: 12px;
            }

            .footer-links a {
                color: #bbb;
                text-decoration: none;
                transition: 0.3s;
                display: inline-block;
            }

            .footer-links a:hover {
                color: var(--gold);
                transform: translateX(5px);
            }

            .footer-contact {
                list-style: none;
                padding: 0;
            }

            .footer-contact li {
                margin-bottom: 15px;
                display: flex;
                align-items: center;
                gap: 10px;
            }

            .social-links {
                display: flex;
                gap: 15px;
            }

            .social-link {
                width: 40px;
                height: 40px;
                background: rgba(255, 255, 255, 0.1);
                display: flex;
                align-items: center;
                justify-content: center;
                color: #fff;
                border-radius: 50%;
                text-decoration: none;
                transition: 0.3s;
                font-size: 14px;
                border: 1px solid transparent;
            }

            .social-link:hover {
                background: var(--gold);
                color: #000;
                border-color: var(--gold);
            }

            .footer-bottom {
                background: #000;
                text-align: center;
                padding: 25px 0;
                margin-top: 40px;
                border-top: 1px solid rgba(255, 255, 255, 0.1);
                font-size: 14px;
            }

            @media (max-width: 768px) {
                .footer-row {
                    flex-direction: column;
                    gap: 20px;
                }

                .footer-col {
                    margin-bottom: 20px;
                }

                .footer-bottom-content {
                    flex-direction: column;
                    gap: 10px;
                }
            }

            /* Newsletter */
            .newsletter-form {
                display: flex;
                flex-direction: column;
                gap: 10px;
            }

            .newsletter-input {
                padding: 10px;
                border-radius: 4px;
                border: 1px solid #333;
                background: #111;
                color: #fff;
            }

            .newsletter-btn {
                padding: 10px;
                background: var(--gold);
                color: #000;
                border: none;
                border-radius: 4px;
                font-weight: bold;
                cursor: pointer;
                transition: 0.3s;
            }

            .newsletter-btn:hover {
                background: #fff;
            }

            .footer-bottom-content {
                max-width: 1200px;
                margin: auto;
                padding: 0 40px;
                display: flex;
                justify-content: space-between;
                align-items: center;
                flex-wrap: wrap;
            }

            .legal-links a {
                color: #777;
                text-decoration: none;
                margin-left: 20px;
                font-size: 12px;
                transition: 0.3s;
            }

            .legal-links a:hover {
                color: var(--gold);
            }
        </style>

        <script>
            document.addEventListener('DOMContentLoaded', () => {
                // ... (Existing slider code) ...



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
            });
        </script>
</x-layout>