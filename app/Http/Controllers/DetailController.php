<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DetailProduct;
use DB;
use App\Models\Product;
class DetailController extends Controller
{
    //
    public function deleteDetail(Request $request)
    {
        $id = $request->id;
        // return response()->json(['error' => false, 'data' =>  $id], 200);
        $detail = DetailProduct::find($id);
        $detail->delete_status = 0;
        $detail->save(); 
        // return response()->json(['error' => false, 'data' =>  $detail], 200);   
    }
    public function postEditDetail(Request $request, $id)
    {
        $validatedData = $request->validate([
            'describe' => 'required|unique:depts,dept_name',
            'text' => 'required'
        ],[
            'describe.required'=>'Trường mô tả',
            'text.required'=>'Trường nội dung không được để trống'
        ]);
        $detail = DetailProduct::find($id);
        $detail->id_product = $request->id_product;
        $detail->media = $request->text;
        $detail->describe = $request->describe;
        $detail->save();
        return redirect('/admin/detail')->with('success','Sửa thành công !');
    }
    public function editDetail($id)
    {
        $products = Product::select('id','name', 'delete_status')->where('delete_status',1)->get();
        $detail = DetailProduct::find($id);
        return view('admin.detail_product.edit', compact('products', 'detail'));
    }
    public function postAddDetail(Request $request)
    {
        $validatedData = $request->validate([
            'describe' => 'required|unique:depts,dept_name',
            'text' => 'required'
        ],[
            'describe.required'=>'Trường mô tả',
            'text.required'=>'Trường nội dung không được để trống'
        ]);
        $detail = new DetailProduct();
        $detail->id_product = $request->id_product;
        $detail->media = $request->text;
        $detail->describe = $request->describe;
        $detail->save();
        return redirect('/admin/detail')->with('success','Thêm thành công !');
    }
    public function getDetail()
    {
        
        $details = DB::table('detail_products')
        ->where('detail_products.delete_status', 1)
        ->orderBy('detail_products.created_at', 'desc')
        ->join('products', 'detail_products.id_product', '=', 'products.id')
        // ->select('products.*', 'services.service_name', 'customers.customer_name')
        ->paginate(15);
      
       
     //   $details = DetailProduct::select('id', 'id_product', 'describe', 'created_at')->where('delete_status',1)->orderBy('created_at', 'desc')->paginate(15);
        return view('admin.detail_product.list', compact('details'));
        
    }
    public function getAddDetail()
   
    {
        $products = Product::select('id','name', 'delete_status')->where('delete_status',1)->get();
        return view('admin.detail_product.add', compact('products'));
    }
}
