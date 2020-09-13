<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Staudenmeir\EloquentEagerLimit\HasEagerLimit;

class Website extends Model
{
    use HasEagerLimit;

    public function website()
    {
        return $this->belongsTo(User::class);
    }

    public function scans() {
        return $this->hasMany(Scan::class);
    }
}
