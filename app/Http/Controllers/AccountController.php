<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Wallet;
use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rules\Password;

class AccountController extends Controller
{
 
    private function baseUrl()
    {
        return config('app.url');
    }

    private function header()
    {
        $token = Session::get('token');

        $headers = [
            // "Authorization" => "Bearer $token",
            "Accept" => "application/json",
            "Content-Type" => "application/json",
        ];

        return $headers;
    } 

    // public function postLogin(Request $request)
    // {
    //     $email = $request->get('email');
    //     $password = $request->get('password');
        
    //     $body = [
    //         'email' => $email,
    //         'password' => $password,
    //     ];
        
    //     $generate = $this->baseUrl() . '/login';
    //     $response = Http::withHeaders($this->header())->post($generate, $body);
    //     dd($response);

    //     if ($response->successful()) {
    //         $login = $response->json();
    //         dd($login);
    //     }

    //     // if (Auth::attempt($authuser)) {
    //     //     return redirect()->intended(route('dashboard'));
    //     // } else {
    //     //     return redirect(route('account.login'))->with('error', 'Hey, that detail is wrong. Try again');
    //     // }
    // }
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

    public function index()
    {
        return view("account.profile.index");
    }

    public function login()
    {
        if (Auth::check()) {
            return redirect(route('dashboard'));
        } else {
            return view("account.auth.login");
        }
    }
    public function postRegister(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'phone' => 'required|numeric|unique:users',
            'email' => 'required|email|unique:users',
            'password' => ['required', Password::min(8)->mixedCase()],
        ]);

        $validatedData = $request->only(['name', 'phone', 'email', 'password']);
        $validatedData['password'] = Hash::make($validatedData['password']);

        $user = User::create($validatedData);
        // Mail::to($user->email)->send(new WelcomeEmail($user));
        // Mail::to($user->email)->later(now()->addMinutes(2), new WelcomeEmail($user));


        return redirect(route('account.login'))->with('status', 'Your Registration is successful. You can now login');
    }
    public function forgotPassword(Request $request)
    {
        if (Auth::check()) {
            return redirect(route('dashboard'));
        } else {
            return view("account.auth.forgot-password");
        }
    }

    
    public function show(Account $account)
    {
        //
    }

  
    public function edit(Account $account)
    {
        //
    }

   
    public function update(Request $request, Account $account)
    {
        //
    }

  
    public function destroy(Account $account)
    {
        $account->delete();
        return redirect()->back()->with("status", "Deleted");
    }

    public function logout(Request $request)
    { 
        Session::flush();
        Auth::logout();
        return redirect(route('account.login'))->with('status', 'Logout successful');
    }
}
