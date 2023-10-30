<!-- <x-mail::message>
# Introduction

The body of your message.
<h1>Password Reset Request</h1>
    <p>You are receiving this email because we received a password reset request for your account.</p>
    <p><a href="{{ route('password.reset', ['token' => $token]) }}">Reset Password</a></p>
    <p>If you did not request a password reset, no further action is required.</p>
    
<x-mail::button :url="''">
Button Text
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message> -->

<x-mail::message>
# Password Reset Request

You are receiving this email because we received a password reset request for your account.

@component('mail::button', ['url' => route('password.reset', ['token' => $token])])
    Reset Password
@endcomponent

If you did not request a password reset, no further action is required.

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>

