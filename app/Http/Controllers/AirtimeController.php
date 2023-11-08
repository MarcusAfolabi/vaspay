<?php

namespace App\Http\Controllers;

use App\Models\Key;
use App\Models\Wallet;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Http;

class AirtimeController extends Controller
{
    private function baseUrl()
    {
        return config('app.url');
    }

    private function header()
    {
        $email = config('app.mail');
        $token = Key::where('email', $email)->value('live_key');
        $headers = [
            "Authorization" => "Bearer " . $token,
            "Accept" => "application/json",
            "Content-Type" => "application/json",
        ];
        return $headers;
    }
    public function __construct()
    {
        if (config('app.verification') === true) {
            $this->middleware(['auth', 'verified']);
        } else {
            $this->middleware(['auth']);
        }
    }

    public function buyAirtime(Request $request)
    {
        $request->validate([
            'network' => 'required|string',
            'phone' => 'required|string',
            'amount' => 'required|numeric',
        ]);

        $network = $request->get('network');
        $phone = $request->get('phone');
        $amount = $request->get('amount');
        $user_id = auth()->user()->id;

        // check if the user wallet balance is sufficient
        $user = auth()->user();
        $userBalance = $user->wallet->balance;
        if ($userBalance < $amount) {
            return redirect()->back()->with('status', 'Insufficient fund. Go and fund your wallet, please.');
        }

        $body = [
            "network" => $network,
            "phone" => $phone,
            "amount" => $amount,
        ];
        try {
            $airtime = $this->baseUrl() . '/api/v2/airtime/buy';
            $response = Http::withHeaders($this->header())->post($airtime, $body);
            info($response->json());
            $info = $response->json();

            if ($info['data']['code'] == 200) {
                $reference = $info['data']['reference'];
                $code = $info['data']['code'];
                $description = $info['msg'];


                //  Deduct the amount from the user's wallet if the response code is '200'
                    $userWallet = Wallet::where('user_id', $user_id)->first();
                    if ($userWallet) {
                        $userWallet->balance -= $amount;
                        $userWallet->save();
                    } 

                // Add Commission to the user if the response code is '200'
                    $airtime = Product::where('name', 'airtime')->first();
                    if ($airtime) {
                        $commissionValue = $airtime->commission;
                        $wallet = Wallet::where('user_id', $user->id)->first();
                        if ($wallet) {
                            $existingCommission = $wallet->commission;
                            $newCommission = $commissionValue / $amount;
                            $wallet->commission = $existingCommission + $newCommission;
                            $wallet->save();
                        }
                    } 

                // Save the transaction to the database
                $trans = new Transaction();
                $trans->reference = $reference;
                $trans->amount = $amount;
                $trans->status = $code;
                $trans->type = "airtime";
                $trans->network = $network;
                $trans->destination = $description;
                $trans->user_id = $user_id;
                $trans->save();
                return redirect()->back()->with('status', $response->json()['msg']);
            } elseif ($response->json()['data']['code'] == 400) {
                return redirect()->back()->with('status', $response->json()['data']['msg']);
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'An error occurred. Please try again later.');
        }
    }
}
