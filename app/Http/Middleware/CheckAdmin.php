<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Kiểm tra nếu chưa đăng nhập HOẶC không phải admin -> Từ chối truy cập
        if (!$request->user() || $request->user()->role !== 'admin') {
            abort(403, 'Bạn không có quyền truy cập vào chức năng này!');
        }

        return $next($request);
    }
}
