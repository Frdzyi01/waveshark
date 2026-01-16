<!-- Page Transition Overlay -->
<div id="page-transition" class="fixed inset-0 z-[100] pointer-events-none flex flex-col">
    <div class="transition-panel top-panel bg-black h-1/2 w-full transform -translate-y-full transition-transform duration-700 ease-in-out"></div>
    <div class="transition-panel bottom-panel bg-black h-1/2 w-full transform translate-y-full transition-transform duration-700 ease-in-out"></div>
    <div class="absolute inset-0 flex items-center justify-center opacity-0 transition-opacity duration-500 delay-300" id="transition-logo">
        <img src="{{ asset('images/logo-waveshart-removebg.png') }}" class="h-24 w-auto animate-bounce" alt="Loading...">
    </div>
</div>

<script>
    function startTransition(url) {
        const overlay = document.getElementById('page-transition');
        const topPanel = overlay.querySelector('.top-panel');
        const bottomPanel = overlay.querySelector('.bottom-panel');
        const logo = document.getElementById('transition-logo');

        // Activate Transition
        topPanel.classList.remove('-translate-y-full');
        bottomPanel.classList.remove('translate-y-full');

        // Show logo
        setTimeout(() => {
            logo.classList.remove('opacity-0');
        }, 200);

        // Navigate after animation
        setTimeout(() => {
            window.location.href = url;
        }, 1000); // 1 second delay
    }
</script>