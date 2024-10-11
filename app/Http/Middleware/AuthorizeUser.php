<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
class AuthorizeUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ... $roles ): Response
    {
        $user_role = $request->user()->getRole();       //ambil data
                                                    // fungsi user() diambil dari UserModel.php
        if (in_array($user_role,$roles)) {    // cek apakah user punya role yang diinginkan
            return $next($request);
        }
        abort(403,'Forbidden. Kamu tidak punya akses ke halaman ini');
    }
}