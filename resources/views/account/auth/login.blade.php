@extends('layouts.main')
@section('title', 'Login')
@section('description', "Welcome to the future of intelligent and seamless value-added services. Please enter your details to continue")
@section('keywords', 'Transfer, receive, funds, seamlessly, money, management, easy, easycash, easyloan, save, invest, earn, interest, savings, low interest rate, loan, loan app, borrowing, app, mobile loan app, financial, finance, money, lending, credit, borrowing, repayment, financial management, personal finance')
@section('canonical', config('app.url') . '/account/login')
@section('content')

<div class="flex-1 flex shadow-2xl">
    <div id="login-form" class="w-full bg-white rounded-3xl p-4">
        <!-- Login form here -->
        <div class="w-full bg-white rounded-3xl p-4">
            <h1 class="mt-12 md:px-28 text-left sm:font-semibold font-medium text-xl sm:text-2xl leading-loose">Login to your account</h1>
            <p class="md:px-28 mt-2 text-purple-400 text-sm">Securely login to your VasPay</p>

            <form method="POST" action="{{ route('account.login.post') }}" class="mx-auto mt-10 max-w sm:mt-10">
                @csrf
                <div class="grid grid-cols-1 md:px-28 gap-x-8 gap-y-6 sm:grid-cols-2">
                    <div class="sm:col-span-2">
                        <label for="phone" class="block sm:text-sm sm:font-semibold text-xs font-normal text-black">Email</label>
                        <div class="mt-2">
                            <input type="email" name="email" required id="email" autocomplete="email" value="{{ old('email') }}" name="email" class="block w-full border-0 rounded-md px-4 py-3 h-12 border-b border-transparent bg-purple-200 focus:border-purple-600 focus:ring-0 sm:text-md" placeholder="Enter email">

                        </div>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="password" class="block sm:text-sm sm:font-semibold text-xs font-normal text-black">Password</label>
                        <div class="mt-2 relative">
                            <input type="password" name="password" required id="password" autocomplete="password" class="block w-full border-0 rounded-md px-4 py-3 h-12 border-b border-transparent bg-purple-200 focus:border-purple-600 focus:ring-0 sm:text-md" placeholder="Enter password">
                            <p id="password-error" class="text-red-500 text-xs mt-1"></p>
                            <div class="absolute right-3 top-3">
                                <button type="button" onclick="togglePasswordVisibility()" class="text-purple-400 hover:text-purple-600 focus:outline-none">
                                    <span id="passwordToggleText" class="text-purple-500 font-medium">Show</span>
                                </button>
                            </div>
                            <x-validation-status class="mt-2 text-[8px] text-red-600 text-center font-bold" role="alert" />
                        </div>
                        <button class="bg-purple-500 text-white px-2.5 py-3 block w-full rounded-r-3xl mt-7" type="submit">Log in</button>
                    </div>
                </div>
            </form>
            <p class="mt-3 text-center md:w-full"><a href="{{ route('account.forgot-password') }}" class="text-purple-500">Forgot password?</a></p>
            <p class="mt-3 text-center md:w-full">Don't have an account? <button class="text-purple-500" id="signup-button">Sign up</button>
            </p>
        </div>
    </div>
    
    <div id="signup-form" class="w-full bg-white rounded-3xl p-4" style="display: none;">
        <div class="w-full bg-white rounded-3xl p-4">
            <h1 class="mt-12 md:px-28 text-left sm:font-semibold font-medium text-xl sm:text-2xl leading-loose">Create a Secure Account</h1>
            <p class="md:px-28 mt-2 text-purple-400 text-sm">Welcome to the future of intelligent and seamless value-added services.</p>

            <form method="POST" action="{{ route('account.register.post') }}" class="mx-auto mt-10 max-w sm:mt-10">
                @csrf
                <div class="grid grid-cols-1 md:px-28 gap-x-8 gap-y-6 sm:grid-cols-2">
                    <div class="sm:col-span-2">
                        <label for="phone" class="block sm:text-sm sm:font-semibold text-xs font-normal text-black">Full name</label>
                        <div class="mt-2">
                            <input type="text" name="name" id="name" autocomplete="name" value="{{ old('name') }}" class="block w-full border-0 rounded-md px-4 py-3 h-12 border-b border-transparent bg-purple-200 focus:border-purple-600 focus:ring-0 sm:text-md" placeholder="Enter firstname lastname">

                        </div>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="phone" class="block sm:text-sm sm:font-semibold text-xs font-normal text-black">Phone no</label>
                        <div class="mt-2">
                            <input type="tel" name="phone" id="phone" maxlength="11" autocomplete="phone" value="{{ old('phone') }}" pattern="^0(?:70|71|80|81|90|91)[0-9]{8}$" class="block w-full border-0 rounded-md px-4 py-3 h-12 border-b border-transparent bg-purple-200 focus:border-purple-600 focus:ring-0 sm:text-md" placeholder="Enter phone no">

                        </div>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="phone" class="block sm:text-sm sm:font-semibold text-xs font-normal text-black">Email</label>
                        <div class="mt-2">
                            <input type="email" name="email" id="email" autocomplete="email" value="{{ old('email') }}" class="block w-full border-0 rounded-md px-4 py-3 h-12 border-b border-transparent bg-purple-200 focus:border-purple-600 focus:ring-0 sm:text-md" placeholder="Enter email">

                        </div>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="password" class="block sm:text-sm sm:font-semibold text-xs font-normal text-black">Password</label>
                        <div class="mt-2 relative">
                            <input type="password" name="password" id="password1" autocomplete="password" class="block w-full border-0 rounded-md px-4 py-3 h-12 border-b border-transparent bg-purple-200 focus:border-purple-600 focus:ring-0 sm:text-md" placeholder="Enter your password">
                            <p id="password-error" class="text-red-500 text-xs mt-1"></p>
                            <div class="absolute right-3 top-3">
                                <button type="button" onclick="togglePasswordVisibility1()" class="text-purple-400 hover:text-purple-600 focus:outline-none">
                                    <span id="passwordToggleText1" class="text-purple-500 font-medium">Show</span>
                                </button>
                            </div>
                            <x-validation-status class="mt-2 text-[8px] text-red-600 text-center font-bold" role="alert" />
                        </div>
                        <button class="bg-purple-600 text-white px-2.5 py-3 block w-full rounded-s-3xl mt-7" type="submit">Signup</button>
                    </div>
                </div>
            </form>
            <p class="mt-3 text-center md:w-full"><a href="{{ route('account.forgot-password') }}" class="text-purple-500">Forgot password?</a></p>
            <p class="mt-3 text-center md:w-full">Already have an account? <button id="login-button" class="text-purple-500">Login</button>
        </div>
    </div>

    
