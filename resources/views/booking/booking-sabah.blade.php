<x-layout>
    <!-- Navbar -->
    <x-header />

    <!-- Remix Icon -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.4.0/fonts/remixicon.css" rel="stylesheet" />

    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap");

        :root {
            --primary-color: #3d5cb8;
            --primary-color-dark: #334c99;
            --text-dark: #0f172a;
            --text-light: #94a3b8;
            --extra-light: #f1f5f9;
            --white: #ffffff;
            --max-width: 1200px;
        }

        .booking-page-font {
            font-family: "Poppins", sans-serif;
        }

        .section__container {
            max-width: var(--max-width);
            margin: auto;
            padding: 2rem 1rem;
        }

        .header__container {
            text-align: center;
            padding-bottom: 1rem;
        }

        .section__header {
            font-size: 2.5rem;
            font-weight: 600;
            line-height: 3rem;
            color: var(--white);
            margin-bottom: 1rem;
            text-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
        }

        .btn {
            padding: 0.75rem 2rem;
            outline: none;
            border: none;
            font-size: 1rem;
            font-weight: 600;
            color: var(--white);
            background-image: linear-gradient(to right, var(--primary-color) 0%, #00d2ff 51%, var(--primary-color) 100%);
            background-size: 200% auto;
            border-radius: 2rem;
            cursor: pointer;
            transition: 0.5s;
            box-shadow: 0 4px 15px rgba(61, 92, 184, 0.3);
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .btn:hover {
            background-position: right center;
            color: #fff;
            box-shadow: 0 10px 20px rgba(0, 210, 255, 0.4);
            transform: translateY(-3px);
        }

        .booking__container {
            border-radius: 2rem;
            border: 1px solid rgba(255, 255, 255, 0.2);
            /* Glassmorphism Effect */
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.37);
        }

        .booking__container form {
            display: grid;
            grid-template-columns: repeat(4, 1fr) auto;
            gap: 1.5rem;
            align-items: center;
        }

        .booking__container .input__content {
            width: 100%;
        }

        .booking__container .form__group {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .booking__container .form__group span {
            padding: 12px;
            font-size: 1.5rem;
            color: var(--white);
            background-color: rgba(255, 255, 255, 0.15);
            border-radius: 1rem;
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: 0.3s;
        }

        .booking__container .form__group:hover span {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            transform: scale(1.05);
        }

        .booking__container .input__group {
            width: 100%;
            position: relative;
        }

        .booking__container label {
            position: absolute;
            top: 50%;
            left: 0;
            transform: translateY(-50%);
            font-size: 1rem;
            font-weight: 500;
            color: rgba(255, 255, 255, 0.8);
            pointer-events: none;
            transition: 0.3s;
        }

        .booking__container input {
            width: 100%;
            padding: 10px 0;
            font-size: 1rem;
            outline: none;
            border: none;
            border-bottom: 1px solid rgba(255, 255, 255, 0.3);
            color: var(--white);
            background: transparent;
            transition: 0.3s;
        }

        .booking__container input:focus {
            border-bottom-color: #d4af37;
        }

        .booking__container input:focus~label,
        .booking__container input:valid~label,
        .booking__container input[type="date"]~label,
        .booking__container input[type="number"]~label {
            font-size: 0.8rem;
            top: -5px;
            color: #d4af37;
            font-weight: 600;
        }

        /* Adjust for date inputs since they might always have value/placeholder behavior */
        .booking__container input[type="date"] {
            color: var(--white);
        }

        /* Date picker icon color fix for webkit */
        .booking__container input[type="date"]::-webkit-calendar-picker-indicator {
            filter: invert(1);
            cursor: pointer;
        }

        .booking__container .form__group p {
            margin-top: 0.5rem;
            font-size: 0.8rem;
            color: rgba(255, 255, 255, 0.6);
        }

        .booking__container .btn {
            padding: 1rem;
            font-size: 1.2rem;
            display: flex;
            justify-content: center;
            align-items: center;
            white-space: nowrap;
        }

        @media (width < 900px) {
            .booking__container form {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (width < 600px) {
            .booking__container form {
                grid-template-columns: repeat(1, 1fr);
            }

            .booking__container .btn {
                margin-top: 1rem;
            }
        }

        /* ================= FROM LANDING PAGE ================= */
        :root {
            --gold: #d4af37;
            --dark: #000;
            --gray: #9ca3af;
        }

        /* Reveals */
        .reveal {
            position: relative;
            transform: translateY(150px);
            opacity: 0;
            transition: 1s all ease;
        }

        .reveal.active {
            transform: translateY(0);
            opacity: 1;
        }

        /* ================= SERVICES ================= */
        .services {
            padding: 100px 40px;
            background: black;
            /* Ensure background matches landing */
        }

        .services-grid {
            max-width: 1000px;
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

        /* ================= SERVICES MOBILE SLIDER ================= */
        .service-dots {
            display: none;
        }

        @media (max-width: 768px) {
            .services {
                padding: 60px 0;
                overflow: hidden;
                position: relative;
            }

            .services-viewport {
                overflow: hidden;
                width: 100%;
                padding-bottom: 30px;
            }

            .services-grid {
                display: flex;
                gap: 15px;
                margin: 0;
                width: 100%;
                transition: transform 0.5s ease-in-out;
                padding: 0 7.5px;
                justify-content: flex-start;
                box-sizing: border-box;
            }

            .services-grid.slide-2 {
                transform: translateX(-100%);
            }

            .service-card {
                min-width: calc(50% - 7.5px);
                aspect-ratio: 1 / 1;
                flex-shrink: 0;
                padding: 15px;
                border: 1px solid rgba(255, 255, 255, 0.1);
            }

            .service-card h1 {
                font-size: 42px;
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
            width: 100%;
        }

        .justify-center {
            justify-content: center;
        }

        .tour-slide-item {
            flex-shrink: 0;
            padding: 0 10px;
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
        }

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
            height: 100px;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.95), transparent);
            display: flex;
            align-items: flex-end;
            justify-content: center;
            padding-bottom: 15px;
            transition: 0.3s;
        }

        .tour-info h3 {
            color: #ccc;
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 2px;
        }

        .text-xs {
            font-size: 12px;
        }

        .text-gray-400 {
            color: #9ca3af;
        }

        .text-gold {
            color: var(--gold);
        }

        .font-bold {
            font-weight: bold;
        }

        .mt-1 {
            margin-top: 4px;
        }

        .mt-2 {
            margin-top: 8px;
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
        <div class="absolute inset-0 z-0 bg-cover bg-center bg-no-repeat" style="background-image: url('{{ asset('images/sabah.jpg') }}');">
            <div class="absolute inset-0 bg-black/40"></div>
        </div>


        <!-- Back/Close Button -->
        <a href="{{ url('/') }}" class="absolute top-24 left-8 z-50 text-white hover:text-gold-400 transition-colors duration-300 bg-black/30 backdrop-blur-md p-2 rounded-full border border-white/10">
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
                class="absolute left-0 bottom-0 w-full pointer-events-none black-bottom-shadow"
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
    <section class="services reveal" x-data="{ servicePage: 0 }">
        <div class="services-viewport">
            <div class="services-grid" :class="{'slide-2': servicePage === 1}">
                <div class="service-card">
                    <h1>01</h1>
                    <h3>Sunset Dinner Cruise</h3>
                    <p>Experience a magical evening with gourmet dining and stunning sea views.</p>
                </div>
                <div class="service-card">
                    <h1>02</h1>
                    <h3>Fishing Charter</h3>
                    <p>Embark on an exciting fishing adventure in the rich waters of Borneo.</p>
                </div>
                <div class="service-card">
                    <h1>03</h1>
                    <h3>Mount Climbing</h3>
                    <p>Conquer the majestic Mount Kinabalu, Southeast Asia's highest peak.</p>
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
                <img src="{{ asset('images/sabah.jpg') }}">
                <div class="cross tr"></div>
            </div>

            <div class="about-content">
                <div class="cross center-top"></div>
                <h2>About Sabah</h2>
                <p>
                    Sabah, "The Land Below the Wind," is a paradise for nature lovers and adventurers. Home to the majestic Mount Kinabalu and diverse wildlife like orangutans and proboscis monkeys, it offers an unforgettable experience. From world-class diving at Sipadan to exploring ancient rainforests and vibrant local culture, Sabah is a destination that captivates the soul.
                </p>
                <div class="about-buttons">
                    <button class="btn-gold">BOOK NOW</button>
                    <button class="btn-outline">LEARN MORE</button>
                </div>
            </div>

            <div class="about-img">
                <img src="{{ asset('images/laut-malay.jpg') }}">
                <div class="cross bl"></div>
            </div>

        </div>
    </section>

    <!-- ================= TOUR PACKAGE SLIDER ================= -->
    <section class="tour-package reveal" x-data="{
                activeTourSlide: 0,
                tourItems: [
                    { 
                        img: '{{ asset('images/laut-singapore2.jpg') }}', 
                        title: 'Sunset Dinner Cruise', 
                        desc: 'Romantic evening at sea', 
                        price: 'RM 450' 
                    },
                    { 
                        img: '{{ asset('images/laut-malay.jpg') }}', 
                        title: 'Fishing Charter', 
                        desc: 'Deep sea fishing adventure', 
                        price: 'RM 600' 
                    },
                    { 
                        img: '{{ asset('images/sabah.jpg') }}', 
                        title: 'Mount Climbing', 
                        desc: 'Conquer Mt. Kinabalu', 
                        price: 'RM 1200' 
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
                <div class="tour-track" :class="{ 'justify-center': tourItems.length <= visibleTourSlides }" :style="`transform: translateX(-${activeTourSlide * (100 / visibleTourSlides)}%)`">
                    <template x-for="(item, index) in tourItems" :key="index">
                        <div class="tour-slide-item" :style="`width: ${100 / visibleTourSlides}%`">
                            <div class="tour-card" :style="`background-image: url('${item.img}')`">
                                <div class="tour-overlay">
                                    <div class="tour-info">
                                        <h3 x-text="item.title"></h3>
                                        <p x-text="item.desc" class="text-xs text-gray-400 mt-1"></p>
                                        <p x-text="item.price" class="text-gold font-bold mt-2"></p>
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
                    "Climbing Mount Kinabalu was the most challenging yet rewarding experience of my life. The sunrise view from the summit was absolutely breathtaking and worth every step!"
                </p>
                <span class="quote-icon right-quote">”</span>
            </div>

            <div class="testimony-author">- Sarah Jenkins -</div>
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

    <script>
        // Simple Scoop Reveal Animation
        document.addEventListener('DOMContentLoaded', function() {
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
        });
    </script>
</x-layout>