<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function index()
    {
        // if(Session::has('username') && Session::has('userid')  && Session::has('userid'))
        // {
                // if(Session::get('type')=='admin')
                       return view('dashboard_admin.index');
                // else
                //     return redirect()->to('login');
        // }
        // else
        // {
        //     return redirect()->to('login');
        // }
    }
}
