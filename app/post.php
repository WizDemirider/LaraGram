<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    function user() {
        return $this->belongsTo(User::class);
    }
}
