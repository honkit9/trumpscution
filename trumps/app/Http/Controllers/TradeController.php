<?php

namespace App\Http\Controllers;

use App\Models\CoinPair;
use App\Models\Trade;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $currentUser = auth()->user()->id;
        $trades = User::find($currentUser)->trade()->get();
//        $trade = Trade::find(1);
//        dd($trade->coinpair()->pluck('name'));
        return view('Trade.index', compact('trades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Trade.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $wallet = User::find(auth()->user()->id)->wallet()->first();

        $request->validate([
            'margin' => 'required|between:0,' . $wallet->balance,
        ],[
            'margin.between' => 'Insufficient wallet balance!',
        ]);

        //decrement wallet balance
        $wallet->update([
            'balance' => $wallet->balance - $request->margin,
        ]);

        Trade::create([
            'coinpair_id' => $request->coinpair,
            'user_id' => auth()->user()->id,
            'entrypoint' => $request->entrypoint,
            'stoploss' => $request->stoploss,
            'takeprofit' => $request->takeprofit,
            'leverage' => $request->leverage,
            'margin' => $request->margin,
            'reason' => $request->reason,
            'outcome' => $request->outcome,
            'completed_date' => Carbon::now(),

        ]);


        return redirect()->route('trade.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Trade $trade
     * @return \Illuminate\Http\Response
     */
    public function show(Trade $trade)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Trade $trade
     * @return \Illuminate\Http\Response
     */
    public function edit(Trade $trade)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Trade $trade
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Trade $trade)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Trade $trade
     * @return \Illuminate\Http\Response
     */
    public function destroy(Trade $trade)
    {
        //
    }
}
