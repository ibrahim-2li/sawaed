<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>لوحة التحكم - سواعد الرياض</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@300;400;500;700;800&display=swap" rel="stylesheet">
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
                            700: '#012a7c',
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
    @livewireStyles
    <style>
        body {
            font-family: 'Tajawal', sans-serif;
        }

        /* Hide scrollbar for Chrome, Safari and Opera */
        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }

        /* Hide scrollbar for IE, Edge and Firefox */
        .scrollbar-hide {
            -ms-overflow-style: none;
            /* IE and Edge */
            scrollbar-width: none;
            /* Firefox */
        }

        /* Smooth scrolling for mobile */
        .scrollbar-hide {
            -webkit-overflow-scrolling: touch;
        }
    </style>
</head>

<body class="bg-gray-100 text-gray-800">

    <nav class="bg-white shadow-md">
        <div class="max-w-7xl mx-auto px-2 sm:px-4 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center">
                    <h1 class="text-lg sm:text-2xl font-bold text-primary-600">لوحة التحكم</h1>
                </div>
                <div class="flex items-center gap-1 sm:gap-2">
                    <a href="{{ route('home') }}"
                        class="text-gray-600 hover:text-primary-600 px-2 sm:px-3 py-2 rounded-md text-xs sm:text-sm font-medium whitespace-nowrap">عرض
                        الموقع</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                            class="text-gray-600 hover:text-primary-600 px-2 sm:px-3 py-2 rounded-md text-xs sm:text-sm font-medium whitespace-nowrap">تسجيل
                            الخروج</button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <div class="max-w-7xl mx-auto py-4 sm:py-10 px-2 sm:px-4 lg:px-8" x-data="{
        activeTab: window.location.hash ? window.location.hash.substring(1) : 'settings',
        init() {
            this.$watch('activeTab', value => {
                window.location.hash = value;
            });
        }
    }">

        @if (session('success'))
            <div class="bg-blue-100 border border-blue-400 text-blue-700 px-3 sm:px-4 py-3 rounded relative mb-4 sm:mb-6 text-sm"
                role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-3 sm:px-4 py-3 rounded relative mb-4 sm:mb-6 text-sm"
                role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div
            class="flex overflow-x-auto space-x-2 sm:space-x-4 space-x-reverse mb-6 border-b border-gray-200 -mx-4 px-4 sm:mx-0 sm:px-0 scrollbar-hide">
            <button @click="activeTab = 'settings'"
                :class="{ 'border-primary-600 text-primary-600': activeTab === 'settings', 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300': activeTab !== 'settings' }"
                class="whitespace-nowrap py-3 sm:py-4 px-2 sm:px-3 border-b-2 font-medium text-xs sm:text-sm flex-shrink-0">
                الإعدادات العامة
            </button>
            <button @click="activeTab = 'services'"
                :class="{ 'border-primary-600 text-primary-600': activeTab === 'services', 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300': activeTab !== 'services' }"
                class="whitespace-nowrap py-3 sm:py-4 px-2 sm:px-3 border-b-2 font-medium text-xs sm:text-sm flex-shrink-0">
                الخدمات
            </button>
            <button @click="activeTab = 'projects'"
                :class="{ 'border-primary-600 text-primary-600': activeTab === 'projects', 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300': activeTab !== 'projects' }"
                class="whitespace-nowrap py-3 sm:py-4 px-2 sm:px-3 border-b-2 font-medium text-xs sm:text-sm flex-shrink-0">
                المشاريع
            </button>
            <button @click="activeTab = 'clients'"
                :class="{ 'border-primary-600 text-primary-600': activeTab === 'clients', 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300': activeTab !== 'clients' }"
                class="whitespace-nowrap py-3 sm:py-4 px-2 sm:px-3 border-b-2 font-medium text-xs sm:text-sm flex-shrink-0">
                العملاء
            </button>
            <button @click="activeTab = 'brands'"
                :class="{ 'border-primary-600 text-primary-600': activeTab === 'brands', 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300': activeTab !== 'brands' }"
                class="whitespace-nowrap py-3 sm:py-4 px-2 sm:px-3 border-b-2 font-medium text-xs sm:text-sm flex-shrink-0">
                العلامات التجارية
            </button>
            <button @click="activeTab = 'messages'"
                :class="{ 'border-primary-600 text-primary-600': activeTab === 'messages', 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300': activeTab !== 'messages' }"
                class="whitespace-nowrap py-3 sm:py-4 px-2 sm:px-3 border-b-2 font-medium text-xs sm:text-sm relative flex-shrink-0">
                الرسائل
                @if ($contacts->where('is_read', false)->count() > 0)
                    <span
                        class="absolute top-1 sm:top-2 -left-1 sm:-left-2 bg-red-500 text-white text-xs rounded-full h-4 w-4 sm:h-5 sm:w-5 flex items-center justify-center">
                        {{ $contacts->where('is_read', false)->count() }}
                    </span>
                @endif
            </button>
        </div>

        <!-- Settings Tab -->
        <div x-show="activeTab === 'settings'">
            <livewire:dashboard.settings />
        </div>

        <!-- Services Tab -->
        <div x-show="activeTab === 'services'">
            <livewire:dashboard.services />
        </div>

        <!-- Projects Tab -->
        <div x-show="activeTab === 'projects'">
            <livewire:dashboard.projects />
        </div>

        <!-- Clients Tab -->
        <div x-show="activeTab === 'clients'">
            <livewire:dashboard.clients />
        </div>

        <!-- Brands Tab -->
        <div x-show="activeTab === 'brands'">
            <livewire:dashboard.brands />
        </div>

        <!-- Messages Tab -->
        <div x-show="activeTab === 'messages'">
            <livewire:dashboard.messages />
        </div>

    </div>

    @livewireScripts
</body>

</html>
