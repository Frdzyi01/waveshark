<x-layout>
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
                    name: 'Perhentian Islands',
                    description: 'A tropical paradise with crystal clear waters, perfect for snorkeling and diving.',
                    image: '{{ asset('images/pangkalan-islands.jpg') }}',
                    thumbnail: '{{ asset('images/pangkalan-islands.jpg') }}'
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
        class="relative min-h-screen bg-black overflow-hidden">

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
        <div class="relative h-screen w-full flex flex-col md:flex-row transition-all duration-1000 ease-in-out">

            <!-- LEFT (SINGAPORE) -->
            <div
                class="relative h-1/2 md:h-full transition-all duration-1000 ease-[cubic-bezier(0.22,1,0.36,1)] overflow-hidden cursor-pointer group transform-gpu"
                style="will-change: width, opacity;"
                :class="{
                    'md:w-full h-full z-20': expanded === 'singapore',
                    'md:w-0 h-0 opacity-0': expanded === 'malaysia',
                    'md:w-1/2': !expanded
                }"
                @mouseenter="!expanded && (hovered = 'singapore')"
                @mouseleave="!expanded && (hovered = null)"
                @click="!expanded && select('singapore')">
                <!-- Background Image -->
                <div
                    class="absolute inset-0 bg-cover bg-center transition-transform duration-700 ease-out"
                    :style="`
                    background-image: url('{{ asset('images/laut-singapore2.jpg') }}');
                    transform: ${
                    !expanded && hovered === 'singapore'
                        ? 'scale(1.1)'
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
                        hovered === 'singapore' ? 'translate-y-0 scale-110' : 'translate-y-4 shadow-black',
                        expanded ? 'opacity-0 translate-y-20' : 'opacity-100'
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

                    <div class="max-w-7xl mx-auto px-6 py-24 min-h-screen flex flex-col justify-center">
                        <div class="space-y-12">
                            <div class="border-l-4 border-gold-500 pl-8">
                                <h3 class="text-gold-500 uppercase tracking-widest mb-2">Selected Region</h3>
                                <h1 class="text-6xl md:text-8xl font-serif font-bold leading-none mb-6 text-white">Singapore</h1>
                                <p class="text-xl text-gray-300 max-w-2xl leading-relaxed">
                                    A global financial hub and a melting pot of cultures. Explore our ventures in the heart of Southeast Asia's innovation center.
                                </p>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 pt-12">
                                <div class="bg-gray-900/80 p-8 hover:bg-gray-800 transition-colors border border-gray-800 hover:border-gold-500/30 group rounded-xl backdrop-blur-md">
                                    <div class="h-12 w-12 bg-gold-500/10 rounded-full flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                                        <svg class="w-6 h-6 text-gold-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                                        </svg>
                                    </div>
                                    <h4 class="text-xl font-bold mb-3 text-white">Fintech Growth</h4>
                                    <p class="text-gray-400">Driving digital adoption in banking and finance sectors across the island.</p>
                                </div>
                                <div class="bg-gray-900/80 p-8 hover:bg-gray-800 transition-colors border border-gray-800 hover:border-gold-500/30 group rounded-xl backdrop-blur-md">
                                    <div class="h-12 w-12 bg-gold-500/10 rounded-full flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                                        <svg class="w-6 h-6 text-gold-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                        </svg>
                                    </div>
                                    <h4 class="text-xl font-bold mb-3 text-white">Urban Solutions</h4>
                                    <p class="text-gray-400">Sustainable investments in smart city technologies and green energy.</p>
                                </div>
                                <div class="bg-gray-900/80 p-8 hover:bg-gray-800 transition-colors border border-gray-800 hover:border-gold-500/30 group rounded-xl backdrop-blur-md">
                                    <div class="h-12 w-12 bg-gold-500/10 rounded-full flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                                        <svg class="w-6 h-6 text-gold-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                    </div>
                                    <h4 class="text-xl font-bold mb-3 text-white">Capital Markets</h4>
                                    <p class="text-gray-400">Strategic partnerships with leading venture firms in the marina bay district.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- RIGHT (MALAYSIA) -->
            <div
                id="malaysia-card"
                class="relative h-1/2 md:h-full transition-all duration-1000 ease-[cubic-bezier(0.22,1,0.36,1)] overflow-hidden cursor-pointer group transform-gpu"
                style="will-change: width, opacity;"
                :class="{ 
                    'md:w-full h-full z-20': expanded === 'malaysia', 
                    'md:w-0 h-0 opacity-0': expanded === 'singapore', 
                    'md:w-1/2': !expanded 
                }"
                @mouseenter="!expanded && (hovered = 'malaysia')"
                @mouseleave="!expanded && (hovered = null)"
                @click="!expanded && select('malaysia')">

                <!-- Background Image (Dynamic) -->
                <div
                    class="absolute inset-0 bg-cover bg-center transition-all duration-1000 ease-out"
                    :style="`
                        background-image: url('${expanded === 'malaysia' ? malaysiaDestinations[activeDestination].image : '{{ asset('images/laut-malay.jpg') }}'}');
                        transform: ${
                            !expanded && hovered === 'malaysia'
                                ? 'scale(1.1)'
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
                        hovered === 'malaysia' ? 'translate-y-0 scale-110' : 'translate-y-4',
                        expanded ? 'opacity-0 translate-y-20' : 'opacity-100'
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
                                    <button class="mys-btn">See More</button>
                                </div>
                            </div>

                            <!-- Item 2: Pangkalan Islands -->
                            <div class="mys-item" style="background-image: url('{{ asset('template-slider-malaysia/image/pangkalan-islands.jpg') }}');">
                                <div class="mys-content">
                                    <div class="mys-name">Pangkalan Islands</div>
                                    <div class="mys-des">
                                        Gugusan pulau yang indah dengan air jernih dan pemandangan laut yang memukau.
                                    </div>
                                    <button class="mys-btn">See More</button>
                                </div>
                            </div>

                            <!-- Item 3: Sabah -->
                            <div class="mys-item" style="background-image: url('{{ asset('template-slider-malaysia/image/sabah.jpg') }}');">
                                <div class="mys-content">
                                    <div class="mys-name">Sabah</div>
                                    <div class="mys-des">
                                        Negeri di Bawah Bayu, rumah bagi Gunung Kinabalu dan hidupan liar yang unik.
                                    </div>
                                    <button class="mys-btn">See More</button>
                                </div>
                            </div>

                            <!-- Item 4: Langkawi (Repeat for loop) -->
                            <div class="mys-item" style="background-image: url('{{ asset('template-slider-malaysia/image/langkawi.jpg') }}');">
                                <div class="mys-content">
                                    <div class="mys-name">Langkawi</div>
                                    <div class="mys-des">
                                        Destinasi pelancongan utama dengan legenda Mahsuri dan keindahan alam semulajadi.
                                    </div>
                                    <button class="mys-btn">See More</button>
                                </div>
                            </div>

                            <!-- Item 5: Pangkalan Islands (Repeat) -->
                            <div class="mys-item" style="background-image: url('{{ asset('template-slider-malaysia/image/pangkalan-islands.jpg') }}');">
                                <div class="mys-content">
                                    <div class="mys-name">Pangkalan Islands</div>
                                    <div class="mys-des">
                                        Syurga tersembunyi bagi pencinta alam dan aktiviti air.
                                    </div>
                                    <button class="mys-btn">See More</button>
                                </div>
                            </div>

                            <!-- Item 6: Sabah (Repeat) -->
                            <div class="mys-item" style="background-image: url('{{ asset('template-slider-malaysia/image/sabah.jpg') }}');">
                                <div class="mys-content">
                                    <div class="mys-name">Sabah</div>
                                    <div class="mys-des">
                                        Terkenal dengan tapak menyelam bertaraf dunia di Sipadan dan budaya yang kaya.
                                    </div>
                                    <button class="mys-btn">See More</button>
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
                animation: mys-animate 1s ease-in-out 1 forwards;
                text-shadow: 0 5px 15px rgba(0, 0, 0, 0.5);
                font-family: 'Playfair Display', serif;
            }

            .mys-content .mys-des {
                margin-top: 10px;
                margin-bottom: 20px;
                font-size: 18px;
                opacity: 0;
                animation: mys-animate 1s ease-in-out 0.3s 1 forwards;
                text-shadow: 0 2px 5px rgba(0, 0, 0, 0.5);
            }

            .mys-content .mys-btn {
                padding: 12px 30px;
                border: none;
                cursor: pointer;
                opacity: 0;
                animation: mys-animate 1s ease-in-out 0.6s 1 forwards;
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
                    transform: translate(0, 50px);
                    filter: blur(10px);
                }

                to {
                    opacity: 1;
                    transform: translate(0);
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

        <script>
            document.addEventListener('DOMContentLoaded', () => {
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
            });
        </script>
</x-layout>