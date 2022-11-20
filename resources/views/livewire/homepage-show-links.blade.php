<div
    class="mb-16 p-1.5 xl:pl-7 inline-block md:max-w-xl w-full rounded-xl focus-within:ring focus-within:ring-indigo-300">
    @foreach($links as $link)
        <div class="flex flex-wrap items-center">
            <div>
                <a href="{{ $link->linkUrl }}" class="font-medium">{{ $link->linkUrl }}</a>
                <p class="text-gray-500">{{ $link->destination }}</p>
            </div>
        </div>
        <hr>
    @endforeach
</div>
