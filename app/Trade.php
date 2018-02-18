<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trade extends Model
{
    protected $fillable = ['type', 'amount', 'price', 'ask_fee', 'bid_fee'];

    public function pair()
    {
        return $this->belongsTo(Pair::class);
    }

    public function asker()
    {
        return $this->belongsTo(User::class);
    }

    public function bidder()
    {
        return $this->belongsTo(User::class);
    }
}
