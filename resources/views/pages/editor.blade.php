@include('components.main')
@include('components.navbar')

<body class="bg-gray-800 font-sans text-white">
<div class="editor-container">

    <div class="main-editor-area">

        <!-- LEFT PANEL -->
        @include('components.editor-sidebar')

        <!-- CENTER AREA (CANVAS) -->
        <main class="flex flex-col items-center justify-start p-6 bg-gray-800 relative overflow-auto">

            <div class="controls mb-3 flex items-center space-x-3">
                <label>Brush Size:</label>
                <input type="range" min="10" max="100" id="brushSize" value="40" class="cursor-pointer">
                
                <label>W:</label>
                <input type="number" id="canvasWidth" value="800" class="w-20 text-black rounded p-1">

                <label>H:</label>
                <input type="number" id="canvasHeight" value="600" class="w-20 text-black rounded p-1">

                <button onclick="updateCanvasSize()" class="px-3 py-1 bg-blue-500 rounded">Apply Size</button>
                <button onclick="resetCanvas()" class="px-3 py-1 bg-red-500 rounded">Reset</button>
            </div>

            <div id="canvas-wrapper">
                <div class="checkerboard"></div>
                <canvas id="canvas" width="800" height="600"></canvas>
                <div id="brushCursor"></div>
            </div>

        </main>

        <!-- RIGHT PANEL -->
        @include('components.editor-sidebar2')
    </div>

    <!-- TIMELINE -->
    <footer class="timeline h-24 bg-gray-900 border-t border-gray-700 p-2 flex items-center justify-between z-10">
        <h2 class="text-sm font-semibold text-gray-400">Timeline / Layers</h2>
        <div class="flex items-center space-x-4">
            <button class="text-indigo-400 hover:text-indigo-300">▶</button>
            <div class="w-64 h-2 bg-gray-700 rounded-full relative">
                <div class="absolute top-0 left-0 h-2 bg-indigo-500 rounded-full" style="width:50%"></div>
                <div class="absolute top-0 left-[50%] -mt-1 w-4 h-4 bg-white rounded-full border-2 border-indigo-500 cursor-grab"></div>
            </div>
            <span class="text-xs text-gray-300">00:00:15 / 00:00:30</span>
        </div>
        <button class="text-sm text-gray-400 hover:text-white">Layers (3)</button>
    </footer>
</div>

</body>
<script>
    const canvas = document.getElementById("canvas");
    const ctx = canvas.getContext("2d");

    let brushSize = 40;
    const brushSlider = document.getElementById("brushSize");
    const cursor = document.getElementById("brushCursor");

    let erasing = false;

    cursor.style.width = brushSize + "px";
    cursor.style.height = brushSize + "px";

    function fillWhite() {
        ctx.globalCompositeOperation = "source-over";
        ctx.fillStyle = "#ffffff";
        ctx.fillRect(0, 0, canvas.width, canvas.height);
    }
    fillWhite();

    brushSlider.addEventListener("input", () => {
        brushSize = brushSlider.value;
        cursor.style.width = brushSize + "px";
        cursor.style.height = brushSize + "px";
    });

    canvas.addEventListener("mousemove", (e) => {
        const rect = canvas.getBoundingClientRect();
        let x = e.clientX - rect.left;
        let y = e.clientY - rect.top;

        cursor.style.left = (x - brushSize / 2) + "px";
        cursor.style.top = (y - brushSize / 2) + "px";

        if (erasing) {
            ctx.globalCompositeOperation = "destination-out";
            ctx.beginPath();
            ctx.arc(x, y, brushSize / 2, 0, Math.PI * 2);
            ctx.fill();
        }
    });

    canvas.addEventListener("mousedown", () => erasing = true);
    canvas.addEventListener("mouseup", () => erasing = false);

    function updateCanvasSize() {
        const w = parseInt(document.getElementById("canvasWidth").value);
        const h = parseInt(document.getElementById("canvasHeight").value);

        // Resize wrapper
        const wrapper = document.getElementById("canvas-wrapper");
        wrapper.style.width = w + "px";
        wrapper.style.height = h + "px";

        // Save current canvas (if someday you want restore)
        // const temp = ctx.getImageData(0, 0, canvas.width, canvas.height);

        // Resize canvas actual pixel size
        canvas.width = w;
        canvas.height = h;

        // Refill white after resize
        fillWhite();

        // Reset eraser cursor
        cursor.style.display = "none";
        setTimeout(() => cursor.style.display = "block", 10);
    }

    function resetCanvas() {
        fillWhite();
    }
</script>
</html>
