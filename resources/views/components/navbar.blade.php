<header class="bg-[#141414] border-b border-b-[#F8F9FA]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <!-- Logo -->
            <div class="flex items-center ">
                <img src="{{asset('image/jpn - Copy.png')}}." alt="Logo" class="h-8 w-auto" />
            </div>

            <!-- Navigation -->
            <nav class="flex space-x-8">
                @if(auth()->user()?->role === 'admin')
                    <a href="{{route('admin.dashboard')}}"
                        class="text-white hover:text-[#22d3ee] px-3 py-2 text-sm font-medium transition-colors duration-500 ease-in-out">list
                        support</a>
                    <a href="{{route('admin.list')}}"
                        class="text-white hover:text-[#22d3ee] px-3 py-2 text-sm font-medium transition-colors duration-500 ease-in-out">list
                        device
                    </a>
                    <a href="{{route('admin.list-client')}}"
                        class="text-white hover:text-[#22d3ee] px-3 py-2 text-sm font-medium transition-colors duration-500 ease-in-out">list
                        client</a>
                    <a href="#"
                        class="text-white hover:text-[#22d3ee] px-3 py-2 text-sm font-medium transition-colors duration-500 ease-in-out">form
                        penngecekan</a>
                    <a href="#"
                        class="text-white hover:text-[#22d3ee] px-3 py-2 text-sm font-medium transition-colors duration-500 ease-in-out">form
                        maintenance</a>
                @endif
                @if(auth()->user()?->role === 'staf')
                    <a href="#"
                        class="text-white hover:text-[#22d3ee] px-3 py-2 text-sm font-medium transition-colors duration-500 ease-in-out">form
                        penngecekan</a>
                    <a href="#"
                        class="text-white hover:text-[#22d3ee] px-3 py-2 text-sm font-medium transition-colors duration-500">form
                        maintenance</a>
                @endif
            </nav>

            <!-- User Avatar -->
            <div class="flex items-center">
                <div class="bg-[#22d3ee] rounded-full w-10 h-10 flex items-center justify-center hover:bg-[#06b6d4]">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        class="text-white" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                    </svg>

                </div>
            </div>
        </div>
    </div>
</header>