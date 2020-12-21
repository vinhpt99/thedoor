<?php

namespace App\Http\Controllers;
use App\Models\Dept;
use App\Models\Staff;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use DB;


class DepartmentController extends Controller
{
    //
    public function deleteDept(Request $request)
    {
        $id = $request->id;
        $slide = Dept::find($id);
        $slide->delete_status = 0;
        $slide->save();
    }
    public function postEditDept(Request $request)
    {
      
        $validatedData = $request->validate([
            'name' => 'required',
            'phone' => 'required|regex:/(0)[0-9]{9}/'
        ],
        [
            'name.required'=>'Trường tên không được để trống',
            'phone.required'=>'Trường điện thoại không được để trống',
            'phone.regex'=>'Trường điện thoại chưa đúng định dạng'
        ]);
        $id = $request->idDept;
        $dept = Dept::find($id);
        $dept->dept_name = $request->name;
        $dept->phone = $request->phone;
        $dept->leader_id = $request->leader;
        $dept->update();
        return response()->json(['error' => false, 'data' =>  $dept], 200);
  
            
    }
    public function getEditDept(Request $request)
    {
        $id = $request->id;
        $dept = Dept::where('id', $id)->get();
        $staff = Staff::select('id', 'staff_name')->where('delete_status',1)->get();
        $output = "";
        foreach ($staff as $key => $val) {
            if ($staff[$key]['id'] ==  $dept[0]['leader_id']) {
              $output .= "<option value='" .$staff[$key]['id']. "'>" .$staff[$key]['staff_name']. "</option>";
              unset($staff[$key]);
              break;
            }
           
          }
        foreach ($staff as $key => $val)
            $output .= "<option value='" .$staff[$key]['id']. "'>" . $staff[$key]['staff_name'] . "</option>";
         $data = [];
         $data['dept'] =  $dept;
         $data['output'] =  $output;
        return response()->json(['error' => false, 'data' => $data], 200);
    }
    public function getDept()
    {   
        $data = [];
        $dept = DB::table('depts')
        ->where('depts.delete_status', 1)
        ->join('staff', 'depts.leader_id', '=', 'staff.id')
        ->select('staff.staff_name', 'depts.*')
        ->paginate(6);
        $data['dept'] = $dept;
        return view('admin.dept.list', $data);
    }
    public function getAddDept()
    {  
        $data = [];
        $staff = Staff::select('id', 'staff_name')->where('delete_status',1)->get();
        $data['staff'] = $staff;
        return view('admin.dept.add', $data);
    }
    public function postAddDept(Request $request)
    {   
        $validatedData = $request->validate([
            'dept_name' => ['required',Rule::unique('depts')->where(function ($query){
                return $query->where('delete_status', 1);
            })],
            'phone' => 'required|regex:/(0)[0-9]{9}/'
        ],[
            'dept_name.required'=>'Tên bộ phận không được để trống',
            'dept_name.unique'=>'Tên bộ phận đã tồn tại',
            'phone.required'=>'Trường điện thoại không được để trống',
            'phone.regex'=>'Chưa đúng định dạng số điện thoại'
        ]);
        $dept = new Dept;
        $dept->dept_name = $request->dept_name;
        $dept->slug =Str::slug($request->name);
        $dept->phone = $request->phone;
        $dept->leader_id = $request->leader;
        $dept->save();
        return redirect('/admin/dept')->with('success','Thêm thành công !');
       
    }
}
