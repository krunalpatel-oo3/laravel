<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Redirect;

class DashboardController extends Controller
{
    /**
    *@use: display dashboard page.
    */
    public function index(){
        return view('admin.dashboard');
    }

    /**
    *@use: logout from website
    */
    public function logout(){
    	Auth::logout();
    	return Redirect::to('/admin/login');
    }
}
