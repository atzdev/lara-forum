<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use SocialAuth;

class SocialsController extends Controller
{
    public function auth ($provider) 
    {
    	return SocialAuth::authorize($provider);
    }

    public function auth_callback($provider) 
    {
    	SocialAuth::login($provider, function(User $user, $details) {
    		//dd($details);

    		$user->avatar = $details->avatar;
    		$user->email = $details->email;
    		$details->full_name == null? $user->name = $details->nickname : $user->name=$details->full_name;
    		$user->password = bcrypt('secret');
    		$user->save();

    		
    	});

    	return redirect('/forum');
    }
}
