<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class makananController extends Controller
{
    public function index(){
        $data['daftarMakanan'] = array('Sate','Soto','Bakso','Mie');
        return view('makanan', $data);
    }
}
