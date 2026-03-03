<x-layout>
    <!-- Navbar -->
    <x-header />

    <!-- Remix Icon -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.4.0/fonts/remixicon.css" rel="stylesheet" />

    @push("styles")
    @vite("resources/css/destination.css")
    @endpush

    <div x-data="{
        destination: '',
        checkIn: '',
        checkOut: '',
        guests: '',
        bookNow() {
            if (!this.destination || !this.checkIn || !this.checkOut) {
                alert('Please fill in all fields');
                return;
            }
            
            const phone = '6281234567890';
            const message = `Hello, I would like to book a trip.%0a%0aDestination: ${this.destination}%0aCheck-in: ${this.checkIn}%0aCheck-out: ${this.checkOut}%0aGuests: ${this.guests}`;
            const url = `https://wa.me/${phone}?text=${message}`;
            window.open(url, '_blank');
        }
         }" class="relative w-full h-screen font-sans booking-page-font">

        <!-- Background Image -->
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('images/laut-singapore2.webp') }}" alt="Background" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-black/40"></div>
        </div>


        <!-- Back/Close Button -->
        <a href="{{ url('/') }}" aria-label="Back to home" class="absolute top-24 left-8 z-50 text-white hover:text-gold-400 transition-colors duration-300 bg-black/30 backdrop-blur-md p-2 rounded-full border border-white/10">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </a>

        <!-- Fixed Bottom Content -->
        <div style="position: absolute !important; bottom: 0 !important; left: 0 !important; width: 100% !important; z-index: 9999 !important; padding-bottom: 20px !important; display: flex !important; justify-content: center !important; margin-bottom:100px !important;">

            <!-- Template Booking Form -->
            <section class="section__container booking__container w-full max-w-7xl" style="position: relative; z-index: 20;">
                <form @submit.prevent="bookNow()">
                    <div class="form__group">
                        <span><i class="ri-map-pin-line"></i></span>
                        <div class="input__content">
                            <div class="input__group">
                                <input type="text" x-model="destination" required />
                                <label>Destinations</label>
                            </div>
                            <p>Country, city, airport...</p>
                        </div>
                    </div>
                    <div class="form__group">
                        <span><i class="ri-calendar-line"></i></span>
                        <div class="input__content">
                            <div class="input__group">
                                <input type="date" x-model="checkIn" required />
                                <label>Check In</label>
                            </div>
                            <p>Add date</p>
                        </div>
                    </div>
                    <div class="form__group">
                        <span><i class="ri-calendar-line"></i></span>
                        <div class="input__content">
                            <div class="input__group">
                                <input type="date" x-model="checkOut" required />
                                <label>Check Out</label>
                            </div>
                            <p>Add date</p>
                        </div>
                    </div>
                    <div class="form__group">
                        <span><i class="ri-user-3-line"></i></span>
                        <div class="input__content">
                            <div class="input__group">
                                <input type="number" x-model="guests" required />
                                <label>Guest</label>
                            </div>
                            <p>All types</p>
                        </div>
                    </div>
                    <button type="submit" class="btn">BOOK NOW</button>
                </form>
            </section>
            <!-- Template End Booking Form -->

            <!-- BLACK BOTTOM SHADOW (BOTTOM ONLY) -->
            <div
                class="absolute left-0 bottom-0 w-full pointer-events-none"
                style="
            height: 260px;
            z-index: 1;
            background: linear-gradient(
                to top,
                rgba(0,0,0,1) 0%,
                rgba(0,0,0,0.95) 0%,
                rgba(0,0,0,0.75) 35%,
                rgba(0,0,0,0.4) 65%,
                rgba(0,0,0,0) 100%
            );
        "></div>

        </div>




    </div>

    <!-- ================= SERVICES ================= -->
    <section class="services" x-data="{ servicePage: 0 }">
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
    <section class="about">
        <div class="about-wrapper">

            <div class="about-img">
                <img src="images/laut-singapore2.webp">
                <div class="cross tr"></div>
            </div>

            <div class="about-content">
                <div class="cross center-top"></div>
                <h2>About Us</h2>
                <p>
                    Welcome to WaveShark Ventures, your premier travel consultant covering Langkawi, Singapore and Sabah based in the heart of Langkawi, Kuah. With years of experience in the travel industry, our trustworthy service and commitment to excellence are made possible by the dedication of our incredible team members. As your dedicated travel consultants, we pride ourselves on delivering professional yet friendly service to every client. We are committed to ensuring that all our tour products is undergo quality control to make sure your island adventure is safe, smooth, and full of happy memories and memorable island experience!
                </p>
                <div class="about-buttons">
                    <button class="btn-gold" onclick="window.location.href='{{ url('/contact') }}'">CONTACT US</button>
                    <button class="btn-outline" onclick="window.location.href='{{ url('/contact') }}'">WHY US?</button>
                </div>
            </div>

            <div class="about-img">
                <img src="images/laut-malay-new.webp">
                <div class="cross bl"></div>
            </div>

        </div>
    </section>

    <!-- ================= TOUR PACKAGE SLIDER ================= -->
    <section class="tour-package" x-data="{
                activeTourSlide: 0,
                tourItems: [
                    { img: '{{ asset('images/pangkalan-islands.webp') }}', title: 'Pangkalan Islands' },
                    { img: '{{ asset('images/laut-singapore.webp') }}', title: 'Singapore Coast' },
                    { img: '{{ asset('images/sabah.webp') }}', title: 'Sabah Nature' },
                    { img: '{{ asset('images/laut-malay-new.webp') }}', title: 'Malay Coast' },
                    { img: '{{ asset('images/singapore.webp') }}', title: 'Gardens by the Bay' },
                    { img: '{{ asset('images/laut-singapore2.webp') }}', title: 'Sentosa Island' },
                    { img: '{{ asset('images/pangkalan-islands.webp') }}', title: 'Hidden Gems' },
                    { img: '{{ asset('images/sabah.webp') }}', title: 'Borneo Wild' }
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
        <div class="testimony-bg" style="background-image: url('{{ asset('images/pangkalan-islands.webp') }}');"></div>
        <div class="testimony-overlay"></div>
        <div class="testimony-content">
            <h2 class="testimony-title">Testimony</h2>
            <p class="testimony-subtitle">Happy travelers and what's they are saying?</p>

            <div class="quote-container">
                <span class="quote-icon left-quote">“</span>
                <p class="quote-text">
                    wow best trip with waveshark travel
                </p>
                <span class="quote-icon right-quote">”</span>
            </div>

            <div class="testimony-author">- Febrian -</div>
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
                        <li><a href="/">Home</a></li>
                        <li><a href="{{ url('/about') }}">About Us</a></li>
                        <li><a href="{{ url('/services') }}">Services</a></li>
                        <li><a href="{{ url('/contact') }}">Testimonials</a></li>
                    </ul>
                </div>

                <!-- Column 3: Tours -->
                <div class="footer-col">
                    <h4 class="footer-title">Top Tours</h4>
                    <ul class="footer-links">
                        <li><a href="{{ url('langkawi') }}">Langkawi, Malaysia</a></li>
                        <li><a href="{{ url('sabah') }}">Sabah, Malaysia</a></li>
                        <li><a href="#">Singapore</a></li>
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
                        <p>wavesharktravel@gmail.com</p>
                        <p>+62 812 3456 7890</p>
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


</x-layout>