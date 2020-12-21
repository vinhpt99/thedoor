<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slide;
use File;
use Illuminate\Validation\Rule;
use DB;

class SlideController extends Controller
{
   public function searchSlide(Request $request)
   {   
       $data = [];
       $query = $request->get('search');
       $slides = DB::table('slides')->where('delete_status', 1)
       ->where('title', 'like', '%' . $query . '%')->get();
       if(!empty($slides))
       {
       $output = '';
       foreach($slides as $key => $slide)
       {
        $output .= '<tr>
                        <th scope="row">'.($key+1).'</th>
                        <td>'.$slide->title.'</td>
                        <td>
                            <img width="150" src="' . url('') . '/upload/' .  $slide->image . '" alt="">
                        </td>
                            <td><a href="'.$slide->link.'" target="_blank">'.$slide->link.'</a></td>
                        <td>';
                            if($slide->active_status == 1)
                               $output .='Hiển thị';
                            else
                               $output .='Ẩn đi';
                              $output .='</td>
                        <td><a onclick="editSlide('.$slide->id.')" href="#" class="ml-2"><i class="fas fa-pencil-alt"></i></a></td>
                        <td>
                            <button type="submit" class="btn btn-danger btn-sm" onclick="deleteSlide('.$slide->id.')"><i class="fa fa-times"></i></button>       
                        </td>
                   </tr>';
       }

       $data['output'] = $output;
    }
       return response()->json(['error' => false, 'data' => $data], 200);
   }
    public function editSlide(Request $request)
    {  
       $id = $request->id;
       $slide = Slide::where('id', $id)->first();
       $output = "";
       if ($slide['active_status'] ==  1) {
          $output .= "<option value='1'>Hiển thị</option>
                      <option value='0'>Ẩn đi</option>";
        }
        if ($slide['active_status'] ==  0) {
            $output .= "<option value='0'>Ẩn đi</option>
                        <option value='1'>Hiển thị</option>";
          }
        $data = [];
        $data['slide'] =  $slide;
        $data['output'] =  $output;
       return response()->json(['error' => false, 'data' => $data], 200);
    } 

    
    public function getSlide()
    {
        $slides = Slide::where('delete_status', 1)->paginate(15);
        return view('admin.slide.list',compact('slides'));
    }
    public function getAddSlide()
    {
        return view('admin.slide.create');
    }
    public function postAddSlide(Request $request)
    {
        $request->validate(
            [    
                'title' => ['required', 'string',Rule::unique('slides')->where(function ($query){
                    return $query->where('delete_status', 1);
                })],
                'link' => 'required',
                'image' => 'required|mimes:jpg,jpeg,png|max:2048',
                'description' => 'required',
            ],
            [
                'title.required' => 'Vui lòng nhập tiêu đề cho slide',
                'title.unique' => 'Tiêu đề slide đã tồn tại',
                'link.required' => 'Vui lòng nhập liên kết cho slide',
                'image.required' => 'Vui lòng chọn ảnh cho slide',
                'image.mimes' => 'Định dạng ảnh là jpg, jpeg, png',
                'image.max' => 'ảnh dung lượng dưới 2MB',
                'description.required' => 'Vui lòng nhập mô tả cho slide'
            ]
        );
        $add = new Slide;
        if ($request->hasFile('image')) 
        {
          $file=$request->file('image');
          $img=rand(0,100000)."_".$file->getClientOriginalname();
            while ( file_exists("uplaod/".$img)){
              $img=rand(0,100000)."_".$file->getClientOriginalname();
            }           
        $add->image = $img;
        $file->move('upload/',$img);       
          }
        $add->title = $request->title;
        $add->link = $request->link;
        $add->active_status = 0;
        $add->describe = $request->description;
        $add->save();
        return redirect('/admin/slide')->with('success', 'Thêm thành công !');
    }
    public function posteditSlide(Request $request)
    {   
           
        $request->validate(
            [    
                'title' => 'required',
                'link' => 'required',
                'image' => 'mimes:jpg,jpeg,png|max:2048',
                'editorSlide' => 'required',
            ],
            [
                'title.required' => 'Vui lòng nhập tiêu đề cho slide',
                'link.required' => 'Vui lòng nhập liên kết cho slide',
                'image.mimes' => 'Định dạng ảnh là jpg, jpeg, png',
                'image.max' => 'ảnh dung lượng dưới 2MB',
                'editorSlide.required' => 'Vui lòng nhập mô tả cho slide'
            ]
            );
            if ($request->hasFile('image')) {
                $id  = $request->idSlide; 
                $update = Slide::find($id);
                //image
                $file=$request->file('image');
				$img=rand(0,100000)."_".$file->getClientOriginalname();
				while ( file_exists("uplaod/".$img)){
					$img=rand(0,100000)."_".$file->getClientOriginalname();
				}
				File::delete(public_path()."/upload/".$update->image);
				$update->image = $img;
                $file->move('upload/',$img);
                //endimage
                $update->title = $request->title;
                $update->link = $request->link;
                $update->describe = $request->editorSlide;
                if($request->status)
                {
                    $update->active_status = $request->status;
                }
                $update->update();
            }
            else
            {
                $id  = $request->idSlide; 
                $update = Slide::find($id);
                $update->title = $request->title;
                $update->link = $request->link;
                if($request->status)
                {
                    $update->active_status = $request->status;
                }
                $update->describe = $request->editorSlide;
                $update->active_status = $request->status;
                $update->update();

            } 
            
        }
        public function deleteSlide(Request $request)
        {
            $id = $request->id;
            $slide = Slide::find($id);
            $slide->delete_status = 0;
            $slide->save();
         
        }
    }
  

