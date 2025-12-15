@include('components.main')
@include('components.navbar')

<body>
    <div class="flex min-h-screen">
        @include('components.sidebar')

        <main class="flex-1 flex justify-center items-center">
            <button onclick="window.location.href='{{ route('editor') }}';"
                class="p-4 font-bold text-gray-500 bg-red-500">
                New File
            </button>
        </main>
    </div>
</body>