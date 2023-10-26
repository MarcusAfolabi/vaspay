@extends('layouts.main')
@section('title', 'Buy Cable TV ')
@section('description', 'Buy airtime for all various network providers, both local and international')
@section('keywords', 'save, invest, earn, interest, savings, low interest rate, loan, loan app, borrowing, app, mobile loan app, financial, finance, money, lending, credit, borrowing, repayment, financial management, personal finance')
@section('canonical', config('app.url') . '/airtime')
@section('content')

<div class="mt-0 text-base font-bold">
    <a href="{{ url()->previous() }}">
        <span class="block lg:hidden "> <- </span>
               <span class="text-purple-800 hidden lg:flex">
                    <- Back </span>
    </a>

</div>

<div class="grid grid-cols-2 gap-3 mt-4">
    <button type="" id="one-time-button" onclick="switchSection('one')">
    <div id="one-time" class="sm:text-lg text-sm font-normal leading-normal text-center text-purple-800 border-b-2 rounded-b-xl border-purple-500 py-3">
            Regular
        </div>
    </button>

    <button type="" id="auto-renewal-button" onclick="switchSection('auto')">
    <div id="auto-renewal" class="sm:text-lg text-sm font-normal leading-normal text-center text-purple-800 rounded-b-xl bg-purple-100 py-3">
            Subscription
        </div>
    </button>
</div> 
 
<x-cable.onetime />

 <x-cable.auto />

 

 <script>

function switchSection(section) {
    const oneSection = document.querySelector('.one');
    const autoSection = document.querySelector('.auto');

    const oneTimeButton = document.getElementById('one-time');
    const autoRenewalButton = document.getElementById('auto-renewal');

    if (section === 'one') {
        oneSection.classList.remove('hidden');
        autoSection.classList.add('hidden');

        oneTimeButton.classList.add('border-b-2', 'border-purple-500');
        autoRenewalButton.classList.remove('border-b-2', 'border-purple-500');
        oneTimeButton.classList.remove('bg-purple-200', 'text-purple-500');
        autoRenewalButton.classList.add('bg-purple-200', 'text-purple-500');
    } else if (section === 'auto') {
        oneSection.classList.add('hidden');
        autoSection.classList.remove('hidden');

        oneTimeButton.classList.remove('border-b-2', 'border-purple-500');
        autoRenewalButton.classList.add('border-b-2', 'border-purple-500');
        oneTimeButton.classList.add('bg-purple-200', 'text-purple-500');
        autoRenewalButton.classList.remove('bg-purple-200', 'text-purple-500');
    }
}

</script>

@endsection