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
    
            return redirect()->intended(route('dashboard.index'));
        }
    
        return redirect()->route('login')->with('status', 'Hey, Sorry, I could not recognize your details.');
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
