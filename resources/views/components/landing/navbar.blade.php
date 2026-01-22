@props(['brands', 'projects'])

<nav class="fixed w-full z-50 glass-nav transition-all duration-300" x-data="{ mobileMenuOpen: false }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-24">
            <div class="flex-shrink-0 flex items-center">
                <a href="#" class="flex items-center gap-3">
                    <img src="{{ asset('images/home_icon.png') }}" alt="Sawaed Al Riyadh Logo" class="h-10 w-auto">

                    <!-- Mobile view only -->
                    <span class="block md:hidden text-primary-600 font-bold text-xl">
                        سواعد الرياض
                    </span>

                    <!-- Desktop view only -->
                    <span class="hidden md:block text-primary-600 font-bold text-2xl">
                        شركة سواعد الرياض المحدودة
                    </span>
                </a>
            </div>
            <div class="hidden md:flex space-x-8 space-x-reverse">
                <a href="#home"
                    class="text-gray-700 hover:text-primary-600 px-3 py-2 rounded-md text-sm font-medium transition-colors">الرئيسية</a>
                <a href="#about"
                    class="text-gray-700 hover:text-primary-600 px-3 py-2 rounded-md text-sm font-medium transition-colors">عن
                    الشركة</a>
                @if ($brands->count() > 0)
                    <a href="#brands"
                        class="text-gray-700 hover:text-primary-600 px-3 py-2 rounded-md text-sm font-medium transition-colors">علاماتنا</a>
                @endif
                <a href="#services"
                    class="text-gray-700 hover:text-primary-600 px-3 py-2 rounded-md text-sm font-medium transition-colors">خدماتنا</a>
                <a href="#clients"
                    class="text-gray-700 hover:text-primary-600 px-3 py-2 rounded-md text-sm font-medium transition-colors">عملاؤنا</a>
                @if ($projects->count() > 0)
                    <a href="#projects"
                        class="text-gray-700 hover:text-primary-600 px-6 py-2 rounded-md text-sm font-medium transition-colors">مشاريعنا</a>
                @endif
                <a href="#contact"
                    class="bg-primary-600 text-white px-6 py-2.5 rounded-full text-sm font-bold hover:bg-primary-700 transition-all shadow-lg hover:shadow-primary-600/30">تواصل
                    معنا</a>
            </div>
            <!-- Mobile menu button -->
            <div class="md:hidden flex items-center">
                <button id="mobile-menu-btn" class="text-gray-700 hover:text-primary-600 focus:outline-none p-2">
                    <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu Overlay -->
    <div id="mobile-menu"
        class="fixed inset-0 z-40 bg-white/95 backdrop-blur-xl transform translate-x-full transition-transform duration-300 md:hidden flex flex-col justify-center items-center space-y-8 h-screen w-full top-0 right-0">
        <button id="close-menu-btn"
            class="absolute top-8 left-8 text-gray-500 hover:text-secondary-600 transition-colors">
            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                </path>
            </svg>
        </button>

        <a href="#home"
            class="mobile-link text-2xl font-bold text-gray-800 hover:text-primary-600 transition-all duration-500 ease-out opacity-0 translate-y-8">الرئيسية</a>
        <a href="#about"
            class="mobile-link text-2xl font-bold text-gray-800 hover:text-primary-600 transition-all duration-500 ease-out opacity-0 translate-y-8">عن
            الشركة</a>
        @if ($brands->count() > 0)
            <a href="#brands"
                class="mobile-link text-2xl font-bold text-gray-800 hover:text-primary-600 transition-all duration-500 ease-out opacity-0 translate-y-8">علاماتنا</a>
        @endif
        <a href="#services"
            class="mobile-link text-2xl font-bold text-gray-800 hover:text-primary-600 transition-all duration-500 ease-out opacity-0 translate-y-8">خدماتنا</a>
        <a href="#clients"
            class="mobile-link text-2xl font-bold text-gray-800 hover:text-primary-600 transition-all duration-500 ease-out opacity-0 translate-y-8">عملاؤنا</a>
        @if ($projects->count() > 0)
            <a href="#projects"
                class="mobile-link text-2xl font-bold text-gray-800 hover:text-primary-600 transition-all duration-500 ease-out opacity-0 translate-y-8">مشاريعنا</a>
        @endif
        <a href="#contact"
            class="mobile-link px-10 py-4 bg-primary-600 text-white rounded-full text-xl font-bold shadow-xl hover:bg-primary-700 transition-all duration-500 ease-out transform hover:scale-105 opacity-0 translate-y-8">تواصل
            معنا</a>
    </div>
</nav>

<script>
    // Mobile Menu Logic
    document.addEventListener('DOMContentLoaded', function() {
        const mobileMenuBtn = document.getElementById('mobile-menu-btn');
        const closeMenuBtn = document.getElementById('close-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        const mobileLinks = document.querySelectorAll('.mobile-link');

        function toggleMenu() {
            const isHidden = mobileMenu.classList.contains('translate-x-full');
            if (isHidden) {
                mobileMenu.classList.remove('translate-x-full');
                document.body.style.overflow = 'hidden'; // Prevent scrolling

                // Animate links in
                mobileLinks.forEach((link, index) => {
                    setTimeout(() => {
                        link.classList.remove('opacity-0', 'translate-y-8');
                    }, 150 + (index * 100));
                });
            } else {
                mobileMenu.classList.add('translate-x-full');
                document.body.style.overflow = ''; // Enable scrolling

                // Reset links
                mobileLinks.forEach(link => {
                    link.classList.add('opacity-0', 'translate-y-8');
                });
            }
        }

        if (mobileMenuBtn) mobileMenuBtn.addEventListener('click', toggleMenu);
        if (closeMenuBtn) closeMenuBtn.addEventListener('click', toggleMenu);

        // Close menu when clicking a link
        mobileLinks.forEach(link => {
            link.addEventListener('click', function() {
                if (!mobileMenu.classList.contains('translate-x-full')) {
                    toggleMenu();
                }
            });
        });
    });
</script>
