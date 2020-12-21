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
        // ->select('users.*','staff.staff_name')
        ->paginate(15);
        return view('admin.hire_page.list', compact('hire_page'));
    }
}
