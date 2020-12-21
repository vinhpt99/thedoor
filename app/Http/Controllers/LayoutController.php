<?php

namespace App\Http\Controllers;
use App\Models\Layout;
use Illuminate\Http\Request;
use File;
class LayoutController extends Controller
{
    public function getLayout()
    {
        $layouts = Layout::select('id', 'offset', 'link')->where('delete_status',1)->orderBy('created_at', 'desc')->get();
        return view('admin.layout.list', compact('layouts'));
    }
    public function getAddLayout()
    {
        return view('admin.layout.create');
    }
    public function postAddLayout(Request $request)
    {
        $validatedData = $request->validate([
            'image' => 'required|mimes:jpg,jpeg,png|max:2048',
        ],[
            'image.required'=>'Trường ảnh không được để trống',
            'image.mimes'=>'ảnh tải lên không đúng định dạng',
            'image.max'=>'Dung lượng ảnh quá lớn',
        ]);
        $layout = new Layout;
        if ($request->hasFile('image')) 
        {
          $file=$request->file('image');
          $img=rand(0,100000)."_".$file->getClientOriginalname();
            while ( file_exists("uplaod/".$img)){
              $img=rand(0,100000)."_".$file->getClientOriginalname();
            }           
        $layout->link = $img;
        $file->move('upload/',$img);       
          }
        $layout->offset = $request->offset;
        $layout->save();
        return redirect('/admin/layout')->with('success', 'Thêm thành công !');
    }
    public function editLayout(Request $request)
    {
        $id = $request->id;
        $layout = Layout::where('id', $id)->first();
        $output = "";
        if ($layout['offset'] ==  2) {
           $output .= '<option value="2">Our Story</option>
                    <option value="3">Clients</option>
                    <option value="4">What Are You Doing</option>
                    <option value="5">Human</option>
                    <option value="6">Article</option>
                    <option value="7">Contact</option>
                    <option value="8">Footer</option>';
         }
         if ($layout['offset'] ==  3) {
            $output .= '<option value="3">Clients</option>
                     <option value="2">Our Story</option>
                     <option value="4">What Are You Doing</option>
                     <option value="5">Human</option>
                     <option value="6">Article</option>
                     <option value="7">Contact</option>
                     <option value="8">Footer</option>';
          }
          if ($layout['offset'] ==  4) {
            $output .= '<option value="4">What Are You Doing</option>
                     <option value="2">Our Story</option>
                     <option value="3">Clients</option>
                     <option value="5">Human</option>
                     <option value="6">Article</option>
                     <option value="7">Contact</option>
                     <option value="8">Footer</option>';
          }
          if ($layout['offset'] ==  5) {
            $output .= '<option value="5">Human</option>
                     <option value="2">Our Story</option>
                     <option value="3">Clients</option>
                     <option value="4">What Are You Doing</option>
                     <option value="6">Article</option>
                     <option value="7">Contact</option>
                     <option value="8">Footer</option>';
          }
          if ($layout['offset'] ==  6) {
            $output .= ' <option value="6">Article</option>
                     <option value="5">Human</option>
                     <option value="2">Our Story</option>
                     <option value="3">Clients</option>
                     <option value="4">What Are You Doing</option>
                     <option value="7">Contact</option>
                     <option value="8">Footer</option>';
          }
          if ($layout['offset'] ==  7) {
            $output .= '<option value="7">Contact</option>
                    <option value="5">Human</option>
                    <option value="6">Article</option>
                     <option value="2">Our Story</option>
                     <option value="3">Clients</option>
                     <option value="4">What Are You Doing</option>
                     <option value="8">Footer</option>';
          }
          if ($layout['offset'] ==  8) {
            $output .= '  <option value="8">Footer</option>
                    <option value="5">Human</option>
                    <option value="6">Contact</option>  
                     <option value="2">Our Story</option>
                     <option value="3">Clients</option>
                     <option value="4">What Are You Doing</option>
                     <option value="7">Contact</option>';
          }
        
         $data = [];
         $data['layout'] =  $layout;
         $data['output'] =  $output;
        return response()->json(['error' => false, 'data' => $data], 200);
    }
    public function posteditLayout(Request $request)
    { 
      $id = $request->idLayout;
      if ($request->hasFile('image')) 
      {
        $layout = Layout::find($id);
        $file=$request->file('image');
        $img=rand(0,100000)."_".$file->getClientOriginalname();
          while ( file_exists("uplaod/".$img)){
            $img=rand(0,100000)."_".$file->getClientOriginalname();
          }
           File::delete(public_path()."/upload/".$layout->link);
                $layout->link = $img;
                $file->move('upload/',$img);
                $layout->offset = $request->offset;
                $layout->update();
        }
            else
            {
                $layout = Layout::find($id);
                $layout->offset = $request->offset;
                $layout->update();

            } 

            return response()->json(['error' => false, 'data' => $layout], 200);
    }
    public function deleteLayout(Request $request)
    { 
      $id = $request->id;
      $layout = Layout::find($id);
      $layout->delete_status = 0;
      $layout->save();

    }
}
