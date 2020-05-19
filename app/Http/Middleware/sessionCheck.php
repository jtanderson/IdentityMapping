<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\sessionCheck as Middleware;

class sessionCheck extends Middleware
{
	$sessId = $request->session()->getId();
    Log::info("session id: " .  $sessId);

    $userExists = DB::table('participant')->where('session_token', sessId)->exists();

	if(!$userExists){
		//field name on left, value on right
		DB::table('participant')->insertGetId(['session_token' => $sessId]);
		return redirect('/start');
	}

}
