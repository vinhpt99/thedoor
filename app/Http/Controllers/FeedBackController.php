<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FeedBack;

class FeedBackController extends Controller
{
    //
    public function getFeedback()
    {
        $feed_back = FeedBack::select('id', 'sender_name','email', 'content_fb', 'delete_status', 'created_at', 'updated_at')->orderBy('created_at','desc')->paginate(15);
        return view('admin.feed_back.list', compact('feed_back'));
    }
}
