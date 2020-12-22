<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Staff;
use App\Models\Dept;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use DB;
use File;

class StaffController extends Controller
{
    //
    public function deleteStaff(Request $request)
    {
        $id = $request->id;
        DB::beginTransaction();
        try {
            DB::table('staff')
                ->where('id', $id)
                ->update(['delete_status' => 0]);
            DB::table('users')
                ->where('id_staff', $id)
                ->update(['delete_status' => 0]);
            DB::commit();

        } catch (\Exception $e) {
            DB::rollback();

        }

    }

    public function getStaff()
    {
        $data = [];
        $staff = DB::table('staff')
            ->where('staff.delete_status', 1)
            ->join('depts', 'staff.id_dept', '=', 'depts.id')
            ->select('depts.dept_name', 'staff.*')
            ->paginate(15);
        $data['staff'] = $staff;
        return view('admin.staff.list', $data);
    }

    public function editStaff($id)
    {
        $dept = Dept::select('id', 'dept_name', 'delete_status')->where('delete_status', 1)->get();
        $staff = Staff::find($id);
        return view('admin.staff.edit', compact('dept', 'staff'));
    }

    public function posteditStaff(Request $request, $id)
    {

        $request->validate(
            [
                'name' => 'required',
                'email' => 'required|email',
                'phone' => 'required|regex:/(0)[0-9]{9}/',
                'address' => 'required',
                'id_dept' => 'required',
                'editorStaff' => 'required',
                'img' => 'mimes:jpg,jpeg,png|max:2048'
            ],
            [
                'name.required' => 'Trường tên không được để trống',
                'email.required' => 'Trường email không được để trống',
                'phone.required' => 'Trường điện thoại không được để trống',
                'phone.regex' => 'Số điện thoại chưa đúng định dạng',
                'address.required' => 'Trường địa chỉ không được để trống',
                'id_dept.required' => 'Bộ phận không được để trống',
                'editorStaff.required' => 'Bộ phận không được để trống',
                'img.mimes' => 'Định dạng ảnh là jpg, jprg, png',
                'img.max' => 'Dung lượng ảnh tải lên dưới 2MB',
            ]
        );
        $staff = Staff::find($id);
        if ($request->email) {
            $users = DB::table('users')
                ->where('users.delete_status', 1)
                ->where('users.email', $staff->email)->first();
            $idUser = $staff->id;

        }
        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $img = rand(0, 100000) . "_" . $file->getClientOriginalname();
            while (file_exists("uplaod/" . $img)) {
                $img = rand(0, 100000) . "_" . $file->getClientOriginalname();
            }
            File::delete(public_path() . "/upload/" . $staff->photo);
            $staff->photo = $img;
            $file->move('upload/', $img);
        }
        $staff->staff_name = $request->name;
        $staff->slug = Str::slug($request->name);
        $staff->phone = $request->phone;
        $staff->address = $request->address;
        $staff->email = $request->email;
        $staff->story = $request->editorStaff;
        $staff->id_dept = $request->id_dept;
        $staff->save();
        DB::table('users')
            ->where('id', $idUser)
            ->update(['email' => $staff->email]);
        return redirect('/admin/staff')->with('success', 'Sửa thành công nhân viên !');

    }

    public function deleteStaffMultiple(){
        $checkboxArr = $_GET['checkboxArr'];
        foreach ($checkboxArr as $value){
            $staff = Staff::find($value);
            $staff->delete_status = 0;
            $staff->save();
        }
    }
}
