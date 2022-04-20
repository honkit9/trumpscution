<?php

namespace App\Http\Livewire;

use App\Models\CoinPair;
use App\Models\User;
use Livewire\Component;

class TradeCreate extends Component
{
    public $var1 = 1;
    public $var2 = 2;
    public $total;
    public $rate = 100;
    public $margin;
    public $wallet;

    public function calculation()
    {


    }

    public function render()
    {
        $coinpairs = CoinPair::all();
        $walletbalance = User::find(auth()->user()->id)->wallet()->first();
        $this->wallet = $walletbalance->balance;
        $this->margin = ($this->margin == null) ? $this->wallet : $this->margin;
        $this->rate = number_format(($this->margin / $this->wallet) * 100,2);

        return view('livewire.trade-create', compact('coinpairs', 'walletbalance'));
    }
}
