<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JoinTableController extends Controller
{
      public function index()
    {
        // $project = DB::table('project as p')
        //     ->join('lineitem_budget as l','l.lib_id','p.project_id')
        //     ->select('p.*', 'l.project_title', 'l.project_budget')
        //     ->get();
        //     dd($project);
        // return view('components/Project', compact('project'));
    }
}
