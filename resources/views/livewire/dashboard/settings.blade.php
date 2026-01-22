<div class="bg-white shadow overflow-hidden sm:rounded-lg p-4 sm:p-6">
    <form wire:submit.prevent="save">
        @if (session()->has('success'))
            <div class="bg-blue-100 border border-blue-400 text-blue-700 px-3 sm:px-4 py-3 rounded relative mb-4 sm:mb-6 text-sm"
                role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif
        <div class="grid grid-cols-1 gap-y-4 sm:gap-y-6 gap-x-4 sm:grid-cols-6">

            <div class="sm:col-span-6">
                <h3 class="text-base sm:text-lg font-medium leading-6 text-gray-900 mb-3 sm:mb-4">القسم الرئيسي (Hero)
                </h3>
            </div>

            <div class="sm:col-span-6">
                <label for="hero_title" class="block text-sm font-medium text-gray-700">العنوان الرئيسي</label>
                <input type="text" wire:model="hero_title" id="hero_title"
                    class="mt-1 focus:ring-primary-500 focus:border-primary-500 block w-full shadow-sm text-sm border-gray-300 rounded-md p-2 border">
            </div>

            <div class="sm:col-span-6">
                <label for="hero_subtitle" class="block text-sm font-medium text-gray-700">العنوان الفرعي
                    (الملون)</label>
                <input type="text" wire:model="hero_subtitle" id="hero_subtitle"
                    class="mt-1 focus:ring-primary-500 focus:border-primary-500 block w-full shadow-sm text-sm border-gray-300 rounded-md p-2 border">
            </div>

            <div class="sm:col-span-6">
                <label for="hero_description" class="block text-sm font-medium text-gray-700">الوصف</label>
                <textarea wire:model="hero_description" id="hero_description" rows="3"
                    class="mt-1 focus:ring-primary-500 focus:border-primary-500 block w-full shadow-sm text-sm border-gray-300 rounded-md p-2 border"></textarea>
            </div>

            <div class="sm:col-span-6 border-t pt-3 sm:pt-4 mt-3 sm:mt-4">
                <h3 class="text-base sm:text-lg font-medium leading-6 text-gray-900 mb-3 sm:mb-4">قسم من نحن (About)
                </h3>
            </div>

            <div class="sm:col-span-6">
                <label for="about_title" class="block text-sm font-medium text-gray-700">العنوان</label>
                <input type="text" wire:model="about_title" id="about_title"
                    class="mt-1 focus:ring-primary-500 focus:border-primary-500 block w-full shadow-sm text-sm border-gray-300 rounded-md p-2 border">
            </div>

            <div class="sm:col-span-6">
                <label for="about_description_1" class="block text-sm font-medium text-gray-700">الوصف الأول</label>
                <textarea wire:model="about_description_1" id="about_description_1" rows="3"
                    class="mt-1 focus:ring-primary-500 focus:border-primary-500 block w-full shadow-sm text-sm border-gray-300 rounded-md p-2 border"></textarea>
            </div>

            <div class="sm:col-span-6">
                <label for="about_description_2" class="block text-sm font-medium text-gray-700">الوصف الثاني</label>
                <textarea wire:model="about_description_2" id="about_description_2" rows="3"
                    class="mt-1 focus:ring-primary-500 focus:border-primary-500 block w-full shadow-sm text-sm border-gray-300 rounded-md p-2 border"></textarea>
            </div>

            <div class="sm:col-span-6">
                <label for="about_image" class="block text-sm font-medium text-gray-700">صورة قسم من نحن</label>
                @if ($about_image && !$new_about_image)
                    <img src="{{ asset($about_image) }}" alt="About Image"
                        class="mt-2 mb-2 h-24 sm:h-32 w-auto rounded-lg object-cover">
                @endif
                @if ($new_about_image)
                    <img src="{{ $new_about_image->temporaryUrl() }}" alt="New About Image"
                        class="mt-2 mb-2 h-24 sm:h-32 w-auto rounded-lg object-cover">
                @endif
                <input type="file" wire:model="new_about_image" id="about_image" accept="image/*"
                    class="mt-1 focus:ring-primary-500 focus:border-primary-500 block w-full shadow-sm text-sm border-gray-300 rounded-md p-2 border">
                <div wire:loading wire:target="new_about_image" class="text-sm text-gray-500 mt-1">جاري التحميل...</div>
            </div>

            <div class="sm:col-span-6 border-t pt-3 sm:pt-4 mt-3 sm:mt-4">
                <h3 class="text-base sm:text-lg font-medium leading-6 text-gray-900 mb-3 sm:mb-4">معلومات التواصل</h3>
            </div>

            <div class="sm:col-span-3">
                <label for="contact_email" class="block text-sm font-medium text-gray-700">البريد الإلكتروني</label>
                <input type="email" wire:model="contact_email" id="contact_email"
                    class="mt-1 focus:ring-primary-500 focus:border-primary-500 block w-full shadow-sm text-sm border-gray-300 rounded-md p-2 border">
            </div>

            <div class="sm:col-span-3">
                <label for="contact_address" class="block text-sm font-medium text-gray-700">العنوان</label>
                <input type="text" wire:model="contact_address" id="contact_address"
                    class="mt-1 focus:ring-primary-500 focus:border-primary-500 block w-full shadow-sm text-sm border-gray-300 rounded-md p-2 border">
            </div>

            <div class="sm:col-span-3">
                <label for="contact_linkedin" class="block text-sm font-medium text-gray-700">لينكد إن</label>
                <input type="text" wire:model="contact_linkedin" id="contact_linkedin"
                    class="mt-1 focus:ring-primary-500 focus:border-primary-500 block w-full shadow-sm text-sm border-gray-300 rounded-md p-2 border">
            </div>
            <div class="sm:col-span-3">
                <label for="contact_phone" class="block text-sm font-medium text-gray-700">رقم الهاتف</label>
                <input type="text" wire:model="contact_phone" id="contact_phone"
                    class="mt-1 focus:ring-primary-500 focus:border-primary-500 block w-full shadow-sm text-sm border-gray-300 rounded-md p-2 border">
            </div>

        </div>
        <div class="mt-4 sm:mt-6">
            <button type="submit"
                class="w-full sm:w-auto inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-primary-600 hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500">
                حفظ الإعدادات
                <span wire:loading class="mr-2">...</span>
            </button>
        </div>
    </form>
</div>
