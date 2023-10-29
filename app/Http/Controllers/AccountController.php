<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rules\Password;

class AccountController extends Controller
{
 
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

    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $authuser = $request->only('email', 'password');
        if (Auth::attempt($authuser)) {
            return redirect()->intended(route('dashboard'));
        } else {
            return redirect(route('account.login'))->with('error', 'Hey, that detail is wrong. Try again');
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
