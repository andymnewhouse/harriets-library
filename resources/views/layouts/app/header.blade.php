<!-- This example requires Tailwind CSS v2.0+ -->
<div class="relative bg-white dark:bg-gray-900">
    <div class="flex items-center justify-between px-4 py-3 sm:px-6 md:justify-start md:space-x-10">
        <div class="flex justify-start lg:w-0 lg:flex-1">
            <a href="/">
                <x-bit.logo />
            </a>
        </div>
        <div class="-my-2 -mr-2 md:hidden">
            <button type="button" class="inline-flex items-center justify-center p-2 text-gray-400 bg-white rounded-md hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500" aria-expanded="false">
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

    <!--
    Mobile menu, show/hide based on mobile menu state.

    Entering: "duration-200 ease-out"
      From: "opacity-0 scale-95"
      To: "opacity-100 scale-100"
    Leaving: "duration-100 ease-in"
      From: "opacity-100 scale-100"
      To: "opacity-0 scale-95"
  -->
    <div class="absolute inset-x-0 top-0 p-2 transition origin-top-right transform md:hidden">
        <div class="bg-white divide-y-2 rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 divide-gray-50">
            <div class="px-5 pt-5 pb-6">
                <div class="flex items-center justify-between">
                    <div>
                        <x-bit.logo mobile />
                    </div>
                    <div class="-mr-2">
                        <button type="button" class="inline-flex items-center justify-center p-2 text-gray-400 bg-white rounded-md hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
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
                        <a href="/discover" class="flex items-center p-3 -m-3 rounded-lg hover:bg-gray-50">
                            <div class="flex items-center justify-center flex-shrink-0 w-10 h-10 text-white bg-indigo-500 rounded-md">
                                <x-heroicon-o-document-search class="w-6 h-6" />
                            </div>
                            <div class="ml-4 text-base font-medium text-gray-900">
                                Discover
                            </div>
                        </a>

                        @auth
                        <a href="/queue" class="flex items-center p-3 -m-3 rounded-lg hover:bg-gray-50">
                            <div class="flex items-center justify-center flex-shrink-0 w-10 h-10 text-white bg-indigo-500 rounded-md">
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
                <a href="#" class="flex items-center justify-center w-full px-4 py-2 text-base font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700">
                    Sign up
                </a>
                <p class="mt-6 text-base font-medium text-center text-gray-500">
                    Existing customer?
                    <a href="#" class="text-indigo-600 hover:text-indigo-500">
                        Sign in
                    </a>
                </p>
                @endauth
            </div>
        </div>
    </div>
</div>
