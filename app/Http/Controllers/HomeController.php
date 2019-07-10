<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Registries;
use App\UACS;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
        return view('home');
    }

function fetch_data(Request $request)
    {
     if($request->ajax())
             {
              if($request->from_date != '' && $request->to_date != '')
              {
               $data = DB::table('registry')
                 ->whereBetween('reg_date', array($request->from_date, $request->to_date))
                 ->get();
              }
              else
              {
                    $data = DB::table('registry')->orderBy('reg_date', 'desc')->get();
              }
            echo json_encode($data);
     }
    }

}
