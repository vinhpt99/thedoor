<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use File;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
class CustomerController extends Controller
{
    //
    public function deleteCustomer(Request $request)
    {
        $id = $request->id;
        $customer = Customer::find($id);
        $customer->delete_status = 0;
        $customer->save();
       
    }
    public function postditCustomer(Request $request, $id)
    {   
        
        $validatedData = $request->validate([
            'phone' => 'required','regex:/(0)[0-9]{9}/',
            'email' => 'required','email',
            'name' => 'required',
            'address' => 'required',
            'img' => 'required|mimes:jpg,jpeg,png|max:2048',
        ],[
            'name.required' => 'Vui lòng nhập tên user',
            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Email chưa đúng định dạng',
            'img.required'=>'Chưa tải lên hình ảnh !',
            'img.mimes'=>'Ảnh tải lên không đúng định dạng',
            'img.max'=>'Dung lượng ảnh quá lớn !',
            'address.required'=>'Địa chỉ không được để trống',
            'phone.required'=>'Chưa nhập số điện thoại',
            'phone.regex'=>'Chưa đúng định dạng số điện thoại !',
        ]);
        //upload
        $customer = Customer::find($id);
        if ($request->hasFile('img')) {
            $file=$request->file('img');
            $img=rand(0,100000)."_".$file->getClientOriginalname();
            while ( file_exists("upload/".$img)){
                $img=rand(0,100000)."_".$file->getClientOriginalname();
            }
            File::delete(public_path()."/upload/". $customer->image);
            $customer->image = $img;
            $file->move('upload/',$img);
        }
        $customer->customer_name = $request->name;
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        $customer->email = $request->email;
        $customer->save();
        return redirect('/admin/customer')->with('success', 'Cập nhật thành công !');
    
    }
    public function getCustomer()
    {
        $customer = Customer::where('delete_status', 1)->select('id', 'customer_name', 'phone', 'email', 'address', 'image', 'delete_status')->orderBy('created_at','desc')->paginate(15);
        return view('admin.customer.list', compact('customer'));
    } 
    public function editCustomer($id)
    {
        $customer = Customer::find($id);
        return view('admin.customer.edit', compact('customer'));
    }
    public function getAddCustomer()
    {    
        return view('admin.customer.add');
    }
    public function postAddCustomer(Request $request)
    {
      
        $validatedData = $request->validate([
            'phone' => ['required','regex:/(0)[0-9]{9}/',Rule::unique('staff')->where(function ($query){
                return $query->where('delete_status', 1);
            })],
            'email' => ['required','email',Rule::unique('users')->where(function ($query){
                return $query->where('delete_status', 1);
            })],
            'name' => 'required',
            'address' => 'required',
            'img' => 'required|mimes:jpg,jpeg,png|max:2048',
        ],[
            'name.required' => 'Vui lòng nhập tên user',
            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Email chưa đúng định dạng',
            'email.unique'=>'Email đã tồn tại',
            'img.required'=>'Chưa tải lên hình ảnh !',
            'img.mimes'=>'Ảnh tải lên không đúng định dạng',
            'img.max'=>'Dung lượng ảnh quá lớn !',
            'address.required'=>'Địa chỉ không được để trống',
            'phone.required'=>'Chưa nhập số điện thoại',
            'phone.unique'=>'Số điện thoại đã tồn tại',
            'phone.regex'=>'Chưa đúng định dạng số điện thoại !',
        ]);
        //upload
        
        $customer = new Customer;
        if ($request->hasFile('img')) 
        {
          $file=$request->file('img');
          $img=rand(0,100000)."_".$file->getClientOriginalname();
            while ( file_exists("uplaod/".$img)){
              $img=rand(0,100000)."_".$file->getClientOriginalname();
            }           
        $customer->image = $img;
        $file->move('upload/',$img);       
          }
        $customer->customer_name = $request->name;
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        $customer->email = $request->email;
        $customer->save();
        return redirect('/admin/customer')->with('success', 'Thêm thành công !');
       
    }

    public function deleteCustomerMultiple(){
        $checkboxArr = $_GET['checkboxArr'];
        foreach ($checkboxArr as $value){
            $customer = Customer::find($value);
            $customer->delete_status = 0;
            $customer->save();
        }
    }
}
