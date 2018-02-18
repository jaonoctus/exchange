<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function pair()
    {
        return $this->belongsTo(Pair::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
