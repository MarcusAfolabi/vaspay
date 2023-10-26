@extends('layouts.main')
@section('title', 'Buy Electricity Supply')
@section('description', 'Buy internet data for all various network providers')
@section('keywords', 'save, invest, earn, interest, savings, low interest rate, loan, loan app, borrowing, app, mobile loan app, financial, finance, money, lending, credit, borrowing, repayment, financial management, personal finance')
@section('canonical', config('app.url') . '/data')
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
            Renewal
        </div>
    </button>
</div> 

<!-- One time tabe -->
<x-electricity.onetime />

 <x-electricity.auto />

<script>
    function switchSection(section) {
        const oneSection = document.querySelector('.one');
        const autoSection = document.querySelector('.auto');

        const oneTimeButton = document.getElementById('one-time');
        const autoRenewalButton = document.getElementById('auto-renewal');

        if (section === 'one') {
            oneSection.classList.remove('hidden');
            autoSection.classList.add('hidden');

            oneTimeButton.classList.add('border-b-2', 'border-green-500');
            autoRenewalButton.classList.remove('border-b-2', 'border-green-500');
            oneTimeButton.classList.remove('bg-purple-200', 'text-purple-500');
            autoRenewalButton.classList.add('bg-purple-200', 'text-purple-500');
        } else if (section === 'auto') {
            oneSection.classList.add('hidden');
            autoSection.classList.remove('hidden');

            oneTimeButton.classList.remove('border-b-2', 'border-green-500');
            autoRenewalButton.classList.add('border-b-2', 'border-green-500');
            oneTimeButton.classList.add('bg-purple-200', 'text-purple-500');
            autoRenewalButton.classList.remove('bg-purple-200', 'text-purple-500');
        }
    }

    function openNewNumberModal() {
        document.getElementById('modalNewNumber').classList.remove('hidden');
    }

    function closeModal() {
        document.getElementById('modalNewNumber').classList.add('hidden');
    }

    function sendReport() {
        // Add your logic here to handle sending the report
        // For example, you can retrieve the reason from the input field and perform an AJAX request to send the report to the server

        // After sending the report, close the modal
        closeModal();
    }

    function showForm() {
        var form = document.getElementById('entryForm');
        form.style.display = 'block';
    }

    function populatePhoneNumber() {
        // Replace this with your code to fetch the authenticated user's phone number
        var userPhoneNumber = "09035155129";

        var phoneNumberInput = document.getElementById('phoneNumberInput');
        phoneNumberInput.value = userPhoneNumber;
    }

    function formatAmount() {
        var amountInput = document.getElementById('amountInput');
        var amount = amountInput.value;

        // Remove all non-digit characters from the amount
        var cleanedAmount = amount.replace(/\D/g, '');

        // Format the cleaned amount with commas and currency symbol
        var formattedAmount = '₦' + numberWithCommas(cleanedAmount);

        // Update the input value with the formatted amount
        amountInput.value = formattedAmount;
    }

    function numberWithCommas(number) {
        return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
    }

    function openRemoveModal() {
        document.getElementById('modalTerminate').classList.remove('hidden');
    }

    function closeModalTerminate() {
        document.getElementById('modalTerminate').classList.add('hidden');
    }

    function openEditTopTop() {
        document.getElementById('modalEditTopUp').classList.remove('hidden');
    }
</script>
@endsection