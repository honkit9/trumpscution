<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CoinPair extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'icon',

    ];

    public function trade(){
        return $this->hasMany(Trade::class);
    }
}
