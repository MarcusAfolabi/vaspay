@extends('layouts.main')
@section('title', 'Value Added Services')
@section('description', 'The best way to save and investEarn up to 10% interest on your savings')
@section('keywords', 'save, invest, earn, interest, savings, low interest rate, loan, loan app, borrowing, app, mobile loan app, financial, finance, money, lending, credit, borrowing, repayment, financial management, personal finance')
@section('canonical', config('app.url') . '/vas')
@section('content')

Landing page

<div class="mt-6 pb-32">
    <div class="w-full sm:w-full flex">
        <div style="background-color: #EBF6EE; " class="flex items-center justify-between w-full p-4 rounded-lg">
            <a href="#" class="flex items-center">
                <h3 class="text-base font-medium">Earn rewards
                    <p class="text-sm font-normal w-80 md:w-full mt-1">Invite your friends to vaspay and earn big!</p>
                </h3>
            </a>
            <button id="reward" class="flex items-center">
                <img src="{{ asset('img/gift.svg')}}" alt="gift Image" class="ml-auto" />
            </button>
        </div>
    </div>
</div>



<script>
    document.getElementById('reward').addEventListener('click', function() {
        // Get the parent div and hide it
        var parentDiv = this.closest('.mt-6');
        parentDiv.style.display = 'none';
    });
</script>
@endsection