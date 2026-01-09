@include('components.main')
@include('components.navbar')

<body class="bg-gray-800 font-sans text-white">
<div class="editor-container">

    <div class="main-editor-area">

        <!-- LEFT PANEL -->
        @include('components.editor-sidebar')

        <!-- CENTER AREA (CANVAS) -->

        <main class="flex flex-col items-center justify-start p-6 bg-gray-800 relative overflow-auto">

                <div>
                    <div class="controls mb-3 flex items-center space-x-3 text-black">
                        <label>Size:</label>
                        <select>
                            <option>Wide (16:9)</option>
                            <option>Vertical (9:16)</option>
                            <option>Square (1:1)</option>
                            <option>Classic (4:3)</option>
                            <option>Social (4:5)</option>
                        </select>

                        <label>W:</label>
                        <input type="number" id="canvasWidth" value="640" class="w-20 text-black rounded p-1">

                        <label>H:</label>
                        <input type="number" id="canvasHeight" value="360" class="w-20 text-black rounded p-1">

                        <button onclick="updateCanvasSize()" class="px-3 py-1 bg-blue-500 rounded">Apply Size</button>
                        <button onclick="resetCanvas()" class="px-3 py-1 bg-red-500 rounded">Reset</button>
                    </div>

                <div id="canvas-wrapper" style="width: 640px; height: 360px;">
                     @if(file_exists(public_path('videos/MWTtC.mp4')))
                     <video id="video" width="640" height="360">
                        <source src="{{ asset('videos/MWTtC.mp4'); }}" type="video/mp4">
                     </video>
                     @else
                     <canvas id="canvas" width="640" height="360"></canvas>  
                     @endif
                </div>
                
                <div class="flex items-center space-x-4">
                    <button id="playPause" class="text-indigo-400 hover:text-indigo-300">▶</button>
                    <button id="stop" class="px-3 py-1 bg-red-600 rounded text-sm">⏹</button>
                    <div class="w-[180%] h-2 bg-gray-700 rounded-full relative">
                        <div class="absolute top-0 left-0 h-2 bg-indigo-500 rounded-full" style="width:100%"></div>
                        <div class="absolute top-0 left-[50%] -mt-1 w-4 h-4 bg-white rounded-full border-2 border-indigo-500 cursor-grab"></div>
                    </div>
                    <span class="text-xs text-gray-300">00:00:30</span>
                </div>
            </div>

            <div class="h-screen bg-gray-900 text-white overflow-hidden">

                <!-- Toolbar -->
                <div class="flex items-center gap-4 px-4 py-2 bg-gray-800 border-b border-gray-700">
                    <button id="playBtn" class="px-4 py-1 bg-green-600 rounded">Play</button>
                    <button id="zoomIn" class="px-3 py-1 bg-gray-700 rounded">+</button>
                    <button id="zoomOut" class="px-3 py-1 bg-gray-700 rounded">-</button>
                    <span id="currentTime" class="ml-4 text-sm">00:00:00</span>
                </div>

                <!-- Timeline -->
                <div class="relative h-full overflow-x-auto">

                    <!-- Time Ruler -->
                    <div id="timeRuler"
                        class="relative h-10 flex items-end text-xs bg-gray-800 border-b border-gray-700">
                    </div>

                    <!-- Tracks -->
                    <div id="timeline"
                        class="relative min-w-[2000px]">

                        <!-- Playhead -->
                        <div id="playhead"
                            class="absolute top-0 bottom-0 w-[2px] bg-red-500 z-50"></div>

                        <!-- Video Track -->
                        <div class="flex h-16 border-b border-gray-700">
                            <div class="w-32 bg-gray-800 flex items-center px-2 text-sm">
                                🎬 Video
                            </div>
                            <div class="relative flex-1">
                                <div class="absolute top-2 bottom-2 left-[100px] w-[400px]
                                            bg-blue-600 rounded flex items-center justify-center
                                            text-sm cursor-move select-none">
                                    Video Clip
                                </div>
                            </div>
                        </div>

                        <!-- Audio Track -->
                        <div class="flex h-16">
                            <div class="w-32 bg-gray-800 flex items-center px-2 text-sm">
                                🎵 Audio
                            </div>
                            <div class="relative flex-1">
                                <div class="absolute top-2 bottom-2 left-[100px] w-[400px]
                                            bg-green-700 rounded overflow-hidden cursor-move">
                                    <div class="h-full bg-[repeating-linear-gradient(90deg,rgba(255,255,255,0.4),rgba(255,255,255,0.4)_2px,transparent_2px,transparent_6px)]">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </main>

        <!-- RIGHT PANEL -->
        @include('components.editor-sidebar2')
    </div>

    <!-- TIMELINE -->
    <footer class="timeline h-24 bg-gray-900 border-t border-gray-700 p-2 flex items-center justify-between z-10">
        
    </footer>
