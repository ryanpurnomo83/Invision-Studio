@include('components.main')
@include('components.navbar')

<body>
    <div class="flex min-h-screen">
        @include('components.sidebar')

        <main class="flex-1 flex justify-center items-center">
        @include('components.modal')
            <div class="flex flex-col gap-4">
                <!-- <button onclick="window.location.href='{{ route('editor') }}';" -->
                <button onclick="openImageModal()"
                    class="flex justify-center items-center gap-4 p-4 font-bold text-gray-500 bg-white border-[3px] rounded">
                    <i class="fa-solid fa-file-circle-plus"></i>
                    New Image Project
                </button>

                <button onclick="window.location.href='{{ route('video-studio') }}';"
                    class="flex justify-center items-center gap-4 p-4 font-bold text-gray-500 bg-white border-[3px] rounded">
                    <i class="fa-solid fa-file-circle-plus"></i>
                    New Video Project
                </button>

                <button onclick="window.location.href='{{ route('editor') }}';"
                    class="flex justify-center items-center gap-4 p-4 font-bold text-gray-500 bg-white border border-primary rounded">
                    <i class="fa-solid fa-folder-open"></i>
                    Open From Devices
                </button>
            </div>
        </main>
    </div>
</body>
<script>
    function openImageModal(){
        document.getElementById('modalProject').classList.remove('hidden');
    }

    function openVideoModal(){
        document.getElementById('modalProject').classList.remove('hidden');
    }

    function closeModal(){
        document.getElementById('modalProject').classList.add('hidden');
    }
</script>
