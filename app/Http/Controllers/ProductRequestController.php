<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductRequisition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($status)
    {
        $val = [
            'status' => $status,
        ];

        $datas = DB::table('product_requisitions')
        ->join('users','tbl_user_id','=','users.id')
        ->join('products','product_requisitions.tbl_product_id','=','products.id')
        ->select('users.name as username','products.*','products.status as pro_status','products.id as pro_id','product_requisitions.*')    
        ->where('product_requisitions.status','=',$status)->where('product_requisitions.is_delete','=',0)
        ->get();

        return view('product_request.request')->with(['datas'=>$datas, 'val'=>$val]);
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
        return view('product_request.edit_order')->with(['data'=>$data->first()]);
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
        if($request->btn == 'Accept')
        {
            $p_req = ProductRequisition::find($id);
            $product = Product::find($p_req->tbl_product_id);

            if($product->quantity>=$p_req->quantity)
            {
                Product::find($p_req->tbl_product_id)->update(['quantity'=>($product->quantity-$p_req->quantity)]);
                ProductRequisition::find($id)->update(['status'=>'Accepted']);
                return redirect()->back()->with('message','Successful.!');
            }
            else
            {
                return redirect()->back()->with('msg','Failed.! Not Enough Product in Stock.!');
            }
        }
        elseif($request->btn == 'Reject')
        {
            ProductRequisition::find($id)->update(['status'=>'Rejected']);
            return redirect()->back()->with('message','Successful.!');
        }

        elseif($request->btn == 'Undo')
        {
            $p_req = ProductRequisition::find($id);
            $product = Product::find($p_req->tbl_product_id);

            Product::find($p_req->tbl_product_id)->update(['quantity'=>($product->quantity+$p_req->quantity)]);
            ProductRequisition::find($id)->update(['status'=>'pending']);
            return redirect()->back()->with('message','Successful.!');
            
        }
        
        elseif($request->btn == 'Pending')
        {
            ProductRequisition::find($id)->update(['status'=>'pending']);   
            return redirect()->to('request/Pending')->with('message','Successful.!');
        }

        elseif($request->btn == 'Update')
        {
            $product_req = ProductRequisition::find($id);
            $product = Product::find($product_req->tbl_product_id);
            $data = [
                'quantity' => $request->quantity,
                'total_price' => $request->quantity*$product->price,
            ];
        
            ProductRequisition::find($id)->update($data);
            return redirect()->to('request/Pending')->with('message','Update Successful.!');
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
        //
    }
}
