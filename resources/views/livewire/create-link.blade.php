<div>
    <div class="">

        <div class="mb-5">
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
        </div>


        <form class="flex flex-col mb-5" wire:submit.prevent="submit">
            <div class="flex flex-col">

                <input wire:model="link" type="text" placeholder="link" class="mb-2 md:mt-0 border-2 rounded-lg w-full h-12 px-4">

                <hr class="mb-2">
                <p class="font-bold mb-1">options:</p>
                <select name="protocol" wire:model="protocol"
                        class="form-select appearance-none w-40 mr-2 block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition   ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                        aria-label="Default select example">
                    <option value="https" selected>https</option>
                    <option value="http">http</option>
                </select>


            </div>
            <div class="flex flex-col mt-2">

                @if(count($domains))
                    <select name="domain" wire:model="domain"
                            class="mb-2 w-auto md:w-80 form-select appearance-none mr-2 block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                            aria-label="Default select example">
                        <option value="">{{ env('APP_URL') }}</option>
                        @foreach($domains as $domain)
                            <option value="{{$domain->domain}}">{{$domain->domain}}</option>
                        @endforeach
                    </select>
                @endif

                @error('customUrl') <span class="error">{{ $message }}</span> @enderror
                <input wire:model="customUrl" type="text" placeholder="custom url"
                       class="appearance-none w-auto md:w-80 mr-2 block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
            </div>
            <button class="mt-2 w-48 bg-blue-400 text-white rounded-md font-semibold px-4 py-3 w-full">Short it!
            </button>
        </form>
        @error('duplicate') <span class="error">{{ $message }}</span> @enderror

    </div>
</div>
