<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Staudenmeir\EloquentEagerLimit\HasEagerLimit;

class Scan extends Model
{
    use HasEagerLimit;

    public function website()
    {
        return $this->belongsTo(Website::class);
    }
}
