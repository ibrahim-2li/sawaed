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
                            <img src="{{ asset('images/home_icon.png') }}" alt="Sawaed Al Riyadh Logo" class="h-20 w-auto">
                            <span class="text-primary-600 font-bold text-2xl">شركة سواعد الرياض المحدودة</span>
                        </a>
                    </div>
                    <div class="hidden md:flex space-x-8 space-x-reverse">
                        <a href="#home" class="text-gray-700 hover:text-primary-600 px-3 py-2 rounded-md text-sm font-medium transition-colors">الرئيسية</a>
                        <a href="#about" class="text-gray-700 hover:text-primary-600 px-3 py-2 rounded-md text-sm font-medium transition-colors">عن الشركة</a>
                        <a href="#services" class="text-gray-700 hover:text-primary-600 px-3 py-2 rounded-md text-sm font-medium transition-colors">خدماتنا</a>
                        @if ($projects->count() > 0)
                            <a href="#projects" class="text-gray-700 hover:text-primary-600 px-6 py-2 rounded-md text-sm font-medium transition-colors">مشاريعنا</a>
                        @endif
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
                    <span class="bg-clip-text text-primary-500 bg-gradient-to-r ">
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
                        <img src="{{ asset($settings->get('about_image'))?:'https://images.unsplash.com/photo-1556761175-5973dc0f32e7?ixlib=rb-1.2.1&auto=format&fit=crop&w=1600&q=80' }}" alt="About Sawaed" class="relative rounded-2xl shadow-2xl w-full object-cover h-[500px]">
                        <div class="absolute -bottom-10 -left-10 bg-white p-6 rounded-xl shadow-xl max-w-xs hidden md:block border-t-4 border-secondary-600">
                            <div class="flex items-center gap-4">
                                <div class="bg-primary-50 p-3 rounded-full text-primary-600">
                                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500">خبرة أكثر من</p>
                                    <p class="text-2xl font-bold text-gray-900">33 سنة</p>
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
        @if($projects->count() > 0)
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
        @endif

        <!-- Clients Section -->
        <section class="py-20 bg-white overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h3 class="text-4xl font-bold text-gray-900">عملاؤنا</h3>
            <p class="mt-4 text-lg text-gray-600 max-w-2xl mx-auto">
                نفخر بخدمة أبرز المؤسسات الحكومية والعسكرية في المملكة
            </p>
        </div>

        <!-- Scrolling Logos Container -->
        <div class="logos relative overflow-hidden bg-white py-10" dir="ltr">
            <div class="absolute inset-y-0 left-0 w-32 bg-gradient-to-r from-white to-transparent z-10"></div>
            <div class="absolute inset-y-0 right-0 w-32 bg-gradient-to-l from-white to-transparent z-10"></div>
            
            <div class="logos-slide flex items-center">
                <!-- Set 1 -->
                @foreach($clients as $client)
                    <div class="flex-shrink-0 w-[200px] h-[120px] mx-6 hover:scale-110 transition-transform duration-300 flex items-center justify-center group">
                        <img src="{{ asset($client->logo) }}" alt="{{ $client->name }}" class="max-w-[160px] max-h-[100px] object-contain group-hover:grayscale-0 transition-all duration-300 opacity-70 group-hover:opacity-100">
                    </div>
                @endforeach
                <!-- Set 2 -->
                @foreach($clients as $client)
                    <div class="flex-shrink-0 w-[200px] h-[120px] mx-6 hover:scale-110 transition-transform duration-300 flex items-center justify-center group">
                        <img src="{{ asset($client->logo) }}" alt="{{ $client->name }}" class="max-w-[160px] max-h-[100px] object-contain  group-hover:grayscale-0 transition-all duration-300 opacity-70 group-hover:opacity-100">
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<style>
    .logos-slide {
        display: flex;
        width: max-content;
        animation: scroll 40s linear infinite;
    }

    .logos-slide:hover {
        animation-play-state: paused;
    }

    @keyframes scroll {
        0% {
            transform: translateX(0);
        }
        100% {
            transform: translateX(-50%);
        }
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
                                    <svg class="w-5 h-5 text-primary-500" 
                                        viewBox="0 0 474.616 474.616" xml:space="preserve">
                                    <circle style="fill:#284A9E;" cx="236.968" cy="236.967" r="236.967"/>
                                    <path style="fill:#24488E;" d="M405.203,70.061c92.546,92.549,92.553,242.591,0,335.148c-92.542,92.542-242.595,92.542-335.144,0
                                        L405.203,70.061z"/>
                                    <path style="fill:#1E3F77;" d="M466.714,295.104L299.58,127.969l-33.957,33.953l-72.329-9.968l7.472,74.828l-35.199,35.199
                                        l71.105,71.101l1.239,48.636l78.514,78.51C390.322,433.92,447.309,372.005,466.714,295.104z"/>
                                    <path style="fill:#FFFFFF;" d="M329.061,173.941c-0.984-3.697-2.986-7.633-4.464-11.083c-17.732-42.589-56.456-57.859-87.73-57.859
                                        c-41.863,0-87.973,28.067-94.128,85.934v11.82c0,0.494,0.168,4.92,0.415,7.139c3.45,27.577,25.205,56.886,41.455,84.46
                                        c17.482,29.545,35.626,58.604,53.601,87.663c11.079-18.956,22.121-38.162,32.954-56.639c2.952-5.414,6.38-10.832,9.336-16.004
                                        c1.964-3.442,5.729-6.892,7.45-10.092c17.482-32.011,45.62-64.269,45.62-96.033v-13.051
                                        C333.57,186.749,329.308,174.685,329.061,173.941z M237.631,233.282c-12.307,0-25.773-6.155-32.423-23.147
                                        c-0.992-2.705-0.913-8.123-0.913-8.617v-7.637c0-21.661,18.398-31.513,34.398-31.513c19.701,0,34.933,15.757,34.933,35.457
                                        C273.63,217.529,257.331,233.282,237.631,233.282z"/>
                                    </svg> 
                               <span class="text-gray-400">{{ $settings->get('contact_address', 'الرياض، المملكة العربية السعودية') }}</span>
                            </li>
                            <li class="flex items-center gap-3">
                               <svg class="w-5 h-5 text-primary-500"
                                           viewBox="0 0 473.931 473.931" xml:space="preserve">
                                       <circle style="fill:#4A86C5;" cx="236.966" cy="236.966" r="236.966"/>
                                       <path style="fill:#3D80B2;" d="M404.518,69.383c92.541,92.549,92.549,242.59,0,335.138c-92.541,92.541-242.593,92.541-335.134,0
                                           L404.518,69.383z"/>
                                       <path style="fill:#4A86C5;" d="M462.646,309.275c0.868-2.713,1.658-5.456,2.432-8.206
                                           C464.307,303.823,463.496,306.562,462.646,309.275z"/>
                                       <g>
                                           <polygon style="fill:#377CA5;" points="465.097,301.017 465.097,301.017 465.082,301.07 	"/>
                                           <path style="fill:#377CA5;" d="M465.097,301.017L336.721,172.641l-29.204,29.204l-20.303-20.303l-16.946,16.946L171.032,99.25
                                               l-6.155-2.346l-38.08,38.08l45.968,45.964l-44.998,44.995l43.943,43.943l-48.048,48.052L276.475,470.59
                                               c87.984-14.78,159.5-77.993,186.175-161.311c0.849-2.716,1.658-5.452,2.432-8.206C465.082,301.055,465.09,301.032,465.097,301.017z
                                               "/>
                                       </g>
                                       <path style="fill:#FFFFFF;" d="M358.565,230.459v87.883h-50.944v-81.997c0-20.595-7.375-34.656-25.811-34.656
                                           c-14.084,0-22.458,9.474-26.147,18.634c-1.343,3.278-1.688,7.835-1.688,12.423v85.593H203.02c0,0,0.681-138.875,0-153.259h50.952
                                           V186.8c-0.094,0.161-0.236,0.34-0.329,0.498h0.329V186.8c6.769-10.425,18.862-25.324,45.923-25.324
                                           C333.432,161.479,358.565,183.384,358.565,230.459z M149.7,91.198c-17.429,0-28.838,11.439-28.838,26.473
                                           c0,14.716,11.072,26.495,28.164,26.495h0.344c17.766,0,28.823-11.779,28.823-26.495C177.857,102.636,167.137,91.198,149.7,91.198z
                                           M123.886,318.341h50.944V165.083h-50.944V318.341z"/>
                                       </svg>
                               <span class="text-gray-400"><a href="https://www.linkedin.com/company/{{ $settings->get('contact_linkedin', 'Sawaed-Alriyadh-ltd-co') }}" target="_blank">{{ $settings->get('contact_linkedin', 'Sawaed-Alriyadh-ltd-co') }}</a></span>
                           </li>
                            <li class="flex items-center gap-3">
                                        <svg class="w-5 h-5 text-primary-500"
                                            viewBox="0 0 64 64" xml:space="preserve">
                                        <style type="text/css">
                                            .st0{fill:#77B3D4;}
                                            .st1{opacity:0.2;}
                                            .st2{fill:#231F20;}
                                            .st3{fill:#FFFFFF;}
                                        </style>
                                        <g id="Layer_1">
                                            <g>
                                                <circle class="st0" cx="32" cy="32" r="32"/>
                                            </g>
                                            <g class="st1">
                                                <path class="st2" d="M32,12c-12.1,0-22,9.9-22,22s9.9,22,22,22c3.5,0,7-0.8,10.1-2.4c1-0.5,1.4-1.7,0.9-2.7s-1.7-1.4-2.7-0.9
                                                    c-2.6,1.3-5.3,2-8.2,2c-9.9,0-18-8.1-18-18s8.1-18,18-18s18,8.1,18,18c0,3-0.8,6-2.2,8.6c-1.8-1.4-4.4-4.2-4.4-8.5v-8.8
                                                    c0-1.1-0.9-2-2-2s-2,0.9-2,2v0.1c-2-1.7-4.6-2.8-7.4-2.8c-6.3,0-11.4,5.1-11.4,11.4S25.7,45.4,32,45.4c3.7,0,7-1.8,9.1-4.6
                                                    c2.3,4.2,6.2,6.3,6.4,6.4c0.9,0.5,2,0.2,2.6-0.6c2.6-3.7,3.9-8,3.9-12.6C54,21.9,44.1,12,32,12z M32,41.4c-4.1,0-7.4-3.3-7.4-7.4
                                                    c0-4.1,3.3-7.4,7.4-7.4s7.4,3.3,7.4,7.4C39.4,38.1,36.1,41.4,32,41.4z"/>
                                            </g>
                                            <g>
                                                <path class="st3" d="M32,54c-12.1,0-22-9.9-22-22s9.9-22,22-22s22,9.9,22,22c0,4.5-1.4,8.9-3.9,12.6c-0.6,0.8-1.7,1.1-2.6,0.6
                                                    c-0.3-0.2-8.1-4.2-8.1-13.1v-8.8c0-1.1,0.9-2,2-2c1.1,0,2,0.9,2,2v8.8c0,4.3,2.6,7.1,4.4,8.5C49.2,38,50,35,50,32
                                                    c0-9.9-8.1-18-18-18s-18,8.1-18,18s8.1,18,18,18c2.9,0,5.7-0.7,8.2-2c1-0.5,2.2-0.1,2.7,0.9c0.5,1,0.1,2.2-0.9,2.7
                                                    C39,53.2,35.5,54,32,54z"/>
                                            </g>
                                            <g>
                                                <path class="st3" d="M32,24.6c4.1,0,7.4,3.3,7.4,7.4s-3.3,7.4-7.4,7.4s-7.4-3.3-7.4-7.4S27.9,24.6,32,24.6 M32,20.6
                                                    c-6.3,0-11.4,5.1-11.4,11.4S25.7,43.4,32,43.4S43.4,38.3,43.4,32S38.3,20.6,32,20.6L32,20.6z"/>
                                            </g>
                                        </g>
                                        <g id="Layer_2">
                                        </g>
                                        </svg>
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
