<div class="px-12 py-20 mx-auto space-y-1 md:max-w-xl">
    @foreach($queue as $book)
        <div class="flex items-center justify-between bg-white rounded-md shadow-md dark:bg-gray-900">
            <div class="flex">
                <button class="p-2 bg-gray-700 rounded-l-md">
                    <x-heroicon-o-menu class="w-6 h-6" />
                </button>
                <div class="flex items-center px-2 py-2 space-x-2 overflow-hidden">
                    <img class="h-16 reflection" src="{{ $book->meta->imageLinks['thumbnail'] ?? '' }}" alt="">
                    <div>
                        <p class="text-lg text-gray-900 dark:text-gray-200">{{ $book->title }}</p>
                        <p class="text-sm text-gray-500 dark:text-gray-400">{{ $book->authors->implode('name', ', ') }}</p>
                    </div>
                </div>
            </div>
            <div class="flex items-center mr-4 space-x-2">
                <button wire:click="" class="text-gray-500 hover:text-teal-500 dark:text-gray-400 dark:hover:text-teal-400">
                    <x-heroicon-o-chevron-up class="w-6 h-6" />
                </button>
                <button wire:click="" class="text-gray-500 hover:text-teal-500 dark:text-gray-400 dark:hover:text-teal-400">
                    <x-heroicon-o-chevron-down class="w-6 h-6" />
                </button>
                <button wire:click="delete({{ $book->pivot->id }})" class="text-gray-500 hover:text-teal-500 dark:text-gray-400 dark:hover:text-teal-400">
                    <x-heroicon-o-trash class="w-6 h-6" />
                </button>
            </div>
        </div>
    @endforeach
</div>
