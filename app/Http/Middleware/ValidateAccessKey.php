<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ValidateAccessKey
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $accessKey = $request->header('accessKey');
        $validKey = config('services.api_access_key');

        if (!$accessKey || $accessKey !== $validKey) {
            return response()->json([
                'message' => 'Unauthorized: Invalid or missing access key.',
            ], 401);
        }

        return $next($request);
    }
}
