@props(['clients'])

<section id="clients" class="py-20 bg-white overflow-hidden">
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
                @foreach ($clients as $client)
                    <div
                        class="flex-shrink-0 w-[200px] h-[120px] mx-6 hover:scale-110 transition-transform duration-300 flex items-center justify-center group">
                        <img src="{{ asset($client->logo) }}" alt="{{ $client->name }}"
                            class="max-w-[160px] max-h-[100px] object-contain group-hover:grayscale-0 transition-all duration-300 opacity-70 group-hover:opacity-100">
                    </div>
                @endforeach
                <!-- Set 2 -->
                @foreach ($clients as $client)
                    <div
                        class="flex-shrink-0 w-[200px] h-[120px] mx-6 hover:scale-110 transition-transform duration-300 flex items-center justify-center group">
                        <img src="{{ asset($client->logo) }}" alt="{{ $client->name }}"
                            class="max-w-[160px] max-h-[100px] object-contain  group-hover:grayscale-0 transition-all duration-300 opacity-70 group-hover:opacity-100">
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
