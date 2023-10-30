<x-mail::message>
# {{ $user->name }}, Welcome to {{ config('app.name') }}!

{{ config('app.name') }} is your premier payment service provider, dedicated to making your life simpler and more convenient. We're here to empower you to pay your bills without the hassle, offering a secure and user-friendly platform.

With {{ config('app.name') }}, you can:

📅 Simplify Your Bill Payments <br>
🤝 Earn Commissions <br>
💼 Enjoy a Convenient, Hassle-Free Experience

# Getting started is a breeze: 

💰 Add Funds, Pay Bills, and More!

<b>Data Services:</b> Enjoy unbeatable data rates for seamless internet browsing. Start your data reselling business today with fantastic discounts on all networks.

<b>Airtime Services:</b> Recharge your mobile credit quickly and securely at discounted rates for all networks.

<b>Electricity:</b> Instantly top up your prepaid meter with lightning-fast token delivery.

<b>Education:</b> Get WAEC and NECO Result Checker PINs and Tokens at unbeatable prices.

<b>TV Subscription:</b> Activate cable TV subscriptions like DSTV, GOTV, and Startimes instantly with fantastic discounts.

<b>Cable Subscription:</b> Enjoy instant activation of cable TV subscriptions, including DSTV, GOTV, and Startimes, with great discounts.

Simplify your life with {{ config('app.name') }}! 

<x-mail::button :url="url('/')"> 
🤝 Welcome Onboard
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
