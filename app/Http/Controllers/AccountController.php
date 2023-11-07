<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Wallet;
use App\Models\Account;
use App\Mail\WelcomeMail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Notifications\NewUser;
use App\Mail\PasswordResetMail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash; 
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

        return redirect()->route('login')->with('errors', 'Hey, Sorry, I could not recognize your details.');
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

        Notification::route('mail', [
            config('app.mail') => 'Welcome a new user',
        ])->notify(new NewUser($user));

        Mail::to($user->email)->send(new WelcomeMail($user));

        // You can customize the response or redirection here
        return redirect(route('login'))->with('status', 'Your registration is successful. You can now log in.');
    }

    public function forgotPassword(Request $request)
    {
        if (Auth::check()) {
            return redirect(route('dashboard'));
        } else {
            return view("account.auth.forgot-password");
        }
    }

    public function forgotPasswordPost(Request $request)
    {
         
        $request->validate([
            'email' => 'required|email|exists:users,email', // Check if the email exists in the 'email' column of the 'users' table
        ]);

        $email = $request->input('email');

        $lastResetRequest = DB::table('password_reset_tokens')
        ->where('email', $request->email)
        ->orderBy('created_at', 'desc')
        ->first();
        
        // dd($lastResetRequest);

        if ($lastResetRequest && Carbon::parse($lastResetRequest->created_at)->addHour()->isFuture()) {
            return redirect()->back()->withErrors(['email' => 'A password reset email has already been sent. Please wait before submitting another request.']);
        }

        $token = Str::random(64);

        DB::table('password_reset_tokens')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]); 

        // Mail::send("mail.custom-password-reset", ['token' => $token, 'email' => $request->email], function ($message) use ($request) {
        //     $message->to($request->email);
        //     $message->subject("Reset Your Account Password");
        // });
        Mail::to($request->email)
        ->send(new PasswordResetMail($email, $token));
        

        return redirect()->back()->with('status', 'I have sent you an email to reset your password')->withInput(['email' => $request->email]);
    } 
   
    
    public function resetPassword($token)
    {
        if (Auth::check()) {
            return redirect(route('dashboard.index'));
        }
        return view('account.auth.reset-password', compact('token'));
    }

    public function resetPasswordPost(Request $request)
    {
        if (Auth::check()) {
            return redirect(route('dashboard.index'));
        }
        $request->validate([
            'email' => "required|email|exists:users",
            'password' => "required|string|min:8|confirmed",
            'password' => "required|string|min:8",
        ]);
        $updatePassword = DB::table('password_reset_tokens')
            ->where([
                "email" => $request->email,
                "token" => $request->token
            ])->first();
        if (!$updatePassword) {
            return redirect(route('reset.password'))->with('status', "This is invalid request");
        }

        User::where('email', $request->email)->update(['password' => Hash::make($request->password)]);

        DB::table('password_reset_tokens')->where(['email' => $request->email])->delete();

        return redirect(route('login'))->with('status', 'Your new Password is ready to go!');
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
        return redirect(route('login'))->with('status', 'Logout successful');
    }
}
