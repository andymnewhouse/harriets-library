<x-app-layout>
    <div class="pt-10 bg-gray-900 sm:pt-16 lg:pt-8 lg:pb-14 lg:overflow-hidden">
        <div class="mx-auto max-w-7xl lg:px-8">
            <div class="lg:grid lg:grid-cols-2 lg:gap-8">
                <div class="max-w-md px-4 mx-auto sm:max-w-2xl sm:px-6 sm:text-center lg:px-0 lg:text-left lg:flex lg:items-center">
                    <div class="lg:py-24">
                        <h1 class="mt-4 text-4xl font-extrabold tracking-tight text-white sm:mt-5 sm:text-6xl lg:mt-6 xl:text-6xl">
                            <span class="block">A better way to</span>
                            <span class="block pb-3 text-transparent bg-clip-text bg-gradient-to-r from-teal-200 to-cyan-400 sm:pb-5">share your love of books</span>
                        </h1>
                        <p class="text-base text-gray-300 sm:text-xl lg:text-lg xl:text-xl">
                            We're in a closed beta now, but we hope to open up the library for those who want borrow and share books.
                        </p>
                        <div class="mt-10 sm:mt-12">
                            <form action="#" class="sm:max-w-xl sm:mx-auto lg:mx-0">
                                <div class="sm:flex">
                                    <div class="flex-1 min-w-0">
                                        <label for="email" class="sr-only">Email address</label>
                                        <input id="email" type="email" placeholder="Enter your email" class="block w-full px-4 py-3 text-base text-gray-900 placeholder-gray-500 border-0 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-400 focus:ring-offset-gray-900">
                                    </div>
                                    <div class="mt-3 sm:mt-0 sm:ml-3">
                                        <button type="submit" class="block w-full px-4 py-3 font-medium text-white rounded-md shadow bg-gradient-to-r from-teal-500 to-cyan-600 hover:from-teal-600 hover:to-cyan-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-400 focus:ring-offset-gray-900">Keep me in the loop</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="mt-12 -mb-16 sm:-mb-48 lg:m-0 lg:relative">
                    <div class="max-w-md px-4 mx-auto sm:max-w-2xl sm:px-6 lg:max-w-none lg:px-0">
                        <img class="w-full lg:absolute lg:inset-y-0 lg:left-0 lg:h-full lg:w-auto lg:max-w-none" src="{{ asset('img/reading-on-book-stack.svg') }}" alt="Human reading a book on a stack of 5 books">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Feature section with screenshot -->
    <div class="relative pt-16 bg-gray-50 sm:pt-24 lg:pt-32">
        <div class="max-w-md px-4 mx-auto text-center sm:px-6 sm:max-w-3xl lg:px-8 lg:max-w-7xl">
            <div>
                <h2 class="text-base font-semibold tracking-wider uppercase text-cyan-600">Libraryless</h2>
                <p class="mt-2 text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                    No library? No problem.
                </p>
                <p class="mx-auto mt-5 text-xl text-gray-500 max-w-prose">
                    We will send you books that your kids want to read.<br> Think of it like Netflix DVD for books.
                </p>
            </div>
            <div class="mt-12 -mb-10 sm:-mb-24 lg:-mb-80">
                <img class="rounded-lg shadow-xl ring-1 ring-black ring-opacity-5" src="{{ asset('img/harriets-library-discover-screen.png') }}" alt="">
            </div>
        </div>
    </div>

    <!-- Testimonial section -->
    <div class="pb-16 bg-gradient-to-r from-teal-500 to-cyan-600 lg:pb-0 lg:z-10 lg:relative">
        <div class="lg:mx-auto lg:max-w-7xl lg:px-8 lg:grid lg:grid-cols-3 lg:gap-8">
            <div class="relative lg:-my-8">
                <div aria-hidden="true" class="absolute inset-x-0 top-0 bg-white h-1/2 lg:hidden"></div>
                <div class="max-w-md px-4 mx-auto sm:max-w-3xl sm:px-6 lg:p-0 lg:h-full">
                    <div class="overflow-hidden shadow-xl aspect-w-10 aspect-h-6 rounded-xl sm:aspect-w-16 sm:aspect-h-7 lg:aspect-none lg:h-full">
                        <img class="object-cover lg:h-full lg:w-full" src="{{ asset('img/swick-family.jpg') }}" alt="Swick Family infront of a Christmas tree.">
                    </div>
                </div>
            </div>
            <div class="mt-12 lg:m-0 lg:col-span-2 lg:pl-8">
                <div class="max-w-md px-4 mx-auto sm:max-w-2xl sm:px-6 lg:px-0 lg:py-20 lg:max-w-none">
                    <blockquote>
                        <div>
                            <svg class="w-12 h-12 text-white opacity-25" fill="currentColor" viewBox="0 0 32 32" aria-hidden="true">
                                <path d="M9.352 4C4.456 7.456 1 13.12 1 19.36c0 5.088 3.072 8.064 6.624 8.064 3.36 0 5.856-2.688 5.856-5.856 0-3.168-2.208-5.472-5.088-5.472-.576 0-1.344.096-1.536.192.48-3.264 3.552-7.104 6.624-9.024L9.352 4zm16.512 0c-4.8 3.456-8.256 9.12-8.256 15.36 0 5.088 3.072 8.064 6.624 8.064 3.264 0 5.856-2.688 5.856-5.856 0-3.168-2.304-5.472-5.184-5.472-.576 0-1.248.096-1.44.192.48-3.264 3.456-7.104 6.528-9.024L25.864 4z" />
                            </svg>
                            <p class="mt-6 text-2xl font-medium text-white">
                                When I first heard that libraries were still closed from the COVID-19 Pandemic, I immediatly thought of my grandma and how <strong>livid</strong> she would
                                be to find out that kids who wanted to read couldn't get their hands on books. Espically if she knew that I had boxes of the books she gave
                                my sister and I as kids sitting in my parent's attic collecting dust.
                            </p>
                        </div>
                        <footer class="mt-6">
                            <p class="text-base font-medium text-white">Andy Newhouse (they/them)</p>
                            <p class="text-base font-medium text-cyan-100">Creator of Harriet's Library</p>
                        </footer>
                    </blockquote>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
