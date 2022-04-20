<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Trade extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'coinpair_id',
        'entrypoint',
        'stoploss',
        'takeprofit',
        'leverage',
        'margin',
        'direction',
        'reason',
        'outcome',
        'completed_date',
    ];

    protected $appends = [
        'direction_name',
        'outcome_name',
        'outcome_color',
    ];

    public function getDirectionNameAttribute(){
        return $this->attributes['direction'] === 0?'Sell':'Buy';
    }

    public function getOutcomeNameAttribute(){
        return $this->attributes['outcome'] === 0 ? 'Lose' : ($this->attributes['outcome'] === 1 ? 'Win' : 'Pending');
    }

    public function getOutcomeColorAttribute(){
        return $this->attributes['outcome'] === 0 ? 'danger' : ($this->attributes['outcome'] === 1 ? 'success' : 'warning');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function coinpair(){
        return $this->belongsTo(CoinPair::class);
    }
}
