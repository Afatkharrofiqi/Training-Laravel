<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Hash;
class userController extends Controller
{
    private $data = array();
    
    public function index(){
        $data['users'] = DB::table('users')->get();        
        return view('user.index', $data);
    }

    public function create(){
        return view('user.create');
    }

    public function store(Request $request){                
        DB::table('users')->insert([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => Hash::make(Hash::make($request->password))
        ]);
        return redirect('user')->with('message','User berhasil ditambahkan');
    }    

    public function edit($id){
        $data['user'] = DB::table('users')->where('id',$id)->first();
        return view('user.edit', $data);
    }

    public function rules(Request $request){
        $request->validate([
            'name'      => 'required',
            'email'     => 'required',
            'password'  => 'required'
        ]);
    }

    public function update($id, Request $request){
        $this->rules($request);        
        if(!empty($request->password)){
            DB::table('users')->where('id',$id)->update([
                'name'      => $request->name,
                'email'     => $request->email,
                'password'  => Hash::make(Hash::make($request->password))
            ]);
        }else{
            DB::table('users')->where('id',$id)->update([
                'name'      => $request->name,
                'email'     => $request->email,               
            ]);
        }    
        return redirect('user')->with('message','User berhasil di edit');
    }

    public function destroy($id){
        $query  = DB::table('users')->where('id',$id);
        $user   = $query->get()->first();
        $query->delete();
        return redirect('user')->with('message','User dengan nama '.$user->name.' berhasil dihapus');
    }
}
