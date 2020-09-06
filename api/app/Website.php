<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Website extends Model
{
    public function website()
    {
        return $this->belongsTo(User::class);
    }
}
