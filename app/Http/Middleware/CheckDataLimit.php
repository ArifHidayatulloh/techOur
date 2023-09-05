<?php

namespace App\Http\Middleware;

use App\Models\News;
use App\Models\Tournament;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckDataLimit
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        if(auth()->check()){

            $user = Auth::user();
    
            if ($user->role === 'admin') {
                return $next($request);
            }
    
            $limit = $user->limit;
    
            $tournamentCount = Tournament::all()->where('user_id', $user->id)->count();
            $newsCount = News::all()->where('user_id', $user->id)->count();
            $totalDataCount = $tournamentCount + $newsCount;
    
            if($totalDataCount >= $limit){
                return redirect()->back()->with('message', 'Anda telah mencapai batas jumlah data yang dapat dibuat');
            }
    
            return $next($request);
        }
    }
}
