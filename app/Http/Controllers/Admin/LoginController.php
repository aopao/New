<?php

namespace App\Http\Controllers\Admin;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

/**
 * Class LoginController
 *
 * @package App\Http\Controllers\Auth
 */
class LoginController extends ApiController
{
	/*
	|--------------------------------------------------------------------------
	| Login Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles authenticating users for the application and
	| redirecting them to your home screen. The controller uses a trait
	| to conveniently provide its functionality to your applications.
	|
	*/
	
	use AuthenticatesUsers;
	
	/**
	 * Where to redirect users after login.
	 *
	 * @var string
	 */
	protected $redirectTo = '/dashboard';
	
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct(200);
		$this->middleware('guest')->except('logout');
		$this->redirectTo = config('admin.prefix') . '/dashboard';
	}
	
	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function showLoginForm()
	{
		return view('admin.login.show');
	}
	
	
	/**
	 * @param Request $request
	 * @return \Illuminate\Http\JsonResponse
	 * @throws \Illuminate\Validation\ValidationException
	 */
	public function login(Request $request)
	{
		$this->validateLogin($request);
		
		// If the class is using the ThrottlesLogins trait, we can automatically throttle
		// the login attempts for this application. We'll key this by the username and
		// the IP address of the client making these requests into this application.
		if ($this->hasTooManyLoginAttempts($request)) {
			$this->fireLockoutEvent($request);
			return $this->sendLockoutResponse($request);
		}
		
		if ($this->attemptLogin($request)) {
			if (!Auth::check() || Auth::user()->is_admin != 1) {
				Auth::logout();
				abort(404);
			} else {
				if (Auth::check()) {
					$data = [
						"access_token" => Auth::user()->mobile ,
						"redirect" => route('admin.dashboard.index') ,
					];
					return $this->setStatusCode(200)->responseSuccess($data);
				}
			}
		}
		
		$this->incrementLoginAttempts($request);
		return $this->setStatusCode(401)->responseErrors("登录失败");
		
	}
	
	/**
	 * Attempt to log the user into the application.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @return bool
	 */
	protected function attemptLogin(Request $request)
	{
		if (validationPhone($request->input('account'))) {
			$credentials = [
				'mobile' => $request->input('account') ,
				'password' => $request->input('password') ,
			];
		} else {
			$credentials = [
				'account' => $request->input('account') ,
				'password' => $request->input('password') ,
			];
		}
		return $this->customLogin($credentials);
	}
	
	
	/**
	 * 自定义登录 实现手机号和用户名一起登录
	 *
	 * @param $credentials
	 * @return bool
	 */
	private function customLogin($credentials)
	{
		return $this->guard()->attempt($credentials);
	}
	
	/**
	 * @return string
	 */
	public function username()
	{
		return 'account';
	}
	
}
