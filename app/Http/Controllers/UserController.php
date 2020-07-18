<?php

namespace App\Http\Controllers;

use App\Storage;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Http\UploadedFile;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = [
            'title' => 'User List',
            'sts' => 'on'
        ];
        $datas = User::all()->where('status','<>','Pending')->where('is_delete','=',0);
        return view('user.show')->with(['datas'=>$datas,'title'=>$title]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|string|max:255',
            'email' => 'required|email:rfc,dns|unique:users',
            'password'=>'required|alpha_num|min:5',
            'confirm_password' => 'required_with:password|same:password|min:5',
            'mobile' => 'numeric|min:11',
            'type' => 'required',
            'status' => 'required',
        ]);

        if($request->hasFile('image'))
        {           
            $path = $request->image->store('images', 'public');
            $data = [
                'name' => $request->name,
                'email' => strtolower($request->email),
                'password' => $request->password,
                'type' => $request->type,
                'mobile' => $request->mobile,
                'status' => $request->status,
                'image' => $path,
            ];
        }
        else
        {
            $data = [
                'name' => $request->name,
                'email' => strtolower($request->email),
                'password' => $request->password,
                'type' => $request->type,
                'mobile' => $request->mobile,
                'status' => $request->status,
                'image' => 'images/default.jpg',
            ];
        }

        User::create($data);
        return redirect()->back()->with('message','Save Successful.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $title = [
            'title' => 'User Request List',
        ];
        $datas = User::all()->where('status','=','Pending')->where('is_delete','=',0);
        return view('user.show')->with(['datas'=>$datas,'title'=>$title]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=User::find($id);
        return view('user.edit')->with(['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'required|string|max:255',
            'email' => 'required|email:rfc,dns',            
            'mobile' => 'numeric|min:11',
            'type' => 'required',
            'status' => 'required',
        ]);

        if($request->hasFile('avater'))
        {
            $path = $request->avater->store('images', 'public');
            $data = [
                'name' => $request->name,
                'email' => strtolower($request->email),
                'type' => $request->type,
                'mobile' => $request->mobile,
                'status' => $request->status,
                'image' => $path,
            ];
        }
        else
        {
            $data = [
                'name' => $request->name,
                'email' => strtolower($request->email),
                'type' => $request->type,
                'mobile' => $request->mobile,
                'status' => $request->status,
                'image' =>$request->image,
            ];
        }
        User::find($id)->update($data);
        return redirect()->to('user')->with('message','Update Successful.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if($request->btn == 'Accept')
        {
            User::find($id)->update(['status'=>'On']);
        }
        else
        {
            User::find($id)->update(['is_delete'=>1]);
        }
        
        return redirect()->back()->with('message','Successful.'); 
    }
}
