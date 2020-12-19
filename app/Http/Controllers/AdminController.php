<?php

namespace App\Http\Controllers;
use App\Models\Blog;
use App\Models\Service;
use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function getIndex()
    {   
        $data = [];
        $blog_count = Blog::where('delete_status', 1)->get()->count();
        $service_count =  Service::where('delete_status', 1)->get()->count();
        $user_count =  User::where('delete_status', 1)->get()->count();
        $product_count = Product::where('delete_status', 1)->get()->count();
        $data['blog_count'] = $blog_count;
        $data['service_count'] =  $service_count;
        $data['user_count'] = $user_count;
        $data['product_count'] =  $product_count;
        return view('admin.index', $data);
    }

}
