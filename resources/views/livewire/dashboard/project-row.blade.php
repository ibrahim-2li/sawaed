<li class="px-4 py-4 sm:px-6">
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
            <button wire:click="$toggle('editMode')"
                class="text-indigo-600 hover:text-indigo-900">{{ $editMode ? 'إلغاء' : 'تعديل' }}</button>
            <button type="button" wire:click="delete" wire:confirm="هل أنت متأكد؟"
                class="text-red-600 hover:text-red-900 cursor-pointer">حذف</button>
        </div>
    </div>
    <!-- Edit Form -->
    <div x-show="$wire.editMode" class="mt-4 pt-4 border-t border-gray-200"
        style="display: {{ $editMode ? 'block' : 'none' }};">
        <form wire:submit.prevent="update">
            @if (session()->has('success'))
                <div class="bg-blue-100 border border-blue-400 text-blue-700 px-3 sm:px-4 py-3 rounded relative mb-4 sm:mb-6 text-sm"
                    role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif
            <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                <div class="sm:col-span-3">
                    <label class="block text-sm font-medium text-gray-700">عنوان المشروع</label>
                    <input type="text" wire:model="title"
                        class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md p-2 border">
                    @error('title')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>
                <div class="sm:col-span-3">
                    <label class="block text-sm font-medium text-gray-700">اللون</label>
                    <select wire:model="color"
                        class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm sm:text-sm">
                        <option value="primary">أزرق (Primary)</option>
                        <option value="secondary">أحمر (Secondary)</option>
                    </select>
                </div>
                <div class="sm:col-span-6">
                    <label class="block text-sm font-medium text-gray-700">الوصف</label>
                    <textarea wire:model="description" rows="3"
                        class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md p-2 border"></textarea>
                    @error('description')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="mt-4">
                <button type="submit"
                    class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-primary-600 hover:bg-primary-700">
                    حفظ التعديلات
                    <span wire:loading wire:target="update" class="mr-2">...</span>
                </button>
            </div>
        </form>
    </div>
</li>
