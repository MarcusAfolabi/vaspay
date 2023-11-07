<nav class="bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-0 md:h-16">
            <div class="hidden sm:flex flex-shrink-0">
                <a href="{{ url('welcome') }}" class="flex items-center space-x-2">
                    <img src="{{ asset('vaspay.svg') }}" alt="vaspay logo">
                </a>
            </div>

            <!-- Header Menu Items (Hidden on mobile) -->
            <div class="hidden sm:flex items-center justify-center flex-1 space-x-8">
                @if(Request::routeIs('welcome'))
                <a href="{{ url('welcome') }}" class="flex items-center space-x-2 text-purple-500 font-semibold">
                    <img class="h-6 w-6" src="{{ asset('img/menu_icon/home_filled.svg') }}" alt="About Icon">
                    <span>Home</span>
                </a>
                @else
                <a href="{{ url('welcome') }}" class="flex items-center space-x-2  font-semibold">
                    <img class="h-6 w-6" src="{{ asset('img/menu_icon/home.svg') }}" alt="About Icon">
                    <span style="color: #828282;">Home</span>
                </a>
                @endif

                @if(Request::routeIs('about.*'))
                <a href="{{ url('about') }}" class="flex items-center space-x-2 text-purple-500 font-semibold">
                    <img class="h-6 w-6" src="{{ asset('img/menu_icon/savings_filled.svg') }}" alt="Savings Icon">
                    <span>Reseller</span>
                </a>
                @else
                <a href="{{ url('about') }}" class="flex items-center space-x-2 font-semibold">
                    <img class="h-6 w-6" src="{{ asset('img/menu_icon/savings.svg') }}" alt="Savings Icon">
                    <span style="color: #828282;">Reseller</span>
                </a>
                @endif
              
                @if(Request::routeIs('vas.*'))
                <a href="{{ url('vas') }}" class="flex items-center space-x-2 font-semibold text-purple-500 ">
                    <img class="h-6 w-6" src="{{ asset('img/menu_icon/vas_filled.svg') }}" alt="Savings Icon">
                    <span>VAS</span>
                </a>
                @else
                <a href="{{ url('vas') }}" class="flex items-center space-x-2 font-semibold">
                    <img class="h-6 w-6" src="{{ asset('img/menu_icon/vas.svg') }}" alt="Savings Icon">
                    <span style="color: #828282;">VAS</span>
                </a>
                @endif

            </div>
            @php
            $loggedInUser = Session::get('loggedIn'); 
            @endphp
            <div class="hidden sm:flex items-center ml-auto">
                <a href="#" class="text-gray-500 hover:text-gray-300">
                    <img src="{{ asset('img/menu_icon/notification.svg') }}" alt="Notification Icon">
                </a>
                @if(Request::routeIs('account.*'))
                <a href="{{ route('index') }}" class="ml-4 ">
                    <img src="{{ $loggedInUser['profile'] ?? asset('img/menu_icon/avater.svg') }}" class="w-10 h-10 rounded-full" alt="Avatar Icon">
                </a>
                <a href="{{ route('index') }}" class="ml-4" style="color: #0DA75E; border-bottom: 2px solid var(--primary, #0DA75E); padding: 12px 0px;">My account</a>
                @else 
                <a href="{{ route('index') }}" class="ml-4 text-gray-500 hover:text-gray-300">
                    <img src="{{ $loggedInUser['profile'] ?? asset('img/menu_icon/avater.svg') }}" class="w-10 h-10 rounded-full" alt="Avatar Icon">
                </a>
                <a href="{{ route('index') }}" class="ml-4 text-medium text-sm text-gray-500 hover:text-purple-800">My account</a>
                @endif
            </div>
        </div>
    </div>
</nav>