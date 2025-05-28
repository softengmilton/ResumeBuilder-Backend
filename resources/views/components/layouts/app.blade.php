<!DOCTYPE html>
<html lang="en">

<head>
    <meta charSet="utf-8" />
    <meta name="viewport" content="width=device-width" />
    <title>Online Resume Builder | Free Resume Maker | Enhancv</title>
    <meta name="application-name" content="Enhancv" />
    <script src="{{ asset('https://cdn.tailwindcss.com') }}"></script>
    <link rel="stylesheet"
        href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" data-n-g="" />
    <link rel="stylesheet" href="{{ asset('assets/css/style2.css') }}"data-n-p="" />
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles

</head>

<body>
    <div id="__next">
        <div class="modal-portal"></div>
        <div id="website" class="font-body">
            <div class="default-layout enhancv-homepage bg-page-alt overflow-x-hidden">
                <livewire:portal.partial.header />
                <main>
                    {{ $slot }}
                </main>
                <livewire:portal.partial.footer />
            </div>
        </div>
    </div>
    @livewireScripts

    <body>

</html>
