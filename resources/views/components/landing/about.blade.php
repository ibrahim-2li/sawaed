@props(['settings'])

<section id="about" class="py-20 overflow-hidden bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col-reverse lg:flex-row gap-16 items-center">

            <div class="w-full lg:w-1/2 flex-shrink-0">
                <h2 class="text-secondary-600 font-bold tracking-wide uppercase text-sm mb-2">من نحن</h2>
                <h3 class="text-4xl font-bold text-gray-900 mb-6">
                    {{ $settings->get('about_title', 'شريكك الاستراتيجي للنجاح والتميز') }}</h3>
                <p class="text-lg text-gray-600 mb-6 leading-relaxed">
                    {{ $settings->get('about_description_1', 'قامت شركة سواعد الرياض بتنفيذ العديد من المشاريع داخل المملكة في مجموعة متنوعة من القطاعات، بما في ذلك قطاع الإعاشة، وسلاسل الإمداد الغذائي والتمويني، وقطاع الإنشاءات والتطوير العقاري.') }}
                </p>
                <p class="text-lg text-gray-600 mb-8 leading-relaxed">
                    {{ $settings->get('about_description_2', 'نتميز بفريق استشاري وإداري وتنفيذي ذو خبرة احترافية عالية في تخطيط وتنظيم وإدارة الفعاليات والمؤتمرات. نلتزم بأعلى معايير الجودة والسلامة المهنية لضمان نجاح مشاريع عملائنا.') }}
                </p>

                <div class="grid grid-cols-2 gap-6">
                    <div class="flex items-start gap-3">
                        <div
                            class="flex-shrink-0 w-10 h-10 rounded-full bg-primary-50 flex items-center justify-center text-primary-600">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900">جودة عالية</h4>
                            <p class="text-sm text-gray-500 mt-1">التزام تام بمعايير الجودة العالمية</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3">
                        <div
                            class="flex-shrink-0 w-10 h-10 rounded-full bg-secondary-50 flex items-center justify-center text-secondary-600">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900">سرعة التنفيذ</h4>
                            <p class="text-sm text-gray-500 mt-1">إنجاز المشاريع في الوقت المحدد</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="relative w-full lg:w-1/2 flex-shrink-0">
                <div class="absolute -inset-4 bg-primary-100 rounded-2xl transform rotate-3"></div>
                <img src="{{ asset($settings->get('about_image')) ?: 'https://images.unsplash.com/photo-1556761175-5973dc0f32e7?ixlib=rb-1.2.1&auto=format&fit=crop&w=1600&q=80' }}"
                    alt="About Sawaed" class="relative rounded-2xl shadow-2xl w-full object-cover h-[500px]">
                <div
                    class="absolute -bottom-6 -left-4 md:-bottom-10 md:-left-10 bg-white p-4 md:p-6 rounded-xl shadow-xl max-w-[180px] md:max-w-xs border-t-4 border-secondary-600 z-20">
                    <div class="flex items-center gap-3 md:gap-4">
                        <div class="bg-primary-50 p-2 md:p-3 rounded-full text-primary-600">
                            <svg class="w-6 h-6 md:w-8 md:h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-xs md:text-sm text-gray-500">خبرة أكثر من</p>
                            <p class="text-lg md:text-2xl font-bold text-gray-900">33 سنة</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
