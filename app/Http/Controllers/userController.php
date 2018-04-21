<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class userController extends Controller
{
    private $data = array();
    
    public function index(){
        $this->data['list'] = array(
            array('user'=>'Achmad','email'=>'achmad@brainmatics.com','password'=>'password'),
            array('user'=>'Adit','email'=>'adit@brainmatics.com','password'=>'password'),
            array('user'=>'Bibi','email'=>'bibi@brainmatics.com','password'=>'bibi')
        );        
        return view('user.index', $this->data);
    }

    public function create(){
        return view('user.create');
    }

    public function store(Request $req){
        $req->validate([
            'name'      => 'required',
            'email'     => 'required',
            'password'  => 'required'
        ]);
        $data['list'] = array(
            array('user'=>$req->name,'email'=>$req->email,'password'=>$req->password)
        );
        
        return view('user.index', $this->data);
    }
}
