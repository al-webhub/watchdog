<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Website extends Model
{
    public function website()
    {
        return $this->belongsTo(User::class);
    }

    public function scans() {
        return $this->hasMany(Scan::class);
    }
}
