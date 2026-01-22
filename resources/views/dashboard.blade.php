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
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
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
        <div x-show="activeTab === 'settings'" class="bg-white shadow overflow-hidden sm:rounded-lg p-4 sm:p-6">
            <form action="{{ route('dashboard.settings.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="grid grid-cols-1 gap-y-4 sm:gap-y-6 gap-x-4 sm:grid-cols-6">

                    <div class="sm:col-span-6">
                        <h3 class="text-base sm:text-lg font-medium leading-6 text-gray-900 mb-3 sm:mb-4">القسم الرئيسي
                            (Hero)</h3>
                    </div>

                    <div class="sm:col-span-6">
                        <label for="hero_title" class="block text-sm font-medium text-gray-700">العنوان الرئيسي</label>
                        <input type="text" name="hero_title" id="hero_title"
                            value="{{ $settings->get('hero_title') }}"
                            class="mt-1 focus:ring-primary-500 focus:border-primary-500 block w-full shadow-sm text-sm border-gray-300 rounded-md p-2 border">
                    </div>

                    <div class="sm:col-span-6">
                        <label for="hero_subtitle" class="block text-sm font-medium text-gray-700">العنوان الفرعي
                            (الملون)</label>
                        <input type="text" name="hero_subtitle" id="hero_subtitle"
                            value="{{ $settings->get('hero_subtitle') }}"
                            class="mt-1 focus:ring-primary-500 focus:border-primary-500 block w-full shadow-sm text-sm border-gray-300 rounded-md p-2 border">
                    </div>

                    <div class="sm:col-span-6">
                        <label for="hero_description" class="block text-sm font-medium text-gray-700">الوصف</label>
                        <textarea name="hero_description" id="hero_description" rows="3"
                            class="mt-1 focus:ring-primary-500 focus:border-primary-500 block w-full shadow-sm text-sm border-gray-300 rounded-md p-2 border">{{ $settings->get('hero_description') }}</textarea>
                    </div>

                    <div class="sm:col-span-6 border-t pt-3 sm:pt-4 mt-3 sm:mt-4">
                        <h3 class="text-base sm:text-lg font-medium leading-6 text-gray-900 mb-3 sm:mb-4">قسم من نحن
                            (About)</h3>
                    </div>

                    <div class="sm:col-span-6">
                        <label for="about_title" class="block text-sm font-medium text-gray-700">العنوان</label>
                        <input type="text" name="about_title" id="about_title"
                            value="{{ $settings->get('about_title') }}"
                            class="mt-1 focus:ring-primary-500 focus:border-primary-500 block w-full shadow-sm text-sm border-gray-300 rounded-md p-2 border">
                    </div>

                    <div class="sm:col-span-6">
                        <label for="about_description_1" class="block text-sm font-medium text-gray-700">الوصف
                            الأول</label>
                        <textarea name="about_description_1" id="about_description_1" rows="3"
                            class="mt-1 focus:ring-primary-500 focus:border-primary-500 block w-full shadow-sm text-sm border-gray-300 rounded-md p-2 border">{{ $settings->get('about_description_1') }}</textarea>
                    </div>

                    <div class="sm:col-span-6">
                        <label for="about_description_2" class="block text-sm font-medium text-gray-700">الوصف
                            الثاني</label>
                        <textarea name="about_description_2" id="about_description_2" rows="3"
                            class="mt-1 focus:ring-primary-500 focus:border-primary-500 block w-full shadow-sm text-sm border-gray-300 rounded-md p-2 border">{{ $settings->get('about_description_2') }}</textarea>
                    </div>

                    <div class="sm:col-span-6">
                        <label for="about_image" class="block text-sm font-medium text-gray-700">صورة قسم من
                            نحن</label>
                        @if ($settings->get('about_image'))
                            <img src="{{ asset($settings->get('about_image')) }}" alt="About Image"
                                class="mt-2 mb-2 h-24 sm:h-32 w-auto rounded-lg object-cover">
                        @endif
                        <input type="file" name="about_image" id="about_image" accept="image/*"
                            class="mt-1 focus:ring-primary-500 focus:border-primary-500 block w-full shadow-sm text-sm border-gray-300 rounded-md p-2 border">
                    </div>

                    <div class="sm:col-span-6 border-t pt-3 sm:pt-4 mt-3 sm:mt-4">
                        <h3 class="text-base sm:text-lg font-medium leading-6 text-gray-900 mb-3 sm:mb-4">معلومات
                            التواصل</h3>
                    </div>

                    <div class="sm:col-span-3">
                        <label for="contact_email" class="block text-sm font-medium text-gray-700">البريد
                            الإلكتروني</label>
                        <input type="email" name="contact_email" id="contact_email"
                            value="{{ $settings->get('contact_email') }}"
                            class="mt-1 focus:ring-primary-500 focus:border-primary-500 block w-full shadow-sm text-sm border-gray-300 rounded-md p-2 border">
                    </div>

                    <div class="sm:col-span-3">
                        <label for="contact_address" class="block text-sm font-medium text-gray-700">العنوان</label>
                        <input type="text" name="contact_address" id="contact_address"
                            value="{{ $settings->get('contact_address') }}"
                            class="mt-1 focus:ring-primary-500 focus:border-primary-500 block w-full shadow-sm text-sm border-gray-300 rounded-md p-2 border">
                    </div>

                    <div class="sm:col-span-3">
                        <label for="contact_linkedin" class="block text-sm font-medium text-gray-700">لينكد إن</label>
                        <input type="text" name="contact_linkedin" id="contact_linkedin"
                            value="{{ $settings->get('contact_linkedin') }}"
                            class="mt-1 focus:ring-primary-500 focus:border-primary-500 block w-full shadow-sm text-sm border-gray-300 rounded-md p-2 border">
                    </div>
                    <div class="sm:col-span-3">
                        <label for="contact_phone" class="block text-sm font-medium text-gray-700">رقم الهاتف</label>
                        <input type="text" name="contact_phone" id="contact_phone"
                            value="{{ $settings->get('contact_phone') }}"
                            class="mt-1 focus:ring-primary-500 focus:border-primary-500 block w-full shadow-sm text-sm border-gray-300 rounded-md p-2 border">
                    </div>

                </div>
                <div class="mt-4 sm:mt-6">
                    <button type="submit"
                        class="w-full sm:w-auto inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-primary-600 hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500">
                        حفظ الإعدادات
                    </button>
                </div>
            </form>
        </div>

        <!-- Services Tab -->
        <div x-show="activeTab === 'services'" class="space-y-4 sm:space-y-6">
            <!-- Add New Service -->
            <div class="bg-white shadow overflow-hidden sm:rounded-lg p-4 sm:p-6">
                <h3 class="text-base sm:text-lg font-medium leading-6 text-gray-900 mb-3 sm:mb-4">إضافة خدمة جديدة</h3>
                <form action="{{ route('dashboard.services.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                        <div class="sm:col-span-3">
                            <label for="service_title" class="block text-sm font-medium text-gray-700">عنوان
                                الخدمة</label>
                            <input type="text" name="title" id="service_title" required
                                class="mt-1 focus:ring-primary-500 focus:border-primary-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md p-2 border">
                        </div>
                        <div class="sm:col-span-3">
                            <label for="service_color" class="block text-sm font-medium text-gray-700">اللون</label>
                            <select name="color" id="service_color"
                                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500 sm:text-sm">
                                <option value="primary">أزرق (Primary)</option>
                                <option value="secondary">أحمر (Secondary)</option>
                            </select>
                        </div>
                        <div class="sm:col-span-6">
                            <label for="service_description"
                                class="block text-sm font-medium text-gray-700">الوصف</label>
                            <textarea name="description" id="service_description" rows="3" required
                                class="mt-1 focus:ring-primary-500 focus:border-primary-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md p-2 border"></textarea>
                        </div>
                        <div class="sm:col-span-6">
                            <label for="service_image" class="block text-sm font-medium text-gray-700">صورة
                                الخدمة</label>
                            <input type="file" name="image" id="service_image" accept="image/*"
                                class="mt-1 focus:ring-primary-500 focus:border-primary-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md p-2 border">
                        </div>
                        <div class="sm:col-span-6">
                            <label for="service_icon" class="block text-sm font-medium text-gray-700">SVG Icon
                                Code</label>
                            <textarea name="icon" id="service_icon" rows="3"
                                class="mt-1 focus:ring-primary-500 focus:border-primary-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md p-2 border"></textarea>
                        </div>
                    </div>
                    <div class="mt-4">
                        <button type="submit"
                            class="w-full sm:w-auto inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-primary-600 hover:bg-primary-700">
                            إضافة
                        </button>
                    </div>
                </form>
            </div>

            <!-- List Services -->
            <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                <ul role="list" class="divide-y divide-gray-200">
                    @foreach ($services as $service)
                        <li class="px-4 py-4 sm:px-6" x-data="{ open: false }">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <div
                                        class="flex-shrink-0 h-10 w-10 rounded-full bg-{{ $service->color === 'primary' ? 'blue' : 'red' }}-100 flex items-center justify-center text-{{ $service->color === 'primary' ? 'blue' : 'red' }}-600">
                                        @if ($service->icon)
                                            {!! $service->icon !!}
                                        @else
                                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M13 10V3L4 14h7v7l9-11h-7z" />
                                            </svg>
                                        @endif
                                    </div>
                                    <div class="mr-4">
                                        <div class="text-sm font-medium text-primary-600 truncate">
                                            {{ $service->title }}</div>
                                        <div class="text-sm text-gray-500">{{ Str::limit($service->description, 50) }}
                                        </div>
                                    </div>
                                </div>
                                <div class="flex space-x-2 space-x-reverse">
                                    <button @click="open = !open"
                                        class="text-indigo-600 hover:text-indigo-900">تعديل</button>
                                    <form x-ref="deleteForm"
                                        action="{{ route('dashboard.services.destroy', $service->id) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button"
                                            @click="if(confirm('هل أنت متأكد؟')) $refs.deleteForm.submit()"
                                            class="text-red-600 hover:text-red-900 cursor-pointer">حذف</button>
                                    </form>
                                </div>
                            </div>
                            <!-- Edit Form -->
                            <div x-show="open" class="mt-4 pt-4 border-t border-gray-200">
                                <form action="{{ route('dashboard.services.update', $service->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                                        <div class="sm:col-span-3">
                                            <label class="block text-sm font-medium text-gray-700">عنوان الخدمة</label>
                                            <input type="text" name="title" value="{{ $service->title }}"
                                                required
                                                class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md p-2 border">
                                        </div>
                                        <div class="sm:col-span-3">
                                            <label class="block text-sm font-medium text-gray-700">اللون</label>
                                            <select name="color"
                                                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm sm:text-sm">
                                                <option value="primary"
                                                    {{ $service->color == 'primary' ? 'selected' : '' }}>أزرق (Primary)
                                                </option>
                                                <option value="secondary"
                                                    {{ $service->color == 'secondary' ? 'selected' : '' }}>أحمر
                                                    (Secondary)
                                                </option>
                                            </select>
                                        </div>
                                        <div class="sm:col-span-6">
                                            <label class="block text-sm font-medium text-gray-700">الوصف</label>
                                            <textarea name="description" rows="3"
                                                class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md p-2 border">{{ $service->description }}</textarea>
                                        </div>
                                        <div class="sm:col-span-6">
                                            <label class="block text-sm font-medium text-gray-700">صورة الخدمة</label>
                                            @if ($service->image)
                                                <img src="{{ asset($service->image) }}" alt="{{ $service->title }}"
                                                    class="mt-2 mb-2 h-32 w-auto rounded-lg">
                                            @endif
                                            <input type="file" name="image" accept="image/*"
                                                class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md p-2 border">
                                        </div>
                                        <div class="sm:col-span-6">
                                            <label class="block text-sm font-medium text-gray-700">SVG Icon
                                                Code</label>
                                            <textarea name="icon" rows="3"
                                                class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md p-2 border">{{ $service->icon }}</textarea>
                                        </div>
                                    </div>
                                    <div class="mt-4">
                                        <button type="submit"
                                            class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-primary-600 hover:bg-primary-700">
                                            حفظ التعديلات
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <!-- Projects Tab -->
        <div x-show="activeTab === 'projects'" class="space-y-4 sm:space-y-6">
            <!-- Add New Project -->
            <div class="bg-white shadow overflow-hidden sm:rounded-lg p-4 sm:p-6">
                <h3 class="text-base sm:text-lg font-medium leading-6 text-gray-900 mb-3 sm:mb-4">إضافة مشروع جديد</h3>
                <form action="{{ route('dashboard.projects.store') }}" method="POST">
                    @csrf
                    <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                        <div class="sm:col-span-3">
                            <label for="project_title" class="block text-sm font-medium text-gray-700">عنوان
                                المشروع</label>
                            <input type="text" name="title" id="project_title" required
                                class="mt-1 focus:ring-primary-500 focus:border-primary-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md p-2 border">
                        </div>
                        <div class="sm:col-span-3">
                            <label for="project_color" class="block text-sm font-medium text-gray-700">اللون</label>
                            <select name="color" id="project_color"
                                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500 sm:text-sm">
                                <option value="primary">أزرق (Primary)</option>
                                <option value="secondary">أحمر (Secondary)</option>
                            </select>
                        </div>
                        <div class="sm:col-span-6">
                            <label for="project_description"
                                class="block text-sm font-medium text-gray-700">الوصف</label>
                            <textarea name="description" id="project_description" rows="3" required
                                class="mt-1 focus:ring-primary-500 focus:border-primary-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md p-2 border"></textarea>
                        </div>
                    </div>
                    <div class="mt-4">
                        <button type="submit"
                            class="w-full sm:w-auto inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-primary-600 hover:bg-primary-700">
                            إضافة
                        </button>
                    </div>
                </form>
            </div>

            <!-- List Projects -->
            <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                <ul role="list" class="divide-y divide-gray-200">
                    @foreach ($projects as $project)
                        <li class="px-4 py-4 sm:px-6" x-data="{ open: false }">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <div
                                        class="flex-shrink-0 h-10 w-10 rounded-full bg-{{ $project->color === 'primary' ? 'blue' : 'red' }}-100 flex items-center justify-center text-{{ $project->color === 'primary' ? 'blue' : 'red' }}-600">
                                        <span class="font-bold text-lg">{{ substr($project->title, 0, 1) }}</span>
                                    </div>
                                    <div class="mr-4">
                                        <div class="text-sm font-medium text-primary-600 truncate">
                                            {{ $project->title }}</div>
                                        <div class="text-sm text-gray-500">{{ Str::limit($project->description, 50) }}
                                        </div>
                                    </div>
                                </div>
                                <div class="flex space-x-2 space-x-reverse">
                                    <button @click="open = !open"
                                        class="text-indigo-600 hover:text-indigo-900">تعديل</button>
                                    <form x-ref="deleteForm"
                                        action="{{ route('dashboard.projects.destroy', $project->id) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button"
                                            @click="if(confirm('هل أنت متأكد؟')) $refs.deleteForm.submit()"
                                            class="text-red-600 hover:text-red-900 cursor-pointer">حذف</button>
                                    </form>
                                </div>
                            </div>
                            <!-- Edit Form -->
                            <div x-show="open" class="mt-4 pt-4 border-t border-gray-200">
                                <form action="{{ route('dashboard.projects.update', $project->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                                        <div class="sm:col-span-3">
                                            <label class="block text-sm font-medium text-gray-700">عنوان
                                                المشروع</label>
                                            <input type="text" name="title" value="{{ $project->title }}"
                                                required
                                                class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md p-2 border">
                                        </div>
                                        <div class="sm:col-span-3">
                                            <label class="block text-sm font-medium text-gray-700">اللون</label>
                                            <select name="color"
                                                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm sm:text-sm">
                                                <option value="primary"
                                                    {{ $project->color == 'primary' ? 'selected' : '' }}>أزرق (Primary)
                                                </option>
                                                <option value="secondary"
                                                    {{ $project->color == 'secondary' ? 'selected' : '' }}>أحمر
                                                    (Secondary)
                                                </option>
                                            </select>
                                        </div>
                                        <div class="sm:col-span-6">
                                            <label class="block text-sm font-medium text-gray-700">الوصف</label>
                                            <textarea name="description" rows="3" required
                                                class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md p-2 border">{{ $project->description }}</textarea>
                                        </div>
                                    </div>
                                    <div class="mt-4">
                                        <button type="submit"
                                            class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-primary-600 hover:bg-primary-700">
                                            حفظ التعديلات
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <!-- Clients Tab -->
        <div x-show="activeTab === 'clients'" class="space-y-4 sm:space-y-6">
            <!-- Add New Client -->
            <div class="bg-white shadow overflow-hidden sm:rounded-lg p-4 sm:p-6">
                <h3 class="text-base sm:text-lg font-medium leading-6 text-gray-900 mb-3 sm:mb-4">إضافة عميل جديد</h3>
                <form action="{{ route('dashboard.clients.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                        <div class="sm:col-span-3">
                            <label for="client_name" class="block text-sm font-medium text-gray-700">اسم
                                العميل</label>
                            <input type="text" name="name" id="client_name" required
                                class="mt-1 focus:ring-primary-500 focus:border-primary-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md p-2 border">
                        </div>
                        <div class="sm:col-span-3">
                            <label for="client_order" class="block text-sm font-medium text-gray-700">الترتيب</label>
                            <input type="number" name="order" id="client_order" value="0"
                                class="mt-1 focus:ring-primary-500 focus:border-primary-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md p-2 border">
                        </div>
                        <div class="sm:col-span-6">
                            <label for="client_logo" class="block text-sm font-medium text-gray-700">شعار
                                العميل</label>
                            <input type="file" name="logo" id="client_logo" required accept="image/*"
                                class="mt-1 focus:ring-primary-500 focus:border-primary-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md p-2 border">
                        </div>
                    </div>
                    <div class="mt-4">
                        <button type="submit"
                            class="w-full sm:w-auto inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-primary-600 hover:bg-primary-700">
                            إضافة
                        </button>
                    </div>
                </form>
            </div>

            <!-- List Clients -->
            <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                <ul role="list" class="divide-y divide-gray-200">
                    @foreach ($clients as $client)
                        <li class="px-4 py-4 sm:px-6" x-data="{ open: false }">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <div
                                        class="flex-shrink-0 h-16 w-16 rounded-lg overflow-hidden bg-gray-100 flex items-center justify-center">
                                        <img src="{{ asset($client->logo) }}" alt="{{ $client->name }}"
                                            class="max-w-full max-h-full object-contain">
                                    </div>
                                    <div class="mr-4">
                                        <div class="text-sm font-medium text-primary-600">{{ $client->name }}</div>
                                        <div class="text-sm text-gray-500">الترتيب: {{ $client->order }}</div>
                                    </div>
                                </div>
                                <div class="flex space-x-2 space-x-reverse">
                                    <button @click="open = !open"
                                        class="text-indigo-600 hover:text-indigo-900">تعديل</button>
                                    <form x-ref="deleteForm"
                                        action="{{ route('dashboard.clients.destroy', $client->id) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" @click="confirmDelete"
                                            class="text-red-600 hover:text-red-900 cursor-pointer">حذف</button>
                                    </form>
                                </div>
                            </div>
                            <!-- Edit Form -->
                            <div x-show="open" class="mt-4 pt-4 border-t border-gray-200">
                                <form action="{{ route('dashboard.clients.update', $client->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                                        <div class="sm:col-span-3">
                                            <label class="block text-sm font-medium text-gray-700">اسم العميل</label>
                                            <input type="text" name="name" value="{{ $client->name }}"
                                                required
                                                class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md p-2 border">
                                        </div>
                                        <div class="sm:col-span-3">
                                            <label class="block text-sm font-medium text-gray-700">الترتيب</label>
                                            <input type="number" name="order" value="{{ $client->order }}"
                                                class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md p-2 border">
                                        </div>
                                        <div class="sm:col-span-6">
                                            <label class="block text-sm font-medium text-gray-700">شعار العميل</label>
                                            <img src="{{ asset($client->logo) }}" alt="{{ $client->name }}"
                                                class="mt-2 mb-2 h-20 w-auto">
                                            <input type="file" name="logo" accept="image/*"
                                                class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md p-2 border">
                                        </div>
                                    </div>
                                    <div class="mt-4">
                                        <button type="submit"
                                            class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-primary-600 hover:bg-primary-700">
                                            حفظ التعديلات
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <!-- Brands Tab -->
        <div x-show="activeTab === 'brands'" class="space-y-4 sm:space-y-6">
            <!-- Add New Brand -->
            <div class="bg-white shadow overflow-hidden sm:rounded-lg p-4 sm:p-6">
                <h3 class="text-base sm:text-lg font-medium leading-6 text-gray-900 mb-3 sm:mb-4">إضافة علامة تجارية
                    جديدة</h3>
                <form action="{{ route('dashboard.brands.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                        <div class="sm:col-span-3">
                            <label for="brand_name" class="block text-sm font-medium text-gray-700">اسم العلامة
                                التجارية</label>
                            <input type="text" name="name" id="brand_name" required
                                class="mt-1 focus:ring-primary-500 focus:border-primary-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md p-2 border">
                        </div>
                        <div class="sm:col-span-3">
                            <label for="brand_order" class="block text-sm font-medium text-gray-700">الترتيب</label>
                            <input type="number" name="order" id="brand_order" value="0"
                                class="mt-1 focus:ring-primary-500 focus:border-primary-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md p-2 border">
                        </div>
                        <div class="sm:col-span-6">
                            <label for="brand_logo" class="block text-sm font-medium text-gray-700">شعار العلامة
                                التجارية</label>
                            <input type="file" name="logo" id="brand_logo" required accept="image/*"
                                class="mt-1 focus:ring-primary-500 focus:border-primary-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md p-2 border">
                        </div>
                    </div>
                    <div class="mt-4">
                        <button type="submit"
                            class="w-full sm:w-auto inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-primary-600 hover:bg-primary-700">
                            إضافة
                        </button>
                    </div>
                </form>
            </div>

            <!-- List Brands -->
            <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                <ul role="list" class="divide-y divide-gray-200">
                    @foreach ($brands as $brand)
                        <li class="px-4 py-4 sm:px-6" x-data="{ open: false }">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <div
                                        class="flex-shrink-0 h-16 w-16 rounded-lg overflow-hidden bg-gray-100 flex items-center justify-center">
                                        <img src="{{ asset($brand->logo) }}" alt="{{ $brand->name }}"
                                            class="max-w-full max-h-full object-contain">
                                    </div>
                                    <div class="mr-4">
                                        <div class="text-sm font-medium text-primary-600">{{ $brand->name }}</div>
                                        <div class="text-sm text-gray-500">الترتيب: {{ $brand->order }}</div>
                                    </div>
                                </div>
                                <div class="flex space-x-2 space-x-reverse">
                                    <button @click="open = !open"
                                        class="text-indigo-600 hover:text-indigo-900">تعديل</button>
                                    <form x-ref="deleteForm"
                                        action="{{ route('dashboard.brands.destroy', $brand->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" @click="confirmDelete"
                                            class="text-red-600 hover:text-red-900 cursor-pointer">حذف</button>
                                    </form>
                                </div>
                            </div>
                            <!-- Edit Form -->
                            <div x-show="open" class="mt-4 pt-4 border-t border-gray-200">
                                <form action="{{ route('dashboard.brands.update', $brand->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                                        <div class="sm:col-span-3">
                                            <label class="block text-sm font-medium text-gray-700">اسم العلامة
                                                التجارية</label>
                                            <input type="text" name="name" value="{{ $brand->name }}"
                                                required
                                                class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md p-2 border">
                                        </div>
                                        <div class="sm:col-span-3">
                                            <label class="block text-sm font-medium text-gray-700">الترتيب</label>
                                            <input type="number" name="order" value="{{ $brand->order }}"
                                                class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md p-2 border">
                                        </div>
                                        <div class="sm:col-span-6">
                                            <label class="block text-sm font-medium text-gray-700">شعار العلامة
                                                التجارية</label>
                                            <img src="{{ asset($brand->logo) }}" alt="{{ $brand->name }}"
                                                class="mt-2 mb-2 h-20 w-auto">
                                            <input type="file" name="logo" accept="image/*"
                                                class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md p-2 border">
                                        </div>
                                    </div>
                                    <div class="mt-4">
                                        <button type="submit"
                                            class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-primary-600 hover:bg-primary-700">
                                            حفظ التعديلات
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <!-- Messages Tab -->
        <div x-show="activeTab === 'messages'" class="space-y-6" x-data="{ selectedMessages: [] }">
            <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                <div class="px-4 py-5 sm:px-6 border-b border-gray-200">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="text-lg font-medium leading-6 text-gray-900">
                                رسائل التواصل
                                <span class="text-sm text-gray-500 mr-2">({{ $contacts->count() }} رسالة)</span>
                            </h3>
                            <p class="mt-1 text-sm text-gray-500">
                                جميع الرسائل المرسلة من نموذج التواصل في الموقع
                            </p>
                        </div>
                        <div class="flex items-center">
                            <input type="checkbox" class="h-4 w-4 text-primary-600 border-gray-300 rounded"
                                @click="selectedMessages = $event.target.checked ? {{ $contacts->pluck('id') }} : []">
                            <label class="mr-2 text-sm text-gray-600">تحديد الكل</label>
                        </div>
                    </div>
                </div>

                <!-- Bulk Actions -->
                <div x-show="selectedMessages.length > 0"
                    class="bg-gray-50 border-b border-gray-200 px-4 py-3 sm:px-6">
                    <div class="flex items-center justify-between">
                        <p class="text-sm text-gray-600"><span x-text="selectedMessages.length"></span> رسائل محددة</p>
                        <div class="flex space-x-3 space-x-reverse">
                            <form action="{{ route('dashboard.contacts.bulk-read') }}" method="POST">
                                @csrf
                                <template x-for="id in selectedMessages" :key="id">
                                    <input type="hidden" name="ids[]" :value="id">
                                </template>
                                <button type="submit" class="text-sm text-primary-600 hover:text-primary-900">
                                    تحديد كمقروء
                                </button>
                            </form>
                            <form action="{{ route('dashboard.contacts.bulk-delete') }}" method="POST"
                                onsubmit="return confirm('هل أنت متأكد من حذف الرسائل المحددة؟')">
                                @csrf
                                <template x-for="id in selectedMessages" :key="id">
                                    <input type="hidden" name="ids[]" :value="id">
                                </template>
                                <button type="submit" class="text-sm text-red-600 hover:text-red-900">
                                    حذف المحدد
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                @if ($contacts->count() > 0)
                    <ul role="list" class="divide-y divide-gray-200">
                        @foreach ($contacts as $contact)
                            <li class="px-4 py-5 sm:px-6 transition-colors"
                                :class="{
                                    'bg-blue-50': !{{ $contact->is_read }},
                                    'bg-white': {{ $contact->is_read }},
                                    'bg-blue-100': selectedMessages.includes({{ $contact->id }})
                                }"
                                x-data="{ expanded: false }">
                                <div class="flex flex-col sm:flex-row sm:items-start sm:justify-between gap-3">
                                    <div class="flex-shrink-0">
                                        <input type="checkbox"
                                            class="h-4 w-4 text-primary-600 border-gray-300 rounded"
                                            value="{{ $contact->id }}" x-model="selectedMessages">
                                    </div>
                                    <div class="flex-1 min-w-0 cursor-pointer" @click="expanded = !expanded">
                                        <div class="flex flex-col sm:flex-row sm:items-center gap-2 sm:gap-3 mb-2">
                                            @if (!$contact->is_read)
                                                <span class="flex h-2 w-2">
                                                    <span
                                                        class="animate-ping absolute inline-flex h-2 w-2 rounded-full bg-primary-400 opacity-75"></span>
                                                    <span
                                                        class="relative inline-flex rounded-full h-2 w-2 bg-primary-500"></span>
                                                </span>
                                            @endif
                                            <div class="flex items-center gap-2">
                                                <svg class="w-4 h-4 sm:w-5 sm:h-5 text-gray-400" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                                                    </path>
                                                </svg>
                                                <p class="text-sm font-bold text-gray-900">{{ $contact->name }}</p>
                                            </div>
                                            <div class="flex items-center gap-2">
                                                <svg class="w-4 h-4 text-gray-400" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                                    </path>
                                                </svg>
                                                <p class="text-xs sm:text-sm text-gray-600 break-all">
                                                    {{ $contact->email }}</p>
                                            </div>
                                            @if ($contact->phone)
                                                <div class="flex items-center gap-2">
                                                    <svg class="w-4 h-4 text-gray-400" fill="none"
                                                        stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                                                        </path>
                                                    </svg>
                                                    <p class="text-xs sm:text-sm text-gray-600">
                                                        {{ $contact->phone }}
                                                    </p>
                                                </div>
                                            @endif
                                        </div>
                                        <p class="text-xs sm:text-sm text-gray-600 line-clamp-2" x-show="!expanded">
                                            {{ Str::limit($contact->message, 100) }}
                                        </p>
                                        <div x-show="expanded" class="mt-3">
                                            <div
                                                class="bg-gray-50 rounded-lg p-3 sm:p-4 border border-gray-200">
                                                <p class="text-xs sm:text-sm font-medium text-gray-700 mb-2">
                                                    الرسالة:
                                                </p>
                                                <p
                                                    class="text-xs sm:text-sm text-gray-800 whitespace-pre-wrap leading-relaxed">
                                                    {{ $contact->message }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="flex items-center justify-between sm:flex-col sm:items-end gap-2 sm:gap-3 sm:mr-4">
                                        <span class="text-xs text-gray-500">
                                            {{ $contact->created_at->diffForHumans() }}
                                        </span>
                                        <div class="flex space-x-2 space-x-reverse">
                                            <form
                                                action="{{ route('dashboard.contacts.toggle-read', $contact->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit"
                                                    class="text-sm {{ $contact->is_read ? 'text-gray-600 hover:text-gray-900' : 'text-primary-600 hover:text-primary-900' }}"
                                                    title="{{ $contact->is_read ? 'تعيين كغير مقروء' : 'تعيين كمقروء' }}">
                                                    @if ($contact->is_read)
                                                        <svg class="w-5 h-5" fill="none"
                                                            stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="2"
                                                                d="M3 19v-8.93a2 2 0 01.89-1.664l7-4.666a2 2 0 012.22 0l7 4.666A2 2 0 0121 10.07V19M3 19a2 2 0 002 2h14a2 2 0 002-2M3 19l6.75-4.5M21 19l-6.75-4.5M3 10l6.75 4.5M21 10l-6.75 4.5m0 0l-1.14.76a2 2 0 01-2.22 0l-1.14-.76">
                                                            </path>
                                                        </svg>
                                                    @else
                                                        <svg class="w-5 h-5" fill="none"
                                                            stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="2"
                                                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                                            </path>
                                                        </svg>
                                                    @endif
                                                </button>
                                            </form>
                                            <form
                                                action="{{ route('dashboard.contacts.destroy', $contact->id) }}"
                                                method="POST"
                                                onsubmit="return confirm('هل أنت متأكد من حذف هذه الرسالة؟')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="text-red-600 hover:text-red-900" title="حذف">
                                                    <svg class="w-5 h-5" fill="none"
                                                        stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                        </path>
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <div class="text-center py-12 px-4">
                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4">
                            </path>
                        </svg>
                        <h3 class="mt-2 text-sm font-medium text-gray-900">لا توجد رسائل</h3>
                        <p class="mt-1 text-sm text-gray-500">لم يتم استلام أي رسائل بعد.</p>
                    </div>
                @endif
            </div>
        </div>

    </div>

</body>

</html>
