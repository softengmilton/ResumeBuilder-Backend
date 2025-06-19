<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Successful!</title>
    @vite(['resources/css/app.css', 'resources/js/app.js']) <!-- Tailwind CSS -->
</head>

<body class="bg-gradient-to-br from-purple-100 to-blue-50 min-h-screen">
    <div class="container mx-auto px-4 py-16">
        <!-- Animated Confetti Background -->
        <div class="fixed inset-0 overflow-hidden z-0">
            <div class="confetti"></div>
            <div class="confetti"></div>
            <div class="confetti"></div>
        </div>

        <!-- Card -->
        <div class="max-w-md mx-auto bg-white rounded-xl shadow-2xl overflow-hidden z-10 relative">
            <!-- Gradient Header -->
            <div class="bg-[#2dc08d] p-6 text-center">
                <svg class="h-20 w-20 mx-auto text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
                <h1 class="text-3xl font-bold text-white mt-4">Payment Successful!</h1>
            </div>

            <!-- Content -->
            <div class="p-8">
                <div class="text-center mb-6">
                    <p class="text-lg text-gray-700">
                        Thank you for your purchase the package!
                        <!-- <span class="font-bold text-indigo-600"></span>! -->
                    </p>
                    <!-- <p class="text-gray-500 mt-2">Invoice #</p> -->
                </div>

                <!-- Rainbow Progress Bar -->
                <div class="mb-8">
                    <div class="h-2 rounded-full overflow-hidden">
                        <div class="h-full bg-gradient-to-r from-red-500 via-yellow-500 to-green-500 animate-pulse"></div>
                    </div>
                </div>

                <!-- Action Button -->
                <a href="{{ route('home') }}"
                    class="block w-full bg-gradient-to-r from-pink-500 to-purple-600 hover:from-pink-600 hover:to-purple-700 text-white font-bold py-3 px-4 rounded-lg text-center transition-all transform hover:scale-105">
                    Back to Home
                </a>

                <!-- Celebration Emoji -->
                <div class="text-center mt-8 text-4xl animate-bounce">
                    🎉 🥳 🎊
                </div>
            </div>
        </div>
    </div>

    <!-- Confetti Animation CSS -->
    <style>
        .confetti {
            position: absolute;
            width: 10px;
            height: 10px;
            background-color: #2dc08d;
            opacity: 0.7;
            animation: confetti 5s ease-in-out infinite;
        }

        @keyframes confetti {
            0% {
                transform: rotate(0deg) translateY(0);
                opacity: 1;
            }

            100% {
                transform: rotate(360deg) translateY(100vh);
                opacity: 0;
            }
        }
    </style>
</body>

</html>