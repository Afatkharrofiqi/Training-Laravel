<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class categoryController extends Controller
{
    public function index(){
        $data['listCategory'] = array('Makanan','Minuman');
        return view('category.index',$data);
    }
    
    public function create(){
        return view('category.create');
    }

    public function store(Request $request){
        $request->validate([
            'category' => 'required|min:3'
        ]);
        return $request->category;
    }
}
