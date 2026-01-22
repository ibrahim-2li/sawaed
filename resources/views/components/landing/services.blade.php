@props(['services'])

<section id="services" class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-secondary-600 font-bold tracking-wide uppercase text-sm mb-2">خدماتنا</h2>
            <h3 class="text-4xl font-bold text-gray-900">حلول متكاملة لاحتياجاتك</h3>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($services as $service)
                <div
                    class="group relative bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 border-t-4 border-{{ $service->color === 'primary' ? 'primary' : 'secondary' }}-600">
                    @if ($service->image)
                        <div class="relative h-48 overflow-hidden">
                            <img src="{{ asset($service->image) }}" alt="{{ $service->title }}"
                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                        </div>
                    @endif
                    <div class="p-6 md:p-8">
                        <div
                            class="w-14 h-14 bg-{{ $service->color === 'primary' ? 'primary' : 'secondary' }}-50 rounded-xl flex items-center justify-center text-{{ $service->color === 'primary' ? 'primary' : 'secondary' }}-600 mb-6">
                            @if ($service->icon)
                                {!! $service->icon !!}
                            @else
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                </svg>
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
