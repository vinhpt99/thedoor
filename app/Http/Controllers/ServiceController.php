<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use Illuminate\Validation\Rule;
use File;
class ServiceController extends Controller
{
    //
    public function deleteService(Request $request)
    {
        $id = $request->id;
        $service = Service::find($id);
            $service->delete_status = 0;
            $service->save();
       
      
    
        
    }
    public function posteditService(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'describe' => 'required',
            'img' => 'mimes:jpg,jpeg,png|max:2048',

        ],[
            'name.required'=>'Trường tên không được để trống',
            'describe.required'=>'Trường mô tả không được để trống',
            'img.mimes'=>'Định dạng ảnh là jpg, jpeg, png',
            'img.max'=>'File ảnh quá lớn, ảnh dưới 2MB',
        ]);
        //upload file
        $service = Service::find($id);
        if ($request->hasFile('img')) {
            $file=$request->file('img');
            $img=rand(0,100000)."_".$file->getClientOriginalname();
            while ( file_exists("upload/".$img)){
                $img=rand(0,100000)."_".$file->getClientOriginalname();
            }
            File::delete(public_path()."/upload/".$service->logo);
            $service->logo = $img;
            $file->move('upload/',$img);  
        $service->service_name = $request->name;
        $service->describe = $request->describe;
        $service->save();
        return redirect('/admin/service')->with('success', 'Cập nhật thành công !');
        }
    }
    public function editService($id)
    {
        $service = Service::find($id);
        return view('admin.service.edit', compact('service'));
    }
    public function getService()
    {
        $service = Service::select('id', 'service_name', 'delete_status', 'logo', 'describe')->where('delete_status',1)->orderBy('created_at','desc')->paginate(15);
        return view('admin.service.list', compact('service'));
    }
    public function getAddService()
    {
        return view('admin.service.add');
    }
    public function postAddService(Request $request)
    {
        $validatedData = $request->validate([
            'service_name' => ['required',Rule::unique('services')->where(function ($query){
                return $query->where('delete_status', 1);
            })],
            'img' => 'required|mimes:jpg,jpeg,png|max:2048',
            'describe' => 'required'
        ],[
            'service_name.required'=>'Trường tên không được để trống',
            'service_name.unique'=>'Tên dịch vụ đã tồn tại',
            'img.required'=>'Bạn chưa tải lên ảnh',
            'img.mimes'=>'Định dạng ảnh là jpg, jpeg, png',
            'img.max'=>'File ảnh quá lớn, ảnh dưới 2MB',
            'describe.required'=>'Trường mô tả không được để trống'
        ]);
        //upload file
        $service = new Service;
        if ($request->hasFile('img')) 
        {
          $file=$request->file('img');
          $img=rand(0,100000)."_".$file->getClientOriginalname();
            while ( file_exists("uplaod/".$img)){
              $img=rand(0,100000)."_".$file->getClientOriginalname();
            }           
        $service->logo = $img;
        $file->move('upload/',$img);       
          }
        $service->service_name = $request->service_name;
        $service->describe = $request->describe;
        $service->save();
        return redirect('/admin/service')->with('success', 'Thêm thành công !');
    }

    public function deleteServiceMultiple(){
        $checkboxArr = $_GET['checkboxArr'];
        foreach ($checkboxArr as $value){
            $service = Service::find($value);
            $service->delete_status = 0;
            $service->save();
        }
    }
}
