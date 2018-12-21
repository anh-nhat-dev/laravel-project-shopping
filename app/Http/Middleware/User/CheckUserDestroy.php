<?php

namespace App\Http\Middleware\User;

use Closure;

class CheckUserDestroy
{
    const DEFAULT_SEGMENT = 3;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */


    public function handle($request, Closure $next)
    {
        $user = $request->user();
        $idDestroy = $request->segment(self::DEFAULT_SEGMENT);

        if ($user->id === (int)$idDestroy) {
            return redirect()
                    ->route('admin.users.index')
                    ->withErrors('Bạn không thể xóa chính mình');
        }
        return $next($request);
    }
}
