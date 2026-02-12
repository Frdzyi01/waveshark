<x-layout title="Island Hopping | Langkawi Services"
    description="Experience the best island hopping services in Langkawi with Waveshark. Fast, reliable, and affordable transportation from Langkawi to your destination."
    keywords="Island Hopping, Langkawi, Waveshark, Transportation, Travel">
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
            --gold-hover: #b39030;
            --dark-bg: #0a0a0a;
            --card-bg: #141414;
            --text-light: #94a3b8;
        }

        body {
            background-color: var(--dark-bg);
            color: var(--white);
            font-family: "Poppins", sans-serif;
        }

        /* HERO SECTION */
        .service-hero {
            position: relative;
            width: 100%;
            height: 60vh;
            min-height: 400px;
            display: flex;
            align-items: center;
            justify-content: center;
            background-image: url('{{ $data['hero_image'] }}');
            background-size: cover;
            background-position: center;
            padding-top: 80px;
            /* Space for navbar */
        }

        .service-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to bottom, rgba(0, 0, 0, 0.3) 0%, rgba(0, 0, 0, 0.6) 60%, var(--dark-bg) 100%);
        }

        .service-hero-content {
            position: relative;
            z-index: 10;
            text-align: center;
            padding: 0 20px;
            max-width: 800px;
        }

        .service-title {
            font-size: 3.5rem;
            font-weight: 800;
            color: var(--gold);
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 20px;
            text-shadow: 0 4px 20px rgba(0, 0, 0, 0.8);
        }

        .service-desc {
            font-size: 1.1rem;
            color: #ccc;
            line-height: 1.6;
            max-width: 600px;
            margin: 0 auto;
        }

        /* PRODUCTS SECTION */
        .products-section {
            padding: 80px 20px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 30px;
        }

        /* PRODUCT CARD - PREMIUM DESIGN */
        .product-card {
            background: var(--card-bg);
            border: 1px solid rgba(212, 175, 55, 0.1);
            border-radius: 16px;
            overflow: hidden;
            transition: all 0.3s ease;
            position: relative;
            display: flex;
            flex-direction: column;
        }

        .product-card:hover {
            transform: translateY(-10px);
            border-color: var(--gold);
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.5);
        }

        .product-img-wrapper {
            position: relative;
            height: 220px;
            overflow: hidden;
        }

        .product-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .product-card:hover .product-img {
            transform: scale(1.1);
        }

        .product-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.7), transparent);
        }

        .product-content {
            padding: 25px;
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .product-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--white);
            margin-bottom: 10px;
        }

        .product-description {
            font-size: 0.9rem;
            color: var(--text-light);
            line-height: 1.5;
            margin-bottom: 20px;
            flex-grow: 1;
        }

        .product-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: auto;
            border-top: 1px solid rgba(255, 255, 255, 0.05);
            padding-top: 20px;
        }

        .price-label {
            font-size: 0.75rem;
            color: var(--text-light);
            text-transform: uppercase;
            letter-spacing: 1px;
            display: block;
            margin-bottom: 2px;
        }

        .product-price {
            font-size: 1.2rem;
            font-weight: 700;
            color: var(--gold);
        }

        .book-btn {
            background: var(--gold);
            color: black;
            font-weight: 700;
            padding: 10px 24px;
            border-radius: 50px;
            text-decoration: none;
            transition: 0.3s;
            font-size: 0.9rem;
            letter-spacing: 0.5px;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .book-btn:hover {
            background: var(--white);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(212, 175, 55, 0.3);
        }

        /* RESPONSIVE */
        @media (max-width: 768px) {
            .service-title {
                font-size: 2.2rem;
            }

            .products-grid {
                grid-template-columns: 1fr;
            }

            .service-hero {
                height: 50vh;
            }
        }
    </style>

    <div x-data='bookingSystem(@json($data["products"]))' class="relative">
        <div class="service-hero">
            <div class="service-overlay"></div>
            <div class="service-hero-content">
                <h1 class="service-title">{{ $data['title'] }}</h1>
                <p class="service-desc">{{ $data['description'] }}</p>
            </div>
        </div>

        <section class="products-section">
            <div class="products-grid">
                @foreach($data['products'] as $product)
                <div class="product-card">
                    <div class="product-img-wrapper">
                        <img src="{{ $product['image'] }}" alt="{{ $product['title'] }}" class="product-img">
                        <div class="product-overlay"></div>
                        @if(isset($product['status']) && $product['status'] === 'sold_out')
                        <div style="position: absolute; top: 15px; right: 15px; background: #dc2626; color: white; font-size: 11px; font-weight: 700; padding: 5px 12px; border-radius: 20px; z-index: 20;">
                            SOLD OUT
                        </div>
                        @endif
                    </div>
                    <div class="product-content">
                        <h3 class="product-title">{{ $product['title'] }}</h3>
                        <p class="product-description">{{ $product['description'] }}</p>

                        <div class="product-footer">
                            <div>
                                <span class="price-label">Starts from</span>
                                <div class="product-price">{{ $product['price'] }}</div>
                            </div>
                            @if(isset($product['status']) && $product['status'] === 'sold_out')
                            <button class="book-btn" style="background: #333; cursor: not-allowed; opacity: 0.7;" disabled>
                                SOLD OUT
                            </button>
                            @else
                            <button @click="openModal('{{ $product['title'] }}')" class="book-btn">
                                BOOK NOW <i class="ri-arrow-right-line"></i>
                            </button>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </section>

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
                            <img :src="selectedMainPackage.image" class="selected-package-img">
                            <div>
                                <div style="font-size: 10px; color: #9ca3af; text-transform: uppercase; letter-spacing: 1px;">Selected Package</div>
                                <div style="font-size: 16px; font-weight: bold; color: white;" x-text="selectedMainPackage.title"></div>
                                <div style="font-size: 14px; color: var(--gold);" x-text="selectedMainPackage.price"></div>
                            </div>
                        </div>
                    </template>

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
                                <input type="tel" class="form-input" x-model="bookingForm.whatsapp" placeholder="+60 12 345 6789">
                            </div>
                        </div>

                        <div class="form-group" style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px;">
                            <div>
                                <label class="form-label">Tour Date</label>
                                <input type="date" class="form-input" x-model="bookingForm.date">
                            </div>
                            <div>
                                <label class="form-label">No. of Pax</label>
                                <input type="number" min="1" class="form-input" x-model="bookingForm.pax" placeholder="e.g. 2">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Price (Per Pax/Unit)</label>
                            <input type="text" class="form-input" :value="selectedMainPackage ? selectedMainPackage.price : ''" readonly style="background: rgba(255,255,255,0.05); color: #9ca3af; cursor: not-allowed;">
                        </div>
                    </form>

                </div>

                <!-- Modal Footer (Actions) -->
                <div class="modal-footer" style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px;">
                    <button class="btn-action btn-whatsapp" @click="submitWhatsApp()">
                        <i class="ri-whatsapp-line"></i> WhatsApp
                    </button>
                    <button class="btn-action btn-email" @click="submitEmail()">
                        <i class="ri-mail-line"></i> Email
                    </button>
                </div>

            </div>
        </div>
    </div>

    <!-- Footer copied/included from main layout if possible, otherwise simple spacing -->
    <div style="height: 50px;"></div>

    <script>
        function bookingSystem(products) {
            return {
                isModalOpen: false,
                tourItems: products,
                selectedMainPackage: null,
                bookingForm: {
                    name: '',
                    email: '',
                    whatsapp: '',
                    date: '',
                    pax: ''
                },

                openModal(packageName) {
                    this.selectedMainPackage = this.tourItems.find(p => p.title === packageName);
                    this.isModalOpen = true;
                    document.body.style.overflow = 'hidden'; // Prevent background scrolling
                },

                closeModal() {
                    this.isModalOpen = false;
                    document.body.style.overflow = 'auto';
                },

                submitWhatsApp() {
                    if (!this.bookingForm.name || !this.bookingForm.date) {
                        alert('Please fill in your Name and Date');
                        return;
                    }

                    let message = `*New Booking Request*\n\n`;
                    message += `*Package:* ${this.selectedMainPackage.title}\n`;
                    message += `*Price:* ${this.selectedMainPackage.price}\n\n`;
                    message += `*Customer Details:*\n`;
                    message += `Name: ${this.bookingForm.name}\n`;
                    message += `Email: ${this.bookingForm.email}\n`;
                    message += `WhatsApp: ${this.bookingForm.whatsapp}\n`;
                    message += `Date: ${this.bookingForm.date}\n`;
                    message += `Pax: ${this.bookingForm.pax}\n`;

                    let url = `https://wa.me/60123456789?text=${encodeURIComponent(message)}`;
                    window.open(url, '_blank');
                },

                submitEmail() {
                    if (!this.bookingForm.name || !this.bookingForm.date) {
                        alert('Please fill in your Name and Date');
                        return;
                    }

                    let subject = `Booking Request: ${this.selectedMainPackage.title}`;
                    let body = `New Booking Request\n\n`;
                    body += `Package: ${this.selectedMainPackage.title}\n`;
                    body += `Price: ${this.selectedMainPackage.price}\n\n`;
                    body += `Customer Details:\n`;
                    body += `Name: ${this.bookingForm.name}\n`;
                    body += `Email: ${this.bookingForm.email}\n`;
                    body += `WhatsApp: ${this.bookingForm.whatsapp}\n`;
                    body += `Date: ${this.bookingForm.date}\n`;
                    body += `Pax: ${this.bookingForm.pax}\n`;

                    let url = `mailto:admin@wavesharktravel.com?subject=${encodeURIComponent(subject)}&body=${encodeURIComponent(body)}`;
                    window.location.href = url;
                }
            }
        }
    </script>

    <style>
        [x-cloak] {
            display: none !important;
        }

        .booking-modal-overlay {
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.85);
            backdrop-filter: blur(8px);
            z-index: 100;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .booking-modal {
            background: #1a1a1a;
            border: 1px solid rgba(212, 175, 55, 0.2);
            width: 100%;
            max-width: 500px;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
        }

        .modal-header {
            padding: 20px 25px;
            background: rgba(255, 255, 255, 0.03);
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .modal-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: white;
            margin: 0;
        }

        .close-modal-btn {
            background: transparent;
            border: none;
            color: #9ca3af;
            font-size: 1.5rem;
            cursor: pointer;
            transition: color 0.3s;
        }

        .close-modal-btn:hover {
            color: white;
        }

        .modal-body {
            padding: 25px;
            max-height: 70vh;
            overflow-y: auto;
        }

        .selected-package-display {
            background: rgba(212, 175, 55, 0.1);
            border: 1px solid rgba(212, 175, 55, 0.2);
            border-radius: 12px;
            padding: 15px;
            display: flex;
            gap: 15px;
            align-items: center;
            margin-bottom: 25px;
        }

        .selected-package-img {
            width: 60px;
            height: 60px;
            border-radius: 8px;
            object-fit: cover;
        }

        .form-section-title {
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #9ca3af;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .form-section-title::after {
            content: '';
            flex: 1;
            height: 1px;
            background: rgba(255, 255, 255, 0.1);
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-label {
            display: block;
            margin-bottom: 6px;
            font-size: 0.9rem;
            color: #e5e7eb;
        }

        .form-input {
            width: 100%;
            background: rgba(0, 0, 0, 0.3);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 8px;
            padding: 10px 15px;
            color: white;
            font-size: 0.95rem;
            transition: all 0.3s;
        }

        .form-input:focus {
            outline: none;
            border-color: var(--gold);
            background: rgba(0, 0, 0, 0.5);
        }

        .modal-footer {
            padding: 20px 25px;
            background: rgba(0, 0, 0, 0.2);
            border-top: 1px solid rgba(255, 255, 255, 0.05);
        }

        .btn-action {
            width: 100%;
            padding: 12px;
            border-radius: 10px;
            border: none;
            font-weight: 600;
            cursor: pointer;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 8px;
            transition: transform 0.2s;
        }

        .btn-whatsapp {
            background: #25D366;
            color: white;
        }

        .btn-whatsapp:hover {
            opacity: 0.9;
            transform: translateY(-2px);
        }

        .btn-email {
            background: #3b82f6;
            color: white;
        }

        .btn-email:hover {
            opacity: 0.9;
            transform: translateY(-2px);
        }
    </style>
</x-layout>