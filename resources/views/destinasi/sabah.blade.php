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

        [x-cloak] {
            display: none !important;
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
            z-index: 20;
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
            font-size: 0.9rem;
            color: var(--gold);
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

        /* ================= BOOKING MODAL & BUTTONS ================= */
        .btn-book-now {
            width: 100%;
            padding: 10px 0;
            background: var(--gold);
            color: black;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-size: 14px;
            border: none;
            border-radius: 6px;
            margin-top: 15px;
            cursor: pointer;
            transition: all 0.3s ease;
            /* Make fully visible and clickable */
            opacity: 1;
            transform: translateY(0);
            position: relative;
            z-index: 500;
            pointer-events: auto;
        }

        .btn-book-now:hover {
            background: white;
            box-shadow: 0 0 15px rgba(212, 175, 55, 0.5);
            transform: translateY(-2px);
        }

        /* Modal Styles */
        /* Modal Styles */
        .booking-modal-overlay {
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.85);
            backdrop-filter: blur(8px);
            z-index: 9999;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            /* transitions managed by Alpine x-transition */
        }

        .booking-modal {
            background: #111;
            border: 1px solid rgba(212, 175, 55, 0.3);
            border-radius: 16px;
            width: 100%;
            max-width: 600px;
            max-height: 90vh;
            overflow-y: auto;
            position: relative;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
        }

        /* Custom Scrollbar for Modal */
        .booking-modal::-webkit-scrollbar {
            width: 8px;
        }

        .booking-modal::-webkit-scrollbar-track {
            background: #1a1a1a;
        }

        .booking-modal::-webkit-scrollbar-thumb {
            background: #333;
            border-radius: 4px;
        }

        .booking-modal::-webkit-scrollbar-thumb:hover {
            background: var(--gold);
        }

        .modal-header {
            padding: 25px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            background: #111;
            z-index: 10;
        }

        .modal-title {
            color: var(--gold);
            font-size: 20px;
            font-weight: 600;
            margin: 0;
        }

        .close-modal-btn {
            background: transparent;
            border: none;
            color: #fff;
            font-size: 24px;
            cursor: pointer;
            transition: 0.3s;
        }

        .close-modal-btn:hover {
            color: var(--gold);
            transform: rotate(90deg);
        }

        .modal-body {
            padding: 25px;
        }

        .form-section-title {
            color: white;
            font-size: 16px;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .form-section-title::after {
            content: '';
            height: 1px;
            background: rgba(255, 255, 255, 0.1);
            flex: 1;
        }

        /* Package Selection */
        .selected-package-display {
            background: rgba(212, 175, 55, 0.1);
            border: 1px solid var(--gold);
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 25px;
            display: flex;
            gap: 15px;
            align-items: center;
        }

        .selected-package-img {
            width: 60px;
            height: 60px;
            border-radius: 6px;
            object-fit: cover;
        }

        .additional-packages-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 10px;
            margin-bottom: 25px;
        }

        .checkbox-wrapper {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 8px;
            cursor: pointer;
            transition: 0.2s;
        }

        .checkbox-wrapper:hover {
            background: rgba(255, 255, 255, 0.08);
            border-color: rgba(255, 255, 255, 0.2);
        }

        .checkbox-wrapper input[type="checkbox"] {
            accent-color: var(--gold);
            width: 16px;
            height: 16px;
        }

        /* Form Inputs */
        .form-group {
            margin-bottom: 15px;
        }

        .form-label {
            display: block;
            color: #94a3b8;
            font-size: 12px;
            margin-bottom: 8px;
        }

        .form-input {
            width: 100%;
            background: rgba(0, 0, 0, 0.3);
            border: 1px solid rgba(255, 255, 255, 0.15);
            border-radius: 8px;
            padding: 12px 15px;
            color: white;
            font-family: inherit;
            transition: 0.3s;
        }

        .form-input:focus {
            outline: none;
            border-color: var(--gold);
            box-shadow: 0 0 0 2px rgba(212, 175, 55, 0.1);
        }

        /* Action Buttons */
        .modal-footer {
            padding: 25px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            display: flex;
            gap: 15px;
            background: #111;
        }

        .btn-action {
            flex: 1;
            padding: 12px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 14px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            transition: 0.3s;
            border: none;
        }

        .btn-whatsapp {
            background: #25D366;
            color: white;
        }

        .btn-whatsapp:hover {
            background: #1FB855;
        }

        .btn-email {
            background: transparent;
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: white;
        }

        .btn-email:hover {
            border-color: white;
            background: rgba(255, 255, 255, 0.05);
        }

        @media (max-width: 600px) {
            .additional-packages-grid {
                grid-template-columns: 1fr;
            }

            .modal-footer {
                flex-direction: column;
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

        /* Date Input Icon Invert */
        input[type="date"]::-webkit-calendar-picker-indicator {
            filter: invert(1);
            cursor: pointer;
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
        <div class="hero" style="background-image: url('{{ asset('images/laut-malay-new.jpg') }}');">
            <div class="hero-overlay"></div>


            <!-- Search Content -->
            <div class="search-container">
                <h1 class="search-title">Discover Sabah</h1>

                <div class="search-box">
                    <input type="text" class="search-input" placeholder="Search activities (e.g., Jetski, Mangrove Tour)...">
                    <button class="search-btn">
                        <i class="ri-search-line"></i>
                    </button>
                </div>
            </div>

            <!-- SERVICES SECTION (Now Inside Hero) -->
            <!-- SERVICES SECTION (Now Inside Hero) -->
            <section class="services" x-data='{
                serviceItems: [
                    @foreach($services as $service)
                        { id: "{{ $service->number }}", title: {!! json_encode($service->title, JSON_HEX_APOS | JSON_HEX_QUOT) !!}, desc: {!! json_encode($service->description, JSON_HEX_APOS | JSON_HEX_QUOT) !!} },
                    @endforeach
                ],
                get visibleServiceSlides() {
                    if (window.innerWidth >= 1024) return 5;
                    return 2;
                },
                get maxServiceSlide() {
                    return Math.max(0, this.serviceItems.length - this.visibleServiceSlides);
                },
                activeServiceSlide: 0
            }' @resize.window="activeServiceSlide = 0">
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

        <!-- ================= TOUR PACKAGE SLIDER ================= -->
        <!-- ================= TOUR PACKAGE SLIDER ================= -->
        <section class="tour-package" x-data='{
                activeTourSlide: 0,
                tourItems: [
                    @foreach($tourPackages as $package)
                        { 
                            id: "{{ $package->id ?? $loop->index }}",
                            img: "{{ $package->image_path ? asset('storage/' . $package->image_path) : asset('images/default.jpg') }}", 
                            title: {!! json_encode($package->title, JSON_HEX_APOS | JSON_HEX_QUOT) !!}, 
                            desc: {!! json_encode($package->description, JSON_HEX_APOS | JSON_HEX_QUOT) !!}, 
                            price: {!! json_encode($package->price, JSON_HEX_APOS | JSON_HEX_QUOT) !!} 
                        },
                    @endforeach
                ],
                isModalOpen: false,
                selectedMainPackage: null,
                additionalPackages: [], 
                bookingForm: {
                    name: "",
                    email: "",
                    whatsapp: "",
                    date: ""
                },
                
                openModal(item) {
                    this.selectedMainPackage = item;
                    this.additionalPackages = [];
                    this.isModalOpen = true;
                    document.body.style.overflow = "hidden"; 
                },
                
                closeModal() {
                    this.isModalOpen = false;
                    document.body.style.overflow = "";
                },

                toggleAdditionalPackage(packageTitle) {
                    if (this.additionalPackages.includes(packageTitle)) {
                        this.additionalPackages = this.additionalPackages.filter(p => p !== packageTitle);
                    } else {
                        this.additionalPackages.push(packageTitle);
                    }
                },

                submitWhatsApp() {
                    const phone = "+97338404239"; // Replace with actual admin number
                    const mainPkg = this.selectedMainPackage ? this.selectedMainPackage.title : "None";
                    const others = this.additionalPackages.length > 0 ? this.additionalPackages.join(", ") : "-";
                    
                    const message = `Hello, I would like to book a tour!
                    
Name: ${this.bookingForm.name}
Email: ${this.bookingForm.email}
WhatsApp: ${this.bookingForm.whatsapp}
Preferred Date: ${this.bookingForm.date}

Main Package: *${mainPkg}*
Additional Packages: ${others}

Please confirm availability. Thank you!`;

                    const url = `https://wa.me/${phone}?text=${encodeURIComponent(message)}`;
                    window.open(url, "_blank");
                },

                submitEmail() {
                    const to = "marketing@inovasisoftware.tech"; // Replace with actual email
                    const mainPkg = this.selectedMainPackage ? this.selectedMainPackage.title : "None";
                    const others = this.additionalPackages.length > 0 ? this.additionalPackages.join(", ") : "-";
                    const price = this.selectedMainPackage ? this.selectedMainPackage.price : "-";
                    
                    const subject = `Tour Booking Request - ${this.bookingForm.name}`;
                    const body = `Hello, I would like to book a tour!
                    
Name: ${this.bookingForm.name}
Email: ${this.bookingForm.email}
WhatsApp: ${this.bookingForm.whatsapp}
Preferred Date: ${this.bookingForm.date}

Main Package: ${mainPkg}
Total Price: ${price}
Additional Packages: ${others}

Please confirm availability.`;

                    const url = `mailto:${to}?subject=${encodeURIComponent(subject)}&body=${encodeURIComponent(body)}`;
                    window.location.href = url;
                },

                get visibleTourSlides() {
                    if (window.innerWidth >= 1024) return 4;
                    return 2;
                },
                get maxTourSlide() {
                    return Math.max(0, this.tourItems.length - this.visibleTourSlides);
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
                },
                
                parsePrice(priceStr) {
                    if (!priceStr) return 0;

            return parseInt(priceStr.replace(/[^0-9]/g, "" )) || 0;
            },

            formatPrice(amount) {
            return "Rp " + amount.toLocaleString("id-ID");
            },

            get totalPriceDisplay() {
            if (!this.selectedMainPackage) return "-" ;

            let total=this.parsePrice(this.selectedMainPackage.price);

            // Add additional packages
            this.additionalPackages.forEach(title=> {
            const pkg = this.tourItems.find(p => p.title === title);
            if (pkg) {
            total += this.parsePrice(pkg.price);
            }
            });

            return this.formatPrice(total);
            }
            }' @resize.window="activeTourSlide = 0">

            <h2 class="section-title">Sabah Tour Package</h2>

            <!-- Slider Container -->
            <div class="tour-slider-container">
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
                                            <!-- BOOK NOW BUTTON -->
                                            <button class="btn-book-now" @click.stop="openModal(item)">
                                                Book Now
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </template>
                    </div>
                </div>
            </div>

            <!-- Dots -->
            <div class="tour-dots mt-custom">
                <template x-for="i in Math.ceil(tourItems.length / visibleTourSlides)">
                    <span class="dot"
                        :class="{ 'active': Math.floor(activeTourSlide / visibleTourSlides) === i - 1 }"
                        @click="activeTourSlide = (i - 1) * visibleTourSlides">
                    </span>
                </template>
            </div>

            <!-- ================= BOOKING MODAL ================= -->
            <div x-show="isModalOpen"
                x-transition.opacity
                x-cloak
                class="booking-modal-overlay"
                @click="closeModal()">

                <div class="booking-modal" @click.stop>

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h3 class="modal-title">Complete Your Booking</h3>
                        <button class="close-modal-btn" @click="closeModal()"><i class="ri-close-line"></i></button>
                    </div>

                    <!-- Modal Body -->
                    <div class="modal-body">

                        <!-- Selected Package Summary -->
                        <template x-if="selectedMainPackage">
                            <div class="selected-package-display">
                                <img :src="selectedMainPackage.img" class="selected-package-img">
                                <div>
                                    <div style="font-size: 10px; color: #9ca3af; text-transform: uppercase; letter-spacing: 1px;">Selected Package</div>
                                    <div style="font-size: 16px; font-weight: bold; color: white;" x-text="selectedMainPackage.title"></div>
                                    <div style="font-size: 14px; color: var(--gold);" x-text="selectedMainPackage.price"></div>
                                </div>
                            </div>
                        </template>

                        <!-- Additional Packages (Optional) -->
                        <div class="form-section-title">
                            <span>Add Other Packages (Optional)</span>
                        </div>
                        <div class="additional-packages-grid">
                            <template x-for="pkg in tourItems" :key="pkg.title">
                                <div class="checkbox-wrapper" x-show="pkg.title !== (selectedMainPackage?.title)" @click="toggleAdditionalPackage(pkg.title)">
                                    <input type="checkbox" :checked="additionalPackages.includes(pkg.title)">
                                    <span style="font-size: 12px; color: #ccc;" x-text="pkg.title"></span>
                                </div>
                            </template>
                        </div>

                        <!-- User Data Form -->
                        <div class="form-section-title">
                            <span>Your Details</span>
                        </div>

                        <form @submit.prevent>
                            <div class="form-group">
                                <label class="form-label">Full Name</label>
                                <input type="text" class="form-input" x-model="bookingForm.name" placeholder="Enter your full name">
                            </div>

                            <div class="form-group" style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px;">
                                <div>
                                    <label class="form-label">Email Address</label>
                                    <input type="email" class="form-input" x-model="bookingForm.email" placeholder="example@mail.com">
                                </div>
                                <div>
                                    <label class="form-label">WhatsApp Number</label>
                                    <input type="tel" class="form-input" x-model="bookingForm.whatsapp" placeholder="+62 812 345 678">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Preferred Tour Date</label>
                                <input type="date" class="form-input" x-model="bookingForm.date">
                            </div>

                            <div class="form-group">
                                <label class="form-label">Total Price (Main Package)</label>
                                <input type="text" class="form-input" :value="totalPriceDisplay" readonly style="background: rgba(255, 255, 255, 0.1); cursor: not-allowed; color: var(--gold); font-weight: bold;">
                            </div>
                        </form>

                    </div>

                    <!-- Modal Footer (Actions) -->
                    <div class="modal-footer">
                        <button class="btn-action btn-email" @click="submitEmail()">
                            <i class="ri-mail-send-line"></i> Submit via Email
                        </button>
                        <button class="btn-action btn-whatsapp" @click="submitWhatsApp()">
                            <i class="ri-whatsapp-line"></i> Submit via WhatsApp
                        </button>
                    </div>

                </div>
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
                        The best experience of my life! Climbing Mount Kinabalu was tough but the view from the top was worth every step. The guides were amazing.
                    </p>
                    <span class="quote-icon right-quote">”</span>
                </div>

                <div class="testimony-author">- Sarah L. -</div>
            </div>
        </section>


</x-layout>