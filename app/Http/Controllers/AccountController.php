<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Wallet;
use App\Models\Account;
use App\Mail\WelcomeMail;
use Illuminate\Http\Request;
use App\Notifications\NewUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash; 
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Notification;

class AccountController extends Controller
{
    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();

            if ($user->status == 'inactive') {
                return redirect()->route('login')->with('status', 'Oops, your account has been deactivated! Please contact Admin via the chatbot.');
            }

            return redirect()->intended(route('dashboard'));
        }

        return redirect()->route('account.login')->with('error', 'Hey, Sorry, I could not recognize your details.');
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
            'password' => ['required', Password::min(8)->mixedCase()],
            'name' => 'sometimes|string|max:50',
            'lastname' => 'sometimes|string|max:50',
            'phone' => 'sometimes|string|max:11|unique:users',
            'email' => 'required|string|email|allowed_domain|max:100|unique:users',
        ]);

        $wallet_id = substr($request->input('phone'), 3);

        $user = User::create([
            'name' => $request->input('name'),
            'lastname' => $request->input('lastname'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'wallet_id' => $wallet_id,
            'password' => Hash::make($request->input('password')),
        ]);

        Wallet::create([
            'user_id' => $user->id,
            'wallet_id' => $wallet_id,
            'commission' => "0.00",
            'balance' => "0.00",
        ]);

        // Notification::route('mail', [
        //     config('app.mail') => 'Welcome a new user',
        // ])->notify(new NewUser($user));

        Mail::to($user->email)->send(new WelcomeMail($user));

        // You can customize the response or redirection here
        return redirect(route('account.login'))->with('status', 'Your registration is successful. You can now log in.');
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
