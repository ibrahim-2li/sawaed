@props(['settings'])

<section id="home" class="relative pt-36 pb-20 lg:pt-52 lg:pb-32 overflow-hidden hero-pattern">
    <div class="absolute top-0 left-0 w-full h-full overflow-hidden z-0">
        <div class="absolute -top-[20%] -right-[10%] w-[50%] h-[50%] rounded-full bg-primary-600/20 blur-3xl"></div>
        <div class="absolute top-[40%] -left-[10%] w-[40%] h-[40%] rounded-full bg-secondary-600/10 blur-3xl"></div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
        <h1 class="text-4xl md:text-6xl lg:text-7xl font-extrabold text-white mb-6 leading-tight">
            <span class="block">{{ $settings->get('hero_title', 'الريادة في خدمات') }}</span>
            <span class="bg-clip-text text-primary-500 bg-gradient-to-r ">
                {{ $settings->get('hero_subtitle', 'الإعاشة والخدمات اللوجستية') }}
            </span>
        </h1>
        <p class="mt-4 max-w-2xl mx-auto text-xl text-gray-300 mb-10">
            {{ $settings->get('hero_description', 'نقدم حلولاً متكاملة في التموين الغذائي، تنظيم الفعاليات، والخدمات اللوجستية بمعايير عالمية وجودة لا تضاهى.') }}
        </p>
        <div class="flex flex-col sm:flex-row justify-center gap-4 px-4">
            <a href="#services"
                class="w-full sm:w-auto px-8 py-4 bg-primary-600 text-white rounded-full font-bold text-lg shadow-lg shadow-primary-600/30 hover:bg-primary-500 hover:scale-105 transition-all duration-300 border border-primary-500">
                استكشف خدماتنا
            </a>
            <a href="#contact"
                class="w-full sm:w-auto px-8 py-4 bg-white/10 backdrop-blur-md border border-white/20 text-white rounded-full font-bold text-lg hover:bg-white/20 transition-all duration-300 hover:border-secondary-500">
                تواصل معنا
            </a>
        </div>
    </div>
</section>
