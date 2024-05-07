<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
//        dump($request->url());
//        dump($request->fullUrl());
//        dump($request->fullUrlWithQuery(['age' => '52']));
//        dump($request->fullUrlWithoutQuery(['name']));

//        dump($request->host());
//        dump($request->getSchemeAndHttpHost());
//        dump(url('/users', ['name' => 'Aboba']));

//        dump($request->header());
//        dump($request->hasHeader('Custom-Header'));

//        dump($request->getAcceptableContentTypes());
//        dump($request->accepts(['text/html', 'application/json']));
//        dump($request->prefers(['text/html', 'application/json']));

//        if ($request->routeIs('users.*')) {
//            dd('Users');
//        }

//        if ($request->routeIs('admin.*')) {
//            dd('Admins');
//        }

        return $next($request);
    }
}
