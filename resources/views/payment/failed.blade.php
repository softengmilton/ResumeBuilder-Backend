<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Failed</title>
    @vite(['resources/css/app.css', 'resources/js/app.js']) <!-- Tailwind CSS -->
</head>

<body class="bg-gradient-to-br from-red-50 to-pink-50 min-h-screen">
    <div class="container mx-auto px-4 py-16">
        <!-- Animated Error Background -->
        <div class="fixed inset-0 overflow-hidden z-0">
            <div class="error-pulse"></div>
            <div class="error-pulse"></div>
            <div class="error-pulse"></div>
        </div>

        <!-- Card -->
        <div class="max-w-md mx-auto bg-white rounded-xl shadow-2xl overflow-hidden z-10 relative">
            <!-- Gradient Header -->
            <div class="bg-[#2dc08d]  p-6 text-center">
                <svg class="h-20 w-20 mx-auto text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
                <h1 class="text-3xl font-bold text-white mt-4">Payment Failed</h1>
            </div>

            <!-- Content -->
            <div class="p-8">
                <div class="text-center mb-6">
                    <p class="text-lg text-gray-700">
                        We couldn't process your payment. Please try again.
                    </p>
                    <p class="text-gray-500 mt-2">Error: <span class="font-medium text-red-500">Card declined</span></p>
                </div>

                <!-- Error Progress Bar -->
                <div class="mb-8">
                    <div class="h-2 rounded-full overflow-hidden bg-gray-200">
                        <div class="h-full bg-gradient-to-r from-red-500 to-pink-600 animate-pulse" style="width: 30%"></div>
                    </div>
                    <p class="text-xs text-right text-gray-500 mt-1">30% completed</p>
                </div>

                <!-- Action Buttons -->
                <div class="space-y-4">
                    <a href="{{ route('pricing') }}"
                        class="block w-full bg-gradient-to-r from-red-500 to-pink-600 hover:from-red-600 hover:to-pink-700 text-white font-bold py-3 px-4 rounded-lg text-center transition-all transform hover:scale-105">
                        Try Again
                    </a>
                    <a href="{{ route('home') }}"
                        class="block w-full bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-3 px-4 rounded-lg text-center transition-all">
                        Back to Home
                    </a>
                </div>

                <!-- Support Info -->
                <div class="mt-8 text-center text-sm text-gray-600">
                    <p>Need help? <a href="#" class="text-blue-500 hover:underline">Contact support</a></p>
                </div>

                <!-- Warning Emoji -->
                <div class="text-center mt-8 text-4xl animate-pulse">
                    ❌ 😞 ⚠️
                </div>
            </div>
        </div>
    </div>

    <!-- Error Animation CSS -->
    <style>
        .error-pulse {
            position: absolute;
            width: 15px;
            height: 15px;
            background-color: #2dc08d;
            border-radius: 50%;
            animation: errorPulse 3s ease-in-out infinite;
        }

        @keyframes errorPulse {
            0% {
                transform: scale(1);
                opacity: 0.7;
            }

            50% {
                transform: scale(1.5);
                opacity: 0.3;
            }

            100% {
                transform: scale(1);
                opacity: 0.7;
            }
        }
    </style>
</body>

</html>