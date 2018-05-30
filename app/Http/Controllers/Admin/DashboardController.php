<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

/**
 * Class DashboardController
 *
 * @package App\Http\Controllers\Admin
 */
class DashboardController extends Controller
{
	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index()
	{
		return view("admin.dashboard.index");
	}
	
	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function show()
	{
		return view("admin.dashboard.show");
		
	}
}
