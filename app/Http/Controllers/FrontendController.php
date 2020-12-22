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
use App\Models\Product;
use App\Models\Candidate;
use App\Models\FeedBack;
use Illuminate\Validation\Rule;
use File;
use DB;

class FrontendController extends Controller
{
    //
    public function postFeedBack(Request $request)
    {
     
      $validatedData = $request->validate([   
        'name' => 'required',
        'email' => 'required|email',
        'describe' => 'required',
    ],[
        'name.required'=>'Trường tên không được để trống',
        'email.required'=>'Trường email không được để trống',
        'email.email'=>'Email chưa đúng định dạng',
        'describe.required'=>'Trường mô tả không được để trống'
    ]);
    $feedback = new FeedBack; 
    $feedback->sender_name	=$request->name;
    $feedback->email=$request->email;
    $feedback->content_fb=$request->describe;
    $feedback->save();
    return response()->json(['error' => false, 'data' =>  $feedback], 200);
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
        return response()->json(['error' => false, 'data' => $hirePage], 200);
      
    }
    public function postAddTeam(Request $request)
    {
      $v = $request->all();
      $validatedData = $request->validate([
        'name' => 'required',
        'email' => ['required','email',Rule::unique('candidates')->where(function ($query){
          return $query->where('delete_status', 1);
          })],
        'profile' => 'required|mimes:jpg,jpeg,png|max:2048',
        'phone' => 'required|regex:/(0)[0-9]{9}/',
        'dept_id' => 'required',



    ],[
        'name.required'=>'Bạn chưa nhập tên',
        'email.required'=>'Email không được để trống',
        'email.email'=>'Email chưa đúng định dạng',
        'email.unique'=>'Email đã tồn tại',
        'profile.required'=>'Bạn chưa tải lên ảnh',
        'profile.mimes'=>'Ảnh chưa đúng định dạng(jpg, jpeg, png)',
        'profile.max'=>'File ảnh quá lớn',
        'phone.required'=>'Chưa thêm số điện thoại !',
        'phone.regex'=>'Số điện thoại chưa đúng định dạng !',
        'dept_id.required' => 'Bạn chưa chọn bộ phận !'
    ]);
       $candidate = new Candidate;
       $candidate->name = $request->name;
       $candidate->email = $request->email;
       $candidate->phone = $request->phone;
       $candidate->dept_id = $request->dept_id;
       if ($request->hasFile('profile')) 
       {
         $file=$request->file('profile');
         $img=rand(0,100000)."_".$file->getClientOriginalname();
           while ( file_exists("upload/".$img)){
             $img=rand(0,100000)."_".$file->getClientOriginalname();
           }           
       $candidate->profile = $img;
       $file->move('upload/',$img);       
         }
         $candidate->save();

      return response()->json(['error' => false, 'data' =>  $candidate], 200);
    }
    public function index()
    {
        $slide = Slide::select('image','title','describe','link')->where('active_status',1)->where('delete_status',1)->get();
        // dd($slide);
        $count = Slide::select('*')->where('active_status',1)->where('delete_status',1)->count();
        $serv = Service::select('service_name','id')->where('delete_status',1)->get();
        $sldept = Dept::select('dept_name','id')->where('delete_status',1)->get();
        $staffs = Staff::where('delete_status',1)->orderBy('created_at', 'desc')->get();
        $customers = Customer::select('id', 'customer_name', 'image')->where('delete_status', 1)->get();
        $layouts = Layout::select('link', 'offset')->where('delete_status',1)->get();
        $products = DB::table('products')
        ->where('products.delete_status', 1)
        ->join('customers', 'products.id_customer', '=', 'customers.id')
        ->get();
        $blogs =  DB::table('blogs')
        ->where('blogs.delete_status',1)
        ->where('blogs.status',1)
        ->join('users', 'users.id', '=', 'blogs.author_id')
        ->select('users.name', 'blogs.*')->get();
        return view('home',compact('products','slide','count','serv','sldept', 'customers', 'staffs', 'blogs', 'layouts'));  
    }
  public function getPost()
  {
    $posts = Blog::select('title', 'describe', 'slug', 'thumbnail')->where('delete_status',1)->where('status',1)->orderBy('updated_at', 'desc')->paginate(5);
    $layouts = Layout::select('link', 'offset')->where('delete_status',1)->get();
    return view('list-post', compact('layouts', 'posts'));
  }
  public function viewPost(Request $request, $slug){
    // $post = Blog::where('slug', $slug)->get();
    $post =  DB::table('blogs')
     ->where('slug', $slug)
    ->where('blogs.delete_status',1)
    ->orderBy('blogs.updated_at', 'desc')
    ->join('users', 'users.id', '=', 'blogs.author_id')
    ->select('users.name', 'blogs.*')->get();
    
    $layouts = Layout::select('link', 'offset')->where('delete_status',1)->get();
    return view('detail-post', compact('layouts', 'post'));
}

}
