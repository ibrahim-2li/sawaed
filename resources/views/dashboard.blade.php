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
        body { font-family: 'Tajawal', sans-serif; }
    </style>
</head>
<body class="bg-gray-100 text-gray-800">

    <nav class="bg-white shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <h1 class="text-2xl font-bold text-primary-600">لوحة التحكم</h1>
                </div>
                <div class="flex items-center">
                    <a href="{{ route('home') }}" class="text-gray-600 hover:text-primary-600 px-3 py-2 rounded-md text-sm font-medium">عرض الموقع</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-gray-600 hover:text-primary-600 px-3 py-2 rounded-md text-sm font-medium">تسجيل الخروج</button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <div class="max-w-7xl mx-auto py-10 px-4 sm:px-6 lg:px-8" x-data="{ activeTab: 'settings' }">
        
        @if(session('success'))
            <div class="bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded relative mb-6" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        @if($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-6" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="flex space-x-4 space-x-reverse mb-6 border-b border-gray-200">
            <button @click="activeTab = 'settings'" :class="{ 'border-primary-600 text-primary-600': activeTab === 'settings', 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300': activeTab !== 'settings' }" class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                الإعدادات العامة
            </button>
            <button @click="activeTab = 'services'" :class="{ 'border-primary-600 text-primary-600': activeTab === 'services', 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300': activeTab !== 'services' }" class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                الخدمات
            </button>
            <button @click="activeTab = 'projects'" :class="{ 'border-primary-600 text-primary-600': activeTab === 'projects', 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300': activeTab !== 'projects' }" class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                المشاريع
            </button>
            <button @click="activeTab = 'clients'" :class="{ 'border-primary-600 text-primary-600': activeTab === 'clients', 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300': activeTab !== 'clients' }" class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                العملاء
            </button>
        </div>

        <!-- Settings Tab -->
        <div x-show="activeTab === 'settings'" class="bg-white shadow overflow-hidden sm:rounded-lg p-6">
            <form action="{{ route('dashboard.settings.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                    
                    <div class="sm:col-span-6">
                        <h3 class="text-lg font-medium leading-6 text-gray-900 mb-4">القسم الرئيسي (Hero)</h3>
                    </div>

                    <div class="sm:col-span-6">
                        <label for="hero_title" class="block text-sm font-medium text-gray-700">العنوان الرئيسي</label>
                        <input type="text" name="hero_title" id="hero_title" value="{{ $settings->get('hero_title') }}" class="mt-1 focus:ring-primary-500 focus:border-primary-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md p-2 border">
                    </div>

                    <div class="sm:col-span-6">
                        <label for="hero_subtitle" class="block text-sm font-medium text-gray-700">العنوان الفرعي (الملون)</label>
                        <input type="text" name="hero_subtitle" id="hero_subtitle" value="{{ $settings->get('hero_subtitle') }}" class="mt-1 focus:ring-primary-500 focus:border-primary-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md p-2 border">
                    </div>

                    <div class="sm:col-span-6">
                        <label for="hero_description" class="block text-sm font-medium text-gray-700">الوصف</label>
                        <textarea name="hero_description" id="hero_description" rows="3" class="mt-1 focus:ring-primary-500 focus:border-primary-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md p-2 border">{{ $settings->get('hero_description') }}</textarea>
                    </div>

                    <div class="sm:col-span-6 border-t pt-4 mt-4">
                        <h3 class="text-lg font-medium leading-6 text-gray-900 mb-4">قسم من نحن (About)</h3>
                    </div>

                    <div class="sm:col-span-6">
                        <label for="about_title" class="block text-sm font-medium text-gray-700">العنوان</label>
                        <input type="text" name="about_title" id="about_title" value="{{ $settings->get('about_title') }}" class="mt-1 focus:ring-primary-500 focus:border-primary-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md p-2 border">
                    </div>

                    <div class="sm:col-span-6">
                        <label for="about_description_1" class="block text-sm font-medium text-gray-700">الوصف الأول</label>
                        <textarea name="about_description_1" id="about_description_1" rows="3" class="mt-1 focus:ring-primary-500 focus:border-primary-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md p-2 border">{{ $settings->get('about_description_1') }}</textarea>
                    </div>

                    <div class="sm:col-span-6">
                        <label for="about_description_2" class="block text-sm font-medium text-gray-700">الوصف الثاني</label>
                        <textarea name="about_description_2" id="about_description_2" rows="3" class="mt-1 focus:ring-primary-500 focus:border-primary-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md p-2 border">{{ $settings->get('about_description_2') }}</textarea>
                    </div>

                    <div class="sm:col-span-6">
                        <label for="about_image" class="block text-sm font-medium text-gray-700">صورة قسم من نحن</label>
                        @if($settings->get('about_image'))
                            <img src="{{ asset($settings->get('about_image')) }}" alt="About Image" class="mt-2 mb-2 h-32 w-auto rounded-lg object-cover">
                        @endif
                        <input type="file" name="about_image" id="about_image" accept="image/*" class="mt-1 focus:ring-primary-500 focus:border-primary-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md p-2 border">
                    </div>

                    <div class="sm:col-span-6 border-t pt-4 mt-4">
                        <h3 class="text-lg font-medium leading-6 text-gray-900 mb-4">معلومات التواصل</h3>
                    </div>

                    <div class="sm:col-span-3">
                        <label for="contact_email" class="block text-sm font-medium text-gray-700">البريد الإلكتروني</label>
                        <input type="email" name="contact_email" id="contact_email" value="{{ $settings->get('contact_email') }}" class="mt-1 focus:ring-primary-500 focus:border-primary-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md p-2 border">
                    </div>

                    <div class="sm:col-span-3">
                        <label for="contact_address" class="block text-sm font-medium text-gray-700">العنوان</label>
                        <input type="text" name="contact_address" id="contact_address" value="{{ $settings->get('contact_address') }}" class="mt-1 focus:ring-primary-500 focus:border-primary-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md p-2 border">
                    </div>

                     <div class="sm:col-span-3">
                        <label for="contact_linkedin" class="block text-sm font-medium text-gray-700">لينكد إن</label>
                        <input type="text" name="contact_linkedin" id="contact_linkedin" value="{{ $settings->get('contact_linkedin') }}" class="mt-1 focus:ring-primary-500 focus:border-primary-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md p-2 border">
                    </div>

                </div>
                <div class="mt-6">
                    <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-primary-600 hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500">
                        حفظ الإعدادات
                    </button>
                </div>
            </form>
        </div>

        <!-- Services Tab -->
        <div x-show="activeTab === 'services'" class="space-y-6">
            <!-- Add New Service -->
            <div class="bg-white shadow overflow-hidden sm:rounded-lg p-6">
                <h3 class="text-lg font-medium leading-6 text-gray-900 mb-4">إضافة خدمة جديدة</h3>
                <form action="{{ route('dashboard.services.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                        <div class="sm:col-span-3">
                            <label for="service_title" class="block text-sm font-medium text-gray-700">عنوان الخدمة</label>
                            <input type="text" name="title" id="service_title" required class="mt-1 focus:ring-primary-500 focus:border-primary-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md p-2 border">
                        </div>
                        <div class="sm:col-span-3">
                            <label for="service_color" class="block text-sm font-medium text-gray-700">اللون</label>
                            <select name="color" id="service_color" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500 sm:text-sm">
                                <option value="primary">أزرق (Primary)</option>
                                <option value="secondary">أحمر (Secondary)</option>
                            </select>
                        </div>
                        <div class="sm:col-span-6">
                            <label for="service_description" class="block text-sm font-medium text-gray-700">الوصف</label>
                            <textarea name="description" id="service_description" rows="3" required class="mt-1 focus:ring-primary-500 focus:border-primary-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md p-2 border"></textarea>
                        </div>
                        <div class="sm:col-span-6">
                            <label for="service_image" class="block text-sm font-medium text-gray-700">صورة الخدمة</label>
                            <input type="file" name="image" id="service_image" accept="image/*" class="mt-1 focus:ring-primary-500 focus:border-primary-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md p-2 border">
                        </div>
                        <div class="sm:col-span-6">
                            <label for="service_icon" class="block text-sm font-medium text-gray-700">SVG Icon Code</label>
                            <textarea name="icon" id="service_icon" rows="3" class="mt-1 focus:ring-primary-500 focus:border-primary-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md p-2 border"></textarea>
                        </div>
                    </div>
                    <div class="mt-4">
                        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-primary-600 hover:bg-primary-700">
                            إضافة
                        </button>
                    </div>
                </form>
            </div>

            <!-- List Services -->
            <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                <ul role="list" class="divide-y divide-gray-200">
                    @foreach($services as $service)
                        <li class="px-4 py-4 sm:px-6" x-data="{ open: false }">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10 rounded-full bg-{{ $service->color === 'primary' ? 'blue' : 'red' }}-100 flex items-center justify-center text-{{ $service->color === 'primary' ? 'blue' : 'red' }}-600">
                                        @if($service->icon)
                                            {!! $service->icon !!}
                                        @else
                                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" /></svg>
                                        @endif
                                    </div>
                                    <div class="mr-4">
                                        <div class="text-sm font-medium text-primary-600 truncate">{{ $service->title }}</div>
                                        <div class="text-sm text-gray-500">{{ Str::limit($service->description, 50) }}</div>
                                    </div>
                                </div>
                                <div class="flex space-x-2 space-x-reverse">
                                    <button @click="open = !open" class="text-indigo-600 hover:text-indigo-900">تعديل</button>
                                    <form x-ref="deleteForm" action="{{ route('dashboard.services.destroy', $service->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" @click="if(confirm('هل أنت متأكد؟')) $refs.deleteForm.submit()" class="text-red-600 hover:text-red-900 cursor-pointer">حذف</button>
                                    </form>
                                </div>
                            </div>
                            <!-- Edit Form -->
                            <div x-show="open" class="mt-4 pt-4 border-t border-gray-200">
                                <form action="{{ route('dashboard.services.update', $service->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                                        <div class="sm:col-span-3">
                                            <label class="block text-sm font-medium text-gray-700">عنوان الخدمة</label>
                                            <input type="text" name="title" value="{{ $service->title }}" required class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md p-2 border">
                                        </div>
                                        <div class="sm:col-span-3">
                                            <label class="block text-sm font-medium text-gray-700">اللون</label>
                                            <select name="color" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm sm:text-sm">
                                                <option value="primary" {{ $service->color == 'primary' ? 'selected' : '' }}>أزرق (Primary)</option>
                                                <option value="secondary" {{ $service->color == 'secondary' ? 'selected' : '' }}>أحمر (Secondary)</option>
                                            </select>
                                        </div>
                                        <div class="sm:col-span-6">
                                            <label class="block text-sm font-medium text-gray-700">الوصف</label>
                                            <textarea name="description" rows="3" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md p-2 border">{{ $service->description }}</textarea>
                                        </div>
                                        <div class="sm:col-span-6">
                                            <label class="block text-sm font-medium text-gray-700">صورة الخدمة</label>
                                            @if($service->image)
                                                <img src="{{ asset($service->image) }}" alt="{{ $service->title }}" class="mt-2 mb-2 h-32 w-auto rounded-lg">
                                            @endif
                                            <input type="file" name="image" accept="image/*" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md p-2 border">
                                        </div>
                                        <div class="sm:col-span-6">
                                            <label class="block text-sm font-medium text-gray-700">SVG Icon Code</label>
                                            <textarea name="icon" rows="3" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md p-2 border">{{ $service->icon }}</textarea>
                                        </div>
                                    </div>
                                    <div class="mt-4">
                                        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-primary-600 hover:bg-primary-700">
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
        <div x-show="activeTab === 'projects'" class="space-y-6">
            <!-- Add New Project -->
            <div class="bg-white shadow overflow-hidden sm:rounded-lg p-6">
                <h3 class="text-lg font-medium leading-6 text-gray-900 mb-4">إضافة مشروع جديد</h3>
                <form action="{{ route('dashboard.projects.store') }}" method="POST">
                    @csrf
                    <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                        <div class="sm:col-span-3">
                            <label for="project_title" class="block text-sm font-medium text-gray-700">عنوان المشروع</label>
                            <input type="text" name="title" id="project_title" required class="mt-1 focus:ring-primary-500 focus:border-primary-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md p-2 border">
                        </div>
                        <div class="sm:col-span-3">
                            <label for="project_color" class="block text-sm font-medium text-gray-700">اللون</label>
                            <select name="color" id="project_color" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500 sm:text-sm">
                                <option value="primary">أزرق (Primary)</option>
                                <option value="secondary">أحمر (Secondary)</option>
                            </select>
                        </div>
                        <div class="sm:col-span-6">
                            <label for="project_description" class="block text-sm font-medium text-gray-700">الوصف</label>
                            <textarea name="description" id="project_description" rows="3" required class="mt-1 focus:ring-primary-500 focus:border-primary-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md p-2 border"></textarea>
                        </div>
                    </div>
                    <div class="mt-4">
                        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-primary-600 hover:bg-primary-700">
                            إضافة
                        </button>
                    </div>
                </form>
            </div>

            <!-- List Projects -->
            <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                <ul role="list" class="divide-y divide-gray-200">
                    @foreach($projects as $project)
                        <li class="px-4 py-4 sm:px-6" x-data="{ open: false }">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10 rounded-full bg-{{ $project->color === 'primary' ? 'blue' : 'red' }}-100 flex items-center justify-center text-{{ $project->color === 'primary' ? 'blue' : 'red' }}-600">
                                        <span class="font-bold text-lg">{{ substr($project->title, 0, 1) }}</span>
                                    </div>
                                    <div class="mr-4">
                                        <div class="text-sm font-medium text-primary-600 truncate">{{ $project->title }}</div>
                                        <div class="text-sm text-gray-500">{{ Str::limit($project->description, 50) }}</div>
                                    </div>
                                </div>
                                <div class="flex space-x-2 space-x-reverse">
                                    <button @click="open = !open" class="text-indigo-600 hover:text-indigo-900">تعديل</button>
                                    <form x-ref="deleteForm" action="{{ route('dashboard.projects.destroy', $project->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" @click="if(confirm('هل أنت متأكد؟')) $refs.deleteForm.submit()" class="text-red-600 hover:text-red-900 cursor-pointer">حذف</button>
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
                                            <label class="block text-sm font-medium text-gray-700">عنوان المشروع</label>
                                            <input type="text" name="title" value="{{ $project->title }}" required class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md p-2 border">
                                        </div>
                                        <div class="sm:col-span-3">
                                            <label class="block text-sm font-medium text-gray-700">اللون</label>
                                            <select name="color" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm sm:text-sm">
                                                <option value="primary" {{ $project->color == 'primary' ? 'selected' : '' }}>أزرق (Primary)</option>
                                                <option value="secondary" {{ $project->color == 'secondary' ? 'selected' : '' }}>أحمر (Secondary)</option>
                                            </select>
                                        </div>
                                        <div class="sm:col-span-6">
                                            <label class="block text-sm font-medium text-gray-700">الوصف</label>
                                            <textarea name="description" rows="3" required class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md p-2 border">{{ $project->description }}</textarea>
                                        </div>
                                    </div>
                                    <div class="mt-4">
                                        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-primary-600 hover:bg-primary-700">
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
        <div x-show="activeTab === 'clients'" class="space-y-6">
            <!-- Add New Client -->
            <div class="bg-white shadow overflow-hidden sm:rounded-lg p-6">
                <h3 class="text-lg font-medium leading-6 text-gray-900 mb-4">إضافة عميل جديد</h3>
                <form action="{{ route('dashboard.clients.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                        <div class="sm:col-span-3">
                            <label for="client_name" class="block text-sm font-medium text-gray-700">اسم العميل</label>
                            <input type="text" name="name" id="client_name" required class="mt-1 focus:ring-primary-500 focus:border-primary-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md p-2 border">
                        </div>
                        <div class="sm:col-span-3">
                            <label for="client_order" class="block text-sm font-medium text-gray-700">الترتيب</label>
                            <input type="number" name="order" id="client_order" value="0" class="mt-1 focus:ring-primary-500 focus:border-primary-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md p-2 border">
                        </div>
                        <div class="sm:col-span-6">
                            <label for="client_logo" class="block text-sm font-medium text-gray-700">شعار العميل</label>
                            <input type="file" name="logo" id="client_logo" required accept="image/*" class="mt-1 focus:ring-primary-500 focus:border-primary-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md p-2 border">
                        </div>
                    </div>
                    <div class="mt-4">
                        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-primary-600 hover:bg-primary-700">
                            إضافة
                        </button>
                    </div>
                </form>
            </div>

            <!-- List Clients -->
            <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                <ul role="list" class="divide-y divide-gray-200">
                    @foreach($clients as $client)
                        <li class="px-4 py-4 sm:px-6" x-data="{ open: false }">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-16 w-16 rounded-lg overflow-hidden bg-gray-100 flex items-center justify-center">
                                        <img src="{{ asset($client->logo) }}" alt="{{ $client->name }}" class="max-w-full max-h-full object-contain">
                                    </div>
                                    <div class="mr-4">
                                        <div class="text-sm font-medium text-primary-600">{{ $client->name }}</div>
                                        <div class="text-sm text-gray-500">الترتيب: {{ $client->order }}</div>
                                    </div>
                                </div>
                                <div class="flex space-x-2 space-x-reverse">
                                    <button @click="open = !open" class="text-indigo-600 hover:text-indigo-900">تعديل</button>
                                    <form x-ref="deleteForm" action="{{ route('dashboard.clients.destroy', $client->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" @click="confirmDelete" class="text-red-600 hover:text-red-900 cursor-pointer">حذف</button>
                                    </form>
                                </div>
                            </div>
                            <!-- Edit Form -->
                            <div x-show="open" class="mt-4 pt-4 border-t border-gray-200">
                                <form action="{{ route('dashboard.clients.update', $client->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                                        <div class="sm:col-span-3">
                                            <label class="block text-sm font-medium text-gray-700">اسم العميل</label>
                                            <input type="text" name="name" value="{{ $client->name }}" required class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md p-2 border">
                                        </div>
                                        <div class="sm:col-span-3">
                                            <label class="block text-sm font-medium text-gray-700">الترتيب</label>
                                            <input type="number" name="order" value="{{ $client->order }}" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md p-2 border">
                                        </div>
                                        <div class="sm:col-span-6">
                                            <label class="block text-sm font-medium text-gray-700">شعار العميل</label>
                                            <img src="{{ asset($client->logo) }}" alt="{{ $client->name }}" class="mt-2 mb-2 h-20 w-auto">
                                            <input type="file" name="logo" accept="image/*" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md p-2 border">
                                        </div>
                                    </div>
                                    <div class="mt-4">
                                        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-primary-600 hover:bg-primary-700">
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

    </div>

</body>
</html>
