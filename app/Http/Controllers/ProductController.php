<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Brand;
use App\Category;
use App\Storage;
use App\Type;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = DB::table('products')
            ->join('categories', 'products.tbl_category_id', '=', 'categories.id')
            ->join('storages', 'products.tbl_storage_id', '=', 'storages.id')
            ->leftjoin('brands', 'products.tbl_brand_id', '=', 'brands.id')
            ->leftJoin('types', 'products.tbl_type_id', '=', 'types.id')
            ->select('products.*', 'brands.name as brand', 'types.name as type',
                'categories.name as category','storages.name as storage')
            ->get();
        
        
        return view('product.show')->with(['datas'=>$datas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = Brand::all();
        $types = Type::all();
        $categories = Category::all();
        $storages = Storage::all();

        return view('product.create')->with(['brands'=>$brands, 'types'=>$types, 'categories'=>$categories,'storages'=>$storages]);
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
            'quantity' => 'required|numeric',
            'price' => 'required|numeric',
            'unit' => 'required|string',
            'category' => 'required|integer',
            'storage' => 'required|integer',
            'status' => 'required'
        ]);

        if($request->hasFile('image'))
        {           
            $path = $request->image->store('images', 'public');
            $data = [
                'name' => $request->name, 
                'quantity' => $request->quantity, 
                'unit'  => $request->unit,
                'price'  => $request->price,
                'tbl_type_id'  => $request->type,
                'tbl_brand_id'  => $request->brand, 
                'tbl_category_id'  => $request->category,
                'tbl_storage_id'  => $request->storage, 
                'status' => $request->status,
                'image' => $path,
            ];
        }
        else
        {
            $data = [
                'name' => $request->name, 
                'quantity' => $request->quantity, 
                'unit'  => $request->unit,
                'price'  => $request->price,
                'tbl_type_id'  => $request->type,
                'tbl_brand_id'  => $request->brand, 
                'tbl_category_id'  => $request->category,
                'tbl_storage_id'  => $request->storage, 
                'status' => $request->status,
                'image' => 'images/product.png',
            ];
        }

        Product::create($data);
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
        //Using For Stock Out
        $datas = DB::table('products')
            ->join('categories', 'products.tbl_category_id', '=', 'categories.id')
            ->join('storages', 'products.tbl_storage_id', '=', 'storages.id')
            ->leftjoin('brands', 'products.tbl_brand_id', '=', 'brands.id')
            ->leftJoin('types', 'products.tbl_type_id', '=', 'types.id')
            ->select('products.*', 'brands.name as brand', 'types.name as type',
                'categories.name as category','storages.name as storage')
            ->where('products.quantity','<=',5)
            ->where('products.status','=','On')
            ->where('products.is_delete','=',0)
            ->get();
        
        return view('stock_out.show')->with(['datas'=>$datas]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Product::find($id);
        $brands = Brand::all();
        $types = Type::all();
        $categories = Category::all();
        $storages = Storage::all();

        return view('product.edit')->with(['data'=>$data,'brands'=>$brands, 'types'=>$types, 'categories'=>$categories,'storages'=>$storages]);
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
            'quantity' => 'required|numeric',
            'price' => 'required|numeric',
            'unit' => 'required|string',
            'category' => 'required|integer',
            'storage' => 'required|integer',
            'status' => 'required',
        ]);

        if($request->hasFile('image'))
        {           
            $path = $request->image->store('images', 'public');
            $data = [
                'name' => $request->name, 
                'quantity' => $request->quantity, 
                'unit'  => $request->unit,
                'price'  => $request->price,
                'tbl_type_id'  => $request->type,
                'tbl_brand_id'  => $request->brand, 
                'tbl_category_id'  => $request->category,
                'tbl_storage_id'  => $request->storage, 
                'status' => $request->status,
                'image' => $path,
            ];
        }
        
        else
        {
            $data = [
                'name' => $request->name, 
                'quantity' => $request->quantity, 
                'unit'  => $request->unit,
                'price'  => $request->price,
                'tbl_type_id'  => $request->type,
                'tbl_brand_id'  => $request->brand, 
                'tbl_category_id'  => $request->category,
                'tbl_storage_id'  => $request->storage,
                'status' => $request->status, 
                'image' => 'images/product.png',
            ];
        }
        Product::find($id)->update($data);
        return redirect()->to('product')->with('message','Update Successful.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::find($id)->update(['is_delete'=>1]);
        return redirect()->back()->with('message','Delete Successful.');
    }
}
