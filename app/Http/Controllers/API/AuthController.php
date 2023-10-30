<?php

namespace App\Http\Controllers\API;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Wallet;
use App\Mail\WelcomeMail;
use Illuminate\Http\Request;
use App\Notifications\NewUser;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
// use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;


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


    public function postRegister(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'name' => 'sometimes|string|max:50',
            'lastname' => 'sometimes|string|max:50',
            'phone' => 'sometimes|string|max:11|unique:users',
            'email' => 'required|string|email|allowed_domain|max:100|unique:users',
            'password' => 'required', Password::min(8)->mixedCase(),
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $wallet_id = substr($input['phone'], 3);

        $user = User::create([
            'name' => $input['name'],
            'lastname' => $input['lastname'],
            'email' => $input['email'],
            'phone' => $input['phone'],
            'wallet_id' => $wallet_id,
            'password' => Hash::make($input['password']),
        ]);

        Wallet::create([
            'user_id' => $user->id,
            'wallet_id' => $wallet_id,
            'commission' => "0.00",
            'balance' => "0.00",
        ]);

        Notification::route('mail', [
            config('app.mail') => 'Welcome a new user',
        ])->notify(new NewUser($user));
        Mail::to($user->email)->send(new WelcomeMail($user));
        return response()->json(['message' => 'Registration successful'], 200);
    }

    public function forgotPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? response()->json(['message' => 'Password reset link sent to your email'], 200)
            : response()->json(['message' => 'Unable to send password reset link'], 400);
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
        ]);

        $response = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->password = Hash::make($password);
                $user->save();
                event(new PasswordReset($user));
            }
        );

        return $response == Password::PASSWORD_RESET
            ? response()->json(['message' => 'Password has been reset'], 200)
            : response()->json(['message' => 'Password reset failed'], 400);
    }
}
