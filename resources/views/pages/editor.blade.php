@include('components.main')
@include('components.navbar')
<body class="bg-gray-800 font-sans text-white">

    <div class="editor-container">

        <!-- 2. MAIN EDITOR AREA (Grid Layout: Left | Center | Right) -->
        <div class="main-editor-area">

            <!-- 2.1. LEFT PANEL (Tools & Assets) -->
            <aside class="left-panel bg-gray-700 border-r border-gray-600 p-3 overflow-y-auto">
                <h2 class="text-lg font-semibold mb-3 text-gray-200">Assets & Tools</h2>
                <div class="space-y-4">
                    <!-- Tool Group 1: Tools -->
                    <div class="bg-gray-600 p-3 rounded-lg">
                        <p class="font-medium mb-2 text-indigo-300">Tools</p>
                        <ul class="text-sm space-y-1">
                            <li><button class="w-full text-left hover:text-indigo-400">Select (V)</button></li>
                            <li><button class="w-full text-left hover:text-indigo-400">Crop</button></li>
                            <li><button class="w-full text-left hover:text-indigo-400">Text</button></li>
                            <li><button class="w-full text-left hover:text-indigo-400">Brush</button></li>
                        </ul>
                    </div>

                    <!-- Tool Group 2: Assets -->
                    <div class="bg-gray-600 p-3 rounded-lg">
                        <p class="font-medium mb-2 text-indigo-300">Media Library</p>
                        <div class="grid grid-cols-3 gap-2">
                            <!-- Placeholder media thumbnails -->
                            <div class="h-10 bg-gray-500 rounded-md hover:ring-2 ring-indigo-400 cursor-pointer"></div>
                            <div class="h-10 bg-gray-500 rounded-md hover:ring-2 ring-indigo-400 cursor-pointer"></div>
                            <div class="h-10 bg-gray-500 rounded-md hover:ring-2 ring-indigo-400 cursor-pointer"></div>
                            <div class="h-10 bg-gray-500 rounded-md hover:ring-2 ring-indigo-400 cursor-pointer"></div>
                        </div>
                    </div>
                </div>
            </aside>

            <!-- 2.2. CENTER AREA (Canvas / Preview) -->
            <main class="flex flex-col items-center justify-center p-6 bg-gray-800 relative overflow-auto">
                <div class="w-full max-w-4xl h-full max-h-[80vh] bg-gray-900 border-2 border-dashed border-gray-600 rounded-xl shadow-2xl flex items-center justify-center">
                    <div class="text-center">
                        <svg class="w-12 h-12 mx-auto text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        <p class="mt-2 text-sm font-medium text-gray-400">Canvas Area</p>
                        <p class="text-xs text-gray-500">Drag assets here to begin editing</p>
                    </div>
                </div>
                <div class="absolute bottom-4 flex space-x-4 bg-gray-700/80 backdrop-blur-sm p-2 rounded-full shadow-lg">
                    <button class="p-2 text-indigo-400 hover:text-indigo-300">Undo</button>
                    <button class="p-2 text-indigo-400 hover:text-indigo-300">Redo</button>
                    <button class="p-2 text-indigo-400 hover:text-indigo-300">Zoom In</button>
                </div>
            </main>

            <!-- 2.3. RIGHT PANEL (Properties & Settings) -->
            <aside class="right-panel bg-gray-700 border-l border-gray-600 p-4 overflow-y-auto hidden lg:block">
                <h2 class="text-lg font-semibold mb-4 text-gray-200">Properties</h2>
                <div class="space-y-6">
                    <!-- Layer/Element Settings -->
                    <div class="bg-gray-600 p-3 rounded-lg">
                        <p class="font-medium mb-2 text-indigo-300">Transform</p>
                        <div class="text-sm space-y-2">
                            <label class="block">X: <input type="number" value="100" class="w-full bg-gray-700 border border-gray-500 rounded-md p-1"></label>
                            <label class="block">Y: <input type="number" value="50" class="w-full bg-gray-700 border border-gray-500 rounded-md p-1"></label>
                            <label class="block">Scale: <input type="range" value="80" class="w-full h-1 bg-gray-500 rounded-lg appearance-none cursor-pointer"></label>
                        </div>
                    </div>

                    <!-- Filter Settings -->
                    <div class="bg-gray-600 p-3 rounded-lg">
                        <p class="font-medium mb-2 text-indigo-300">Filters</p>
                        <div class="text-sm space-y-2">
                            <label class="block">Brightness: <input type="range" class="w-full h-1 bg-gray-500 rounded-lg appearance-none cursor-pointer"></label>
                            <label class="block">Contrast: <input type="range" class="w-full h-1 bg-gray-500 rounded-lg appearance-none cursor-pointer"></label>
                        </div>
                    </div>
                </div>
            </aside>
        </div>

        <!-- 3. BOTTOM BAR (Timeline - Crucial for Video Editors) -->
        <footer class="timeline h-24 bg-gray-900 border-t border-gray-700 p-2 flex items-center justify-between z-10">
            <h2 class="text-sm font-semibold text-gray-400">Timeline / Layers</h2>
            <div class="flex items-center space-x-4">
                <!-- Play/Pause Button -->
                <button class="text-indigo-400 hover:text-indigo-300">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd"></path></svg>
                </button>
                <div class="w-64 h-2 bg-gray-700 rounded-full relative">
                    <div class="absolute top-0 left-0 h-2 bg-indigo-500 rounded-full" style="width: 50%;"></div>
                    <div class="absolute top-0 left-[50%] -mt-1 w-4 h-4 bg-white rounded-full shadow-lg border-2 border-indigo-500 cursor-grab"></div>
                </div>
                <span class="text-xs text-gray-300">00:00:15 / 00:00:30</span>
            </div>
            <button class="text-sm text-gray-400 hover:text-white">Layers (3)</button>
        </footer>

    </div>

</body>
</html>