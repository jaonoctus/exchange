<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pair extends Model
{
    public function market()
    {
        return $this->belongsTo(Market::class);
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }
}
