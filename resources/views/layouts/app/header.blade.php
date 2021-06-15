<header class="relative bg-white dark:bg-gray-900" x-data="{open: false}" @keydown.window.escape="open = false" x-on:click.away="open = false">
    <div class="flex items-center justify-between px-4 py-3 sm:px-6 md:justify-start md:space-x-10">
        <div class="flex justify-start lg:w-0 lg:flex-1">
            <a href="/">
                <x-bit.logo />
            </a>
        </div>
        <div class="-my-2 -mr-2 md:hidden">
            <button @click="open = true" type="button" class="inline-flex items-center justify-center p-2 text-gray-400 bg-white rounded-md dark:bg-gray-900 hover:text-gray-500 dark:hover:text-gray-200 dark:hover:bg-gray-900 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-teal-500" aria-expanded="false">
                <span class="sr-only">Open menu</span>
                <!-- Heroicon name: outline/menu -->
                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>
        <nav class="hidden space-x-10 md:flex">
            <x-bit.nav.link :href="route('app.discover')" :active="request()->routeIs('app.discover')">
                Discover
            </x-bit.nav.link>
            @auth
            <x-bit.nav.link :href="route('app.queue')" :active="request()->routeIs('app.queue')">
                Queue
            </x-bit.nav.link>
            @endauth
        </nav>
        <div class="items-center justify-end hidden space-x-2 md:flex md:flex-1 lg:w-0">
            @auth
            <x-bit.user-dropdown />
            @else
            <x-bit.button.link href="/login">Sign in</x-bit.button.link>
            <x-bit.button href="/register">Sign up</x-bit.button>
            @endauth
        </div>
    </div>
    <div x-show="open"
        x-transition:enter="duration-200 ease-out"
        x-transition:enter-start="opacity-0 scale-95"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="duration-100 ease-in"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95"
         class="absolute inset-x-0 top-0 z-50 p-1 transition origin-top-right transform md:hidden"
    >
        <div class="bg-white border border-transparent divide-y rounded-lg shadow-lg dark:border-gray-700 dark:bg-gray-900 ring-1 ring-black ring-opacity-5 divide-gray-50 dark:divide-gray-700">
            <div class="px-5 pt-5 pb-6">
                <div class="flex items-center justify-between">
                    <div>
                        <x-bit.logo mobile />
                    </div>
                    <div class="-mr-2">
                        <button @click="open = false" type="button" class="inline-flex items-center justify-center p-2 text-gray-400 bg-white rounded-md dark:bg-gray-900 hover:text-gray-500 dark:hover:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-teal-500">
                            <span class="sr-only">Close menu</span>
                            <!-- Heroicon name: outline/x -->
                            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="mt-6">
                    <nav class="grid grid-cols-1 gap-7">
                        <a href="/discover" class="flex items-center p-3 -m-3 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-800">
                            <div class="flex items-center justify-center flex-shrink-0 w-10 h-10 text-white bg-teal-500 rounded-md">
                                <x-heroicon-o-document-search class="w-6 h-6" />
                            </div>
                            <div class="ml-4 text-base font-medium text-gray-900 dark:text-gray-200">
                                Discover
                            </div>
                        </a>

                        @auth
                        <a href="/queue" class="flex items-center p-3 -m-3 rounded-lg hover:bg-gray-50">
                            <div class="flex items-center justify-center flex-shrink-0 w-10 h-10 text-white bg-teal-500 rounded-md">
                                <x-heroicon-o-clipboard-list class="w-6 h-6" />>
                            </div>
                            <div class="ml-4 text-base font-medium text-gray-900">
                                Queue
                            </div>
                        </a>
                        @endauth
                    </nav>
                </div>
            </div>
            <div class="px-5 py-6">
                @auth
                <x-bit.user-dropdown mobile />
                @else
                <x-bit.button href="/register" block>Sign up</x-bit.button>
                <p class="mt-6 text-base font-medium text-center text-gray-500">
                    Existing customer?
                    <a href="/login" class="text-teal-600 hover:text-teal-500 dark:text-teal-400 dark:hover:text-teal-300">
                        Sign in
                    </a>
                </p>
                @endauth
            </div>
        </div>
    </div>
</header>
