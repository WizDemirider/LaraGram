<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\User;

class ProfileController extends Controller
{
    public function show(User $user)
    {
        // $user = User::where('username',$user_id) -> first();
        // use the above code for having username in the url instead of id
        if (auth()->user())
        {
            $follows = auth()->user()->following->contains($user->id);
        }
        else
        {
            $follows = 'unauthorized';
        }

        return view('profiles.show', compact('user', 'follows'));
    }

    public function edit(User $user)
    {
        $this->authorize('update', $user->profile);

        return view('profiles.edit', compact('user'));
    }

    public function update(User $user)
    {
        $this->authorize('update', $user->profile);

        $data = request()->validate([
            'bio' => '',
            'profilePic' => 'image',
        ]);

        if(request('profilePic')) {
            $imagePath = request('profilePic')->store('profile','public');

            $image = Image::make(public_path("storage/{$imagePath}"))->fit(500, 500);
            $image->save();

            $imageArray = ['profilePic' => $imagePath];
        }

        auth()->user()->profile->update(array_merge(
            $data,
            $imageArray ?? []
        ));

        return redirect("/profile/".$user->id);
    }
}

?>