</div>

</body>

<script>
const video = document.getElementById('video');
const playPause = document.getElementById('playPause');
const stopBtn = document.getElementById('stop');
const seek = document.getElementById('seek');
const time = document.getElementById('time');

// Format time
function formatTime(sec) {
    const m = Math.floor(sec / 60).toString().padStart(2, '0');
    const s = Math.floor(sec % 60).toString().padStart(2, '0');
    return `${m}:${s}`;
}

// Metadata loaded
video.addEventListener('loadedmetadata', () => {
    seek.max = video.duration;
    time.textContent = `00:00 / ${formatTime(video.duration)}`;
});

// Play / Pause
playPause.addEventListener('click', () => {
    if (video.paused) {
        video.play();
        playPause.textContent = '⏸';
    } else {
        video.pause();
        playPause.textContent = '▶';
    }
});

// Stop
stopBtn.addEventListener('click', () => {
    video.pause();
    video.currentTime = 0;
    playPause.textContent = '▶ Play';
});

// Update seek bar
video.addEventListener('timeupdate', () => {
    seek.value = video.currentTime;
    time.textContent = `${formatTime(video.currentTime)} / ${formatTime(video.duration)}`;
});

// Seek manually
seek.addEventListener('input', () => {
    video.currentTime = seek.value;
});
</script>

<script>
let zoom = 1;
let playhead = document.getElementById('playhead');
let timeline = document.getElementById('timeline');
let timeRuler = document.getElementById('timeRuler');
let currentTime = 0;

function renderRuler() {
    timeRuler.innerHTML = '';
    const seconds = 60;
    for (let i = 0; i <= seconds; i++) {
        const tick = document.createElement('div');
        tick.className = 'relative border-l border-gray-600';
        tick.style.width = (100 * zoom) + 'px';
        tick.innerHTML = `<span class="absolute left-1 bottom-0">${i}s</span>`;
        timeRuler.appendChild(tick);
    }
}
renderRuler();

document.getElementById('zoomIn').onclick = () => {
    zoom += 0.2;
    timeline.style.transform = `scaleX(${zoom})`;
};

document.getElementById('zoomOut').onclick = () => {
    zoom = Math.max(0.4, zoom - 0.2);
    timeline.style.transform = `scaleX(${zoom})`;
};

// Play simulation
document.getElementById('playBtn').onclick = () => {
    let interval = setInterval(() => {
        currentTime += 0.1;
        playhead.style.left = (currentTime * 100 * zoom) + 'px';
        document.getElementById('currentTime').innerText =
            new Date(currentTime * 1000).toISOString().substr(11, 8);
        if (currentTime > 60) clearInterval(interval);
    }, 100);
};

// Drag clip
document.querySelectorAll('.clip').forEach(clip => {
    let isDragging = false;
    let startX = 0;

    clip.addEventListener('mousedown', e => {
        isDragging = true;
        startX = e.clientX - clip.offsetLeft;
    });

    window.addEventListener('mousemove', e => {
        if (!isDragging) return;
        clip.style.left = (e.clientX - startX) + 'px';
    });

    window.addEventListener('mouseup', () => isDragging = false);
});
</script>
<script>
    const canvas = document.getElementById("canvas");
    const ctx = canvas.getContext("2d");

    let brushSize = 40;
    const brushSlider = document.getElementById("brushSize");
    const cursor = document.getElementById("brushCursor");

    let erasing = false;

    cursor.style.width = brushSize + "px";
    cursor.style.height = brushSize + "px";

    function fillBlack() {
        ctx.globalCompositeOperation = "source-over";
        ctx.fillStyle = "#000000";
        ctx.fillRect(0, 0, 20, 20);
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
        fillBlack();

        // Reset eraser cursor
        cursor.style.display = "none";
        setTimeout(() => cursor.style.display = "block", 10);
    }

    function resetCanvas() {
        fillBlack();
    }
</script>
</html>
