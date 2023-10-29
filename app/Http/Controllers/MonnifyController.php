<?php

namespace App\Http\Controllers;

use App\Models\Key;
use App\Models\Wallet;
use App\Models\FundRequest;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AgentAccount;
use Illuminate\Support\Facades\Http;

class MonnifyController extends Controller
{

    public function __construct()
    {
        if (config('app.verification') === true) {
            $this->middleware(['auth', 'verified', 'agent']);
        } else {
            $this->middleware(['auth']);
        }
    }

    private function baseUrl()
    {
        return config('app.url');
    }

    private function header()
    {

        $apiKey = 'MK_TEST_338GVRH5Y0';
        $secretKey = 'D51TKN9MBF17YVALJX56XW8UXBTFKRT4';

        $credentials = "{$apiKey}:{$secretKey}";
        $base64Credentials = base64_encode($credentials);

        $header = "Basic {$base64Credentials}";

        return $header;
    }

    private function header2()
    {
        $key = Key::pluck('api_key');
        $token = $key[0];
        $headers = [
            "Authorization" => "Bearer" . $token,
            "Accept" => "application/json",
            "Content-Type" => "application/json",
        ];
        return $headers;
    }
    public function index(Request $request)
    {
        $user = auth()->user();


        // dd($body);
        $funds = FundRequest::select('user_id', 'transactionReference', 'amount', 'status', 'created_at')->where('user_id', $user->id)->latest()->paginate(10);

        if (auth()->user()->role == 'agent') {
            $body = [
                'email' => $user->email,
            ];
            $user = AgentAccount::where('email', $user->email)->first();
            $userID = $user->agentId;


            $body2 = [
                // 'user_id' => "14743",
                'user_id' => $userID,
            ];
            // Balance
            $walletBal = $this->baseUrl() . '/fetch/agentAccount';
            $responseBal = Http::withHeaders($this->header2())->get($walletBal, $body);
            if ($responseBal->successful()) {
                $balance = $responseBal->json()['data'];
                //info($balance);
            }
            // Fund History
            $fundHis = $this->baseUrl() . '/fetch/agentFundHistory';
            $response = Http::withHeaders($this->header2())->get($fundHis, $body2);
            if ($response->successful()) {
                $funds = $response->json()['data']['data'];
                //info($funds);
            } else {
                return redirect()->back()->with('status', $response->json()['message']);
            }
            return view("dashboard.agent.wallet.agent", compact('funds', 'balance'));
        } else {
            return view("dashboard.agent.wallet.index", compact('funds'));
        }
    }

    public function transferWallet(Request $request)
    {
        $walletId = $request->input('wallet_id');
        $amount = $request->get('amount');
        $user_id = auth()->user()->id;
        $email = auth()->user()->email;
        $transactionReference = Str::random(20);

        $wallet = Wallet::where('wallet_id', $walletId)->where('wallet_id', '!=', auth()->user()->wallet_id)->first();

        if (!$wallet) {
            return redirect()->back()->with('status', 'Invalid Wallet ID');
        }

        // check if the user wallet balance is sufficient
        $user = auth()->user();
        $userBalance = $user->wallet->balance;
        if ($userBalance < $amount) {
            return redirect()->back()->with('status', 'Insufficient fund. Go and fund your wallet, please.');
        }

        //then save into fundrequest
        $fund = new FundRequest();
        $fund->amount = $amount;
        $fund->transactionReference = $transactionReference;
        $fund->paymentReference = "WALLET TO WALLET";
        $fund->email = $email;
        $fund->user_id = $user_id;
        $fund->status = '1'; // successful
        $fund->save();

        // debit the user
        $userWallet = Wallet::where('user_id', $user_id)->first();
        if ($userWallet) {
            $userWallet->balance -= $amount;
            $userWallet->save();
        }
        // credit the wallet_id
        $wallet = Wallet::where('wallet_id', $walletId)->first();
        if ($wallet) {
            $wallet->balance += $amount;
            $wallet->save();
        }
        return redirect()->back()->with('status', 'Transaction successfull');
    }

    public function transferCommission(Request $request)
    {
        $amount = $request->get('amountx');
        $transactionReference = Str::random(20);
        $user_id = auth()->user()->id;
        $email = auth()->user()->email;

        // check if the user commission amount is sufficient
        $user = auth()->user();
        $userBalance = $user->wallet->commission;
        if ($userBalance < $amount) {
            return redirect()->back()->with('status', 'Insufficient commission. Do more transaction, please.');
        }

        //then save into fundrequest
        $fund = new FundRequest();
        $fund->amount = $amount;
        $fund->transactionReference = $transactionReference;
        $fund->paymentReference = "COMMISSION TO WALLET";
        $fund->email = $email;
        $fund->user_id = $user_id;
        $fund->status = '1'; // successful
        $fund->save();

        // debit the commission
        $userWallet = Wallet::where('user_id', $user_id)->first();
        if ($userWallet) {
            $userWallet->commission -= $amount;
            $userWallet->save();
        }

        // credit the wallet_id
        $wallet = Wallet::where('wallet_id', auth()->user()->wallet_id)->first();
        if ($wallet) {
            $wallet->balance += $amount;
            $wallet->save();
        }
        return redirect()->back()->with('status', 'Transaction successfull');
    }

