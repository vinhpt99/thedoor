<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HirePage;
use DB;

class HirePageController extends Controller
{
    //
    public function getHirePage()
    {   
        $hire_page = DB::table('hire_pages')
        ->where('hire_pages.delete_status', 1)
        ->join('services', 'hire_pages.service_id', '=', 'services.id')
        ->paginate(15);
        return view('admin.hire_page.list', compact('hire_page'));
    }
    public function postHirePage(Request $request)
    {
       
        $validatedData = $request->validate([
            'partner_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|regex:/(0)[0-9]{9}/',

        ],[
            'partner_name.required'=>'Không được bỏ trống phần tên liên hệ',
            'email.required'=>'Email không được để trống',
            'email.email'=>'Email chưa đúng định dạng',
            'phone.required'=>'Bạn chưa nhập số điện thoại',
        ]);
        $hirePage = new HirePage;
        $hirePage->partner_name = $request->partner_name;
        $hirePage->email = $request->email;
        $hirePage->phone = $request->phone;
        $hirePage->service_id = $request->service_id;
        $hirePage->budget = $request->budget;
        $hirePage->save();
        return redirect('/')->with('success', 'Thêm thành công !');
    }
}
