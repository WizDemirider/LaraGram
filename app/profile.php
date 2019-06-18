<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = [];

    public function profileImage()
    {
        $imagePath = (($this->profilePic) ?? 'blank.jpeg');
        return $imagePath;
    }

    public function following()
    {
        return $this->belongsToMany(Profile::class, 'follow');
    }

    public function user()
    {
        return $this->belongsTo(User::class, $foreignKey='owner_id');
    }
}
