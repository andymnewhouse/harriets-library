<div class="flex flex-col p-3 space-y-6 overflow-hidden transition duration-300 ease-in-out rounded-lg group hover:shadow-lg hover:bg-white dark:hover:bg-gray-900">
    <div class="relative h-48">
        <img class="h-48 mx-auto reflection" src="{{ $book->meta->imageLinks['thumbnail'] ?? '' }}" alt="">
        <div class="absolute inset-0 flex items-center justify-center transition duration-300 ease-in-out bg-gray-900 bg-opacity-50 opacity-0 group-hover:opacity-100">
            <button type="button" wire:click="addToQueue">
                <x-heroicon-s-plus-circle class="w-20 h-20 text-teal-500"/>
            </button>
        </div>
    </div>
    <div class="flex flex-col justify-between flex-1">
        <div class="flex-1">
            @isset($book->categories)
            <p class="text-sm font-medium text-teal-600">
                {{ $book->categories->implode('name', ', ')}}
            </p>
            @endif
            <a href="#" class="block mt-2">
                <p class="text-xl font-semibold text-gray-900 dark:text-gray-200">
                    {{ $book->title }}
                </p>
            </a>
        </div>
    </div>
</div>
