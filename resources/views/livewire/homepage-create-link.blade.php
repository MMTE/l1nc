<form class="flex flex-col mb-5" wire:submit.prevent="submit">

    <div class="mb-5">
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
    </div>

    <div
        class="p-1.5 xl:pl-7 inline-block md:max-w-xl w-full border-2 border-black rounded-3xl focus-within:ring focus-within:ring-indigo-300">
        <div class="flex flex-wrap items-center">
            <div class="w-full xl:flex-1">
                <input wire:model="link"
                       class="p-3 xl:p-0 xl:pr-7 w-full text-gray-600 placeholder-gray-600 outline-none border-none focus:ring-0"
                       id="headerInput3-1" type="text" placeholder="paste your link here">
            </div>
            <div class="w-full xl:w-auto">
                <div class="block">
                    <button
                        class="py-4 px-7 w-full text-white font-semibold rounded-xl focus:ring focus:ring-indigo-300 bg-indigo-600 hover:bg-indigo-700 transition ease-in-out duration-200"
                        type="submit">Short the link!
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>
