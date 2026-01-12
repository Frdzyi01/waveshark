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
                    class="absolute inset-0 z-30 overflow-hidden backdrop-blur-sm">

                    <div class="h-full w-full flex flex-col md:flex-row">

                        <!-- LEFT SIDE: Info (40%) -->
                        <div class="w-full md:w-5/12 h-full flex flex-col justify-center px-12 md:pl-24 bg-gradient-to-r from-black/90 via-black/70 to-transparent">
                            <div class="space-y-6 max-w-lg">
                                <div class="flex items-center gap-3 text-gold-500 mb-2">
                                    <span class="uppercase tracking-widest text-sm">Destination</span>
                                    <div class="h-[1px] w-12 bg-gold-500/50"></div>
                                </div>

                                <h2 class="text-5xl md:text-7xl font-serif font-bold text-white leading-tight"
                                    x-text="malaysiaDestinations[activeDestination].name"
                                    x-transition:enter="transition ease-out duration-500"
                                    x-transition:enter-start="opacity-0 translate-y-4"
                                    x-transition:enter-end="opacity-100 translate-y-0"
                                    :key="activeDestination">
                                </h2>

                                <p class="text-lg text-gray-200 font-light leading-relaxed"
                                    x-text="malaysiaDestinations[activeDestination].description"
                                    x-transition:enter="transition ease-out duration-500 delay-100"
                                    x-transition:enter-start="opacity-0 translate-y-4"
                                    x-transition:enter-end="opacity-100 translate-y-0"
                                    :key="activeDestination">
                                </p>

                                <div class="pt-8">
                                    <button class="group px-8 py-3 bg-white text-black font-bold uppercase tracking-widest text-sm hover:bg-gold-400 transition-colors flex items-center gap-2">
                                        <span>Discover Now</span>
                                        <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- RIGHT SIDE: Carousel (60%) -->
                        <div class="w-full md:w-7/12 h-full flex items-center justify-end pr-0 md:pr-12 lg:pr-24 overflow-x-auto md:overflow-visible">
                            <div class="flex flex-row md:flex-col gap-6 p-6">
                                <template x-for="(dest, index) in malaysiaDestinations" :key="index">
                                    <div @click="setActive(index)"
                                        class="relative cursor-pointer transition-all duration-500 group"
                                        :class="activeDestination === index ? 'w-64 md:w-80 scale-105 opacity-100 translate-x-0' : 'w-48 md:w-60 opacity-50 hover:opacity-100 hover:scale-100 translate-x-4 md:translate-x-8'">

                                        <!-- Image Container -->
                                        <div class="aspect-[4/3] w-full overflow-hidden rounded-lg shadow-2xl border-2 transition-colors duration-500"
                                            :class="activeDestination === index ? 'border-gold-500' : 'border-transparent'">
                                            <img :src="dest.thumbnail" class="w-full h-full object-cover transform transition-transform duration-700 group-hover:scale-110" :alt="dest.name">
                                        </div>

                                        <!-- Label (Visible on inactive items too) -->
                                        <div class="absolute bottom-4 left-4 right-4">
                                            <h3 class="text-white font-bold text-lg shadow-black drop-shadow-md" x-text="dest.name"></h3>
                                        </div>
                                    </div>
                                </template>
                            </div>
                        </div>

                    </div>
                </div>


                <!-- CENTER LOGO (Absolute) -->
                <div
                    class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-30 transition-all duration-700 pointer-events-none"
                    :class="{ 'opacity-0 scale-50': expanded, 'opacity-100 scale-100': !expanded }">
                    <div class="relative">
                        <div class="absolute inset-0 bg-gold-500 blur-3xl opacity-20 animate-pulse-slow rounded-full"></div>
                        <img src="{{ asset('images/logo-waveshart-removebg.png') }}" class="h-32 w-auto drop-shadow-2xl relative z-10" alt="Center Logo">
                    </div>
                </div>

            </div>



        </div>
</x-layout>