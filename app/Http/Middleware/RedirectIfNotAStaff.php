<?php 

namespace Scholr\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

class RedirectIfNotAStaff {

	protected $auth;

	public function __construct(Guard $auth) {
		$this->auth = $auth;
	}

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next) {
		$response = $next($request);
		
		if ($this->auth->guest()) {
			return redirect()->guest('/');
		}elseif ($request->user()->type == 'student') {
			return redirect('account/student/'.$request->user()->slug);
		}


		return $response;
	}

}
