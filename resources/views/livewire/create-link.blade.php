<div>
    <div class="">

    <div class="mb-5">
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
    </div>


    <form class="flex flex-row mb-5" wire:submit.prevent="submit">
        <input wire:model="link" type="text" placeholder="link" class="border-2 rounded-lg w-full h-12 px-4">
        <button class="ml-2 bg-blue-400 text-white rounded-md font-semibold px-4 py-3 w-full">Short it!</button>
    </form>
    </div>
</div>
