<x-layout title="Contact Us | Waveshark Ventures"
    description="Get in touch with Waveshark Ventures for premium tours, jetski rentals, and custom travel experiences in Langkawi, Sabah, and beyond."
    keywords="contact waveshark, travel agency langkawi, luxury travel contact, customer support">

    <!-- Navbar -->
    <x-header />

    @push("styles")
    @vite("resources/css/contact.css")
    @endpush

    <div class="contact-page-wrapper">
        <!-- HERO -->
        <header class="contact-hero">
            <img src="{{ asset('images/langkawi.webp') }}" alt="Contact Hero" class="contact-hero-bg">
            <div class="contact-hero-content">
                <h1 class="contact-hero-title serif-font">Get In Touch</h1>
                <p class="contact-hero-subtitle">We create unforgettable journeys for you</p>
            </div>
        </header>

        <!-- CONTENT -->
        <section class="contact-content-section">
            <div class="custom-container">
                <div class="contact-grid">

                    <!-- LEFT COLUMN -->
                    <div class="contact-info-col">
                        <div class="info-header">
                            <h2 class="serif-font">Let's Connect</h2>
                            <div class="gold-divider"></div>
                        </div>
                        <p class="info-desc">
                            Ready to start your adventure? Contact our concierge team for personalized travel planning, booking inquiries, or partnership opportunities. We are available daily to assist you.
                        </p>

                        <div class="info-card">
                            <div class="info-icon">
                                <i class="ri-map-pin-line"></i>
                            </div>
                            <div class="info-text">
                                <h3>Headquarters</h3>
                                <p>Langkawi, Kedah</p>
                                <p>Malaysia</p>
                            </div>
                        </div>

                        <div class="info-card">
                            <div class="info-icon">
                                <i class="ri-phone-line"></i>
                            </div>
                            <div class="info-text">
                                <h3>Direct Line</h3>
                                <p class="highlight-text">+60 11-7187 1800</p>
                                <p class="sub-text">Available 9 AM - 6 PM Daily</p>
                            </div>
                        </div>

                        <div class="info-card">
                            <div class="info-icon">
                                <i class="ri-mail-line"></i>
                            </div>
                            <div class="info-text">
                                <h3>Email Us</h3>
                                <p>info@waveshark.com</p>
                                <p style="font-size: 12px; margin-top: 4px; color: #666;">We reply within 24 hours</p>
                            </div>
                        </div>
                    </div>

                    <!-- RIGHT COLUMN -->
                    <div class="contact-form-col">
                        <div class="contact-form-wrapper">
                            <form action="#" method="POST">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group-item">
                                        <label class="form-label">Your Name</label>
                                        <input type="text" id="contact-name" class="form-input" placeholder="John Doe">
                                    </div>
                                    <div class="form-group-item">
                                        <label class="form-label">Email Address</label>
                                        <input type="email" id="contact-email" class="form-input" placeholder="john@example.com">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Subject</label>
                                    <select class="form-select" id="contact-subject">
                                        <option>Booking Inquiry</option>
                                        <option>Partnership Opportunity</option>
                                        <option>Customer Support</option>
                                        <option>Other</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Message</label>
                                    <textarea rows="5" id="contact-message" class="form-textarea" placeholder="How can we help you?"></textarea>
                                </div>

                                <button type="button" class="submit-btn" onclick="sendToEmail()">
                                    Send Message
                                    <i class="ri-arrow-right-line"></i>
                                </button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <script>
            function sendToEmail() {
                const name = document.getElementById('contact-name').value;
                const email = document.getElementById('contact-email').value;
                const subject = document.getElementById('contact-subject').value;
                const message = document.getElementById('contact-message').value;

                if (!name || !email || !message) {
                    alert('Please fill in all required fields.');
                    return;
                }

                const body = `Name: ${name}\nEmail: ${email}\n\nMessage:\n${message}`;
                const mailtoUrl = `mailto:wavesharktravel@gmail.com?subject=${encodeURIComponent(subject)}&body=${encodeURIComponent(body)}`;

                window.location.href = mailtoUrl;
            }
        </script>

        <!-- MAP -->
        <!-- <section class="map-section">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15861.360206948179!2d99.78970026233051!3d6.349999748237294!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x304c78da69c4755d%3A0xe43971dbd7bd6dfe!2sLangkawi%2C%2007000%20Langkawi%2C%20Kedah%2C%20Malaysia!5e0!3m2!1sid!2sid!4v1769615796014!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </section> -->

        <!-- Remix Icon CDN -->
        <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    </div>

    <!-- REUSED GLOBAL FOOTER (but strictly styled override to prevent conflicts if needed) -->
    <footer style="background-color: #000; padding: 80px 0 40px; border-top: 1px solid rgba(255,255,255,0.1); font-family: 'Outfit', sans-serif;">
        <div style="max-width: 1200px; margin: 0 auto; padding: 0 20px;">
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 40px; margin-bottom: 60px;">
                <!-- Brand -->
                <div>
                    <h3 style="font-family: 'Playfair Display', serif; font-size: 28px; color: #d4af37; margin-bottom: 20px; font-weight: bold; margin-top: 0;">WaveShark</h3>
                    <p style="color: #999; font-size: 14px; line-height: 1.6; margin-bottom: 20px;">Explore the world with premium experiences. We bring you the best destinations with unforgettable memories.</p>
                    <div style="display: flex; gap: 15px;">
                        <a href="https://www.facebook.com/share/1a4ofAgRwv/" target="_blank" aria-label="Facebook" style="width: 40px; height: 40px; border-radius: 50%; border: 1px solid rgba(255,255,255,0.2); display: flex; align-items: center; justify-content: center; color: white; text-decoration: none; transition: 0.3s;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z" />
                            </svg>
                        </a>
                        <a href="https://www.instagram.com/wavesharkventures?igsh=d21zYW10cXp2M3l4" target="_blank" aria-label="Instagram" style="width: 40px; height: 40px; border-radius: 50%; border: 1px solid rgba(255,255,255,0.2); display: flex; align-items: center; justify-content: center; color: white; text-decoration: none; transition: 0.3s;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                            </svg>
                        </a>
                        <a href="https://tiktok.com/@wavesharkventures" target="_blank" aria-label="TikTok" style="width: 40px; height: 40px; border-radius: 50%; border: 1px solid rgba(255,255,255,0.2); display: flex; align-items: center; justify-content: center; color: white; text-decoration: none; transition: 0.3s;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 0 1-5.2 1.74 2.89 2.89 0 0 1 2.31-4.64 2.93 2.93 0 0 1 .88.13V9.4a6.84 6.84 0 0 0-1-.05A6.33 6.33 0 0 0 5 12.01a6.34 6.34 0 0 0 10.86 2.43 5.77 5.77 0 0 0 1.5-3.75V5.53A8.56 8.56 0 0 0 21.03 8.3v-4a4.48 4.48 0 0 1-1.44-1.61z" />
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Links -->
                <div>
                    <h4 style="color: white; font-size: 18px; margin-bottom: 25px; margin-top: 0;">Quick Links</h4>
                    <ul style="list-style: none; padding: 0; color: #999; font-size: 14px; line-height: 2;">
                        <li><a href="{{ url('/') }}" style="color: inherit; text-decoration: none;">Home</a></li>
                        <li><a href="{{ url('/#about') }}" style="color: inherit; text-decoration: none;">About Us</a></li>
                        <li><a href="{{ url('langkawi') }}" style="color: inherit; text-decoration: none;">Langkawi</a></li>
                        <li><a href="{{ url('sabah') }}" style="color: inherit; text-decoration: none;">Sabah</a></li>
                    </ul>
                </div>

                <!-- Destinations -->
                <div>
                    <h4 style="color: white; font-size: 18px; margin-bottom: 25px; margin-top: 0;">Top Destinations</h4>
                    <ul style="list-style: none; padding: 0; color: #999; font-size: 14px; line-height: 2;">
                        <li><a href="{{ url('langkawi') }}" style="color: inherit; text-decoration: none;">Langkawi, Malaysia</a></li>
                        <li><a href="#" style="color: inherit; text-decoration: none;">Singapore</a></li>
                        <li><a href="{{ url('sabah') }}" style="color: inherit; text-decoration: none;">Sabah, Malaysia</a></li>
                    </ul>
                </div>

                <!-- Newsletter -->
                <div>
                    <h4 style="color: white; font-size: 18px; margin-bottom: 25px; margin-top: 0;">Newsletter</h4>
                    <p style="color: #999; font-size: 14px; margin-bottom: 20px;">Subscribe to get the latest updates.</p>
                    <form action="#" onsubmit="event.preventDefault();" style="display: flex; gap: 10px;">
                        <input type="email" placeholder="Your Email" style="flex: 1; background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); padding: 12px; color: white; border-radius: 4px; outline: none;">
                        <button type="submit" style="background: #d4af37; color: black; border: none; padding: 12px 20px; font-weight: bold; cursor: pointer; border-radius: 4px;">Go</button>
                    </form>
                </div>
            </div>

            <div style="border-top: 1px solid rgba(255,255,255,0.1); padding-top: 30px; display: flex; justify-content: space-between; flex-wrap: wrap; gap: 20px; color: #666; font-size: 13px;">
                <p>&copy; 2026 WaveShark Ventures. All Rights Reserved.</p>
                <div style="display: flex; gap: 20px;">
                    <a href="#" style="color: inherit; text-decoration: none;">Privacy Policy</a>
                    <a href="#" style="color: inherit; text-decoration: none;">Terms of Service</a>
                </div>
            </div>
        </div>
    </footer>
</x-layout>