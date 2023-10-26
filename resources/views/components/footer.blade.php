<!-- Footer Menu (Visible on mobile) -->
<div class="sm:hidden fixed bottom-0 left-0 right-0 bg-gray-50">
    <div class="flex text-center items-center justify-between py-2 w-full">

        @if (request()->routeIs('dashboard'))
        <a href="{{ route('dashboard') }}" class="text-center text-xs font-medium ml-4 flex flex-col items-center">
            <img class="mb-1" src="{{ asset('img/menu_icon/home_filled.svg') }}" alt="Home Icon" />
            <span class="{{ request()->routeIs('dashboard') ? 'text-purple-700' : 'text-purple-500' }} relative">
                Home
                <span class="absolute bottom-0 left-1/2 transform -translate-x-1/2 h-0.5 w-4 bg-purple-500"></span>
            </span>
        </a>
        @else
        <a href="{{ route('dashboard') }}" class="text-center text-xs font-medium ml-4 flex flex-col items-center">
            <img class="mb-1" src="{{ asset('img/menu_icon/home.svg') }}" alt="Home Icon" />
            <span class="{{ request()->routeIs('dashboard') ? 'text-purple-700' : 'text-purple-500' }} relative">
                Home
            </span>
        </a>
        @endif


        @if (request()->routeIs('saving.*'))
        <a href="{{ url('saving') }}" class="text-center text-xs font-medium ml-3 flex flex-col items-center">
            <img class="mb-1" src="{{ asset('img/menu_icon/savings_filled.svg') }}" alt="Home Icon" />
            <span class="{{ request()->routeIs('saving.index') ? 'text-purple-700' : 'text-purple-500' }} relative">
                Reseller
                <span class="absolute bottom-0 left-1/2 transform -translate-x-1/2 h-0.5 w-4 bg-purple-500"></span>
            </span>
        </a>
        @else
        <a href="{{ url('saving') }}" class="text-center text-xs font-medium ml-3 flex flex-col items-center">
            <img class="mb-1" src="{{ asset('img/menu_icon/savings.svg') }}" alt="Home Icon" />
            <span class="{{ request()->routeIs('saving.index') ? 'text-purple-700' : 'text-pruple-500' }} relative">
                Reseller
            </span>
        </a>
        @endif

      
        @if (request()->routeIs('vas.*'))
        <a href="{{ url('vas') }}" class="text-center text-xs font-medium ml-3 flex flex-col items-center">
            <img class="mb-1" src="{{ asset('img/menu_icon/vas_filled.svg') }}" alt="Savings Icon" />
            <span class="{{ request()->routeIs('vas.index') ? 'text-purple-700' : 'text-purple-700' }} relative">
                VAS
                <span class="absolute bottom-0 left-1/2 transform -translate-x-1/2 h-0.5 w-4 bg-purple-500"></span>
            </span>
        </a>
        @else
        <a href="{{ url('vas') }}" class="text-center text-xs font-medium ml-3 flex flex-col items-center">
            <img class="mb-1" src="{{ asset('img/menu_icon/vas.svg') }}" alt="Home Icon" />
            <span class="{{ request()->routeIs('vas.index') ? 'text-purple-700' : 'text-pruple-500' }} relative">
                VAS
            </span>
        </a>
        @endif

        @if (request()->routeIs('account.*'))
        <a href="{{ route('account.index') }}" class="text-center text-xs font-medium mr-4 flex flex-col items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M12 2.75C6.89137 2.75 2.75 6.89137 2.75 12C2.75 13.9987 3.38328 15.8485 4.46095 17.361C5.60555 15.6825 7.26249 14.422 9.10157 13.7635C7.97544 12.8949 7.25 11.5322 7.25 10C7.25 7.37665 9.37665 5.25 12 5.25C14.6234 5.25 16.75 7.37665 16.75 10C16.75 11.5322 16.0246 12.8949 14.8985 13.7635C16.7375 14.422 18.3945 15.6824 19.5391 17.3609C20.6167 15.8484 21.25 13.9987 21.25 12C21.25 6.89137 17.1086 2.75 12 2.75ZM18.5253 18.5562C17.1028 16.2118 14.5331 14.75 12.0001 14.75C9.467 14.75 6.89728 16.2119 5.47478 18.5562C7.14825 20.2219 9.45344 21.25 12 21.25C14.5466 21.25 16.8518 20.2218 18.5253 18.5562ZM1.25 12C1.25 6.06294 6.06294 1.25 12 1.25C17.9371 1.25 22.75 6.06294 22.75 12C22.75 14.9019 21.5992 17.5365 19.7307 19.4699C17.7769 21.4915 15.0348 22.75 12 22.75C8.96524 22.75 6.22312 21.4915 4.26933 19.4699C2.40081 17.5365 1.25 14.9019 1.25 12ZM12 6.75C10.2051 6.75 8.75 8.20507 8.75 10C8.75 11.7949 10.2051 13.25 12 13.25C13.7949 13.25 15.25 11.7949 15.25 10C15.25 8.20507 13.7949 6.75 12 6.75Z" fill="#0DA75E" />
            </svg> <span class="{{ request()->routeIs('account.index') ? 'text-purple-700' : 'text-purple-700' }} relative">
                Account
                <span class="absolute bottom-0 left-1/2 transform -translate-x-1/2 h-0.5 w-4 bg-purple-500"></span>
            </span>
        </a>
        @else
        <a href="{{ route('account.index') }}" class="text-center text-xs font-medium mr-4 flex flex-col items-center">
            <img class="mb-1" src="{{ asset('img/menu_icon/mobile_avatar.svg') }}" alt="Home Icon" />
            <span class="{{ request()->routeIs('account.index') ? 'text-purple-700' : 'text-gray-500' }} relative">
                Account
            </span>
        </a>
        @endif

    </div>
</div>