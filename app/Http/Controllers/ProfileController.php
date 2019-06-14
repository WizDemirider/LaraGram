<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ProfileController extends Controller
{
    public function index($user_id)
    {
        $user = User::findOrFail($user_id);
        return view('profiles.index', [
            'user'=> $user,
        ]);
    }
}

?>