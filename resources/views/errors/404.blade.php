<x-layout title="404 - Page Not Found" description="The page you are looking for could not be found.">
    <x-header />

    <div class="min-h-screen flex flex-col items-center justify-center text-center bg-black px-4" style="background-image: url('{{ asset('images/sunset.webp') }}'); background-size: cover; background-position: center; position: relative;">
        <!-- Overlay -->
        <div class="absolute inset-0 bg-black/80"></div>

        <div class="relative z-10">
            <h1 class="text-8xl md:text-9xl font-serif text-gold-500 font-bold mb-4 drop-shadow-lg">404</h1>
            <p class="text-2xl md:text-3xl text-white mb-8 font-light">Oops! The page you are looking for has drifted away.</p>

            <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                <a href="{{ url('/') }}" class="px-8 py-3 bg-gold-500 text-black hover:bg-gold-400 transition-colors uppercase tracking-widest text-sm font-bold">Return Home</a>
            </div>

            <p class="text-gray-400 mt-8 mb-4 uppercase tracking-widest text-xs">Or Explore Our Destinations</p>

            <div class="flex flex-col sm:flex-row gap-4 justify-center items-center text-sm">
                <a href="{{ url('/langkawi') }}" class="text-white hover:text-gold-500 transition-colors uppercase tracking-wider relative group">
                    Malaysia (Langkawi)
                    <span class="absolute -bottom-1 left-0 w-0 h-[1px] bg-gold-500 transition-all duration-300 group-hover:w-full"></span>
                </a>
                <span class="hidden sm:inline text-gray-600">|</span>
                <a href="{{ url('/sabah') }}" class="text-white hover:text-gold-500 transition-colors uppercase tracking-wider relative group">
                    Malaysia (Sabah)
                    <span class="absolute -bottom-1 left-0 w-0 h-[1px] bg-gold-500 transition-all duration-300 group-hover:w-full"></span>
                </a>
                <span class="hidden sm:inline text-gray-600">|</span>
                <a href="{{ url('/') }}" class="text-white hover:text-gold-500 transition-colors uppercase tracking-wider relative group">
                    Singapore
                    <span class="absolute -bottom-1 left-0 w-0 h-[1px] bg-gold-500 transition-all duration-300 group-hover:w-full"></span>
                </a>
            </div>
        </div>
    </div>
</x-layout>