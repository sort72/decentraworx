<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class UserOffer extends Pivot
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function offer()
    {
        return $this->belongsTo(Offer::class);
    }
}
