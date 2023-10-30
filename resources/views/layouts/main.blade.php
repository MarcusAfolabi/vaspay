<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | {{ config('app.name') }} </title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="format-detection" content="telephone=yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="author" content="Webshop Technology">
    <meta name="keywords" content="@yield('keywords')">
    <meta name="description" content="@yield('description')" />
    <meta name="canonical" content="@yield('canonical')" />
    <link rel="shortcut icon" href="{{ asset('img/favicon/favicon.ico') }}">
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('img/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('img/favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('img/favicon/site.webmanifest') }}" />
    <link rel="manifest" href="{{ asset('img/favicon/browserconfig.xml') }}" />
    <link rel="mask-icon" href="{{ asset('img/favicon/safari-pinned-tab.svg') }}" color="#F18739">
    <meta name="msapplication-TileColor" content="#F18739">
    <meta name="theme-color" content="#F18739">


    <meta property="og:url" content="@yield('canonical')" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="@yield('title')" />
    <meta property="og:description" content="@yield('description')" />

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="@yield('canonical')">
    <meta property="twitter:title" content="@yield('title')">
    <meta property="twitter:description" content="@yield('description')">
    <meta property="og:image" content="{{ asset('img/favicon/favicon.ico') }}">

    <!-- Open Graph general (Facebook, Pinterest & Google+) -->
    <meta name="og:title" content="@yield('title')">
    <meta name="og:description" content="@yield('description')">
    <meta name="og:image" content="{{ asset('img/favicon/favicon.ico') }}">
    <meta name="og:url" content="@yield('canonical')">
    <meta name="og:site_name" content="@yield('title')">
    <meta name="og:application-name" content="vaspay">

    <!-- preload css -->
    <link rel="preload" href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" as="style">
    <link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" as="style">
    <link rel="preload" href="{{ asset('css/main.css') }}" as="style">
    <link rel="preload" href="{{ asset('css/app.css') }}" as="style">
    <!-- fallback css -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <link rel="stylesheet" href="{{ asset('css/main.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />

    @vite('resources/css/app.css')


</head>

<body class="sm:bg-purple-50 bg-purple-50 mt-6">
    <x-nav />
    <div class="flex ">
        <!-- Left container -->
        <div class="hidden sm:flex" style="width: 320px"></div>

        <!-- Center container -->
        <div class="px-4 md:px-0 mt-6" style="width: 720px">


            @yield('content')
            @if(session('status'))
            <div id="modal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">
                <div style="width: 320px;" class="flex items-center justify-center min-h-screen">
                    <div class="bg-white rounded-lg p-8 flex flex-col w-full items-center justify-center">
                        <img src="{{ asset('img/success.svg') }}" class="justify-center mb-2" />
                        <h2 class="font-medium text-lg text-black mb-6">Yep!</h2>
                        <div class="text-center justify-center w-full border-b border-gray-200 pb-6">
                            <p style="font-size: 16px;" class="font-normal">{{ session('status') }}</p>
                        </div>
                        <div class="mt-6 sm:flex m:hidden grid grid-col-2 gap-3 justify-between items-center">
                            <button style="background-color: #0DA75E" class="w-full  text-white rounded-lg px-4 py-3" onclick="closeModal()">Done</button>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                function closeModal() {
                    console.log('closeModal() called');
                    document.getElementById('modal').classList.add('hidden');
                }
            </script>
            @endif
            @if(session('error'))
            <div id="notification-container" aria-live="assertive" class="fixed inset-0 flex items-end px-4 py-6 pointer-events-none sm:p-6 sm:items-start">
                <div class="w-full flex flex-col items-center space-y-4 sm:items-end">
                    <!-- Notification panel, dynamically insert this into the live region when it needs to be displayed -->
                    <div class="notification-panel max-w-sm w-full bg-white shadow-lg rounded-lg pointer-events-auto ring-1 ring-black ring-opacity-5 overflow-hidden">
                        <div class="p-4">
                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    <!-- Heroicon name: outline/check-circle -->
                                    <svg class="h-6 w-6 text-green-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <div class="ml-3 w-0 flex-1 pt-0.5">
                                    <p class="text-sm font-medium text-gray-900">Successfully saved!</p>
                                    <p class="mt-1 text-sm text-gray-500">{{ session('error') }}</p>
                                </div>
                                <div class="ml-4 flex-shrink-0 flex">
                                    <button id="close-button" class="bg-white rounded-md inline-flex text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        <span class="sr-only">Close</span>
                                        <!-- Heroicon name: solid/x -->
                                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                // Function to close the notification
                function closeNotification() {
                    const notificationContainer = document.getElementById('notification-container');
                    notificationContainer.style.display = 'none';
                }

                // Close the notification when the close button is clicked
                document.getElementById('close-button').addEventListener('click', () => {
                    closeNotification();
                });

                // Automatically close the notification after 5 seconds
                setTimeout(() => {
                    closeNotification();
                }, 5000); // 5000 milliseconds (5 seconds)
            </script>

            @endif
            <script src="{{ asset('js/vas.js') }}"></script>

        </div>
        <!-- Right container -->
        <div class="hidden sm:flex" style="width: 320px"></div>

    </div>
    <x-footer />

    <script src="{{ asset('js/main.js') }}"></script>
    <script rel="preload" src="{{ asset('js/main.js') }}" as="style"></script>





    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var modal = document.getElementById('errorModal');
            var closeModal = document.getElementById('closeModal');

            closeModal.addEventListener('click', function() {
                modal.style.display = 'none';
            });

            modal.style.display = 'block';
        });

        function showLoading() {
            document.getElementById('loading').classList.remove("hidden");
        }
    </script>




</body>

</html>