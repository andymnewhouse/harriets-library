<div class="grid grid-cols-1 px-12 py-10 md:grid-cols-4">
    <div class="relative space-y-8">
        <img class="h-48 mx-auto reflection" src="{{ $book->cover_url }}" alt="{{ $book->title }}">

        @auth
        <div class="text-center">
            @if($queue->contains($book->id))
            <x-bit.button type="button" wire:click="removeFromQueue({{ $book->id }})">
                Remove from Queue
            </x-bit.button>
            @else
            <x-bit.button type="button" wire:click="addToQueue({{ $book->id }})">
                Add to Queue
            </x-bit.button>
            @endif
        </div>
        @endauth
    </div>
    <div class="flex flex-col justify-between flex-1 md:col-span-3">
        <div class="flex-1 space-y-4">
            <h1 class="text-3xl font-semibold text-gray-900 dark:text-gray-200">
                {{ $book->title }}
            </h1>
            @isset($book->categories)
            <p class="text-sm font-medium text-teal-600">
                {{ $book->categories->implode('name', ', ')}}
            </p>
            @endif

            @isset($book->authors)
            <p class="text-sm font-medium text-cyan-600">
                {{ $book->authors->implode('name', ', ')}}
            </p>
            @endif

            <p class="text-gray-700 dark:text-gray-200">
                {!! $book->description !!}
            </p>
        </div>
    </div>
</div>
