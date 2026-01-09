<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invision Studio</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="icon" type="image/png" href="{{ asset('images/Invision-Studio-Logo.png'); }}" >
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
        #canvas-wrapper {
            /* border: 2px solid #333;
            padding: 2px;
            display: inline-block; */
            background: #f5f5f5;
        }

        .checkerboard {
            position: absolute;
            inset: 0;
            background: 
            conic-gradient(#ccc 25%, #eee 0 50%, #ccc 0 75%, #eee 0) 
            0 0 / 20px 20px;
            z-index: 0;
        }

        canvas {
            border: 1px solid black;
        }

        #brushCursor {
            position: absolute;
            pointer-events: none;
            border: 1px solid white;
            border-radius: 50%;
            mix-blend-mode: difference;
        }

        .controls {
            margin-bottom: 20px;
        }

        #canvas-wrapper {
            position: relative;
            margin-top: 20px;
        }

        #canvas-wrapper .checkerboard {
            position: absolute;
            inset: 0;
            background:
                conic-gradient(#ccc 25%, #eee 0 50%, #ccc 0 75%, #eee 0)
                0 0 / 22px 22px;
            z-index: 0;
        }

        #canvas {
            position: absolute;
            inset: 0;
            z-index: 1;
            width: 100%;
            height: 100%;
            /* cursor: crosshair; */
        }

        #brushCursor {
            position: absolute;
            /* border: 2px solid red; */
            border-radius: 50%;
            pointer-events: none;
            z-index: 3;
        }

        .waveform {
            height: 100%;
            background: repeating-linear-gradient(
                90deg,
                rgba(255,255,255,0.4),
                rgba(255,255,255,0.4) 2px,
                transparent 2px,
                transparent 6px
            );
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
    @yield('content')

    @livewireScripts