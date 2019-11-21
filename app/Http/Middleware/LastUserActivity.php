<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Cache;
use Carbon\Carbon;
use App\Models\User;

class LastUserActivity 
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if(Auth::guard('web')->check()){
            if(Auth::guard('web')->viaRemember()){
                User::where("id",Auth::guard('web')->id())->update(["login_at"=>Carbon::now()]);
            }
            @$to = Carbon::now();
            @$from = Auth::guard('web')->user()->login_at;
            @$diff_in_minutes = @$to->diffInMinutes(@$from);
            User::where("id",Auth::guard('web')->user()->id)->update(["spent_time"=>@$diff_in_minutes]);
            $expireAt = Carbon::now()->addMinutes(5);
            Cache::put('online'. Auth::guard('web')->user()->id.Auth::guard('web')->user()->email, true, $expireAt);
        }
        return $next($request);
    }
}
