<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>تسجيل الدخول | شركة سواعد الرياض</title>
    
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
        .hero-pattern {
            background-color: #0f172a;
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%2301349b' fill-opacity='0.05'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }
        .glass-input {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(10px);
        }
    </style>
</head>
<body class="antialiased bg-gray-50 text-gray-800 h-screen flex overflow-hidden">
    <!-- Split Layout -->
    <!-- Right Side: Image/Branding -->
    <div class="hidden lg:flex w-1/2 bg-primary-900 relative items-center justify-center overflow-hidden">
        <!-- Background effects -->
        <div class="absolute inset-0 opacity-20 hero-pattern"></div>
        <div class="absolute -top-[20%] -right-[10%] w-[50%] h-[50%] rounded-full bg-primary-600/20 blur-3xl animate-pulse"></div>
        <div class="absolute top-[40%] -left-[10%] w-[40%] h-[40%] rounded-full bg-secondary-600/10 blur-3xl animate-pulse" style="animation-delay: 1s;"></div>
        
        <div class="relative z-10 text-center px-10">
            <div class="mb-8 relative inline-block">
                <div class="absolute inset-0 bg-white/20 blur-2xl rounded-full"></div>
                <img src="{{ asset('images/logo.png') }}" alt="Sawaed Logo" class="h-40 w-auto mx-auto">
            </div>
            <h1 class="text-5xl font-extrabold text-white mb-6 tracking-tight">سواعد الرياض</h1>
            <p class="text-primary-100 text-xl max-w-md mx-auto leading-relaxed font-light">
                بوابة الدخول إلى لوحة التحكم. <br>قم بتسجيل الدخول لإدارة الخدمات والمشاريع بكفاءة.
            </p>
        </div>
        
        <!-- Decorative circles -->
        <div class="absolute bottom-10 right-10 w-20 h-20 border-4 border-white/5 rounded-full"></div>
        <div class="absolute top-10 left-10 w-32 h-32 border-8 border-white/5 rounded-full"></div>
    </div>

    <!-- Left Side: Login Form -->
    <div class="w-full lg:w-1/2 flex items-center justify-center p-8 bg-white relative">
         <!-- Mobile Background effects -->
         <div class="absolute inset-0 lg:hidden bg-gray-50 hero-pattern opacity-5"></div>
         
         <div class="w-full max-w-md relative z-10 bg-white/80 lg:bg-transparent backdrop-blur-xl lg:backdrop-blur-none p-8 lg:p-0 rounded-3xl lg:rounded-none shadow-2xl lg:shadow-none border border-white/50 lg:border-none">
            <div class="text-center mb-10 lg:hidden">
                <img src="{{ asset('images/logo.png') }}" alt="Sawaed Logo" class="h-40 w-auto mx-auto mb-4 drop-shadow-lg">

                <h2 class="text-2xl font-bold text-gray-900">سواعد الرياض</h2>
            </div>
            
            <div class="lg:text-right mb-10 hidden lg:block">
                <h2 class="text-4xl font-bold text-gray-900 mb-2">مرحباً بعودتك</h2>
                <p class="text-gray-500 text-lg">الرجاء إدخال بياناتك للمتابعة إلى لوحة التحكم</p>
            </div>

            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf
                
                <div class="group">
                    <label for="email" class="block text-sm font-bold text-gray-700 mb-2 group-focus-within:text-primary-600 transition-colors">البريد الإلكتروني</label>
                    <div class="relative">
                        <input type="email" name="email" id="email" required autofocus
                            class="w-full px-5 py-4 rounded-2xl border border-gray-200 focus:ring-4 focus:ring-primary-100 focus:border-primary-500 transition-all duration-300 bg-gray-50 focus:bg-white text-gray-900 placeholder-gray-400"
                            placeholder="name@company.com">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400 group-focus-within:text-primary-500 transition-colors">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                            </svg>
                        </div>
                    </div>
                    @error('email')
                        <p class="text-red-500 text-sm mt-2 font-medium">{{ $message }}</p>
                    @enderror
                </div>

                <div class="group">
                    <label for="password" class="block text-sm font-bold text-gray-700 mb-2 group-focus-within:text-primary-600 transition-colors">كلمة المرور</label>
                    <div class="relative">
                        <input type="password" name="password" id="password" required 
                            class="w-full px-5 py-4 rounded-2xl border border-gray-200 focus:ring-4 focus:ring-primary-100 focus:border-primary-500 transition-all duration-300 bg-gray-50 focus:bg-white text-gray-900 placeholder-gray-400"
                            placeholder="••••••••">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400 group-focus-within:text-primary-500 transition-colors">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                        </div>
                    </div>
                    @error('password')
                        <p class="text-red-500 text-sm mt-2 font-medium">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input id="remember_me" name="remember" type="checkbox" class="h-5 w-5 text-primary-600 focus:ring-primary-500 border-gray-300 rounded transition-all cursor-pointer">
                        <label for="remember_me" class="mr-2 block text-sm text-gray-600 cursor-pointer select-none">تذكرني</label>
                    </div>
                    
                    <div class="text-sm">
                        <a href="#" class="font-bold text-primary-600 hover:text-primary-700 transition-colors hover:underline">نسيت كلمة المرور؟</a>
                    </div>
                </div>

                <button type="submit" class="w-full flex justify-center py-4 px-4 border border-transparent rounded-2xl shadow-lg shadow-primary-600/30 text-base font-bold text-white bg-gradient-to-r from-primary-600 to-primary-700 hover:from-primary-700 hover:to-primary-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 transition-all transform hover:scale-[1.02] active:scale-[0.98]">
                    تسجيل الدخول
                </button>
            </form>
            
            <div class="mt-10 text-center border-t border-gray-100 pt-6">
                <p class="text-sm text-gray-500">
                    العودة إلى <a href="{{ route('home') }}" class="font-bold text-primary-600 hover:text-primary-700 transition-colors hover:underline">الصفحة الرئيسية</a>
                </p>
            </div>
         </div>
    </div>
</body>
</html>
