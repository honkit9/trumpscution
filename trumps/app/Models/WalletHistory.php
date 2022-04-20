<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WalletHistory extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'wallet_id',
        'title',
        'amount',
        'status', //credit or debit
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $appends = [
        'status_name',
        'status_color',
    ];


    public function wallet(){
        return $this->belongsTo(Wallet::class);
    }

//    public function getPriceAttribute()
//    {
//        return number_format($this->attributes['price']);
//    }

    public function getStatusNameAttribute(){
        return $this->attributes['status'] === 0 ? 'Credit' : 'Debit';
    }

    public function getStatusColorAttribute(){
        return $this->attributes['status'] === 0 ? 'text-success' : 'text-danger';
    }
}
