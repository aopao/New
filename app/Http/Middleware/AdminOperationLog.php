<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use App\Models\OperationLog;
use App\Models\User;

/**
 * Class AdminOperationLog
 *
 * @package App\Http\Middleware
 */
class AdminOperationLog
{

    /**
     * @var $user
     */
    private $user;

    /**
     * UserRepository constructor.
     *
     * @param \App\Models\User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user_id = 0;
        $account = '';
        if(Auth::check()) {
            $user_id = Auth::user()->id;
            $account = Auth::user()->account;
        }


        $_SERVER['admin_uid'] = $user_id;
        if('GET' != $request->method()){
            $input = $request->all();
            if(!array_key_exists("account",$input))
            {
                $input['account'] =  $account;
            }

            $user_id =
                $this->user
                    ->where('account',$input['account'])
                    ->orWhere('mobile',$input['account'])
                    ->orWhere('email',$input['account'])
                    ->value('id');
            if(empty($user_id))
            {
                $user_id = 0;
            }
            $log = new OperationLog(); # 提前创建表、model
            $log->uid = $user_id;
            $log->path = $request->path();
            $log->method = $request->method();
            $log->ip = $request->ip();
            $log->sql = '';
            $log->input = json_encode($input, JSON_UNESCAPED_UNICODE);
            $log->save();   # 记录日志
        }
        return $next($request);
    }
}
