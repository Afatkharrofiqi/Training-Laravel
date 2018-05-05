<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class categoryController extends Controller
{
    public function index(){
        $data['listCategory'] = Category::all();
        return view('category.index',$data);
    }
    
    public function create(){
        return view('category.create');
    }

    public function store(Request $request){
        $request->validate([
            'category' => 'required|min:3'
        ]);
        $category = new Category;
        $category->name = $request->category;
        $category->save();
        return redirect('/category');
    }
}
