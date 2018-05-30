<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
	public function index()
	{
		return view("admin.dashboard.index");
	}
	
	public function show()
	{
		return view("admin.dashboard.show");
		
	}
}
