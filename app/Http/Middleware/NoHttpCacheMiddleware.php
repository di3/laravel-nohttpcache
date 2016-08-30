<?php
/**
 * add nocache headers
 * @author di <di3@gmx.net>
 */
namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Routing\Middleware;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Response as SymfonyResponse;

class NoHttpCacheMiddleware implements Middleware {
	
	/**
	 * Handle an incoming request.
	 *
	 * @param \Illuminate\Http\Request $Request        	
	 * @param \Closure $next        	
	 * @return mixed
	 */
	public function handle($Request, Closure $next) {
		$Response = $next($Request);
		
		// This step is only needed if you are returning
		// a view in your Controller or elsewhere, because
		// when returning a view `$next($request)` returns
		// a View object, not a Response object, so we need
		// to wrap the View back in a Response.
		if (! $Response instanceof SymfonyResponse) {
			$Response = new Response($Response);
		}
		$Response->header('Pragma', 'no-cache');
		$Response->header('Expires', 'Thu, 01 Jan 1970 00:00:00 GMT');
		$Response->header('Cache-Control', 'no-cache, must-revalidate, no-store, max-age=0, private');
		return $Response;
	}
}
