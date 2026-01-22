<div class="space-y-4 sm:space-y-6">
    <!-- Add New Project -->
    <div class="bg-white shadow overflow-hidden sm:rounded-lg p-4 sm:p-6">
        <h3 class="text-base sm:text-lg font-medium leading-6 text-gray-900 mb-3 sm:mb-4">إضافة مشروع جديد</h3>
        <form wire:submit.prevent="store">
            @if (session()->has('success'))
                <div class="bg-blue-100 border border-blue-400 text-blue-700 px-3 sm:px-4 py-3 rounded relative mb-4 sm:mb-6 text-sm"
                    role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif
            <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                <div class="sm:col-span-3">
                    <label for="project_title" class="block text-sm font-medium text-gray-700">عنوان المشروع</label>
                    <input type="text" wire:model="title" id="project_title"
                        class="mt-1 focus:ring-primary-500 focus:border-primary-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md p-2 border">
                    @error('title')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>
                <div class="sm:col-span-3">
                    <label for="project_color" class="block text-sm font-medium text-gray-700">اللون</label>
                    <select wire:model="color" id="project_color"
                        class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500 sm:text-sm">
                        <option value="primary">أزرق (Primary)</option>
                        <option value="secondary">أحمر (Secondary)</option>
                    </select>
                    @error('color')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>
                <div class="sm:col-span-6">
                    <label for="project_description" class="block text-sm font-medium text-gray-700">الوصف</label>
                    <textarea wire:model="description" id="project_description" rows="3"
                        class="mt-1 focus:ring-primary-500 focus:border-primary-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md p-2 border"></textarea>
                    @error('description')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="mt-4">
                <button type="submit"
                    class="w-full sm:w-auto inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-primary-600 hover:bg-primary-700">
                    إضافة
                    <span wire:loading wire:target="store" class="mr-2">...</span>
                </button>
            </div>
        </form>
    </div>

    <!-- List Projects -->
    <div class="bg-white shadow overflow-hidden sm:rounded-lg">
        <ul role="list" class="divide-y divide-gray-200">
            @foreach ($projects as $project)
                <livewire:dashboard.project-row :project="$project" :key="$project->id" />
            @endforeach
        </ul>
    </div>
</div>
