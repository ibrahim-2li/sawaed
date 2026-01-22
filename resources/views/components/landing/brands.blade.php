@props(['brands'])

@if ($brands->count() > 0)
    <section id="brands" class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-primary-600 font-bold tracking-wide uppercase text-sm mb-2">علاماتنا التجارية</h2>
                <h3 class="text-4xl font-bold text-gray-900">علامات تستحق الثقة</h3>
                <p class="mt-4 text-lg text-gray-600 max-w-2xl mx-auto">
                    نفخر بامتلاكنا لمجموعة متميزة من العلامات التجارية التي تخدم مختلف القطاعات
                </p>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach ($brands as $brand)
                    <div
                        class="group bg-white rounded-xl p-6 shadow-md hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 border-t-4 border-primary-600">
                        <div
                            class="aspect-square flex items-center justify-center mb-4 overflow-hidden rounded-lg bg-gray-50">
                            <img src="{{ asset($brand->logo) }}" alt="{{ $brand->name }}"
                                class="max-w-full max-h-full object-contain group-hover:scale-110 transition-transform duration-300">
                        </div>
                        <h4
                            class="text-center text-lg font-bold text-gray-900 group-hover:text-primary-600 transition-colors">
                            {{ $brand->name }}
                        </h4>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endif
