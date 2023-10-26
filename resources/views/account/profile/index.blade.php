@extends('layouts.main')
@section('title', 'My Profile')
@section('description', 'The best way to save and invest')
@section('keywords', 'save, invest, earn, interest, savings, low interest rate, loan, loan app, borrowing, app, mobile loan app, financial, finance, money, lending, credit, borrowing, repayment, financial management, personal finance')
@section('canonical', config('app.url') . '/myaccount')
@section('content')

<div class="sm:grid space-y-8 mt-6 bg-white shadow-md rounded-3xl p-3">
    <h2 class="font-medium text-center leading-loose text-xl sm:text-2xl mt-4"> Profile</h2>
    <div class="space-y-4">
        <div class="flex justify-between pt-2">
            <div>
                <div class="flex gap-2">
                    <img src="{{ asset('img/menu_icon/avater.svg') }}" alt="Avatar Icon">
                    <div class="text-sm">
                        <h2 class="text-black font-medium text-xl">Afolabi Marcus</h2>
                        <img class="rounded-md mt-2" src="{{ asset('img/tier/tier1.svg') }}" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="grid grid-cols-2 gap-6 pb-2">
        <div class="rounded-s-3xl bg-purple-500 pb-2">
            <div class="flex flex-row justify-between">
                <p class="text-gray-50 font-bold p-3">&nbsp; Wallet ID</p>
            </div>
            <div class="mt-2.3 relative">
                <a href="#" class="text-gray-50 font-semibold p-5">35155129</a>
                <button title="Copy" class="text-gray-50 copy-btn absolute right-3 top-1/2 transform -translate-y-2/3" data-text="35155129"> Copy
                </button>
            </div>
        </div>
        <div class="rounded-r-3xl bg-purple-500 pb-2">
            <div class="flex flex-row justify-between">
                <p class="text-gray-50 font-bold p-3">Balance</p>
            </div>
            <div class="mt-2.3 relative">
                <a href="#" class="text-gray-50 font-semibold p-3">N40,000.00</a>

            </div>
        </div>

    </div>
</div>

<div class="sm:grid grid-cols-2 gap-12 border-t border-gray-200 pt-8 pb-8">
    <a href="{{ route('account.edit') }}">
        <div class="bg-white py-4 px-3 rounded-lg">
            <div class="flex justify-start">
                <p class="flex-auto w-8"><img src="{{ asset('img/account/avatar.svg') }}"></p>
                <p class="flex-auto w-60 text-gray-800 font-medium text-base">Personal Details</p>
                <p class="flex-auto w-42"><img class="justify-between" src="{{ asset('img/account/chevron_right.svg') }}"></p>
            </div>
        </div>
    </a>
    <a href="{{ route('account.edit') }}">
        <div class="bg-white py-4 px-3 rounded-lg">
            <div class="flex justify-start">
                <p class="flex-auto w-8"><img src="{{ asset('img/account/avatar.svg') }}"></p>
                <p class="flex-auto w-60 text-gray-800 font-medium text-base">Set Transaction PIN</p>
                <p class="flex-auto w-42"><img class="justify-between" src="{{ asset('img/account/chevron_right.svg') }}"></p>
            </div>
        </div>
    </a>
</div>



<div class="sm:grid border-t border-gray-200 w-full pt-8 pb-8">
    <div class="flex justify-center gap-4  mt-8">
        <a href="{{ route('account.logout') }}" type="submit" class="ring-1 ring-red-500 text-red-500 text-center block w-full rounded-lg px-4 py-3">Logout</a>
    </div>
</div>

@endsection