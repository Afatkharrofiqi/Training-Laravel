<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Category;
use App\Todo;
use Auth;
use PDF;
class TestController extends Controller
{
    public function index(){
        // return DB::table('todos')
        //     ->select('todos.id','todos.title','todos.description','category.name as nameCategory')
        //     ->join('category','todos.category_id','=','category.id')
        //     ->get();
        $data['todos'] = Todo::all();
        $pdf = PDF::loadView('test',$data);
        return $pdf->download('test.pdf');
        // return view('test', $data);
        // if(Auth::check()){
        //     return Auth::user()->level;
        // }else{
        //     return 'belum login';
        // }        
    }    
}
