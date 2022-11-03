<x-app-layout>
{{--    <x-slot name="header">--}}
{{--        <h2 class="font-semibold text-xl text-gray-800 leading-tight">--}}
{{--            {{ __('Dashboard') }}--}}
{{--        </h2>--}}
{{--    </x-slot>--}}

    <section class="py-8">
        <div class="container px-4 mx-auto">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="px-5 py-2">
                    <p>this is the short link information:</p>
                    <h2>{{$link->url}}</h2>
                    <hr class="mb-5">

                </div>
            </div>
        </div>
    </section>
</x-app-layout>
