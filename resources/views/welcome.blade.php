<!DOCTYPE html>
<html lang="ar" dir="rtl" class="scroll-smooth">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>شركة سواعد الرياض | Sawaed Al Riyadh</title>
        
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@300;400;500;700;800&display=swap" rel="stylesheet">

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            <script src="https://cdn.tailwindcss.com"></script>
            <script>
                tailwind.config = {
                    theme: {
                        extend: {
                            fontFamily: {
                                sans: ['Tajawal', 'sans-serif'],
                            },
                            colors: {
                                primary: {
                                    50: '#f0f5ff',
                                    100: '#e0ebff',
                                    500: '#3b82f6',
                                    600: '#01349b',
                                    700: '#05389eff',
                                    800: '#01205e',
                                    900: '#001030',
                                },
                                secondary: {
                                    500: '#ef4444',
                                    600: '#fe0000',
                                    700: '#cc0000',
                                    900: '#0f172a',
                                }
                            }
                        }
                    }
                }
            </script>
        @endif
        
        <style>
            body {
                font-family: 'Tajawal', sans-serif;
            }
            .glass-nav {
                background: rgba(255, 255, 255, 0.9);
                backdrop-filter: blur(12px);
                -webkit-backdrop-filter: blur(12px);
                border-bottom: 1px solid rgba(255, 255, 255, 0.3);
            }
            .hero-pattern {
                background-color: #0f172a;
                background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%2301349b' fill-opacity='0.05'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
            }
        </style>
    </head>
    <body class="antialiased bg-gray-50 text-gray-800">
        
        <!-- Navigation -->
        <nav class="fixed w-full z-50 glass-nav transition-all duration-300">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center h-24">
                    <div class="flex-shrink-0 flex items-center">
                        <a href="#" class="flex items-center gap-3">
                            <img src="{{ asset('images/logo.png') }}" alt="Sawaed Al Riyadh Logo" class="h-20 w-auto">
                        </a>
                    </div>
                    <div class="hidden md:flex space-x-8 space-x-reverse">
                        <a href="#home" class="text-gray-700 hover:text-primary-600 px-3 py-2 rounded-md text-sm font-medium transition-colors">الرئيسية</a>
                        <a href="#about" class="text-gray-700 hover:text-primary-600 px-3 py-2 rounded-md text-sm font-medium transition-colors">عن الشركة</a>
                        <a href="#services" class="text-gray-700 hover:text-primary-600 px-3 py-2 rounded-md text-sm font-medium transition-colors">خدماتنا</a>
                        <a href="#projects" class="text-gray-700 hover:text-primary-600 px-3 py-2 rounded-md text-sm font-medium transition-colors">مشاريعنا</a>
                        <a href="#contact" class="bg-primary-600 text-white px-6 py-2.5 rounded-full text-sm font-bold hover:bg-primary-700 transition-all shadow-lg hover:shadow-primary-600/30">تواصل معنا</a>
                    </div>
                    <!-- Mobile menu button -->
                    <div class="md:hidden flex items-center">
                        <button class="text-gray-700 hover:text-primary-600 focus:outline-none">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Hero Section -->
        <section id="home" class="relative pt-36 pb-20 lg:pt-52 lg:pb-32 overflow-hidden hero-pattern">
            <div class="absolute top-0 left-0 w-full h-full overflow-hidden z-0">
                <div class="absolute -top-[20%] -right-[10%] w-[50%] h-[50%] rounded-full bg-primary-600/20 blur-3xl"></div>
                <div class="absolute top-[40%] -left-[10%] w-[40%] h-[40%] rounded-full bg-secondary-600/10 blur-3xl"></div>
            </div>
            
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
                <h1 class="text-4xl md:text-6xl lg:text-7xl font-extrabold text-white mb-6 leading-tight">
                    <span class="block">{{ $settings->get('hero_title', 'الريادة في خدمات') }}</span>
                    <span class="bg-clip-text text-transparent bg-gradient-to-r from-primary-400 via-white to-secondary-500">
                        {{ $settings->get('hero_subtitle', 'الإعاشة والخدمات اللوجستية') }}
                    </span>
                </h1>
                <p class="mt-4 max-w-2xl mx-auto text-xl text-gray-300 mb-10">
                    {{ $settings->get('hero_description', 'نقدم حلولاً متكاملة في التموين الغذائي، تنظيم الفعاليات، والخدمات اللوجستية بمعايير عالمية وجودة لا تضاهى.') }}
                </p>
                <div class="flex justify-center gap-4">
                    <a href="#services" class="px-8 py-4 bg-primary-600 text-white rounded-full font-bold text-lg shadow-lg shadow-primary-600/30 hover:bg-primary-500 hover:scale-105 transition-all duration-300 border border-primary-500">
                        استكشف خدماتنا
                    </a>
                    <a href="#contact" class="px-8 py-4 bg-white/10 backdrop-blur-md border border-white/20 text-white rounded-full font-bold text-lg hover:bg-white/20 transition-all duration-300 hover:border-secondary-500">
                        اطلب عرض سعر
                    </a>
                </div>
            </div>
        </section>

        <!-- About Section -->
        <section id="about" class="py-20 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                    <div class="relative">
                        <div class="absolute -inset-4 bg-primary-100 rounded-2xl transform rotate-3"></div>
                        <img src="https://images.unsplash.com/photo-1556761175-5973dc0f32e7?ixlib=rb-1.2.1&auto=format&fit=crop&w=1600&q=80" alt="About Sawaed" class="relative rounded-2xl shadow-2xl w-full object-cover h-[500px]">
                        <div class="absolute -bottom-10 -left-10 bg-white p-6 rounded-xl shadow-xl max-w-xs hidden md:block border-t-4 border-secondary-600">
                            <div class="flex items-center gap-4">
                                <div class="bg-primary-50 p-3 rounded-full text-primary-600">
                                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500">خبرة أكثر من</p>
                                    <p class="text-2xl font-bold text-gray-900">10 سنوات</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <h2 class="text-secondary-600 font-bold tracking-wide uppercase text-sm mb-2">من نحن</h2>
                        <h3 class="text-4xl font-bold text-gray-900 mb-6">{{ $settings->get('about_title', 'شريكك الاستراتيجي للنجاح والتميز') }}</h3>
                        <p class="text-lg text-gray-600 mb-6 leading-relaxed">
                            {{ $settings->get('about_description_1', 'قامت شركة سواعد الرياض بتنفيذ العديد من المشاريع داخل المملكة في مجموعة متنوعة من القطاعات، بما في ذلك قطاع الإعاشة، وسلاسل الإمداد الغذائي والتمويني، وقطاع الإنشاءات والتطوير العقاري.') }}
                        </p>
                        <p class="text-lg text-gray-600 mb-8 leading-relaxed">
                            {{ $settings->get('about_description_2', 'نتميز بفريق استشاري وإداري وتنفيذي ذو خبرة احترافية عالية في تخطيط وتنظيم وإدارة الفعاليات والمؤتمرات. نلتزم بأعلى معايير الجودة والسلامة المهنية لضمان نجاح مشاريع عملائنا.') }}
                        </p>
                        
                        <div class="grid grid-cols-2 gap-6">
                            <div class="flex items-start gap-3">
                                <div class="flex-shrink-0 w-10 h-10 rounded-full bg-primary-50 flex items-center justify-center text-primary-600">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                </div>
                                <div>
                                    <h4 class="font-bold text-gray-900">جودة عالية</h4>
                                    <p class="text-sm text-gray-500 mt-1">التزام تام بمعايير الجودة العالمية</p>
                                </div>
                            </div>
                            <div class="flex items-start gap-3">
                                <div class="flex-shrink-0 w-10 h-10 rounded-full bg-secondary-50 flex items-center justify-center text-secondary-600">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                </div>
                                <div>
                                    <h4 class="font-bold text-gray-900">سرعة التنفيذ</h4>
                                    <p class="text-sm text-gray-500 mt-1">إنجاز المشاريع في الوقت المحدد</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Services Section -->
        <section id="services" class="py-20 bg-gray-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-secondary-600 font-bold tracking-wide uppercase text-sm mb-2">خدماتنا</h2>
                    <h3 class="text-4xl font-bold text-gray-900">حلول متكاملة لاحتياجاتك</h3>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($services as $service)
                    <div class="group relative bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 border-t-4 border-{{ $service->color === 'primary' ? 'primary' : 'secondary' }}-600">
                        @if($service->image)
                            <div class="relative h-48 overflow-hidden">
                                <img src="{{ asset($service->image) }}" alt="{{ $service->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                            </div>
                        @endif
                        <div class="p-8">
                            <div class="w-14 h-14 bg-{{ $service->color === 'primary' ? 'primary' : 'secondary' }}-50 rounded-xl flex items-center justify-center text-{{ $service->color === 'primary' ? 'primary' : 'secondary' }}-600 mb-6">
                                @if($service->icon)
                                    {!! $service->icon !!}
                                @else
                                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                                @endif
                            </div>
                            <h4 class="text-xl font-bold text-gray-900 mb-3">{{ $service->title }}</h4>
                            <p class="text-gray-600">
                                {{ $service->description }}
                            </p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- Projects Section -->
        <section id="projects" class="py-20 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-primary-600 font-bold tracking-wide uppercase text-sm mb-2">مشاريعنا</h2>
                    <h3 class="text-4xl font-bold text-gray-900">سجل حافل بالإنجازات</h3>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @foreach($projects as $project)
                    <div class="bg-gray-50 p-6 rounded-xl border-r-4 border-{{ $project->color === 'primary' ? 'primary' : 'secondary' }}-600 hover:bg-white hover:shadow-lg transition-all">
                        <h4 class="font-bold text-lg text-gray-900 mb-2">{{ $project->title }}</h4>
                        <p class="text-gray-600 text-sm">{{ $project->description }}</p>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- Clients Section -->
        <section class="py-20 bg-white overflow-hidden">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-secondary-600 font-bold tracking-wide uppercase text-sm mb-2">عملاؤنا</h2>
                    <h3 class="text-4xl font-bold text-gray-900">شركاء النجاح</h3>
                    <p class="mt-4 text-lg text-gray-600 max-w-2xl mx-auto">نفخر بخدمة أبرز المؤسسات الحكومية والعسكرية في المملكة</p>
                </div>

                <!-- Scrolling Logos Container -->
                <div class="relative">
                    <div class="logos-slide flex gap-12 items-center">
                        @foreach($clients as $client)
                            <div class="flex-shrink-0 w-32 h-24 bg-white p-4 rounded-xl shadow-md hover:shadow-xl transition-all duration-300 flex items-center justify-center group">
                                <img src="{{ asset($client->logo) }}" width="120" height="120" alt="{{ $client->name }}" class="max-w-full max-h-full object-contain grayscale group-hover:grayscale-0 transition-all duration-300">
                            </div>
                        @endforeach
                        <!-- Duplicate for seamless loop -->
                        @foreach($clients as $client)
                            <div class="flex-shrink-0 w-32 h-24 bg-white p-4 rounded-xl shadow-md hover:shadow-xl transition-all duration-300 flex items-center justify-center group">
                                <img src="{{ asset($client->logo) }}" width="120" height="120" alt="{{ $client->name }}" class="max-w-full max-h-full object-contain grayscale group-hover:grayscale-0 transition-all duration-300">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

        <style>
            @keyframes scroll {
                0% {
                    transform: translateX(0);
                }
                100% {
                    transform: translateX(-50%);
                }
            }

            .logos-slide {
                animation: scroll 30s linear infinite;
            }

            .logos-slide:hover {
                animation-play-state: paused;
            }
        </style>

        <!-- CTA Section -->
        <section class="py-20 bg-primary-700 relative overflow-hidden">
            <div class="absolute inset-0 opacity-10 pattern-dots"></div>
            <div class="max-w-4xl mx-auto px-4 text-center relative z-10">
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-6">هل تبحث عن خدمات إعاشة أو لوجستية متميزة؟</h2>
                <p class="text-primary-100 text-lg mb-10">نحن هنا لخدمتك. تواصل معنا اليوم لمناقشة احتياجاتك والحصول على عرض مخصص.</p>
                <a href="#contact" class="inline-block bg-white text-primary-700 font-bold py-4 px-10 rounded-full shadow-lg hover:bg-gray-100 hover:scale-105 transition-transform duration-300">
                    تواصل معنا الآن
                </a>
            </div>
        </section>

        <!-- Footer -->
        <footer id="contact" class="bg-gray-900 text-white py-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
                    <div>
                        <h3 class="text-2xl font-bold text-white mb-6">سواعد الرياض</h3>
                        <p class="text-gray-400 leading-relaxed">
                            شركة رائدة في مجال الإعاشة والتموين والخدمات اللوجستية، نسعى دائماً لتقديم الأفضل لعملائنا من خلال الجودة والالتزام.
                        </p>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-white mb-6">روابط سريعة</h3>
                        <ul class="space-y-3">
                            <li><a href="#home" class="text-gray-400 hover:text-primary-400 transition-colors">الرئيسية</a></li>
                            <li><a href="#about" class="text-gray-400 hover:text-primary-400 transition-colors">عن الشركة</a></li>
                            <li><a href="#services" class="text-gray-400 hover:text-primary-400 transition-colors">خدماتنا</a></li>
                            <li><a href="#projects" class="text-gray-400 hover:text-primary-400 transition-colors">مشاريعنا</a></li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-white mb-6">تواصل معنا</h3>
                        <ul class="space-y-4">
                            <li class="flex items-center gap-3">
                                <svg class="w-5 h-5 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                <span class="text-gray-400">{{ $settings->get('contact_address', 'الرياض، المملكة العربية السعودية') }}</span>
                            </li>
                            <li class="flex items-center gap-3">
                                <svg class="w-5 h-5 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                                <span class="text-gray-400">{{ $settings->get('contact_email', 'info@sawaedalriyadh.com') }}</span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="border-t border-gray-800 mt-12 pt-8 text-center text-gray-500 text-sm">
                    &copy; {{ date('Y') }} شركة سواعد الرياض. جميع الحقوق محفوظة.
                </div>
            </div>
        </footer>
    </body>
</html>