</div>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const loginForm = document.getElementById("login-form");
        const signupForm = document.getElementById("signup-form");

        // Function to show the signup form and hide the login form
        function showSignupForm() {
            loginForm.style.display = "none";
            signupForm.style.display = "block";
        }

        // Function to show the login form and hide the signup form
        function showLoginForm() {
            loginForm.style.display = "block";
            signupForm.style.display = "none";
        }

        // Attach click event listeners to your "Sign up" and "Login" buttons
        const signupButton = document.getElementById("signup-button");
        const loginButton = document.getElementById("login-button");

        signupButton.addEventListener("click", showSignupForm);
        loginButton.addEventListener("click", showLoginForm);
    });
</script>



<script>
    function togglePasswordVisibility() {
        const passwordInput = document.getElementById("password");
        const passwordToggleText = document.getElementById("passwordToggleText");

        if (passwordInput.type === "password") {
            passwordInput.setAttribute("type", "text");
            passwordToggleText.textContent = "Hide";
        } else {
            passwordInput.setAttribute("type", "password");
            passwordToggleText.textContent = "Show";
        }
    }
    function togglePasswordVisibility1() {
        const passwordInput = document.getElementById("password1");
        const passwordToggleText = document.getElementById("passwordToggleText1");

        if (passwordInput.type === "password") {
            passwordInput.setAttribute("type", "text");
            passwordToggleText.textContent = "Hide";
        } else {
            passwordInput.setAttribute("type", "password");
            passwordToggleText.textContent = "Show";
        }
    }
</script>





@endsection