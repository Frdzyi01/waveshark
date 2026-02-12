<header
    x-data="{ scrolled: false, mobileMenuOpen: false }"
    @scroll.window="scrolled = (window.pageYOffset > 50)"
    :class="{ 'bg-black/50 backdrop-blur-md': scrolled, 'bg-transparent': !scrolled, 'bg-black': mobileMenuOpen }"
    class="fixed top-0 w-full z-50 transition-all duration-300 border-b border-transparent"
    :class="{ 'border-white/10': scrolled }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-20">
            <!-- Left: Logo & Brand -->
            <div class="flex-shrink-0 flex items-center gap-3">
                <a href="{{ url('/') }}">
                    <img class="h-10 w-auto" src="{{ asset('images/logo-waveshart-removebg.png') }}" alt="Waveshark">
                </a>
                <a class="font-serif text-xl text-white tracking-widest uppercase" href="{{ url('/') }}">Waveshark Ventures</a>
            </div>

            <!-- Right: Navigation -->
            <div class="hidden md:block">
                <div class="ml-10 flex items-baseline space-x-8">
                    <a href="{{ url('/') }}" class="text-white hover:text-gold-400 px-3 py-2 rounded-md text-sm font-medium transition-colors uppercase tracking-wider">Home</a>
                    <a href="{{ url('/#about') }}" class="text-white hover:text-gold-400 px-3 py-2 rounded-md text-sm font-medium transition-colors uppercase tracking-wider">About Us</a>
                    <a href="{{ url('/contact') }}" class="text-white hover:text-gold-400 px-3 py-2 rounded-md text-sm font-medium transition-colors uppercase tracking-wider">Contact</a>

                    <span class="text-white/50">|</span>

                    <button class="text-gold-400 hover:text-gold-300 text-sm font-bold">EN</button> 
                    <button class="text-white hover:text-white/80 text-sm">GB</button>
                </div>
            </div>

            <!-- Mobile menu button -->
            <div class="-mr-2 flex md:hidden">
                <button @click="mobileMenuOpen = !mobileMenuOpen" type="button" class="bg-gray-900 inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-800 focus:outline-none">
                    <span class="sr-only">Open main menu</span>
                    <!-- Icon when menu is closed -->
                    <svg x-show="!mobileMenuOpen" class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <!-- Icon when menu is open -->
                    <svg x-show="mobileMenuOpen" class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="display: none;">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div x-show="mobileMenuOpen"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 -translate-y-2"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-2"
        class="md:hidden bg-black/95 backdrop-blur-xl border-b border-white/10">
        <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
            <a href="{{ url('/') }}" class="text-white hover:text-gold-400 block px-3 py-2 rounded-md text-base font-medium uppercase tracking-wider">Home</a>
            <a href="{{ url('/#about') }}" class="text-white hover:text-gold-400 block px-3 py-2 rounded-md text-base font-medium uppercase tracking-wider">About Us</a>
            <a href="{{ url('/contact') }}" class="text-white hover:text-gold-400 block px-3 py-2 rounded-md text-base font-medium uppercase tracking-wider">Contact</a>

            <div class="border-t border-white/10 mt-4 pt-4 flex items-center px-3 space-x-4">
                <button class="text-gold-400 hover:text-gold-300 text-sm font-bold">EN</button>
                <button class="text-white hover:text-white/80 text-sm" style="margin-left: 10px;">GB</button>
            </div>
        </div>
    </div>
</header>