<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class todoController extends Controller
{
    public function index(){
        $data['todos'] = array('Pergi Sekolah','Kerjakan PR','Tidur Malam');
        return view('todo.index', $data);
    }

    public function create(){
        return view('todo.create');
    }

    public function store(Request $request){
        $request->validate([
            'title' => 'required|min:5',
            'description' => 'required'
        ]);
        return $request->all();
    }
}
