<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Candidate;
use DB;

class CandidateController extends Controller
{
    //
    public function getCandidate()
    {   
        $candidate = DB::table('candidates')
        ->where('candidates.delete_status', 1)
        ->orderBy('created_at','desc')
        ->join('depts', 'candidates.dept_id', '=', 'depts.id')
        ->paginate(15);
        // $candidate = Candidate::select('id', 'name', 'email', 'project_name', 'introduce', 'dept_id', 'profile', 'delete_status','created_at', 'updated_at')->orderBy('created_at','desc')->orderBy('created_at','desc')->paginate(15);
        return view('admin.candidate.list', compact('candidate'));
    }
}
