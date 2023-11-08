<?php

namespace App\Http\Controllers\API;

use App\Models\Key;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http; 

class KeyController extends Controller
{
    private function baseUrl()
    {
        return config('app.url');
    }

    private function header()
    {
        $headers = [
            "Accept" => "application/json",
            "Content-Type" => "application/json",
        ];
        return $headers;
    }

    public function index()
    {
        return view("dashboard.agent.verification");
    }

    public function loginAgent(Request $request)
    {
        $email = $request->get('email');
        $password = $request->get('password');

        $body = [
            'email' => $email,
            'password' => $password,
        ];
        
        $login = $this->baseUrl() . '/api/v2/user/login';
        $response = Http::withHeaders($this->header())->post($login, $body);
        if ($response->successful()) {
            $tok = $response->json()['token'];
            $email = $response->json()['data']['email'];
            // save to key model
            $existingToken = Key::where('email', $email)->first();

            if ($existingToken) {
                $existingToken->token = $tok;
                $existingToken->save();
            } else {
                $key = new Key();
                $key->token = $tok;
                $key->email = $email;
                $key->save();
            }
        }
        $tok = Key::where('email', $email)->first();

        if ($tok) {
            $token = $tok->token;

            $authHeader = [
                "Authorization" => $token,
                "Accept" => "application/json",
                "Content-Type" => "application/json",
            ];
        }
        else{
            return redirect()->back()->with("errors", "Incorrect Login detail");;
        }
        $generate = $this->baseUrl() . '/api/v2/keys';
        $response = Http::withHeaders($authHeader)->post($generate);
        if ($response->successful()) {
            $responseData = $response->json();
            $_id = $responseData['data']['_id'];
            $Lkey = $responseData['data']['live_key'];
            $Tkey = $responseData['data']['test_key'];
            $hook = $responseData['data']['webhook'];

            $existingKey = Key::where('email', $email)->first();
            if ($existingKey) {
                $existingKey->user_id = $_id;
                $existingKey->test_key = $Tkey;
                $existingKey->live_key = $Lkey;
                $existingKey->webhook = $hook;
                $existingKey->save();
            } else {
                $key = new Key();
                $key->user_id = $_id;
                $key->test_key = $Tkey;
                $key->live_key = $Lkey;
                $key->webhook = $hook;
                $key->email = $email;
                $key->save();
            }
            return redirect(route('dashboard'))->with('status', "You're now a verified agent");
        }
    }
}
