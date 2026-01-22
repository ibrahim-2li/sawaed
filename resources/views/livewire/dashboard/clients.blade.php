<div class="space-y-4 sm:space-y-6">
    <!-- Add New Client -->
    <div class="bg-white shadow overflow-hidden sm:rounded-lg p-4 sm:p-6">
        <h3 class="text-base sm:text-lg font-medium leading-6 text-gray-900 mb-3 sm:mb-4">إضافة عميل جديد</h3>
        <form wire:submit.prevent="store">
            @if (session()->has('success'))
                <div class="bg-blue-100 border border-blue-400 text-blue-700 px-3 sm:px-4 py-3 rounded relative mb-4 sm:mb-6 text-sm"
                    role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif
            <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                <div class="sm:col-span-3">
                    <label for="client_name" class="block text-sm font-medium text-gray-700">اسم العميل</label>
                    <input type="text" wire:model="name" id="client_name"
                        class="mt-1 focus:ring-primary-500 focus:border-primary-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md p-2 border">
                    @error('name')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>
                <div class="sm:col-span-3">
                    <label for="client_order" class="block text-sm font-medium text-gray-700">الترتيب</label>
                    <input type="number" wire:model="order" id="client_order"
                        class="mt-1 focus:ring-primary-500 focus:border-primary-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md p-2 border">
                    @error('order')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>
                <div class="sm:col-span-6">
                    <label for="client_logo" class="block text-sm font-medium text-gray-700">شعار العميل</label>
                    <input type="file" wire:model="logo" id="client_logo" accept="image/*"
                        class="mt-1 focus:ring-primary-500 focus:border-primary-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md p-2 border">
                    @error('logo')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                    <div wire:loading wire:target="logo" class="text-sm text-gray-500 mt-1">جاري التحميل...</div>
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

    <!-- List Clients -->
    <div class="bg-white shadow overflow-hidden sm:rounded-lg">
        <ul role="list" class="divide-y divide-gray-200">
            @foreach ($clients as $client)
                <livewire:dashboard.client-row :client="$client" :key="$client->id" />
            @endforeach
        </ul>
    </div>
</div>
