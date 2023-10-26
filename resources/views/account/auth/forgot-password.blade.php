@extends('layouts.main')
@section('title', 'Forgot Password')
@section('description', "Welcome to the future of intelligent and seamless value-added services. Please enter your details to continue")
@section('keywords', 'Transfer, receive, funds, seamlessly, money, management, easy, easycash, easyloan, save, invest, earn, interest, savings, low interest rate, loan, loan app, borrowing, app, mobile loan app, financial, finance, money, lending, credit, borrowing, repayment, financial management, personal finance')
@section('canonical', config('app.url') . '/account/login')
@section('content')

<div class="w-full bg-white rounded-3xl p-4 shadow-2xl">
    <a href="{{ url()->previous() }}" class="text-lg font-extrabold"> <- </a>
    <h1 class="mt-12 md:px-28 text-left sm:font-semibold font-medium text-xl sm:text-2xl leading-loose">Forgot Password</h1>
    <p class="md:px-28 mt-2 text-purple-400 text-sm">You forget password? Just enter your email for a reset link.</p>


    <form method="POST" action="{{ route('account.login.post') }}" class="mx-auto mt-10 max-w sm:mt-10">
        @csrf
        @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>
        @endif
        <div class="grid grid-cols-1 md:px-28 gap-x-8 gap-y-6 sm:grid-cols-2">
            <div class="sm:col-span-2">
                <label for="email" class="block sm:text-sm sm:font-semibold text-xs font-normal text-black">Email</label>
                <div class="mt-2">
                    <input type="email" name="email" id="email" required autocomplete="email" value="{{ old('email') }}" class="block w-full border-0 rounded-md px-4 py-3 h-12 border-b border-transparent bg-purple-100 focus:border-purple-600 focus:ring-0 sm:text-md" placeholder="Enter email">

                </div>
            </div>
            <div class="sm:col-span-2">
                <button class="bg-purple-500 text-white px-2.5 py-3 block w-full rounded-r-3xl mt-7" type="submit">Email Reset Link</button>
            </div>

        </div>
    </form>
</div>

</div>

@endsection