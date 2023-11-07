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
            <!-- <div id="modal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">
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
            </div> -->
            <div id="notification-container" aria-live="assertive" class="fixed inset-0 flex items-end px-4 py-6 pointer-events-none sm:p-6 sm:items-start">
                <div class="w-full flex flex-col items-center space-y-4 sm:items-end">
                    <div class="notification-panel max-w-sm w-full bg-white shadow-lg rounded-lg pointer-events-auto ring-1 ring-black ring-opacity-5 overflow-hidden">
                        <div class="p-4">
                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-purple-800">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.633 10.5c.806 0 1.533-.446 2.031-1.08a9.041 9.041 0 012.861-2.4c.723-.384 1.35-.956 1.653-1.715a4.498 4.498 0 00.322-1.672V3a.75.75 0 01.75-.75A2.25 2.25 0 0116.5 4.5c0 1.152-.26 2.243-.723 3.218-.266.558.107 1.282.725 1.282h3.126c1.026 0 1.945.694 2.054 1.715.045.422.068.85.068 1.285a11.95 11.95 0 01-2.649 7.521c-.388.482-.987.729-1.605.729H13.48c-.483 0-.964-.078-1.423-.23l-3.114-1.04a4.501 4.501 0 00-1.423-.23H5.904M14.25 9h2.25M5.904 18.75c.083.205.173.405.27.602.197.4-.078.898-.523.898h-.908c-.889 0-1.713-.518-1.972-1.368a12 12 0 01-.521-3.507c0-1.553.295-3.036.831-4.398C3.387 10.203 4.167 9.75 5 9.75h1.053c.472 0 .745.556.5.96a8.958 8.958 0 00-1.302 4.665c0 1.194.232 2.333.654 3.375z" />
                                    </svg>


                                </div>
                                <div class="ml-3 w-0 flex-1 pt-0.5">
                                    <p class="text-sm font-medium text-purple-900">Good!</p>
                                    <p class="mt-1 text-sm text-purple-600">{{ session('status') }}</p>
                                </div>
                                <div class="ml-4 flex-shrink-0 flex">
                                    <button id="close-button" class="bg-white rounded-md inline-flex text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        <span class="sr-only">Close</span>
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
            @endif
        @if (count($errors) > 0)

            <div id="notification-container" aria-live="assertive" class="fixed inset-0 flex items-end px-4 py-6 pointer-events-none sm:p-6 sm:items-start">
                <div class="w-full flex flex-col items-center space-y-4 sm:items-end">
                    <div class="notification-panel max-w-sm w-full bg-white shadow-lg rounded-lg pointer-events-auto ring-1 ring-black ring-opacity-5 overflow-hidden">
                        <div class="p-4">
                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-red-800">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.182 16.318A4.486 4.486 0 0012.016 15a4.486 4.486 0 00-3.198 1.318M21 12a9 9 0 11-18 0 9 9 0 0118 0zM9.75 9.75c0 .414-.168.75-.375.75S9 10.164 9 9.75 9.168 9 9.375 9s.375.336.375.75zm-.375 0h.008v.015h-.008V9.75zm5.625 0c0 .414-.168.75-.375.75s-.375-.336-.375-.75.168-.75.375-.75.375.336.375.75zm-.375 0h.008v.015h-.008V9.75z" />
                                    </svg>

                                </div>
                                <div class="ml-3 w-0 flex-1 pt-0.5">
                                    <p class="text-sm font-medium text-red-800">Oops!</p>
                                    <p class="mt-1 text-sm text-red-800">{{ session('errors') }}</p>
                                </div>
                                <div class="ml-4 flex-shrink-0 flex">
                                    <button id="close-button" class="bg-white rounded-md inline-flex text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        <span class="sr-only">Close</span>
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
            @endif
            <script>
                function closeNotification() {
                    const notificationContainer = document.getElementById('notification-container');
                    notificationContainer.style.display = 'none';
                }
                document.getElementById('close-button').addEventListener('click', () => {
                    closeNotification();
                });

                setTimeout(() => {
                    closeNotification();
                }, 4000);
            </script>
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