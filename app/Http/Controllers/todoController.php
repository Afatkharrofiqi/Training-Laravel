<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;
use App\Category;
use Datatables;
use Form;
class todoController extends Controller
{
    public function __construct(){
        $this->middleware('checkLogin');
    }

    public function index(){
        $data['todos'] = Todo::all();        
        return view('todo.index', $data);
    }

    public function create(){
        $data['categories'] = Category::pluck('name','id');
        return view('todo.create', $data);
    }

    public function store(Request $request){
        $this->rules($request);
        // add upload images
        $file       = $request->file('image');
        $nameFile   = $file->getClientOriginalName();
        $folder     = "images";
        $file->move($folder, $nameFile);
        $todo = new Todo();
        $todo->title        = $request->title;
        $todo->description  = $request->description;
        $todo->image        = $nameFile;        
        $todo->save();
        // $todo->create($request->all());
        return redirect('/todo')->with('message','Data Todo '.$todo->title.' telah ditambahkan');
    }    

    public function edit($id){
        $data = array(
            'categories' => Category::pluck('name', 'id'),
            'todo' => Todo::find($id)
        );
        return view('todo.edit', $data);
    }

    public function update($id, Request $request){        
        $this->rules($request);
        $fileName = $this->do_upload($request);
        if(!empty($fileName)){
            $this->image = $fileName;
        }
        $todo = Todo::find($id);
        $todo->title = $request->title;
        $todo->description = $request->description;
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

    public function json(){
        $todo = Todo::all();        
        return Datatables::of($todo)
        ->addColumn('image', function($todo){
            return '<img src="images/'.$todo->image.'" width="100px">';
        })
        ->addColumn('action', function($todo){
            $data = link_to('todo/'.$todo->id.'/edit','Edit',['class'=>'btn btn-info btn-sm']);
            $data .= Form::open(['url'=>'todo/'.$todo->id,'method'=>'delete']);
            $data .= Form::submit('Delete',['class'=>'btn btn-danger btn-sm','onclick'=>'confirm("Anda yakin ingin menghapus data '.$todo->title.'")']);
            $data .= Form::close();
            return $data;
        }) 
        ->rawColumns(['image','action'])
        ->make(true);        
    }

    public function do_upload(Request $request){
        $file           = $request->file('images');        
        if(!empty($file)){
            $namaFile       = $file->getClientOriginalName();
            $folder         = "images";
            // Do upload process
            $file->move($folder, $namaFile);
            return $namaFile;
        }
    }
}
