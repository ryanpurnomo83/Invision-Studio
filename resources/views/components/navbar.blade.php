<style>
    .nav-link {
        transition: color 0.2s ease-in-out, background-color 0.2s ease-in-out;
    }
    .nav-link:hover {
        color: #4f46e5; /* Indigo-600 */
    }
</style>

@php
    $file = ["New", "Open", "Open More", "Share", "Save", "Save as PSD", "Save More", "Export As", "Print", "Export Layers", "Export Color Lookup"];
    $edit = ["Undo/Redo", "Step Backward", "Step Forward"];
    $image = ["Mode", "Adjustments", "Auto Tone", "Auto Contrast", "Auto Color", "Reduce Color"];
    $layer = ["New Layer", "Duplicate Layer", "Duplicate Into", "Delete"];
@endphp

<nav class="bg-white shadow-lg sticky top-0 z-50">
    <div class="max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex items-center h-16">

                <!-- Logo -->
            <div class="flex-shrink-0">
                <a href="#" class="text-2xl font-bold text-indigo-600 hover:text-indigo-800 transition duration-150">
                    Invision Studio
                </a>
            </div>

                <!-- Desktop Menu (Hidden on mobile) -->
            <div class="hidden px-4 sm:ml-6 sm:flex sm:space-x-8 sm:items-center">
                <!-- <a href="#" onclick="" class="nav-link text-gray-500 hover:text-indigo-600 py-2 text-sm font-medium">
                    File
                </a> -->
                <div class="relative">
                 <details class="group">
                    <summary class="nav-link list-none text-gray-500 hover:text-indigo-600 py-2 text-sm font-medium cursor-pointer">
                        File
                    </summary>

                    <div class="absolute bg-white shadow-lg rounded-md mt-2 w-40 py-1 z-50">
                        @foreach ($file as $item)
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-indigo-100">
                                {{ $item }}
                            </a>
                        @endforeach
                    </div>
                 </details>
                </div>
                
                <div class="relative">
                 <details class="group">
                    <summary class="nav-link list-none text-gray-500 hover:text-indigo-600 py-2 text-sm font-medium cursor-pointer">
                        Edit
                    </summary>

                    <div class="absolute bg-white shadow-lg rounded-md mt-2 w-40 py-1 z-50">
                        @foreach ($edit as $item)
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-indigo-100">
                                {{ $item }}
                            </a>
                        @endforeach
                    </div>
                 </details>
                </div>

                <div class="relative">
                    <details class="group">
                        <summary class="nav-link list-none text-gray-500 hover:text-indigo-600 py-2 text-sm font-medium cursor-pointer">
                            Image
                        </summary>

                        <div class="absolute bg-white shadow-lg rounded-md mt-2 w-40 py-1 z-50">
                            @foreach ($image as $item)
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-indigo-100">
                                    {{ $item }}
                                </a>
                            @endforeach
                        </div>
                    </details>
                </div>

                <a href="#" class="nav-link text-gray-500 hover:text-indigo-600 py-2 text-sm font-medium">
                     Layer
                </a>
                <a href="#" class="nav-link text-gray-500 hover:text-indigo-600 py-2 text-sm font-medium">
                     Select
                </a>
                <a href="#" class="nav-link text-gray-500 hover:text-indigo-600 py-2 text-sm font-medium">
                     Filter
                </a>
                <a href="#" class="nav-link text-gray-500 hover:text-indigo-600 py-2 text-sm font-medium">
                     View
                </a>
                <a href="#" class="nav-link text-gray-500 hover:text-indigo-600 py-2 text-sm font-medium">
                     Window
                </a>
                <a href="#" class="nav-link text-gray-500 hover:text-indigo-600 py-2 text-sm font-medium">
                     More
                </a>
                    
                    <!-- Call to Action Button -->
                    <button class="ml-4 bg-indigo-600 text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-indigo-700 transition duration-150 shadow-md hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                        Account
                    </button>
                </div>

                <!-- Mobile menu button -->
                <div class="sm:hidden">
                    <button id="mobile-menu-button" type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500" aria-controls="mobile-menu" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <!-- Icon when menu is closed (Hamburger) -->
                        <svg class="block h-6 w-6" id="menu-icon-open" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                        <!-- Icon when menu is open (X) -->
                        <svg class="hidden h-6 w-6" id="menu-icon-close" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

            </div>
        </div>

        <!-- Mobile Menu (Toggles open/closed) -->
        <div class="sm:hidden hidden" id="mobile-menu">
            <div class="pt-2 pb-3 space-y-1">
                <a href="#" class="nav-link block px-3 py-2 text-base font-medium text-gray-700 hover:bg-indigo-50 hover:text-indigo-600">
                    File
                </a>
                <a href="#" class="nav-link block px-3 py-2 text-base font-medium text-gray-700 hover:bg-indigo-50 hover:text-indigo-600">
                    Edit
                </a>
                <a href="#" class="nav-link block px-3 py-2 text-base font-medium text-gray-700 hover:bg-indigo-50 hover:text-indigo-600">
                    Image
                </a>
                <a href="#" class="nav-link block px-3 py-2 text-base font-medium text-gray-700 hover:bg-indigo-50 hover:text-indigo-600">
                    Layer
                </a>

                <div class="px-3 pt-2 pb-1">
                    <button class="w-full bg-indigo-600 text-white px-4 py-2 rounded-lg text-base font-medium hover:bg-indigo-700 transition duration-150 shadow-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                        Account
                    </button>
                </div>
            </div>
        </div>
    </nav>