<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Service;
use DB;


class ProductController extends Controller
{
    //
    public function posteditProduct(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'start' => 'required',
            'end' => 'required|after:start',
            'mem' => 'required',
        ],[
            'name.required'=>'Trường tên không được để trống',
            'start.required'=>'Chọn thời gian bắt đầu',
            'end.required'=>'Chọn thời gian kết thúc',
            'mem.required'=>'Nhập số lượng thành viên',
            'end.after'=>'Ngày kết thúc phải sau ngày bắt đầu'
        ]);
        $product = Product::find($id);
        $product->name = $request->name;
        $product->slug =Str::slug($request->name);
        $product->id_service = $request->id_service;
        $product->id_customer = $request->id_customer;
        $product->begin_day = $request->start;
        $product->finish_date = $request->end;
        $product->members = $request->mem;
        $product->save();

        return redirect('/admin/product')->with('success', 'Cập nhật thành công !');   
    }
    public function editProduct($id)
    {
        $product = Product::find($id);
        $customer = Customer::select('id', 'customer_name')->where('delete_status',1)->get();
        $service = Service::select('id', 'service_name', 'logo', 'describe')->where('delete_status',1)->get();
        return view('/admin/product/edit', compact('customer', 'service', 'product'));
    }
    public function postaddProduct(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required',Rule::unique('products')->where(function ($query){
                return $query->where('delete_status', 1);
            })],
            'start' => 'required',
            'end' => 'required|after:start',
            'mem' => 'required',
        ],[ 
            'name.unique' =>'Trường tên đã tồn tại',
            'name.required'=>'Trường tên không được để trống',
            'start.required'=>'Chọn thời gian bắt đầu',
            'end.required'=>'Chọn thời gian kết thúc',
            'mem.required'=>'Nhập số lượng thành viên',
            'end.after'=>'Ngày kết thúc phải sau ngày bắt đầu'
        ]);
        $product = new Product;
        $product->name = $request->name;
        $product->slug =Str::slug($request->name);
        $product->id_service = $request->id_service;
        $product->id_customer = $request->id_customer;
        $product->begin_day = $request->start;
        $product->finish_date = $request->end;
        $product->members = $request->mem;
        $product->save();

        return redirect('/admin/product')->with('success', 'Thêm thành công !');
    }
    public function getProduct()
    {   
        $product = DB::table('products')
            ->where('products.delete_status', 1)
            ->join('services', 'products.id_service', '=', 'services.id')
            ->join('customers', 'products.id_customer', '=', 'customers.id')
            ->select('products.*', 'services.service_name', 'customers.customer_name')->orderBy('created_at', 'desc')
            ->paginate(15);
         $data = [];
         $data ['product'] =  $product;
        // $product = Product::select('id', 'id_customer', 'id_service', 'name', 'begin_day', 'finish_date', 'members', 'delete_status')->where('delete_status', 1)->orderBy('created_at', 'desc')->paginate(15);
        return view('admin.product.list', $data);
    }
    public function addProduct()
    {
        $customer = Customer::select('id', 'customer_name')->where('delete_status',1)->get();
        $service = Service::select('id', 'service_name', 'logo', 'describe')->where('delete_status',1)->get();
        return view('admin.product.add', compact('service', 'customer'));
    }

    public function deleteProductMultiple(){
        $checkboxArr = $_GET['checkboxArr'];
        foreach ($checkboxArr as $value){
            $product = Product::find($value);
            $product->delete_status = 0;
            $product->save();
        }
    }
}
