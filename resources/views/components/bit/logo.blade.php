@props(['mobile' => false, 'grayscale' => false])
<a href="/" class="flex items-center space-x-4">
    @if($grayscale)
    <img class="w-auto h-8 sm:h-16" src="{{ asset('img/grandma-harriet-grayscale.svg') }}" alt="Cartoon of Harriet wearing a read sweater, on a teal background">
    @else
    <img class="w-auto h-8 sm:h-16" src="{{ asset('img/grandma-harriet.svg') }}" alt="Cartoon of Harriet wearing a read sweater, on a teal background">
    @endif

    @if($mobile)
    <span class="sr-only">Harriet's Library</span>
    @else
    <span class="block pb-3 -mb-4 text-2xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-teal-200 to-cyan-400 sm:pb-5">Harriet's Library</span>
    @endif
</a>
