<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pair extends Model
{
    protected $table = 'market_pair';

    protected $fillable = ['currency_id'];

    protected $appends = ['name'];

    public function market()
    {
        return $this->belongsTo(Market::class);
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function trades()
    {
        return $this->hasMany(Trade::class);
    }

    public function getNameAttribute()
    {
        return "{$this->currency->symbol}{$this->market->currency->symbol}";
    }
}
