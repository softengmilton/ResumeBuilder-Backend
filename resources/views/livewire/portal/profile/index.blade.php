<div class="p-8 h-[100vh] w-full max-w-[140rem] mx-auto">
    <h1 class="text-3xl font-bold">My Resume</h1>
    <p class="text-gray-600 mb-6">Start Creating AI resume to your next Job role</p>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-6 gap-4 overflow-visible"> <!-- Changed gap-6 to gap-4 -->
        <!-- Add New Resume Card -->
        <a href="{{ route('resume') }}">
            <div
                class="flex items-center justify-center border-2 border-dashed border-gray-300 rounded-lg h-[30rem] w-[20rem] cursor-pointer hover:bg-gray-50">
                <span class="text-4xl font-bold text-gray-400">+</span>
            </div>
        </a>

        <!-- Existing Resumes -->
        @foreach ($resumes as $resume)
            <div class="rounded-xl shadow-md w-[20rem] h-[30rem] relative overflow-visible"
                style="background: linear-gradient(to bottom, #fce4ec, #e0f7fa);">
                <!-- Resume Icon Center -->
                <div class="flex flex-col items-center justify-center h-[80%]">
                    <a
                        href="{{ route('builder', ['template' => $resume->template->uuid, 'resume' => $resume->uuid ?? null]) }}">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS28yL9fcLmFVKq3bXvJrjHE4Zy8b-qEbuzLg&s"
                            alt="Resume Icon" class="w-20 h-20 mb-2" />
                    </a>
                </div>

                <!-- Bottom Bar -->
                <div
                    class="absolute bottom-0 left-0 w-full flex items-center justify-between bg-blue-600 text-white px-4 py-2">
                    <p class="text-sm font-semibold truncate">{{ $resume->title ?? 'Untitled Resume' }}</p>
                    <div x-data="{ open: false }" class="relative z-50">
                        <button @click="open = !open" class="focus:outline-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white hover:text-gray-200"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v.01M12 12v.01M12 18v.01" />
                            </svg>
                        </button>
                        <div x-show="open" x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-75"
                            x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
                            @click.away="open = false"
                            class="absolute right-0 bottom-full mb-2 w-32 bg-white border rounded-md shadow-lg z-50 text-black"
                            style="display: none;">
                            <a href="{{ route('builder', ['template' => $resume->template->uuid, 'resume' => $resume->uuid ?? null]) }}"
                                class="block px-4 py-2 text-sm hover:bg-gray-100">Edit</a>

                            <a href="#" class="block px-4 py-2 text-sm text-red-600 hover:bg-red-100">Delete</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
