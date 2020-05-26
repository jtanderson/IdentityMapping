<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

//use Illuminate\Auth\Middleware\SessionCheck as Middleware;

class SessionCheck
{
  public function handle($request, Closure $next){
    $sessId = $request->session()->getId();
    Log::info("session id: " .  $sessId);

    $participant = DB::table('participant')->where('session_token', $sessId)->first();

    if($participant){
      $request->session->put('participant_id', $participant->id);
    } else {
      //field name on left, value on right
      $participant_id = DB::table('participant')->insertGetId([
        'session_token' => $sessId,
        'intersection_meaning' => '',
      ]);
      $request->session->put('participant_id', $participant_id);
      return redirect('/start');
    }

    return $next($request);
  }


}
