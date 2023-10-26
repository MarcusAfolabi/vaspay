@extends('layouts.main')
@section('title', 'Buy Examination Cards')
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
 
<x-exam.onetime />
 
@endsection