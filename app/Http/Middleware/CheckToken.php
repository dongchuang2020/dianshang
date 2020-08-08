<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;

class CheckToken
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
        $id = Redis::get('id');
        if ($id){
            $ls = $request->path();
            if ($ls == 'admin' || $ls == 'admin_home'){
                return $next($request);

            }
            $un = [];
            $data = DB::table('admin_role')->where('admin_id','=',$id)->get();
            foreach ($data as $v) {
                $da = DB::table('role_chmod')->where('role_id','=',$v->role_id)->get();
                foreach ($da as $n) {
                    $name = DB::table('chmod')->where('chmod_id','=',$n->chmod_id)->first();
                    if ($name){
                        $un[] = $name->chmod_url;
                    }
                }
            }
            $un = array_unique($un);
            $ip = request()->route()->getActionName();

            $ip = explode('@',$ip);
            if (in_array($ip[0],$un)){
                return $next($request);
            }else{
                return redirect('/erees');
            }
        }else{

            return redirect('admin/pipe_log');
        }
    }
}
