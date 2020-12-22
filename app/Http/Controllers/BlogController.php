<?php

namespace App\Http\Controllers;
use App\Models\Blog;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use File;

class BlogController extends Controller
{
    //
    public function statusBlog()
    {   
        $data = [];
        $blogs = DB::table('blogs')
        ->where('blogs.delete_status',1)
        ->where('blogs.status',0)
        ->orderBy('blogs.updated_at', 'desc')
        ->join('users', 'users.id', '=', 'blogs.author_id')
        ->select('users.name', 'blogs.*')->paginate(15);
        $data['blogs'] = $blogs;
        return view("admin.blog.status", $data);
    }
    public function deleteBlog(Request $request)
    {
            $id = $request->id;
            $blog = Blog::find($id);
            $blog->delete_status = 0;
            $blog->save();
    }
    public function posteditBlog(Request $request)
    {    
      
        $request->validate(
            [    
                'title' => 'required', 
                'image' => 'mimes:jpg,jpeg,png|max:2048',
                'describle' => 'required',
                'status' => 'required',
                'editorBlog' => 'required',
            ]
            );
            if ($request->hasFile('image')) {
                $id  = $request->idBlog; 
                $blog = Blog::find($id);
                //image
                $file=$request->file('image');
				$img=rand(0,100000)."_".$file->getClientOriginalname();
				while ( file_exists("upload/".$img)){
					$img=rand(0,100000)."_".$file->getClientOriginalname();
				}
				File::delete(public_path()."/upload/".$blog->thumbnail);
				$blog->thumbnail = $img;
                $file->move('upload/',$img);
                //endimage
                $blog->title = $request->title;
                $blog->describe = $request->describle;
                $blog->slug = Str::slug($request->title);
                $blog->content = $request->editorBlog;
                $blog->status = $request->status;
                $blog->update();
            }
            else
            {
                $id  = $request->idBlog; 
                $blog = Blog::find($id);
                $blog->title = $request->title;
                $blog->describe = $request->describle;
                $blog->slug = Str::slug($request->title);
                $blog->content = $request->editorBlog;
                $blog->status = $request->status;
                $blog->update();

            } 

    }
    public function editBlog(Request $request)
    {
          $id = $request->id;
          $blog = Blog::where('id', $id)->first();
          return response()->json(['error' => false, 'data' => $blog], 200);
    }
    public function getBlog()
    {   
        $data = [];
        $type = Auth::user()->type;
        $blogs =  DB::table('blogs')
        ->where('blogs.delete_status',1)
        ->orderBy('blogs.updated_at', 'desc')
        ->join('users', 'users.id', '=', 'blogs.author_id')
        ->select('users.name', 'blogs.*')->paginate(10);
        $data['blogs'] =   $blogs;
        $data['type'] = $type;
        return view('admin.blog.blog', $data);
    }
    public function getAddBlog()
    {
        return view('admin.blog.create');
    }
    public function postAddBlog(Request $request)
    { 
        $validatedData = $request->validate([
            'title' => ['required',Rule::unique('slides')->where(function ($query){
                return $query->where('delete_status', 1);
            })],
            'img' => 'required',
            'describe' => 'required',
            'content' => 'required',
        ],[  
            'img.required'=>'Bạn chưa tải lên ảnh',
            'title.required'=>'Trường tiêu đề không được để trống',
            'title.unique'=>'Tiêu đề bài viết đã tồn tại',
            'describe.required'=>'Trường mô tả không được để trống',
            'content.required'=>'Trường nội dung không được để trống',
        ]);
      
        $blog = new Blog;
        $blog->title = $request->title;
        $blog->slug =Str::slug($request->title);
        $blog->describe = $request->describe;
        if ($request->hasFile('img')) 
        {
          $file=$request->file('img');
          $img=rand(0,100000)."_".$file->getClientOriginalname();
            while ( file_exists("upload/".$img)){
              $img=rand(0,100000)."_".$file->getClientOriginalname();
            }           
        $blog->thumbnail = $img;
        $file->move('upload/',$img);       
          }
      
        $blog->content = $request->content;
        $blog->author_id = $request->author;
        if(Auth::user()->type !==1){
            $blog->status =0;
        }
        $blog->save();
        return redirect('/admin/blog')->with('success', 'Thêm thành công !');
          
    }

    public function deleteBlogMultiple(){
        $checkboxArr = $_GET['checkboxArr'];
        foreach ($checkboxArr as $value){
            $blog = Blog::find($value);
            $blog->delete_status = 0;
            $blog->save();
        }
    }
}
