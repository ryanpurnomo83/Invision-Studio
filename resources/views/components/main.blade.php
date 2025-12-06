<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invision Studio</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <link rel="icon" type="" href="">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @media (min-width: 640px) {
            /* Ensure the mobile menu is hidden on desktop */
            #mobile-menu {
                display: none;
            }
        }
        .editor-container {
            height: 100vh;
            display: flex;
            flex-direction: column;
            overflow: hidden; /* Prevent scrollbars unless content within panels overflows */
        }
        /* Defines the main area below the header */
        .main-editor-area {
            flex-grow: 1;
            display: grid;
            /* Defines the 3 columns: Left Panel (20%), Canvas (60%), Right Panel (20%) */
            grid-template-columns: 20% 60% 20%;
            overflow: hidden; /* Important for nested scrolling */
        }

        /* Responsive adjustments for smaller screens (e.g., tablet landscape) */
        @media (max-width: 1024px) {
            .main-editor-area {
                /* On smaller screens, stack elements or hide less critical ones (simplified for this demo) */
                grid-template-columns: 25% 75%; /* Hide right panel on smaller screens, just show tools and canvas */
            }
            .right-panel {
                display: none;
            }
        }
        @media (max-width: 768px) {
            .main-editor-area {
                grid-template-columns: 1fr; /* Stack everything on very small screens, which is common for mobile/editor apps */
                overflow-y: auto; /* Allow scrolling if stacked panels exceed screen height */
            }
            .left-panel, .right-panel, .timeline {
                min-height: 200px;
                max-height: 50vh; /* Limits panel size when stacked */
            }
        }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                }
            }
        }
    </script>
    @livewireStyles
</head>
<body>

    {{-- Semua halaman akan muncul di sini --}}
    @yield('content')

    @livewireScripts
</body>
</html>