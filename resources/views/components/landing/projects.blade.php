@props(['projects'])

@if ($projects->count() > 0)
    <section id="projects" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-primary-600 font-bold tracking-wide uppercase text-sm mb-2">مشاريعنا</h2>
                <h3 class="text-4xl font-bold text-gray-900">سجل حافل بالإنجازات</h3>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @foreach ($projects as $project)
                    <div
                        class="bg-gray-50 p-6 rounded-xl border-r-4 border-{{ $project->color === 'primary' ? 'primary' : 'secondary' }}-600 hover:bg-white hover:shadow-lg transition-all">
                        <h4 class="font-bold text-lg text-gray-900 mb-2">{{ $project->title }}</h4>
                        <p class="text-gray-600 text-sm">{{ $project->description }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endif
