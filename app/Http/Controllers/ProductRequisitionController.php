<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductRequisition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ProductRequisitionController extends Controller
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
        
        
        return view('product_requisition.index')->with(['datas'=>$datas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $datas = DB::table('product_requisitions')
                ->join('products','product_requisitions.tbl_product_id','=','products.id')
                ->select('products.*','products.status as pro_status','products.id as pro_id','product_requisitions.*')    
                ->where('tbl_user_id','=',$id)
                ->where('product_requisitions.status','=','Pending')->where('product_requisitions.is_delete','=',0)->get();
        
        return view('product_requisition.request')->with(['datas'=>$datas]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $btn = [
            'btnval' => 'Submit',
        ];
        $data = DB::table('products')
            ->join('categories', 'products.tbl_category_id', '=', 'categories.id')
            ->leftjoin('brands', 'products.tbl_brand_id', '=', 'brands.id')
            ->select('products.*', 'brands.name as brand', 'categories.name as category')
            ->where('products.id','=',$id)
            ->get();
        //dd($btn);
        return view('product_requisition.order')->with(['data'=>$data->first()]);
    }

    public function editRequest($id)
    {
        $btn = [
            'btnval' => 'Update',
        ];
        $data = DB::table('product_requisitions')
                ->join('products','product_requisitions.tbl_product_id','=','products.id')
                ->join('categories','products.tbl_category_id','=','categories.id')
                ->leftjoin('brands', 'products.tbl_brand_id', '=', 'brands.id')
                ->select('products.name','products.image','products.unit','products.price as pro_price','products.id as pro_id','products.quantity as pro_quantity','product_requisitions.*','brands.name as brand','categories.name as category')    
                ->where('product_requisitions.id','=',$id)
                ->where('product_requisitions.status','=','Pending')->where('product_requisitions.is_delete','=',0)
                ->get();
        
       // dd($btn);
        return view('product_requisition.edit_order')->with(['data'=>$data->first()]);
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
            'quantity' => 'required|numeric',
        ]);

        if($request->submit == 'Submit')
        {
            $product = Product::find($id);
            $data = [
                'tbl_product_id' => $id,
                'quantity' => $request->quantity,
                'tbl_user_id' => Session::get('userid'),
                'total_price' => $request->quantity*$product->price,
            ];
        
            ProductRequisition::create($data);
            return redirect()->to('requisition/'.$data['tbl_user_id'])->with('message','Request Successful.!');
        }

        elseif($request->submit == 'Update')
        {
            $product_req = ProductRequisition::find($id);
            $product = Product::find($product_req->tbl_product_id);
            $data = [
                'quantity' => $request->quantity,
                'total_price' => $request->quantity*$product->price,
            ];
        
            ProductRequisition::find($id)->update($data);
            return redirect()->to('requisition/'.Session::get('userid'))->with('message','Update Successful.!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ProductRequisition::find($id)->update(['is_delete'=>1]);
        return redirect()->to('requisition/'.session::get('userid'))->with('message','Delete Successful.!');
    }

   
}
