<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    protected $guarded = [];

    function user() {
        return $this->belongsTo(User::class);
    }
}
