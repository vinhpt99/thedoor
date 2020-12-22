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
        ->orderBy('candidates.created_at','desc')
        ->join('depts', 'candidates.dept_id', '=', 'depts.id')
        ->select('candidates.*', 'depts.dept_name')
        ->paginate(15);
        
        return view('admin.candidate.list', compact('candidate'));
    }
    public function deleteCandidateMultiple()
    {
        $checkboxArr = $_GET['checkboxArr'];
        foreach ($checkboxArr as $value){
            $candidate = Candidate::find($value);
            $candidate->delete_status = 0;
            $candidate->save();
        }
    }
}
