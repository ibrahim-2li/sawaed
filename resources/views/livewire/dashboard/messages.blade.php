<div class="space-y-6">
    <div class="bg-white shadow overflow-hidden sm:rounded-lg">
        @if (session()->has('success'))
            <div class="bg-blue-100 border border-blue-400 text-blue-700 px-3 sm:px-4 py-3 sm:rounded-t-lg relative text-sm text-center sm:text-right"
                role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif
        <div class="px-4 py-5 sm:px-6 border-b border-gray-200">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-lg font-medium leading-6 text-gray-900">
                        رسائل التواصل
                        <span class="text-sm text-gray-500 mr-2">({{ $contacts->count() }} رسالة)</span>
                    </h3>
                    <p class="mt-1 text-sm text-gray-500">
                        جميع الرسائل المرسلة من نموذج التواصل في الموقع
                    </p>
                </div>
                <div class="flex items-center">
                    <input type="checkbox" wire:click="toggleSelectAll"
                        class="h-4 w-4 text-primary-600 border-gray-300 rounded"
                        @if (count($contacts) > 0 && count($selected) === count($contacts)) checked @endif>
                    <label class="mr-2 text-sm text-gray-600">تحديد الكل</label>
                </div>
            </div>
        </div>

        <!-- Bulk Actions -->
        @if (count($selected) > 0)
            <div class="bg-gray-50 border-b border-gray-200 px-4 py-3 sm:px-6">
                <div class="flex items-center justify-between">
                    <p class="text-sm text-gray-600"><span>{{ count($selected) }}</span> رسائل محددة</p>
                    <div class="flex space-x-3 space-x-reverse">
                        <button type="button" wire:click="bulkRead"
                            class="text-sm text-primary-600 hover:text-primary-900 cursor-pointer">
                            تحديد كمقروء
                        </button>
                        <button type="button" wire:click="bulkDelete"
                            wire:confirm="هل أنت متأكد من حذف الرسائل المحددة؟"
                            class="text-sm text-red-600 hover:text-red-900 cursor-pointer">
                            حذف المحدد
                        </button>
                    </div>
                </div>
            </div>
        @endif

        @if ($contacts->count() > 0)
            <ul role="list" class="divide-y divide-gray-200">
                @foreach ($contacts as $contact)
                    <li wire:key="message-{{ $contact->id }}"
                        class="px-4 py-4 sm:px-6 hover:bg-gray-50 transition-colors {{ !$contact->is_read ? 'bg-blue-50' : '' }}">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center flex-1 min-w-0">
                                <div class="flex-shrink-0 ml-4">
                                    <input type="checkbox" wire:model.live="selected" value="{{ $contact->id }}"
                                        class="h-4 w-4 text-primary-600 border-gray-300 rounded">
                                </div>
                                <div class="flex-1 min-w-0">
                                    <div class="flex items-center justify-between mb-1">
                                        <p class="text-sm font-medium text-primary-600 truncate">
                                            {{ $contact->name }}
                                            @if (!$contact->is_read)
                                                <span
                                                    class="mr-2 inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-blue-100 text-blue-800">
                                                    جديد
                                                </span>
                                            @endif
                                        </p>
                                        <div class="flex items-center text-sm text-gray-500">
                                            <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                            <span dir="ltr">{{ $contact->created_at->format('Y-m-d H:i') }}</span>
                                        </div>
                                    </div>
                                    <div class="flex items-center justify-between">
                                        <div class="text-sm text-gray-900 truncate w-full md:w-auto">
                                            <span class="font-bold ml-2">{{ $contact->email }}</span>
                                            <span class="text-gray-500 mx-2">|</span>
                                            <span dir="ltr">{{ $contact->phone }}</span>
                                        </div>
                                    </div>
                                    <div class="mt-2 text-sm text-gray-600 whitespace-pre-wrap">{{ $contact->message }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4 flex justify-end space-x-3 space-x-reverse border-t pt-3 border-gray-100">
                            <button wire:click="toggleRead({{ $contact->id }})"
                                class="text-xs font-medium text-indigo-600 hover:text-indigo-900 cursor-pointer">
                                {{ $contact->is_read ? 'تحديد كغير مقروء' : 'تحديد كمقروء' }}
                            </button>
                            <button wire:click="delete({{ $contact->id }})"
                                wire:confirm="هل أنت متأكد من حذف هذه الرسالة؟"
                                class="text-xs font-medium text-red-600 hover:text-red-900 cursor-pointer">
                                حذف
                            </button>
                        </div>
                    </li>
                @endforeach
            </ul>
        @else
            <div class="text-center py-12">
                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                </svg>
                <h3 class="mt-2 text-sm font-medium text-gray-900">لا توجد رسائل</h3>
                <p class="mt-1 text-sm text-gray-500">لم يتم استلام أي رسائل تواصل بعد.</p>
            </div>
        @endif


        @if ($contacts->hasPages())
            <div class="px-4 py-3 border-t border-gray-200">
                {{ $contacts->links() }}
            </div>
        @endif
    </div>
</div>
