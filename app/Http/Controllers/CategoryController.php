<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /* $orders = DB::table('orders')
                ->select('city', 'state')
                ->groupByRaw('city, state')
                ->get(); */
                
        $data = Category::all();
        return view('category.show')->with(['datas'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
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
            'name' => 'required|string|max:255|unique:categories',
            'serial' => 'required|integer|unique:categories',
            'status' => 'required',
        ]);
        $data=[
            'name' => $request->name,
            'serial' => $request->serial,
            'status' => $request->status,
        ];

        Category::create($data);
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Category::find($id);
        return view('category.edit')->with(['data'=>$data]);
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
            'serial' => 'required|integer',
            'status' => 'required',
        ]);
        
        $data=[
            'name' => $request->name,
            'serial' => $request->serial,
            'status' => $request->status,
        ];

        Category::find($id)->update($data);
        return redirect()->to('category')->with('message','Update Successful.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::find($id)->update(['is_delete'=>1]);
        return redirect()->to('category')->with('message','Delete Successful.');
    }
}
