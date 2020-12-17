<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slide;
use App\Models\Service;
use App\Models\Dept;
use App\Models\Staff;
use App\Models\Customer;
use App\Models\Blog;
use App\Models\Layout;
use DB;

class FrontendController extends Controller
{
    //
    public function index()
    {
        $slide = Slide::select('image','title','describe','link')->where('active_status',1)->where('delete_status',1)->get();
        $count = Slide::select('*')->where('active_status',1)->where('delete_status',1)->count();
        $serv = Service::select('service_name','id')->where('delete_status',1)->get();
        $sldept = Dept::select('dept_name','id')->where('delete_status',1)->get();
        $staffs = Staff::select('slug', 'photo')->where('delete_status',1)->orderBy('created_at', 'desc')->get();
        $customers = Customer::select('id', 'customer_name', 'image')->where('delete_status', 1)->get();
       // $blogs = Blog::select('id', 'author_id', 'title', 'thumbnail', 'slug', 'created_at')->where('delete_status', 1)->orderBy('updated_at', 'desc')->take(10)->get();
        $layouts = Layout::select('link', 'offset')->where('delete_status',1)->get();
        $blogs =  DB::table('blogs')
        ->where('delete_status', 1)
        ->join('users', 'users.id', '=', 'blogs.author_id')
        ->select('users.name', 'blogs.*')
        ->get();
      
        return view('home',compact('slide','count','serv','sldept', 'customers', 'staffs', 'blogs', 'layouts'));  
    }
}
