<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DashboardUserController extends Controller
{
    public function index()
    {
        // if(Session::has('username') && Session::has('userid') && Session::has('userid'))
        // {
                // if(Session::get('type')=='user')
                       return view('dashboard_user.index');
                // else
                //     return redirect()->to('login');
        // }
        // else
        // {
        //     return redirect()->to('login');
        // }
    }
}
