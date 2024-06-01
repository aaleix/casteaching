<x-casteaching-layout>
    <div id="layout_series_navigation" class="min-h-full flex">
        <!-- Sidebar for both mobile and desktop -->
        <div class="flex flex-col w-64 border-r border-gray-200 bg-gray-100 overflow-y-auto h-screen">
            <div class="flex-shrink-0 flex items-center px-4 py-4">
                <img class="w-10 h-10 bg-gray-300 rounded-full flex-shrink-0 mr-2" src="/storage/{{$video->serie?->image_url}}" alt="">
                <p class="truncate">{{$video->serie?->title}}</p>
            </div>
            <div class="flex-1 overflow-y-auto">
                <nav class="px-2">
                    <div class="space-y-1">
                        @foreach ($videos_series as $sVideo)
                            @if ($sVideo->is($video))
                                <a href="/videos/{{ $sVideo->id }}" class="bg-gray-100 text-gray-900 group flex items-center px-2 py-2 text-base leading-5 font-medium rounded-md truncate" aria-current="page">
                                    <svg class="text-gray-500 mr-3 flex-shrink-0 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                    </svg>
                                    <span class="w-80 truncate" title="{{ $sVideo->title }}">{{ $sVideo->title }}</span>
                                </a>
                            @else
                                <a href="/videos/{{ $sVideo->id }}" class="truncate text-gray-600 hover:text-gray-900 hover:bg-gray-50 group flex items-center px-2 py-2 text-base leading-5 font-medium rounded-md">
                                    <svg class="text-gray-400 group-hover:text-gray-500 mr-3 flex-shrink-0 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                                    </svg>
                                    <span class="w-80 truncate" title="{{ $sVideo->title }}">{{ $sVideo->title }}</span>
                                </a>
                            @endif
                        @endforeach
                    </div>
                </nav>
            </div>
        </div>

        <!-- Main content area -->
        <div class="flex-1 flex flex-col overflow-y-auto" style="height: calc(100vh - 65px);">
            <!-- Search header -->
            <div class="sticky top-0 z-10 flex-shrink-0 flex h-16 bg-white border-b border-gray-200 lg:hidden">
                <!-- Sidebar toggle, controls the 'sidebarOpen' sidebar state. -->
                <button type="button"
                        class="px-4 border-r border-gray-200 text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-purple-500 lg:hidden"
                        x-on:click="open = true;">
                    <span class="sr-only">Open sidebar</span>
                    <!-- Heroicon name: outline/menu-alt-1 -->
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" />
                    </svg>
                </button>
                <div class="flex-1 flex justify-between px-4 sm:px-6 lg:px-8">
                    <div class="flex-1 flex">
                        <div class="w-full flex md:ml-0">
                            <label for="search-field" class="sr-only">Search</label>
                            <div class="relative w-full text-gray-400 focus-within:text-gray-600">
                                <div class="absolute inset-y-0 left-0 flex items-center pointer-events-none">
                                    <img class="w-10 h-10 bg-gray-300 rounded-full flex-shrink-0 mr-2" src="/storage/{{$video->serie?->image_url}}" alt="">
                                    <p class="truncate">{{$video->serie?->title}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center">
                        <!-- Profile dropdown -->
                        <div class="ml-3 relative">
                            <button type="button" class="max-w-xs bg-white flex items-center text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                <span class="sr-only">Open user menu</span>
                                <span class="mr-3 hidden md:inline">{{$video->serie?->teacher_name}}</span>
                                <img class="h-8 w-8 rounded-full" src="{{$video->serie?->teacher_photo_url}}" alt="">
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex-1">
                @if($video->canBeDisplayed())
                    @include('videos.show_main')
                @endif
            </div>
        </div>
    </div>
</x-casteaching-layout>
