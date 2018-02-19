<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    protected $fillable = ['name', 'symbol'];

    public function market()
    {
        return $this->hasOne(Market::class);
    }

    public function scopeSymbol(Builder $query, $symbol)
    {
        return $query->where('symbol', $symbol)->first();
    }
}
