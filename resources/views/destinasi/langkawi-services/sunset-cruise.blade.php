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
                </div>
                <div class="product-content">
                    <h3 class="product-title">{{ $product['title'] }}</h3>
                    <p class="product-description">{{ $product['description'] }}</p>

                    <div class="product-footer">
                        <div>
                            <span class="price-label">Starts from</span>
                            <div class="product-price">{{ $product['price'] }}</div>
                        </div>
                        <a href="https://wa.me/60123456789?text=I%20am%20interested%20in%20booking%20{{ urlencode($product['title']) }}" target="_blank" class="book-btn">
                            BOOK NOW <i class="ri-arrow-right-line"></i>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>

    <!-- Footer copied/included from main layout if possible, otherwise simple spacing -->
    <div style="height: 50px;"></div>

</x-layout>