<header
    x-data="{ scrolled: false }"
    @scroll.window="scrolled = (window.pageYOffset > 50)"
    :class="{ 'bg-black/50 backdrop-blur-md': scrolled, 'bg-transparent': !scrolled }"
    class="fixed top-0 w-full z-50 transition-all duration-300 border-b border-transparent"
    :class="{ 'border-white/10': scrolled }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-20">
            <!-- Left: Logo & Brand -->
            <div class="flex-shrink-0 flex items-center gap-3">
                <a href="{{('/')}}">
                    <img class="h-10 w-auto" src="{{ asset('images/logo-waveshart-removebg.png') }}" alt="Waveshark">
                </a>
                <a class="font-serif text-xl text-white tracking-widest uppercase" href="{{('/')}}">Waveshark Ventures</a>
            </div>

            <!-- Right: Navigation -->
            <div class="hidden md:block">
                <div class="ml-10 flex items-baseline space-x-8">
                    <a href="{{('/')}}" class="text-white hover:text-gold-400 px-3 py-2 rounded-md text-sm font-medium transition-colors uppercase tracking-wider">Home</a>
                    <a href="{{('/#about')}}" class="text-white hover:text-gold-400 px-3 py-2 rounded-md text-sm font-medium transition-colors uppercase tracking-wider">About Us</a>
                    <a href="{{('/#contact')}}" class="text-white hover:text-gold-400 px-3 py-2 rounded-md text-sm font-medium transition-colors uppercase tracking-wider">Contact</a>

                    <span class="text-white/50">|</span>

                    <button class="text-gold-400 hover:text-gold-300 text-sm font-bold">EN</button>
                    <button class="text-white hover:text-white/80 text-sm">GB</button>
                </div>
            </div>

            <!-- Mobile menu button -->
            <div class="-mr-2 flex md:hidden">
                <button type="button" class="bg-gray-900 inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-800 focus:outline-none">
                    <span class="sr-only">Open main menu</span>
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
</header>