<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Http\UploadedFile;

class StorageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Storage::all();
        return view('storage.show')->with(['datas'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('storage.create');
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
            'address' => 'required|string|max:255',
            'status' => 'required',
        ]);

        $data=[
            'name' => $request->name,
            'address' => $request->address,
            'status' => $request->status,
        ];

        Storage::create($data);
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
        $datas = DB::table('storages')
            ->leftJoin('products', 'storages.id', '=', 'products.tbl_storage_id')
            ->leftJoin('categories', 'products.tbl_category_id', '=', 'categories.id')
            ->leftjoin('brands', 'products.tbl_brand_id', '=', 'brands.id')
            ->leftJoin('types', 'products.tbl_type_id', '=', 'types.id')
            ->select('products.*', 'brands.name as brand', 'types.name as type',
                'categories.name as category','storages.name as storage')
            ->where('storages.id','=', $id)
            ->get();
        return view('storage.product')->with(['datas'=>$datas]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Storage::find($id);
        return view('storage.edit')->with(['data'=>$data]);
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
            'address' => 'required|string|max:255',
            'status' => 'required',
        ]);

        $data=[
            'name' => $request->name,
            'address' => $request->address,
            'status' => $request->status,
        ];

        Storage::find($id)->update($data);
        return redirect()->to('store')->with('messege','Update Successful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Storage::find($id)->update(['is_delete'=>1]);
        return redirect()->to('store')->with('message','Delete Successful.');
    }
}
