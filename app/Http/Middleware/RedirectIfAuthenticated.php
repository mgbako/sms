<?php

 namespace Scholr\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\RedirectResponse;

class RedirectIfAuthenticated {

	/**
	 * The Guard implementation.
	 *
	 * @var Guard
	 */
	protected $auth;

	/**
	 * Create a new filter instance.
	 *
	 * @param  Guard  $auth
	 * @return void
	 */
	public function __construct(Guard $auth)
	{
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
		if ($this->auth->check()) {
			$slug = $this->auth->user()->slug;
			if ($request->user()->type == 'teacher') {
				return new RedirectResponse(url('/account/teacher/'.$slug));
			}elseif ($request->user()->type == 'student') {
				return new RedirectResponse(url('/account/student/'.$slug));
			}
		}

		return $next($request);
	}

}
