<x-guest-layout>
    <section class="relative">
        <div class="absolute z-10 hidden lg:block left-0 top-0 max-w-xs w-full h-full bg-indigo-100"></div>
        <div class="container mx-auto overflow-hidden">
            <div class="relative z-20 flex items-center justify-between px-4 py-5 bg-transparent">
                <div class="w-auto">
                    <div class="flex flex-wrap items-center">
                        <div class="w-auto mr-14">
                            <a href="#">
                                <img src="/images/l1nc-logo.png" class="object-cover h-10" alt="">
                            </a>
                        </div>
                        <div class="w-auto hidden lg:block">
                            <ul class="flex items-center mr-16">
                                <li class="mr-9 font-medium hover:text-gray-700"><a href="#">Features</a></li>
                                <li class="mr-9 font-medium hover:text-gray-700"><a href="#">Solutions</a></li>
                                <li class="mr-9 font-medium hover:text-gray-700"><a href="#">Resources</a></li>
                                <li class="font-medium hover:text-gray-700"><a href="#">Pricing</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="w-auto">
                    <div class="flex flex-wrap items-center">
                        <div class="w-auto hidden mr-5 lg:block">
                            <div class="inline-block">
                                <a href="{{route('login')}}"
                                    class="py-3 px-5 w-full hover:text-gray-700 font-medium rounded-xl bg-transparent transition ease-in-out duration-200"
                                    type="button">Sign In
                                </a>
                            </div>
                        </div>
                        <div class="w-auto hidden lg:block">
                            <div class="inline-block">
                                <a href="{{route('register')}}"
                                    class="py-3 px-5 w-full font-semibold border hover:border-gray-300 rounded-xl focus:ring focus:ring-gray-50 bg-white hover:bg-gray-50 transition ease-in-out duration-200"
                                    type="button">Create Free Account
                                </a>
                            </div>
                        </div>
                        <div class="w-auto lg:hidden">
                            <a href="#">
                                <svg class="navbar-burger text-indigo-600" width="51" height="51" viewBox="0 0 56 56"
                                     fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect width="56" height="56" rx="28" fill="currentColor"></rect>
                                    <path d="M37 32H19M37 24H19" stroke="white" stroke-width="1.5"
                                          stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hidden navbar-menu fixed top-0 left-0 bottom-0 w-4/6 sm:max-w-xs z-50">
                <div class="navbar-backdrop fixed inset-0 bg-gray-800 opacity-80"></div>
                <nav class="relative z-10 px-9 pt-8 bg-white h-full overflow-y-auto">
                    <div class="flex flex-wrap justify-between h-full">
                        <div class="w-full">
                            <div class="flex items-center justify-between -m-2">
                                <div class="w-auto p-2">
                                    <a class="inline-block" href="#">
                                        <img src="/images/l1nc-logo.png" alt="">

                                    </a>
                                </div>
                                <div class="w-auto p-2">
                                    <a class="navbar-burger" href="#">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path d="M6 18L18 6M6 6L18 18" stroke="#111827" stroke-width="2"
                                                  stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-col justify-center py-16 w-full">
                            <ul>
                                <li class="mb-12"><a class="font-medium hover:text-gray-700" href="#">Features</a></li>
                                <li class="mb-12"><a class="font-medium hover:text-gray-700" href="#">Solutions</a></li>
                                <li class="mb-12"><a class="font-medium hover:text-gray-700" href="#">Resources</a></li>
                                <li><a class="font-medium hover:text-gray-700" href="#">Pricing</a></li>
                            </ul>
                        </div>
                        <div class="flex flex-col justify-end w-full pb-8">
                            <div class="flex flex-wrap">
                                <div class="w-full mb-3">
                                    <div class="block">
                                        <a href="{{route('login')}}"
                                            class="py-3 px-5 w-full hover:text-gray-700 font-medium rounded-xl bg-transparent transition ease-in-out duration-200"
                                            type="button">Sign In
                                        </a>
                                    </div>
                                </div>
                                <div class="w-full">
                                    <div class="block">
                                        <button
                                            class="py-3 px-5 w-full font-semibold border hover:border-gray-300 rounded-xl focus:ring focus:ring-gray-50 bg-white hover:bg-gray-50 transition ease-in-out duration-200"
                                            type="button">Create Free Account
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <div class="relative z-20 overflow-hidden pt-12 pb-28">
            <div class="container px-4 mx-auto">
                <div class="flex flex-wrap xl:items-center -m-8">
                    <div class="w-full md:w-1/2 xl:w-auto p-8 xl:p-12">
                        <div class="md:inline-block relative">
                            <div class="overflow-hidden rounded-lg">
                                <img
                                    class="w-full md:w-auto rounded-lg transform hover:scale-105 transition ease-in-out duration-1000"
                                    src="/assets/flaro-assets/images/headers/woman.jpeg" alt="">
                            </div>
                            <div class="p-8 absolute bottom-0 left-0 w-full">
                                <div class="p-11 bg-black bg-opacity-70 backdrop-blur-xl rounded-lg">
                                    <p class="mb-6 text-sm text-white text-opacity-60 font-semibold uppercase tracking-px">
                                        Built by Love and fully open-source
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-full md:w-1/2 xl:flex-1 p-8 xl:p-12">
                        <div class="xl:max-w-2xl">
                            <h1 class="mb-7 text-3xl md:text-4xl xl:text-5xl font-bold font-heading tracking-px-n leading-none ">
                                just paste the link and get the short one</h1>
                            <p class="mb-9 text-lg text-gray-900 font-medium md:max-w-md">l1nc is an open-source link
                                shortener which you can deploy and customize</p>
                            <livewire:homepage-create-link/>
                            <livewire:homepage-show-links/>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="relative pt-28 pb-32 bg-indigo-600 overflow-hidden">
        <img class="absolute left-1/2 top-0 transform -translate-x-1/2" src="flaro-assets/images/footers/gradient3.svg" alt="">
        <div class="relative z-10 container px-4 mx-auto">
            <div class="flex flex-wrap -m-8">
                <div class="w-full md:w-1/2 p-8">
                    <div class="lg:max-w-sm">
                        <h2 class="mb-16 text-6xl md:text-7xl text-white font-bold tracking-px-n leading-tight">L1nc</h2>
                        <div class="md:inline-block">
                            <button class="py-4 px-6 w-full text-indigo-600 font-semibold rounded-xl shadow-4xl focus:ring focus:ring-indigo-300 bg-white hover:bg-gray-50 transition ease-in-out duration-200" type="button">Get A Free Quote</button>
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-1/2 p-8">
                    <div class="flex flex-wrap -m-8 mb-10">
                        <div class="w-full sm:w-1/3 p-8">
                            <ul>
                                <li class="mb-3.5"><a class="text-white hover:text-gray-200 font-medium leading-relaxed" href="#">About</a></li>
                                <li class="mb-3.5"><a class="text-white hover:text-gray-200 font-medium leading-relaxed" href="#">Product</a></li>
                                <li class="mb-3.5"><a class="text-white hover:text-gray-200 font-medium leading-relaxed" href="#">Testimonials</a></li>
                                <li><a class="text-white hover:text-gray-200 font-medium leading-relaxed" href="#">Services</a></li>
                            </ul>
                        </div>
                        <div class="w-full sm:w-1/3 p-8">
                            <ul>
                                <li class="mb-3.5"><a class="text-white hover:text-gray-200 font-medium leading-relaxed" href="#">Docs</a></li>
                                <li class="mb-3.5"><a class="text-white hover:text-gray-200 font-medium leading-relaxed" href="#">Knowledge Base</a></li>
                                <li><a class="text-white hover:text-gray-200 font-medium leading-relaxed" href="#">Insights</a></li>
                            </ul>
                        </div>
                        <div class="w-full sm:w-1/3 p-8">
                            <ul>
                                <li class="mb-3.5"><a class="text-white hover:text-gray-200 font-medium leading-relaxed" href="#">Indonesia</a></li>
                                <li class="mb-3.5"><a class="text-white hover:text-gray-200 font-medium leading-relaxed" href="#">USA</a></li>
                                <li><a class="text-white hover:text-gray-200 font-medium leading-relaxed" href="#">Canada</a></li>
                            </ul>
                        </div>
                    </div>
                    <p class="text-sm text-white text-opacity-50 font-medium leading-relaxed">Copyright © 2023 L1nc. All Rights Reserved</p>
                </div>
            </div>
        </div>
    </section>
</x-guest-layout>
