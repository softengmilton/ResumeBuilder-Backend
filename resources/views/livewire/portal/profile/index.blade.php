<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

<div class="min-h-[100vh] bg-white px-4 sm:px-6 lg:px-8 py-6">
    <div class="max-w-[150rem] mx-auto flex flex-col lg:flex-row gap-6" x-data="{ tab: 'resumes' }">

        <!-- Sidebar -->
        <aside class="w-full lg:w-64 border-b lg:border-b-0 lg:border-r border-gray-200 p-4 bg-white rounded-lg shadow-sm">
            <ul class="space-y-2">
                <li>
                    <button @click="tab = 'resumes'"
                        :class="tab === 'resumes' ? 'text-purple-600 font-semibold border-l-4 border-purple-600 bg-purple-50' : 'text-gray-700 hover:bg-gray-100 border-l-4 border-transparent'"
                        class="w-full text-left px-4 py-2 transition">My Resumes</button>
                </li>
                <li>
                    <button @click="tab = 'settings'"
                        :class="tab === 'settings' ? 'text-purple-600 font-semibold border-l-4 border-purple-600 bg-purple-50' : 'text-gray-700 hover:bg-gray-100 border-l-4 border-transparent'"
                        class="w-full text-left px-4 py-2 transition">Settings</button>
                </li>
            </ul>
        </aside>

        <!-- Content Area -->
        <main class="flex-1 p-4 sm:p-6 overflow-auto bg-white rounded-lg shadow-sm">
            <!-- Resume Section -->
            <div x-show="tab === 'resumes'" x-cloak>
                <h1 class="text-2xl sm:text-3xl font-bold mb-2">Dashboard</h1>
                <p class="text-gray-600 mb-6">Start creating AI resumes for your next job role.</p>

                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    <!-- Add New Resume -->
                    <a href="{{ route('resume') }}">
                        <div
                            class="flex items-center justify-center border-2 border-dashed border-gray-300 rounded-lg h-64 sm:h-[28rem] cursor-pointer hover:bg-gray-50">
                            <span class="text-4xl font-bold text-gray-400">+</span>
                        </div>
                    </a>

                    <!-- Existing Resumes -->
                    @foreach ($resumes as $resume)
                        <div class="rounded-xl shadow-md h-64 sm:h-[28rem] relative overflow-visible"
                            style="background: linear-gradient(to bottom, #fce4ec, #e0f7fa);">
                            <!-- Resume Icon Center -->
                            <div class="flex flex-col items-center justify-center h-[80%]">
                                <a
                                    href="{{ route('builder', ['template' => $resume->template->uuid, 'resume' => $resume->uuid ?? null]) }}">
                                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS28yL9fcLmFVKq3bXvJrjHE4Zy8b-qEbuzLg&s"
                                        alt="Resume Icon" class="w-16 h-16 sm:w-20 sm:h-20 mb-2" />
                                </a>
                            </div>

                            <!-- Bottom Bar -->
                            <div
                                class="absolute bottom-0 left-0 w-full flex items-center justify-between bg-blue-600 text-white px-4 py-2">
                                <p class="text-sm font-semibold truncate">{{ $resume->title ?? 'Untitled Resume' }}</p>
                                <div x-data="{ open: false }" class="relative z-50">
                                    <button @click="open = !open" class="focus:outline-none">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="w-5 h-5 text-white hover:text-gray-200"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 6v.01M12 12v.01M12 18v.01" />
                                        </svg>
                                    </button>
                                    <div x-show="open" @click.away="open = false"
                                        x-transition
                                        class="absolute right-0 bottom-full mb-2 w-32 bg-white border rounded-md shadow-lg z-50 text-black"
                                        x-cloak>
                                        <a href="{{ route('builder', ['template' => $resume->template->uuid, 'resume' => $resume->uuid ?? null]) }}"
                                            class="block px-4 py-2 text-sm hover:bg-gray-100">Edit</a>
                                        <a href="javascript:void(0);" wire:click="newClick"
                                            class="block px-4 py-2 text-sm text-red-600 hover:bg-red-100">Delete</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Settings Section -->
            <div x-show="tab === 'settings'" x-cloak>
                <h2 class="text-xl font-semibold mb-4">Settings</h2>
                <p class="text-gray-600  pr-[20rem]">
                   <!-- edit-profile.blade.php -->
                        <div class="space-y-6 pr-[20rem]">
                        @include('profile.partials.update-profile-information-form')

                            @include('profile.partials.update-password-form')
                        </div>

                </p>
            </div>
        </main>
    </div>
</div>
