<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;

class todoController extends Controller
{
    public function index(){
        $data['todos'] = Todo::all();        
        return view('todo.index', $data);
    }

    public function create(){
        return view('todo.create');
    }

    public function store(Request $request){                
        $this->rules($request);
        $todo = new Todo();
        $todo->create($request->all());
        return redirect('/todo')->with('message','Data Todo '.$todo->title.' telah ditambahkan');
    }    

    public function edit($id){
        $data['todo'] = Todo::find($id);
        return view('todo.edit', $data);
    }

    public function update($id, Request $req){        
        $this->rules($request);
        $todo = Todo::find($id);
        $todo->create($request->all());
        // if doesnt have a changes do update
        if($todo->isDirty()){
            $todo->update();
        }
        return redirect('/todo')->with('message','Data Todo '.$todo->title.' berhasil diedit');
    }
    
    public function destroy($id){
        $todo = Todo::find($id);
        $todo->delete();
        return redirect('/todo')->with('message','Data Todo '.$todo->title.' telah dihapus');
    }

    private function rules(Request $request){
        $request->validate([
            'title' => 'required|min:5',
            'description' => 'required'
        ]);
    }
}
