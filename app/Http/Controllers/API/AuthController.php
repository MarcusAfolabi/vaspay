<?php

namespace App\Http\Controllers\API;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $user = User::find(Auth::guard('user')->user()->id);

        if (Auth::attempt($user)) {
            $tokenn = bin2hex(openssl_random_pseudo_bytes(64));
            $token = base64_encode($tokenn . $user->email);
            $now = Carbon::now()->toDateTimeString();
            User::where('email', $user->email)->update(['device_token' => $token, 'token_time' => $now]);

            if ($user->status == 'inactive') {
                return response()->json([
                    "status" => 401,
                    "message" => "Oops, your account has been deactivated! Please contact Admin via the chatbot."
                ]);
            }


            $wallet = Wallet::where('user_id', $user->id)->first();
            $balance = $wallet->balance;
            $wallet_code = $wallet->code;

            return response()->json([
                "status" => 200,
                "message" => "Successful",
                "token" => $token,
                "user" => $user,
                "wallet" => $wallet,
                "balance" => number_format($balance, 2),
                "wallet_code" => $wallet_code,
            ], 200);
        } else {
            return response()->json([
                "status" => 401,
                "message" => "Incorrect Email or Password!"
            ]);
        }
    } 
}
