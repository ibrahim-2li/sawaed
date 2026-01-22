@props(['settings'])

<section id="contact" class="py-20 bg-gradient-to-b from-gray-50 to-white relative overflow-hidden">
    <div class="absolute top-0 left-0 w-full h-full overflow-hidden z-0 opacity-5">
        <div class="absolute -top-[20%] -right-[10%] w-[50%] h-[50%] rounded-full bg-primary-600 blur-3xl"></div>
        <div class="absolute top-[40%] -left-[10%] w-[40%] h-[40%] rounded-full bg-secondary-600 blur-3xl"></div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center mb-16">
            <h2 class="text-secondary-600 font-bold tracking-wide uppercase text-sm mb-2">تواصل معنا</h2>
            <h3 class="text-4xl font-bold text-gray-900">نسعد بخدمتك</h3>
            <p class="mt-4 text-lg text-gray-600 max-w-2xl mx-auto">
                لديك استفسار أو تحتاج إلى عرض سعر؟ تواصل معنا الآن وسنرد عليك في أقرب وقت ممكن
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <!-- Contact Form -->
            <div class="bg-white rounded-2xl shadow-2xl p-8 md:p-10 border-t-4 border-primary-600">
                @if (session('success'))
                    <div class="mb-6 p-4 bg-green-50 border-r-4 border-green-500 rounded-lg">
                        <div class="flex items-center gap-3">
                            <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <p class="text-green-700 font-medium">{{ session('success') }}</p>
                        </div>
                    </div>
                @endif

                <form action="{{ route('contact.submit') }}" method="POST" class="space-y-6">
                    @csrf

                    {{-- Honeypot field (hidden from users, bots will fill it) --}}
                    <div style="position: absolute; left: -5000px;" aria-hidden="true">
                        <input type="text" name="website" tabindex="-1" autocomplete="off">
                    </div>

                    {{-- Timestamp for time-based validation --}}
                    <input type="hidden" name="form_token" value="{{ time() }}">

                    <div>
                        <label for="name" class="block text-sm font-bold text-gray-700 mb-2">الاسم الكامل
                            *</label>
                        <input type="text" id="name" name="name" required value="{{ old('name') }}"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-all @error('name') border-red-500 @enderror"
                            placeholder="أدخل اسمك الكامل">
                        @error('name')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <label for="email" class="block text-sm font-bold text-gray-700 mb-2">البريد
                                الإلكتروني *</label>
                            <input type="email" id="email" name="email" required value="{{ old('email') }}"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-all @error('email') border-red-500 @enderror"
                                placeholder="example@email.com">
                            @error('email')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="phone" class="block text-sm font-bold text-gray-700 mb-2">رقم
                                الهاتف</label>
                            <input type="tel" id="phone" name="phone" value="{{ old('phone') }}"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-all @error('phone') border-red-500 @enderror"
                                placeholder="05xxxxxxxx">
                            @error('phone')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <label for="message" class="block text-sm font-bold text-gray-700 mb-2">الرسالة *</label>
                        <textarea id="message" name="message" rows="5" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-all resize-none @error('message') border-red-500 @enderror"
                            placeholder="اكتب رسالتك هنا...">{{ old('message') }}</textarea>
                        @error('message')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit"
                        class="w-full bg-primary-600 text-white font-bold py-4 px-8 rounded-full hover:bg-primary-700 transform hover:scale-105 transition-all duration-300 shadow-lg hover:shadow-primary-600/30 flex items-center justify-center gap-2">
                        <span>إرسال الرسالة</span>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                        </svg>
                    </button>
                </form>
            </div>

            <!-- Contact Info -->
            <div class="space-y-8">
                <div
                    class="bg-gradient-to-br from-primary-600 to-primary-700 rounded-2xl p-8 md:p-10 text-white shadow-2xl">
                    <h4 class="text-2xl font-bold mb-6">معلومات التواصل</h4>
                    <div class="space-y-6">
                        <div class="flex items-start gap-4">
                            <div
                                class="flex-shrink-0 w-12 h-12 bg-white/20 rounded-full flex items-center justify-center">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <div>
                                <h5 class="font-bold mb-1">العنوان</h5>
                                <p class="text-primary-100">
                                    {{ $settings->get('contact_address', 'الرياض، المملكة العربية السعودية') }}</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-4">
                            <div
                                class="flex-shrink-0 w-12 h-12 bg-white/20 rounded-full flex items-center justify-center">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z">
                                    </path>
                                    <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                                </svg>
                            </div>
                            <div>
                                <h5 class="font-bold mb-1">البريد الإلكتروني</h5>
                                <a href="mailto:{{ $settings->get('contact_email', 'info@sawaedalriyadh.com') }}"
                                    class="text-primary-100 hover:text-white transition-colors">
                                    {{ $settings->get('contact_email', 'info@sawaedalriyadh.com') }}
                                </a>
                            </div>
                        </div>

                        <div class="flex items-start gap-4">
                            <div
                                class="flex-shrink-0 w-12 h-12 bg-white/20 rounded-full flex items-center justify-center">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z">
                                    </path>
                                </svg>
                            </div>
                            <div>
                                <h5 class="font-bold mb-1">رقم الهاتف</h5>
                                <a href="tel:+{{ $settings->get('contact_phone', '966114038104') }}"
                                    class="text-primary-100 hover:text-white transition-colors">
                                    {{ $settings->get('contact_phone', '966114038104') }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-2xl shadow-lg p-8 border-r-4 border-secondary-600">
                    <h4 class="text-xl font-bold text-gray-900 mb-4">ساعات العمل</h4>
                    <div class="space-y-3 text-gray-600">
                        <div class="flex justify-between items-center pb-3 border-b border-gray-200">
                            <span class="font-medium">الأحد - الخميس</span>
                            <span class="font-bold text-gray-900">8:00 ص - 5:00 م</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="font-medium">الجمعة - السبت</span>
                            <span class="font-bold text-secondary-600">مغلق</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
