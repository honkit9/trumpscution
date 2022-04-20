<?php

namespace App\Http\Controllers;

use App\Models\Wallet;
use App\Models\WalletHistory;
use Illuminate\Http\Request;

class WalletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wallet = Wallet::firstOrCreate([
            'user_id'=>auth()->user()->id,
        ]);
//        foreach ($wallet->walletHistory() as $result){
//            dd($result);
//        }
//        dd($wallet->walletHistory()->get());
//        $walletHistories = Wallet::find($wallet->id)->walle;
//        dd($walletHistories);

        return view('wallet.index',compact('wallet'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Wallet  $wallet
     * @return \Illuminate\Http\Response
     */
    public function show(Wallet $wallet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Wallet  $wallet
     * @return \Illuminate\Http\Response
     */
    public function edit(Wallet $wallet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Wallet  $wallet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Wallet $wallet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Wallet  $wallet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Wallet $wallet)
    {
        //
    }

    public function topup(Request $request, Wallet $wallet)
    {
        $wallet->update([
            'balance'=>$wallet->balance+$request->amount,
        ]);
        $wallet->save();

        WalletHistory::create([
            'wallet_id' => $wallet->id,
            'title' => 'Top Up',
            'amount' => $request->amount,
            'status' => 0,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Wallet successfully top up',
        ]);
    }

    public function withdraw(Request $request,Wallet $wallet)
    {
        $balance = $wallet->balance-$request->amount;

        if($balance >= 0) {
            $wallet->update([
                'balance' => $balance,
            ]);
            $wallet->save();

            WalletHistory::create([
                'wallet_id' => $wallet->id,
                'title' => 'Withdrawal',
                'amount' => $request->amount,
                'status' => 1,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Wallet successfully withdraw',
            ]);
        }else{
            return response()->json([
                'success' => true,
                'message' => 'Wallet insufficient balance',
            ]);
        }


    }
}
