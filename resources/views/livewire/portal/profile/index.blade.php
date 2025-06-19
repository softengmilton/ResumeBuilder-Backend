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
                    <button @click="tab = 'payments'"
                        :class="tab === 'payments' ? 'text-purple-600 font-semibold border-l-4 border-purple-600 bg-purple-50' : 'text-gray-700 hover:bg-gray-100 border-l-4 border-transparent'"
                        class="w-full text-left px-4 py-2 transition">Payments</button>
                </li>
                <li>
                    <button @click="tab = 'settings'"
                        :class="tab === 'settings' ? 'text-purple-600 font-semibold border-l-4 border-purple-600 bg-purple-50' : 'text-gray-700 hover:bg-gray-100 border-l-4 border-transparent'"
                        class="w-full text-left px-4 py-2 transition">Settings</button>
                </li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                            class="w-full text-left px-4 py-2 text-red-600 hover:bg-red-50 border-l-4 border-transparent hover:border-red-200 transition">
                            Logout
                        </button>
                    </form>
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

            <!-- Payments Section -->
            <!-- Payments Section -->
            <div x-show="tab === 'payments'" x-cloak>
                <h1 class="text-2xl sm:text-3xl font-bold mb-2">Payments & Subscriptions</h1>
                <p class="text-gray-600 mb-6">Manage your subscription and payment methods.</p>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <!-- Left Column - Plan Card -->
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <h2 class="text-xl font-semibold mb-4">Current Subscription</h2>

                        @if(auth()->user()->subscribed())
                        <div class="border border-green-200 rounded-lg p-6 bg-green-50">
                            <div class="flex justify-between items-start mb-4">
                                <div>
                                    <h3 class="font-medium text-green-800 text-lg">{{ $activePlan->name }}</h3>
                                    <p class="text-sm text-green-600 mt-1">
                                        @if(auth()->user()->subscription()->onGracePeriod())
                                        Expires on: {{ auth()->user()->subscription()->ends_at->format('M j, Y') }}
                                        @else
                                        @php
                                        try {
                                        $stripeSubscription = auth()->user()->subscription()->asStripeSubscription();
                                        $renewalDate = \Carbon\Carbon::createFromTimestamp($stripeSubscription->current_period_end)
                                        ->format('M j, Y');
                                        echo "Renews on: $renewalDate";
                                        } catch (\Exception $e) {
                                        echo "Active subscription";
                                        }
                                        @endphp
                                        @endif
                                    </p>
                                </div>
                                <span class="px-3 py-1 bg-green-100 text-green-800 text-sm rounded-full">Active</span>
                            </div>

                            <div class="space-y-3">
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Plan Price:</span>
                                    <span class="font-medium">${{ $activePlan->price }}/{{$activePlan->plan_duration }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Billing Cycle:</span>
                                    <span class="font-medium">{{$activePlan->plan_duration }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Status:</span>
                                    <span class="font-medium capitalize">{{ auth()->user()->subscription()->stripe_status }}</span>
                                </div>
                            </div>
                        </div>
                        @else
                        <div class="border border-gray-200 rounded-lg p-6 bg-gray-50">
                            <div class="text-center py-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <h3 class="mt-2 text-lg font-medium text-gray-700">No Active Subscription</h3>
                                <p class="mt-1 text-sm text-gray-500">Get full access to all features by subscribing to a plan</p>
                                <a href="{{ route('pricing') }}" class="mt-4 inline-block px-6 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition">
                                    View Plans
                                </a>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Settings Section -->
            <div x-show="tab === 'settings'" x-cloak>
                <h1 class="text-2xl sm:text-3xl font-bold mb-2">Settings</h1>
                <p class="text-gray-600  pr-[20rem]">
                    <!-- edit-profile.blade.php -->
                <div class="space-y-6 pr-[20rem] px-4 py-6 sm:px-6 lg:px-8">
                    @include('profile.partials.update-profile-information-form')

                    @include('profile.partials.update-password-form')
                </div>
                </p>
            </div>
        </main>
    </div>
</div>