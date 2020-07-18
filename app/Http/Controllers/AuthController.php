<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\User;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function index()
    {
        if(Session::has('userid') && Session::has('username') && Session::has('type'))
        {
            if(Session::get('type')=='admin')
                return redirect()->to('adminDashboard');
            elseif(Session::get('type')=='user')
            return redirect()->to('adminDashboard');
        }
        else
        {
            return view('login.login');
        }
    }

    public function CheckLogin(REQUEST $request)
    {
        $this->validate($request,[
            'email' => 'required|email',
            'password' =>'required|string|min:5',
        ]);

        $user = DB::table('users')->where('email','=', strtolower($request->email))
                    ->where('password','=',md5($request->password))
                    ->where('status','=','On')->where('is_delete','=',0)    
                    ->first();

        if($user)
        {
            Session::put('userid',$user->id);
            Session::put('username',$user->email);
            Session::put('name', $user->name);
            Session::put('type', $user->type);
            Session::put('avater', $user->image);

            if($user->type == 'admin')
                {
                    return redirect()->to('adminDashboard');
                }
            elseif($user->type == 'user');
                {
                    return redirect()->to('userDashboard');
                }
        }
        else
        {
            return redirect()->back()->with('message','Wrong Email or Password.!');    
        }
        return view('login.login');
    }

    public function Logout()
    {
        Session()->flush();
        return redirect()->to('login');
    }

    public function SignupForm()
    {
        return view('login.signup');
    }

    public function Signup(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|string|max:255',
            'email' => 'required|email:rfc,dns|unique:users',
            'password'=>'required|alpha_num|min:5',
            'confirm_password' => 'required_with:password|same:password|min:5',
            'mobile' => 'required|numeric|min:11',
        ]);

        if($request->hasFile('image'))
        {           
            $path = $request->image->store('images', 'public');
            $data = [
                'name' => $request->name,
                'email' => strtolower($request->email),
                'password' => $request->password,
                'type' => 'user',
                'mobile' => $request->mobile,
                'status' => 'Pending',
                'image' => $path,
            ];
        }
        
        else
        {
            $data = [
                'name' => $request->name,
                'email' => strtolower($request->email),
                'password' => $request->password,
                'type' => 'user',
                'mobile' => $request->mobile,
                'status' => 'Pending',
                'image' => 'images/default.jpg',
            ];
        }

        User::create($data);
        return redirect()->to('login')->with('message','Please Wait for Admin Approval.');
    }
}
