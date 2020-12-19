<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Staff;
use App\Models\Dept;

class StaffController extends Controller
{
    //
    public function getStaff()
    {   
        $data = [];
        $staff = Staff::where('delete_status', 1)
        ->orderBy('created_at', 'desc')
        ->paginate(15);
        $data['staff'] = $staff;
        return view('admin.staff.list', $data);
    }
    public function getAddStaff()
    {   
        $dept = Dept::select('id', 'dept_name', 'delete_status')->get();
        return view('admin.staff.add', compact('dept'));
    }
    public function postAddStaff(Request $request)
    {
        
    }
}
