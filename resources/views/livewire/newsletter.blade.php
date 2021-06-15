<form wire:submit.prevent="save" class="sm:max-w-xl sm:mx-auto lg:mx-0">
    <div class="sm:flex">
        <div class="flex-1 min-w-0">
            <label for="email" class="sr-only">Email address</label>
            <input id="email" wire:model="email" type="email" placeholder="Enter your email" class="block w-full px-4 py-3 text-base text-gray-900 placeholder-gray-500 border-0 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-400 focus:ring-offset-gray-900">
        </div>
        <div class="mt-3 sm:mt-0 sm:ml-3">
            <button type="submit" class="block w-full px-4 py-3 font-medium text-white rounded-md shadow bg-gradient-to-r from-teal-500 to-cyan-600 hover:from-teal-600 hover:to-cyan-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-400 focus:ring-offset-gray-900">Keep me in the loop</button>
        </div>
    </div>
</form>
