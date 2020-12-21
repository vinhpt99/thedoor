<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Dept;
use DB;
use App\Models\Staff;
use File;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Hash;
class UserController extends Controller
{
    //
    public function deleteUser(Request $request)
    {
        $id = $request->id;
        $user = User::find($id);
        $user->delete_status = 0;
        $user->save();
        $idStaff = $user->id_staff;
        $staff = Staff::find($idStaff);
        $staff->delete_status = 0;
        $staff->save();
        return response()->json(['error' => false, 'data' => $staff], 200);
  
    }
    public function postEditUser(Request $request, $id)
    {
        
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
         
        ],[
            'email.email'=>'Email chưa đúng định dạng',
            'name.required'=>'Trường tên không được để trống',
            'email.required'=>'Trường điện thoại không được để trống',
        ]);
        if($request->password){
            $validatedData = $request->validate([
                'password' => 'confirmed|min:6',
                'password_confirmation'=>'required|same:password',
             
            ],[
                'password.confirmed'=>'Mật khẩu không trùng khớp',
                'password.min'=>'Mật khẩu phải lớn hơn 6 kí tự',
            ]);
        }
        $user = User::find($id);
        if($request->email)
        {   
              $staff = DB::table('staff')
             ->where('staff.delete_status', 1)
             ->where('staff.email',  $user->email)->first();
             if(isset($staff))
             {
                $idStaff = $staff->id;
             }        
        }
        $user->name = $request->name;
        $user->email = $request->email;
        if($request->password)
        {   
         $user->password =Hash::make($request->password);
        }
        $user->save();
        DB::table('staff')
        ->where('id',  $idStaff)
        ->update(['email' =>  $user->email]);
        return redirect('/admin/user')->with('success', 'Sửa thành công thông tin đăng nhập !');
      
    }
    public function getEditUser($id)
    {
        $user = User::find($id);
        return view('admin.user.edit', compact('user'));
    }
    public function getUser()
    {
        $users = DB::table('users')
        ->where('users.delete_status', 1)
        ->join('staff', 'users.id_staff', '=', 'staff.id')
        ->select('users.*','staff.staff_name')
        ->paginate(15);
        return view('admin.user.list', compact('users'));
    }
    public function getAddStaff()
    {   $data = [];
        $dept = Dept::where('delete_status',1)->get();
        $data['dept'] = $dept;
        return view('admin.user.add', $data);
    }
    public function postAddStaff(Request $request)
    {
        $request->validate(
            [    
                'name' => 'required',
                'name' => 'required',
                'phone' => ['required','regex:/(0)[0-9]{9}/',Rule::unique('staff')->where(function ($query){
                    return $query->where('delete_status', 1);
                })],
                'email' => ['required','email',Rule::unique('users')->where(function ($query){
                    return $query->where('delete_status', 1);
                })],
                'address' => 'required',
                'editorStory' => 'required',
                'img' => 'required|mimes:jpg,jpeg,png|max:2048',
                 
            ],
            [
                'name.required' => 'Vui lòng nhập tên user',
                'email.required' => 'Vui lòng nhập email',
                'email.email' => 'Email chưa đúng định dạng',
                'img.required'=>'Chưa tải lên hình ảnh !',
                'img.mimes'=>'Ảnh tải lên không đúng định dạng',
                'img.max'=>'Dung lượng ảnh quá lớn !',
                'address.required'=>'Địa chỉ không được để trống',
                'address.required'=>'Địa chỉ không được để trống',
                'name.required'=>'Trường tên không được để trống',
                'phone.required'=>'Chưa nhập số điện thoại',
                'phone.unique'=>'Số điện thoại đã tồn tại',
                'phone.regex'=>'Chưa đúng định dạng số điện thoại !',
                'email.unique'=>'Email đã tồn tại',
                'email.email'=>'Email chưa đúng định dạng',
                'email.required'=>'Trường email không được để trống',
                'editorStory.required'=>'Trường câu chuyện thoại không được để trống',
            ]
        );
        DB::beginTransaction();
        try {
            $staff = new Staff;
            if ($request->hasFile('img')) 
            {
              $file=$request->file('img');
              $img=rand(0,100000)."_".$file->getClientOriginalname();
                while ( file_exists("uplaod/".$img)){
                  $img=rand(0,100000)."_".$file->getClientOriginalname();
                }           
            $staff->photo = $img;
            $file->move('upload/',$img);       
              }
         
            $staff->staff_name = $request->name;
            $staff->slug =Str::slug($request->name);
            $staff->phone = $request->phone;
            $staff->address = $request->address;
            $staff->email = $request->email;
            $staff->story = $request->editorStory;
            $staff->id_dept = $request->id_dept;
            $staff->save();

            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->id_staff =  $staff->id;
            $user->password =Hash::make('thedoor');
            $user->save();
            DB::commit();
           
        } catch (\Exception $e) {
            DB::rollback();
            // something went wrong
            return redirect('/admin/user')->with('error', 'Thêm thất bại !');
        }
        return redirect('/admin/user')->with('success', 'Thêm thành công !');
    }
}
