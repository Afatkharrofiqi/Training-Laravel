<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Datatables;
use Form;
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

    public function json(){
        $category = Category::all();
        return Datatables::of($category)
        ->addColumn('action', function($category){
            $data = link_to('category/'.$category->id.'/edit','Edit',['class'=>'btn btn-info btn-sm']);
            $data .= Form::open(['url'=>'category/'.$category->id,'method'=>'delete']);
            $data .= Form::submit('Delete',['class'=>'btn btn-danger btn-sm']);
            $data .= Form::close();
            return $data;
        })
        ->make(true);
    }
}
