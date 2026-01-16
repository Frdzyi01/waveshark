<x-layout>
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
                    image: '{{ asset('images/laut-malay.jpg') }}',
                    thumbnail: '{{ asset('images/laut-malay.jpg') }}'
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

                    <!-- NEW SINGAPORE SLIDER IMPLEMENTATION -->
                    <div class="sg-container">
                        <div class="sg-slide">
                            <!-- Item 1: ST John Island -->
                            <div class="sg-item" style="background-image: url('{{ asset('images/laut-singapore2.jpg') }}');">
                                <div class="sg-content" style="display: block;">
                                    <div class="sg-name">ST John Island</div>
                                    <div class="sg-des">
                                        A tranquil getaway to experience nature and history.
                                    </div>
                                    <button class="sg-btn" onclick="startTransition('/booking-stjohnislands')">See More</button>
                                </div>
                            </div>
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
                        background-image: url('${expanded === 'malaysia' ? malaysiaDestinations[activeDestination].image : '{{ asset('images/laut-malay.jpg') }}'}');
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

                            <!-- Item 1: Langkawi -->
                            <div class="mys-item" style="background-image: url('{{ asset('template-slider-malaysia/image/langkawi.jpg') }}');">
                                <div class="mys-content">
                                    <div class="mys-name">Langkawi</div>
                                    <div class="mys-des">
                                        Permata Kedah, terkenal dengan pantai pasir putih dan kereta kabel yang menakjubkan.
                                    </div>
                                    <button class="mys-btn" onclick="startTransition('/booking-langkawi')">See More</button>
                                </div>
                            </div>

                            <!-- Item 2: Sabah -->
                            <div class="mys-item" style="background-image: url('{{ asset('template-slider-malaysia/image/sabah.jpg') }}');">
                                <div class="mys-content">
                                    <div class="mys-name">Sabah</div>
                                    <div class="mys-des">
                                        Negeri di Bawah Bayu, rumah bagi Gunung Kinabalu dan hidupan liar yang unik.
                                    </div>
                                    <button class="mys-btn" onclick="startTransition('/booking-sabah')">See More</button>
                                </div>
                            </div>

                            <!-- Item 3: Langkawi -->
                            <div class="mys-item" style="background-image: url('{{ asset('template-slider-malaysia/image/langkawi.jpg') }}');">
                                <div class="mys-content">
                                    <div class="mys-name">Langkawi</div>
                                    <div class="mys-des">
                                        Destinasi pelancongan utama dengan legenda Mahsuri dan keindahan alam semulajadi.
                                    </div>
                                    <button class="mys-btn" onclick="startTransition('/booking-langkawi')">See More</button>
                                </div>
                            </div>

                            <!-- Item 4: Sabah -->
                            <div class="mys-item" style="background-image: url('{{ asset('template-slider-malaysia/image/sabah.jpg') }}');">
                                <div class="mys-content">
                                    <div class="mys-name">Sabah</div>
                                    <div class="mys-des">
                                        Terkenal dengan tapak menyelam bertaraf dunia di Sipadan dan budaya yang kaya.
                                    </div>
                                    <button class="mys-btn" onclick="startTransition('/booking-sabah')">See More</button>
                                </div>
                            </div>

                            <!-- Item 5: Langkawi -->
                            <div class="mys-item" style="background-image: url('{{ asset('template-slider-malaysia/image/langkawi.jpg') }}');">
                                <div class="mys-content">
                                    <div class="mys-name">Langkawi</div>
                                    <div class="mys-des">
                                        Permata Kedah, terkenal dengan pantai pasir putih dan kereta kabel yang menakjubkan.
                                    </div>
                                    <button class="mys-btn" onclick="startTransition('/booking-langkawi')">See More</button>
                                </div>
                            </div>

                            <!-- Item 6: Sabah -->
                            <div class="mys-item" style="background-image: url('{{ asset('template-slider-malaysia/image/sabah.jpg') }}');">
                                <div class="mys-content">
                                    <div class="mys-name">Sabah</div>
                                    <div class="mys-des">
                                        Negeri di Bawah Bayu, rumah bagi Gunung Kinabalu dan hidupan liar yang unik.
                                    </div>
                                    <button class="mys-btn" onclick="startTransition('/booking-sabah')">See More</button>
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
            <section class="services reveal" x-data="{ servicePage: 0 }">
                <div class="services-viewport">
                    <div class="services-grid" :class="{'slide-2': servicePage === 1}">
                        <div class="service-card">
                            <h1>01</h1>
                            <h3>Tour Packages</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        </div>
                        <div class="service-card">
                            <h1>02</h1>
                            <h3>Flight Booking</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        </div>
                        <div class="service-card">
                            <h1>03</h1>
                            <h3>Hotel Booking</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        </div>
                        <div class="service-card">
                            <h1>04</h1>
                            <h3>Destination Booking</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        </div>
                    </div>
                </div>

                <!-- Mobile Pagination Dots -->
                <div class="service-dots">
                    <div class="dot" :class="{'active': servicePage === 0}" @click="servicePage = 0"></div>
                    <div class="dot" :class="{'active': servicePage === 1}" @click="servicePage = 1"></div>
                </div>
            </section>

            <!-- ================= ABOUT ================= -->
            <section class="about reveal">
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
                        <img src="images/laut-malay.jpg">
                        <div class="cross bl"></div>
                    </div>

                </div>
            </section>

            <!-- ================= TOUR PACKAGE SLIDER ================= -->
            <section class="tour-package reveal" x-data="{
                activeTourSlide: 0,
                tourItems: [
                    { img: '{{ asset('images/pangkalan-islands.jpg') }}', title: 'Pangkalan Islands' },
                    { img: '{{ asset('images/laut-singapore.jpg') }}', title: 'Singapore Coast' },
                    { img: '{{ asset('images/sabah.jpg') }}', title: 'Sabah Nature' },
                    { img: '{{ asset('images/laut-malay.jpg') }}', title: 'Malay Coast' },
                    { img: '{{ asset('images/singapore.jpg') }}', title: 'Gardens by the Bay' },
                    { img: '{{ asset('images/laut-singapore2.jpg') }}', title: 'Sentosa Island' },
                    { img: '{{ asset('images/pangkalan-islands.jpg') }}', title: 'Hidden Gems' },
                    { img: '{{ asset('images/sabah.jpg') }}', title: 'Borneo Wild' }
                ],
                get visibleTourSlides() {
                    if (window.innerWidth >= 1024) return 4;
                    return 2;
                },
                get maxTourSlide() {
                    return this.tourItems.length - this.visibleTourSlides;
                },
                nextTour() {
                    if (this.activeTourSlide < this.maxTourSlide) {
                        this.activeTourSlide++;
                    } else {
                        this.activeTourSlide = 0;
                    }
                },
                prevTour() {
                    if (this.activeTourSlide > 0) {
                        this.activeTourSlide--;
                    } else {
                        this.activeTourSlide = this.maxTourSlide;
                    }
                }
            }" @resize.window="activeTourSlide = 0">

                <h2 class="section-title">Tour Package</h2>

                <div class="tour-slider-container">
                    <!-- Wrapper -->
                    <div class="tour-track-wrapper">
                        <div class="tour-track" :style="`transform: translateX(-${activeTourSlide * (100 / visibleTourSlides)}%)`">
                            <template x-for="(item, index) in tourItems" :key="index">
                                <div class="tour-slide-item" :style="`width: ${100 / visibleTourSlides}%`">
                                    <div class="tour-card" :style="`background-image: url('${item.img}')`">
                                        <div class="tour-overlay">
                                            <div class="tour-info">
                                                <h3 x-text="item.title"></h3>
                                            </div>
                                        </div>
                                        <div class="tour-border"></div>
                                    </div>
                                </div>
                            </template>
                        </div>
                    </div>

                </div>

                <!-- Dots (Optional visualization of progress) -->
                <div class="tour-dots mt-custom">
                    <template x-for="i in Math.ceil(tourItems.length / visibleTourSlides)">
                        <span class="dot"
                            :class="{ 'active': Math.floor(activeTourSlide / visibleTourSlides) === i - 1 }"
                            @click="activeTourSlide = (i - 1) * visibleTourSlides">
                        </span>
                    </template>
                </div>

            </section>

            <!-- ================= TESTIMONY SECTION ================= -->
            <section class="testimony-section">
                <div class="testimony-bg" style="background-image: url('{{ asset('images/pangkalan-islands.jpg') }}');"></div>
                <div class="testimony-overlay"></div>
                <div class="testimony-content">
                    <h2 class="testimony-title">Testimony</h2>
                    <p class="testimony-subtitle">Happy travelers and what's they are saying?</p>

                    <div class="quote-container">
                        <span class="quote-icon left-quote">“</span>
                        <p class="quote-text">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
                        </p>
                        <span class="quote-icon right-quote">”</span>
                    </div>

                    <div class="testimony-author">- Febrian -</div>
                </div>
            </section>

            <!-- ================= FOOTER ================= -->
            <footer class="site-footer reveal">
                <div class="footer-container">
                    <div class="footer-row">
                        <!-- Column 1: Brand -->
                        <div class="footer-col">
                            <h3 class="footer-logo">WaveShark</h3>
                            <p class="footer-desc">
                                Explore the world with premium experiences. We bring you the best destinations with unforgettable memories.
                            </p>
                            <div class="social-links">
                                <a href="#" class="social-link">FB</a>
                                <a href="#" class="social-link">IG</a>
                                <a href="#" class="social-link">TW</a>
                            </div>
                        </div>

                        <!-- Column 2: Quick Links -->
                        <div class="footer-col">
                            <h4 class="footer-title">Quick Links</h4>
                            <ul class="footer-links">
                                <li><a href="#">Home</a></li>
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Services</a></li>
                                <li><a href="#">Testimonials</a></li>
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
                                <p>+62 812 3456 7890</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer-bottom">
                    <div class="footer-bottom-content">
                        <p>&copy; 2024 WaveShark Ventures. All Rights Reserved.</p>
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
            .services {
                padding: 100px 40px;
            }

            .services-grid {
                max-width: 1000px;
                /* Reduced to center content more */
                margin: 0 auto;
                display: grid;
                grid-template-columns: repeat(4, 1fr);
                gap: 30px;
                justify-content: center;
            }

            .service-card {
                border: 1px solid rgba(255, 255, 255, 0.2);
                aspect-ratio: 1/1;
                text-align: center;
                padding: 40px 30px;
                transition: .3s;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
            }

            .service-card:hover {
                border-color: var(--gold);
            }

            .service-card h1 {
                font-size: 84px;
                color: var(--gold);
                margin-bottom: 20px;
            }

            .service-card h3 {
                color: var(--gold);
                text-transform: uppercase;
                letter-spacing: 2px;
                margin-bottom: 15px;
            }

            .service-card p {
                font-size: 12px;
                color: var(--gray);
                max-width: 200px;
                line-height: 1.6;
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
            .service-dots {
                display: none;
            }

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
                    display: flex;
                    gap: 15px;
                    /* Gap between cards */
                    margin: 0;
                    width: 100%;
                    transition: transform 0.5s ease-in-out;
                    padding: 0 7.5px;
                    /* Half of gap to ensure perfect paging */
                    justify-content: flex-start;
                    box-sizing: border-box;
                }

                .services-grid.slide-2 {
                    transform: translateX(-100%);
                }

                .service-card {
                    min-width: calc(50% - 7.5px);
                    /* (100% - 15px gap) / 2 */
                    aspect-ratio: 1 / 1;
                    flex-shrink: 0;
                    padding: 15px;
                    border: 1px solid rgba(255, 255, 255, 0.1);
                }

                /* Resize text for mobile cards */
                .service-card h1 {
                    font-size: 42px;
                    /* Smaller for mobile */
                    margin-bottom: 10px;
                }

                .service-card h3 {
                    font-size: 14px;
                    margin-bottom: 10px;
                }

                .service-card p {
                    font-size: 10px;
                    line-height: 1.4;
                }

                .services-grid::-webkit-scrollbar {
                    display: none;
                }

                /* PAGINATION DOTS */
                .service-dots {
                    display: flex;
                    justify-content: center;
                    gap: 10px;
                    margin-top: 20px;
                    width: 100%;
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

            /* ================= ANIMATIONS ================= */
            .reveal {
                opacity: 0;
                transform: translateY(50px);
                transition: all 0.8s ease-out;
            }

            .reveal.active {
                opacity: 1;
                transform: translateY(0);
            }
        </style>

        <script>
            document.addEventListener('DOMContentLoaded', () => {
                // ... (Existing slider code) ...

                // Scroll Animation Logic
                const reveals = document.querySelectorAll('.reveal');
                const revealOnScroll = () => {
                    const windowHeight = window.innerHeight;
                    const elementVisible = 150;

                    reveals.forEach((reveal) => {
                        const elementTop = reveal.getBoundingClientRect().top;
                        if (elementTop < windowHeight - elementVisible) {
                            reveal.classList.add('active');
                        }
                    });
                };

                window.addEventListener('scroll', revealOnScroll);
                // Trigger once on load
                revealOnScroll();

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