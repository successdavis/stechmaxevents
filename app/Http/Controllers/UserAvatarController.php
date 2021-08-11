<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserAvatarController extends Controller
{
    public function store(User $user)
    {
        $this->validate(request(), [
            'avatar' => ['required', 'image']
        ]);

        auth()->user()->update([
            'avatar_path' => request()->file('avatar')->store('avatars', 'public')
        ]);

        return response([], 204);

        // return back(); 
    }
}
