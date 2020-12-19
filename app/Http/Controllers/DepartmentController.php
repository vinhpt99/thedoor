<?php

namespace App\Http\Controllers;
use App\Models\Dept;
use App\Models\Staff;
use Illuminate\Http\Request;


class DepartmentController extends Controller
{
    //
    public function getDept()
    {
        $dept = Dept::select('id', 'dept_name', 'phone', 'leader_id', 'delete_status')->where('delete_status',1)->orderBy('created_at','desc')->paginate(15);
        return view('admin.dept.list', compact('dept'));
    }
    public function getAddDept()
    {  
        $data = [];
        $staff = Staff::select('id', 'staff_name')->where('delete_status',1)->get();
        $data['staff'] = $staff;
        return view('admin.dept.add', $data);
    }
}
