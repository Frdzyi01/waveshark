<x-layout title="Island Hopping | Langkawi Services"
    description="Experience the best island hopping services in Langkawi with Waveshark. Fast, reliable, and affordable transportation from Langkawi to your destination."
    keywords="Island Hopping, Langkawi, Waveshark, Transportation, Travel">
    <!-- Navbar -->
    <x-header />

    <!-- Remix Icon -->
    <!-- Remix Icon (Non-blocking) -->
    <link rel="preload" as="style" href="https://cdn.jsdelivr.net/npm/remixicon@3.4.0/fonts/remixicon.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.4.0/fonts/remixicon.css" rel="stylesheet" media="print" onload="this.media='all'">
    <noscript><link href="https://cdn.jsdelivr.net/npm/remixicon@3.4.0/fonts/remixicon.css" rel="stylesheet"></noscript>

    @push("styles")
    @vite("resources/css/service.css")
    @endpush

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
                    <button class="close-modal-btn" aria-label="Close modal" @click="closeModal()"><i class="ri-close-line"></i></button>
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

                    let url = `mailto:wavesharktravel@gmail.com?subject=${encodeURIComponent(subject)}&body=${encodeURIComponent(body)}`;
                    window.location.href = url;
                }
            }
        }
    </script>

</x-layout>