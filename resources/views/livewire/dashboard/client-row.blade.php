<li class="px-4 py-4 sm:px-6">
    <div class="flex items-center justify-between">
        <div class="flex items-center">
            <div class="flex-shrink-0 h-16 w-16 rounded-lg overflow-hidden bg-gray-100 flex items-center justify-center">
                <img src="{{ asset($logo) }}" alt="{{ $name }}" class="max-w-full max-h-full object-contain">
            </div>
            <div class="mr-4">
                <div class="text-sm font-medium text-primary-600">{{ $name }}</div>
                <div class="text-sm text-gray-500">الترتيب: {{ $order }}</div>
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
                    <label class="block text-sm font-medium text-gray-700">اسم العميل</label>
                    <input type="text" wire:model="name"
                        class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md p-2 border">
                    @error('name')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>
                <div class="sm:col-span-3">
                    <label class="block text-sm font-medium text-gray-700">الترتيب</label>
                    <input type="number" wire:model="order"
                        class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md p-2 border">
                </div>
                <div class="sm:col-span-6">
                    <label class="block text-sm font-medium text-gray-700">شعار العميل</label>
                    @if ($new_logo)
                        <img src="{{ $new_logo->temporaryUrl() }}" class="mt-2 mb-2 h-20 w-auto">
                    @endif
                    <input type="file" wire:model="new_logo" accept="image/*"
                        class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md p-2 border">
                    <div wire:loading wire:target="new_logo" class="text-sm text-gray-500 mt-1">جاري التحميل...</div>
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
