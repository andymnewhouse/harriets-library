<div class="px-12 py-10">
    <div class="px-6 py-4 space-y-4 bg-white rounded-md shadow-md md:space-y-0 md:items-center md:justify-between md:flex dark:bg-gray-900">
        <div class="w-full max-w-md">
            <label for="search" class="sr-only">Search</label>
            <div class="relative text-white focus-within:text-gray-600">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="w-5 h-5" x-description="Heroicon name: solid/search" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                    </svg>
                </div>
                <input id="search" wire:model="filters.search" class="block w-full py-2 pl-10 pr-3 leading-5 text-gray-900 bg-white border border-gray-300 rounded-md dark:border-gray-700 dark:text-gray-300 dark:bg-gray-900 focus:outline-none focus:placeholder-gray-500 focus:ring-0 sm:text-sm" placeholder="Search" type="search" name="search">
            </div>
        </div>

        <div class="space-y-1 md:space-y-0 md:flex md:items-center md:space-x-2">
            <x-bit.input.label for="sortBy">Sort By</x-bit.input.label>
            <select id="sortBy" wire:model="filters.sortBy" name="location" class="block w-full py-2 pl-3 pr-10 text-base border-gray-300 rounded-md md:max-w-sm dark:bg-gray-900 dark:border-gray-700 dark:text-gray-300 focus:outline-none focus:ring-teal-500 focus:border-teal-500 sm:text-sm">
                <option value="title--asc">Title: A -> Z</option>
                <option value="title--desc">Title: Z -> A</option>
                <option value="pages--asc">Length: Short -> Long</option>
                <option value="pages--desc">Length: Long -> Short</option>
            </select>
        </div>

        <div class="space-y-1 md:space-y-0 md:flex md:items-center md:space-x-2">
            <x-bit.input.label for="perPage">Per Page</x-bit.input.label>
            <select id="perPage" wire:model="filters.perPage" name="perPage" class="block w-full py-2 pl-3 pr-10 text-base border-gray-300 rounded-md md:max-w-sm dark:bg-gray-900 dark:border-gray-700 dark:text-gray-300 focus:outline-none focus:ring-teal-500 focus:border-teal-500 sm:text-sm">
                <option value="12">12</option>
                <option value="50">50</option>
                <option value="100">100</option>
            </select>
        </div>
    </div>

    <div class="grid grid-cols-1 gap-12 pt-12 pb-20 md:grid-cols-4">
        <div class="hidden space-y-6 md:block">
            <div class="px-6 py-4 space-y-4 bg-white rounded-md shadow-md dark:bg-gray-900">
                <h2 class="text-gray-500 dark:text-gray-400">Authors</h2>

                <div>
                    @foreach($authors as $author)
                    <label for="author{{ $author->id }}" class="block">
                        <input id="author{{ $author->id }}" wire:model="filters.authors" type="checkbox" class="text-teal-600 border-gray-300 rounded shadow-sm focus:border-teal-300 focus:ring focus:ring-teal-200 focus:ring-opacity-50" name="categories" value="{{ $author->id }}">
                        <span class="ml-2 text-sm text-gray-600 dark:text-gray-300">{{ $author->name }}</span>
                    </label>
                    @endforeach
                </div>
            </div>
            <div class="px-6 py-4 space-y-4 bg-white rounded-md shadow-md dark:bg-gray-900">
                <h2 class="text-gray-500 dark:text-gray-400">Categories</h2>

                <div>
                    @foreach($categories as $category)
                    <label for="category{{ $category->id }}" class="block">
                        <input id="category{{ $category->id }}" wire:model="filters.categories" type="checkbox" class="text-teal-600 border-gray-300 rounded shadow-sm focus:border-teal-300 focus:ring focus:ring-teal-200 focus:ring-opacity-50" name="categories" value="{{ $category->id }}">
                        <span class="ml-2 text-sm text-gray-600 dark:text-gray-300">{{ $category->name }}</span>
                    </label>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="space-y-6 md:col-span-3">
            <div class="grid grid-cols-1 gap-6 md:grid-cols-3 xl:grid-cols-4">
                @foreach($books as $book)
                <a href="/books/{{ $book->isbn }}" wire:key="{{ $book->id }}" class="flex flex-col p-3 space-y-6 overflow-hidden transition duration-300 ease-in-out rounded-lg group hover:shadow-lg hover:bg-white dark:hover:bg-gray-900">
                    <div class="relative h-48">
                        <img class="h-48 mx-auto reflection" src="{{ $book->cover_url }}" alt="{{ $book->title }}">
                        @auth
                        <div class="absolute inset-0 flex items-center justify-center transition duration-300 ease-in-out bg-opacity-50 opacity-0 group-hover:opacity-100">
                            @if($queue->contains($book->id))
                            <button type="button" wire:click="removeFromQueue({{ $book->id }})" class="inline-flex items-center p-3 text-white border border-transparent rounded-full shadow-sm bg-cyan-600 hover:bg-cyan-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500">
                                <x-heroicon-o-minus class="w-6 h-6" />
                            </button>
                            @else
                            <button type="button" wire:click="addToQueue({{ $book->id }})" class="inline-flex items-center p-3 text-white bg-teal-600 border border-transparent rounded-full shadow-sm hover:bg-teal-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500">
                                <x-heroicon-o-plus class="w-6 h-6" />
                            </button>
                            @endif
                        </div>
                        @endauth
                    </div>
                    <div class="flex flex-col justify-between flex-1">
                        <div class="flex-1">
                            @isset($book->categories)
                            <p class="text-sm font-medium text-teal-600">
                                {{ $book->categories->implode('name', ', ')}}
                            </p>
                            @endif
                            <p class="text-xl font-semibold text-gray-900 dark:text-gray-200">
                                {{ $book->title }}
                            </p>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
            <div class="w-full">
                {{ $books->links() }}
            </div>
        </div>
    </div>
</div>