    public function initiate(Request $request)
    {

        $email = $request->get('email');
        $name = $request->get('name');
        $amount = $request->get('amount');
        $consumer_id = $request->get('consumer_id');

        $apiKey = 'MK_TEST_338GVRH5Y0';
        $secretKey = 'D51TKN9MBF17YVALJX56XW8UXBTFKRT4';

        $credentials = "{$apiKey}:{$secretKey}";
        $base64Credentials = base64_encode($credentials);

        $token = "{$base64Credentials}";

        $headers = [
            "Authorization" => "Basic $token",
            "Accept" => "application/json",
            "Content-Type" => "application/json",
        ];
        //Generate Access token
        $tok = Http::withHeaders($headers)->post('https://sandbox.monnify.com/api/v1/auth/login');

        $bearerToken = $tok->json()['responseBody']['accessToken'];

        $headers2 = [
            "Authorization" => "Bearer $bearerToken",
            "Accept" => "application/json",
            "Content-Type" => "application/json",
        ];

        $paymentReference = Str::random(20);

        $body = [
            "customerName" => $name,
            "customerEmail" => $email,
            "amount" => $amount,
            "paymentReference" => $paymentReference,
            "paymentDescription" => "Fund Wallet",
            "currencyCode" => "NGN",
            "contractCode" => "9624075433",
            "redirectUrl" => config('app.site') . "/transaction-confirm",
            "paymentMethods" => ["CARD", "ACCOUNT_TRANSFER", "USSD"],
        ];
        // dd($body);
        try {
            $process = 'https://sandbox.monnify.com/api/v1/merchant/transactions/init-transaction';
            $response = Http::withHeaders($headers2)->post($process, $body);
            if ($response['responseCode'] == 0) {
                $checkoutUrl = $response->json()['responseBody']['checkoutUrl'];
                $transactionReference = $response->json()['responseBody']['transactionReference'];
                $paymentReference = $response->json()['responseBody']['paymentReference'];

                $fund = new FundRequest();
                $fund->amount = $amount;
                $fund->transactionReference = $transactionReference;
                $fund->paymentReference = $paymentReference;
                $fund->email = $email;
                $fund->user_id = $consumer_id;
                $fund->status = '0';
                $fund->save();
                return redirect()->away($checkoutUrl);
            } else {
                return response()->json();
            }
        } catch (\Exception $th) {
            throw $th;
        }
    }
    public function webhook(Request $request)
    {
        $paymentReference = $request->get('paymentReference');
        $apiKey = 'MK_TEST_338GVRH5Y0';
        $secretKey = 'D51TKN9MBF17YVALJX56XW8UXBTFKRT4';

        $credentials = "{$apiKey}:{$secretKey}";
        $base64Credentials = base64_encode($credentials);

        $token = "{$base64Credentials}";

        $headers = [
            "Authorization" => "Basic $token",
            "Accept" => "application/json",
            "Content-Type" => "application/json",
        ];

        //Generate Access token
        $tok = Http::withHeaders($headers)->post('https://sandbox.monnify.com/api/v1/auth/login');
        $bearerToken = $tok->json()['responseBody']['accessToken'];

        $headers2 = [
            "Authorization" => "Bearer $bearerToken",
            "Accept" => "application/json",
            "Content-Type" => "application/json",
        ];
        $paymentReference = $request->input('paymentReference');

        $body = [
            "paymentReference" => $paymentReference
        ];

        $webhook = 'https://sandbox.monnify.com/api/v1/transactions/search';

        try {
            $response = Http::withHeaders($headers2)->get($webhook, $body);

            if ($response['requestSuccessful'] == 'true' && $response['responseMessage'] == 'success') {
                $data = $response->json();
                //info($data);

                // Update the fund request to 1
                $update = FundRequest::where('paymentReference', $paymentReference)->where('status', '0')->first();
                if ($update) {
                    $update->status = '1';
                    $update->save();
                }
                $amount = $update->amount;
                $user_id = $update->user_id;

                // Credit the user
                $userWallet = Wallet::where('user_id', $user_id)->first();
                if ($userWallet) {
                    $userWallet->balance += $amount;
                    $userWallet->save();
                }
                $funds = FundRequest::where('user_id', $user_id)->latest()->paginate(10);
                // return redirect()->away('https://honourworld.test/fund_wallet', compact('funds'));
                return view('dashboard.index', compact('funds'));
            }
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function fundHistory(Request $request)
    {
        if ($request->search) {
            $funds = FundRequest::where('user_id', 'like', '%' . $request->search . '%')
                ->orWhere('amount', 'like', '%' . $request->search . '%')
                ->orWhere('transactionReference', 'like', '%' . $request->search . '%')
                ->latest()
                ->paginate(20);
        } else {
            $funds = FundRequest::latest()->paginate(20);
        }
        return view("dashboard.index", compact('funds'));
    }
}
