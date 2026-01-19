<x-layout>
    <!-- Navbar -->
    <x-header />

    <!-- Remix Icon -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.4.0/fonts/remixicon.css" rel="stylesheet" />

    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap");

        :root {
            --primary-color: #3d5cb8;
            --white: #ffffff;
            --gold: #d4af37;
            --text-dark: #0f172a;
            --text-light: #94a3b8;
        }

        .booking-page-font {
            font-family: "Poppins", sans-serif;
        }

        /* HERO SECTION */
        .hero {
            position: relative;
            width: 100%;
            min-height: 100vh;
            /* Full height to encompass search + services */
            display: flex;
            flex-direction: column;
            /* Stack Search + Services vertically */
            align-items: center;
            justify-content: center;
            /* Center vertically */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            overflow: hidden;
            padding-top: 80px;
            /* Add padding for navbar space */
            padding-bottom: 40px;
            gap: 60px;
            /* Gap between search and services */
        }

        /* GRADIENT OVERLAY */
        .hero-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to bottom,
                    rgba(0, 0, 0, 0.4) 0%,
                    /* Darker top for navbar visibility */
                    rgba(0, 0, 0, 0.2) 40%,
                    /* Lighter middle */
                    rgba(0, 0, 0, 0.9) 100%
                    /* Dark bottom for contrast with search/services */
                );
            z-index: 1;
        }

        /* SEARCH CONTAINER */
        .search-container {
            position: relative;
            z-index: 10;
            width: 100%;
            max-width: 700px;
            padding: 0 20px;
            text-align: center;
        }

        .search-title {
            color: var(--white);
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 2rem;
            text-shadow: 0 4px 10px rgba(0, 0, 0, 0.5);
            letter-spacing: 1px;
        }

        /* GLASSMORPHISM SEARCH BAR */
        .search-box {
            position: relative;
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 50px;
            padding: 8px 8px 8px 25px;
            display: flex;
            align-items: center;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
        }

        .search-box:focus-within {
            background: rgba(255, 255, 255, 0.25);
            border-color: rgba(255, 255, 255, 0.5);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
            transform: translateY(-2px);
        }

        .search-input {
            width: 100%;
            background: transparent;
            border: none;
            outline: none;
            color: var(--white);
            font-size: 1.1rem;
            font-weight: 500;
        }

        .search-input::placeholder {
            color: rgba(255, 255, 255, 0.7);
            font-weight: 400;
        }

        .search-btn {
            background: var(--white);
            color: var(--primary-color);
            width: 50px;
            height: 50px;
            border-radius: 50%;
            border: none;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            cursor: pointer;
            transition: 0.3s;
            margin-left: 10px;
        }

        .search-btn:hover {
            background: var(--gold);
            color: #000;
            transform: scale(1.1) rotate(90deg);
        }

        .search-btn i {
            font-size: 1.2rem;
        }

        /* SERVICES SECTION */
        .services {
            padding: 0 40px;
            /* Removed vertical padding, handled by Hero gap/padding */
            background: transparent;
            /* Make transparent to show hero bg */
            position: relative;
            z-index: 2;
            width: 100%;
        }

        /* Adjusted Grid for 5 items */
        /* Adjusted Grid for fewer items */
        .services-grid {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }

        .service-card {
            border: 1px solid rgba(255, 255, 255, 0.1);
            background: rgba(255, 255, 255, 0.05);
            /* Slightly more transparent */
            backdrop-filter: blur(10px);
            /* Add Glassmorphism */
            aspect-ratio: 4/5;
            /* Slightly taller for elegance */
            width: 200px;
            /* Base width */
            flex: 0 1 200px;
            /* Don't grow too much */
            text-align: center;
            padding: 30px 20px;
            transition: 0.4s ease;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            position: relative;
            overflow: hidden;
            cursor: pointer;
        }

        .service-card:hover {
            border-color: var(--gold);
            background: rgba(255, 255, 255, 0.15);
            transform: translateY(-10px);
        }

        .service-card h1 {
            font-size: 4rem;
            color: rgba(255, 255, 255, 0.1);
            font-weight: 800;
            transition: 0.3s;
            margin-bottom: 10px;
        }

        .service-card:hover h1 {
            color: var(--gold);
            transform: scale(1.1);
        }

        .service-card h3 {
            color: var(--gold);
            text-transform: uppercase;
            letter-spacing: 2px;
            font-size: 1.1rem;
            margin-bottom: 15px;
            margin-top: 10px;
            z-index: 2;
        }

        .service-card p {
            font-size: 0.85rem;
            color: var(--text-light);
            line-height: 1.6;
            margin-bottom: auto;
            z-index: 2;
        }

        /* Services Slider Structure (Global) */
        .services-viewport {
            width: 100%;
            overflow: hidden;
        }

        .service-track-wrapper {
            overflow: hidden;
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding-bottom: 20px;
        }

        .service-track {
            display: flex;
            transition: transform 0.5s ease-in-out;
        }

        .service-slide-item {
            flex-shrink: 0;
            padding: 0 10px;
            /* 20px gap total */
            box-sizing: border-box;
        }

        .service-card {
            /* Reset fixed widths */
            min-width: unset;
            width: 100%;
            aspect-ratio: 4/5;
            border: 1px solid rgba(255, 255, 255, 0.1);
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            border-radius: 12px;
            text-align: center;
            padding: 30px 20px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            position: relative;
            overflow: hidden;
            transition: 0.4s ease;
        }

        /* MOBILE RESPONSIVENESS */
        @media (max-width: 900px) {
            .hero {
                min-height: 100vh;
                height: auto;
                padding-top: 120px;
                padding-bottom: 60px;
                gap: 40px;
            }

            .search-title {
                font-size: 2.5rem;
            }
        }

        @media (max-width: 768px) {
            .search-title {
                font-size: 2rem;
            }

            .services {
                padding: 0;
            }

            /* Mobile Service Card Adjustments */
            .service-card {
                padding: 20px 10px;
                /* Compact padding */
            }

            .service-card h1 {
                font-size: 3rem;
                /* Smaller number */
            }

            .service-card h3 {
                font-size: 14px;
                /* Smaller title */
            }

            .service-card p {
                font-size: 11px;
                /* Smaller desc */
            }

            /* Mobile Tour Card Adjustments */

            /* Service Dots for Mobile */
            .service-dots {
                display: flex;
                justify-content: center;
                gap: 8px;
                margin-top: 15px;
                padding-bottom: 20px;
            }

            .service-dot {
                width: 8px;
                height: 8px;
                background: rgba(255, 255, 255, 0.3);
                border-radius: 50%;
                transition: 0.3s;
            }

            .service-dot.active {
                background: var(--gold);
                transform: scale(1.2);
            }

            /* Mobile Tour Card Adjustments */
            .tour-card {
                height: auto;
                aspect-ratio: auto;
                background: #1a1a1a;
                /* Dark background for text area */
            }

            .tour-card-img {
                position: relative;
                height: 180px;
                /* Fixed height for image */
                width: 100%;
            }

            .tour-card-content {
                padding: 15px;
                background: transparent;
                backdrop-filter: none;
                border-top: none;
            }

            .tour-info h3 {
                font-size: 13px !important;
            }

            .tour-info p {
                margin-bottom: 0px !important;
                font-size: 11px;
                line-height: 1.4;
            }
        }

        @media (max-width: 480px) {
            .search-title {
                font-size: 1.8rem;
                margin-bottom: 1.5rem;
            }
        }

        /* SCROLLBAR HIDING */
        .services-viewport::-webkit-scrollbar {
            height: 6px;
        }

        .services-viewport::-webkit-scrollbar-track {
            background: transparent;
        }

        .services-viewport::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.2);
            border-radius: 3px;
        }

        /* ABOUT SECTION STYLES (Kept from original but cleaned up) */
        .about {
            padding: 100px 40px;
            position: relative;
            background: black;
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

        /* ================= ABOUT MOBILE ================= */
        @media (max-width: 768px) {
            /* .tour-info p {
                margin-bottom: -6px !important;
            }

            .starts-from {
                margin-bottom: 0px !important;

            } */

            .about-wrapper {
                flex-direction: column;
                gap: 40px;
            }

            .about-img {
                display: none;
            }

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

            .about-content {
                max-width: 100%;
                padding: 0 10px;
            }

            .about-content p {
                text-align: left;
            }

            .cross {
                display: none;
            }
        }

        /* ================= TOUR PACKAGE SLIDER ================= */
        .section-title {
            color: var(--gold);
            font-size: 32px;
            margin-bottom: 50px;
            text-transform: capitalize;
        }

        .tour-package {
            padding: 100px 40px;
            text-align: center;
            max-width: 1400px;
            margin: auto;
            position: relative;
            background: black;
        }

        .tour-slider-container {
            position: relative;
            padding: 0 40px;
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
            box-sizing: border-box;
        }

        .tour-card {
            position: relative;
            aspect-ratio: 3/4;
            background: transparent;
            overflow: hidden;
            cursor: pointer;
            border-radius: 12px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: 0.3s;
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
        }

        /* Image Section */
        .tour-card-img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-size: cover;
            background-position: center;
            transition: transform 0.5s ease;
            z-index: 1;
        }

        .tour-card:hover .tour-card-img {
            transform: scale(1.1);
        }

        /* Content Section */
        .tour-card-content {
            position: relative;
            z-index: 2;
            width: 100%;
            background: rgba(0, 0, 0, 0.7);
            /* Darker background for text */
            backdrop-filter: blur(10px);
            padding: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            text-align: left;
            transition: background 0.3s ease;
        }

        .tour-card:hover .tour-card-content {
            background: rgba(0, 0, 0, 0.85);
        }

        .tour-info h3 {
            color: var(--gold);
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 5px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .tour-info p {
            font-size: 12px;
            color: #d1d5db;
            margin-bottom: 8px;
        }

        .tour-info .price {
            color: var(--white);
            font-weight: bold;
            font-size: 14px;
        }

        .starts-from {
            font-size: 1rem;
            color: #9ca3af;
            font-style: italic;
            font-weight: 400;
            transition: all 0.3s ease;
            display: block;
            margin-bottom: 2px;
        }

        .tour-card:hover .starts-from {
            color: var(--gold);
            transform: translateX(5px);
        }

        /* Remove old overlay and border styles */
        .tour-overlay,
        .tour-border {
            display: none;
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

        @media (max-width: 768px) {
            .tour-slider-container {
                padding: 0;
            }

            .tour-card {
                aspect-ratio: 2/3;
            }

            .tour-package {
                padding: 60px 10px;
            }
        }

        /* ================= TESTIMONY SECTION ================= */
        .testimony-section {
            position: relative;
            height: 600px;
            /* or a fixed height */
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .testimony-bg {
            position: absolute;
            inset: 0;
            background-size: cover;
            background-position: center;
            z-index: 1;
        }

        .testimony-overlay {
            position: absolute;
            inset: 0;
            background: rgba(0, 0, 0, 0.6);
            z-index: 2;
        }

        .testimony-content {
            position: relative;
            z-index: 3;
            max-width: 800px;
            text-align: center;
            padding: 0 20px;
            color: white;
        }

        .testimony-title {
            font-size: 48px;
            color: var(--gold);
            margin-bottom: 10px;
            font-family: serif;
        }

        .testimony-subtitle {
            font-size: 16px;
            color: #ccc;
            margin-bottom: 40px;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .quote-container {
            position: relative;
            padding: 0 40px;
        }

        .quote-icon {
            font-size: 80px;
            color: var(--gold);
            opacity: 0.3;
            position: absolute;
            font-family: sans-serif;
            line-height: 1;
        }

        .left-quote {
            top: -40px;
            left: -20px;
        }

        .right-quote {
            bottom: -60px;
            right: -20px;
        }

        .quote-text {
            font-size: 24px;
            line-height: 1.6;
            font-family: serif;
            font-style: italic;
            margin-bottom: 30px;
        }

        .testimony-author {
            font-size: 14px;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: var(--gold);
        }

        /* ================= FOOTER ================= */
        .site-footer {
            background-color: #050505;
            color: #fff;
            padding: 80px 0 0 0;
            font-family: 'Poppins', sans-serif;
        }

        .footer-container {
            max-width: 1200px;
            margin: auto;
            padding: 0 20px;
        }

        .footer-row {
            display: grid;
            grid-template-columns: 1.5fr 1fr 1fr 1.5fr;
            gap: 40px;
            padding-bottom: 60px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .footer-logo {
            font-size: 32px;
            color: var(--gold);
            font-weight: bold;
            margin-bottom: 20px;
        }

        .footer-desc {
            font-size: 14px;
            color: #9ca3af;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .social-links {
            display: flex;
            gap: 15px;
        }

        .social-link {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            border: 1px solid rgba(255, 255, 255, 0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            transition: 0.3s;
            text-decoration: none;
            font-size: 12px;
        }

        .social-link:hover {
            border-color: var(--gold);
            color: var(--gold);
        }

        .footer-title {
            font-size: 18px;
            color: white;
            margin-bottom: 25px;
            position: relative;
        }

        .footer-links {
            list-style: none;
            padding: 0;
        }

        .footer-links li {
            margin-bottom: 15px;
        }

        .footer-links a {
            color: #9ca3af;
            text-decoration: none;
            transition: 0.3s;
            font-size: 14px;
        }

        .footer-links a:hover {
            color: var(--gold);
            padding-left: 5px;
        }

        .newsletter-form {
            display: flex;
            gap: 10px;
            margin-top: 20px;
        }

        .newsletter-input {
            flex: 1;
            padding: 12px 15px;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: white;
            border-radius: 4px;
            outline: none;
        }

        .newsletter-input:focus {
            border-color: var(--gold);
        }

        .newsletter-btn {
            padding: 12px 20px;
            background: var(--gold);
            color: black;
            border: none;
            font-weight: bold;
            cursor: pointer;
            border-radius: 4px;
            transition: 0.3s;
        }

        .newsletter-btn:hover {
            background: white;
        }

        .footer-bottom {
            padding: 25px 0;
            background: black;
        }

        .footer-bottom-content {
            max-width: 1200px;
            margin: auto;
            padding: 0 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 12px;
            color: #6b7280;
        }

        .legal-links {
            display: flex;
            gap: 20px;
        }

        .legal-links a {
            color: #6b7280;
            text-decoration: none;
            transition: 0.3s;
        }

        .legal-links a:hover {
            color: var(--gold);
        }

        @media (max-width: 900px) {
            .footer-row {
                grid-template-columns: 1fr 1fr;
            }
        }

        @media (max-width: 600px) {
            .footer-row {
                grid-template-columns: 1fr;
                gap: 30px;
            }

            .footer-bottom-content {
                flex-direction: column;
                gap: 15px;
                text-align: center;
            }
        }

        .mt-custom {
            margin-top: 50px;
        }

        @media (max-width: 768px) {
            .black-bottom-shadow {
                margin-top: 27rem;
            }
        }
    </style>

    <div class="booking-page-font bg-black">

        <!-- Back Button -->
        <a href="http://127.0.0.1:8000" class="absolute top-2 left-8 z-50 text-white hover:text-gold transition-colors duration-300 bg-white/10 backdrop-blur-md p-3 rounded-full border border-white/20" style="
    margin-top: 7rem;
    margin-left: 1rem;
">
            <i class="ri-close-line text-xl"></i>
        </a>

        <!-- HERO SECTION (Contains Search + Services) -->
        <div class="hero" style="background-image: url('{{ asset('images/laut-malay.jpg') }}');">
            <div class="hero-overlay"></div>


            <!-- Search Content -->
            <div class="search-container">
                <h1 class="search-title">Discover Langkawi</h1>

                <div class="search-box">
                    <input type="text" class="search-input" placeholder="Search activities (e.g., Jetski, Mangrove Tour)...">
                    <button class="search-btn">
                        <i class="ri-search-line"></i>
                    </button>
                </div>
            </div>

            <!-- SERVICES SECTION (Now Inside Hero) -->
            <!-- SERVICES SECTION (Now Inside Hero) -->
            <section class="services" x-data="{
                serviceItems: [
                    { id: '01', title: 'Car Rental', desc: 'Explore the island at your own pace with our premium fleet.' },
                    { id: '02', title: 'Island Hopping', desc: 'Discover hidden gems and pristine beaches across the archipelago.' },
                    { id: '03', title: 'Jetski Rides', desc: 'Experience the adrenaline rush on the open turquoise waters.' },
                    { id: '05', title: 'Mangrove Tour', desc: 'Navigate through the ancient geopark and diverse ecosystems.' },
                    { id: '06', title: 'Dinner Cruise', desc: 'Enjoy a romantic sunset dinner with breathtaking views.' }
                ],
                get visibleServiceSlides() {
                    if (window.innerWidth >= 1024) return 5;
                    return 2;
                },
                get maxServiceSlide() {
                    return Math.max(0, this.serviceItems.length - this.visibleServiceSlides);
                },
                activeServiceSlide: 0
            }" @resize.window="activeServiceSlide = 0">
                <div class="services-viewport">
                    <div class="service-track-wrapper">
                        <div class="service-track"
                            :style="`transform: translateX(-${activeServiceSlide * (100 / visibleServiceSlides)}%)`">
                            <template x-for="(item, index) in serviceItems" :key="index">
                                <div class="service-slide-item" :style="`width: ${100 / visibleServiceSlides}%`">
                                    <div class="service-card">
                                        <h1 x-text="item.id"></h1>
                                        <h3 x-text="item.title"></h3>
                                        <p x-text="item.desc"></p>
                                    </div>
                                </div>
                            </template>
                        </div>
                    </div>

                    <!-- Pagination Dots -->
                    <div class="service-dots">
                        <template x-for="i in Math.ceil(serviceItems.length / visibleServiceSlides)">
                            <span class="service-dot"
                                :class="{ 'active': Math.floor(activeServiceSlide / visibleServiceSlides) === i - 1 }"
                                @click="activeServiceSlide = (i - 1) * visibleServiceSlides">
                            </span>
                        </template>
                    </div>
                </div>
            </section>
        </div>

        <!-- ================= ABOUT ================= -->
        <section class="about">
            <div class="about-wrapper">

                <div class="about-img">
                    <img src="{{ asset('images/laut-malay.jpg') }}">
                    <div class="cross tr"></div>
                </div>

                <div class="about-content">
                    <div class="cross center-top"></div>
                    <h2>About Langkawi</h2>
                    <p>
                        Langkawi, known as the "Jewel of Kedah", is a stunning archipelago of 99 islands on Malaysia's west coast. Famous for its turquoise waters, limestone cliffs, and ancient rainforests, it offers a perfect blend of relaxation and adventure. Experience the thrill of jetski rides, explore the mangroves, or enjoy a romantic sunset dinner cruise. Langkawi is the ultimate tropical escape.
                    </p>
                    <div class="about-buttons">
                        <button class="btn-gold">BOOK NOW</button>
                        <button class="btn-outline">LEARN MORE</button>
                    </div>
                </div>

                <div class="about-img">
                    <img src="{{ asset('images/pangkalan-islands.jpg') }}">
                    <div class="cross bl"></div>
                </div>

            </div>
        </section>


        <!-- ================= TOUR PACKAGE SLIDER ================= -->
        <section class="tour-package" x-data="{
                activeTourSlide: 0,
                tourItems: [
                    { 
                        img: '{{ asset('images/laut-malay.jpg') }}', 
                        title: 'Car Rental', 
                        desc: 'Self-drive adventure', 
                        price: 'RM 150/day' 
                    },
                    { 
                        img: '{{ asset('images/pangkalan-islands.jpg') }}', 
                        title: 'Island Hopping', 
                        desc: '3-island tour by boat', 
                        price: 'RM 350' 
                    },
                    { 
                        img: '{{ asset('images/laut-singapore.jpg') }}', 
                        title: 'Jetski Rides', 
                        desc: 'Thrilling water action', 
                        price: 'RM 450' 
                    },
                    { 
                        img: '{{ asset('images/sabah.jpg') }}', 
                        title: 'Mangrove Tour', 
                        desc: 'Eco-adventure in Kilim', 
                        price: 'RM 250' 
                    },
                    { 
                        img: '{{ asset('images/laut-singapore2.jpg') }}', 
                        title: 'Sunset Dinner Cruise', 
                        desc: 'Romance at sea', 
                        price: 'RM 500' 
                    }
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
                                <div class="tour-card">
                                    <div class="tour-card-img" :style="`background-image: url('${item.img}')`"></div>
                                    <div class="tour-card-content">
                                        <div class="tour-info">
                                            <h3 x-text="item.title"></h3>
                                            <p x-text="item.desc"></p>
                                            <div class="price-container" style="margin-top: 5px;">
                                                <span class="starts-from">starts from</span>
                                                <span class="price" x-text="item.price"></span>
                                            </div>
                                        </div>
                                    </div>
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


</x-layout>