<?php

namespace App\Controllers;
use App\Models\PemadamModel;
use App\Models\KebakaranModel;
use App\Models\pelaporModel;
class Contact extends BaseController
{ 
    public function __construct()
    {
   
        //membuat user model untuk konek ke database 
        $this->pemadamModel = new PemadamModel();
        $this->kebakaranModel = new KebakaranModel();
        $this->pelaporModel = new pelaporModel();
        //meload session
        $this->session = \Config\Services::session();
        
    }
    public function index()
    {
        if($this->session->get('isLogin')){
            return redirect()->to('/admin');
        }
        $data=[
            'title' =>'Contact | Pemadam',
            ];

        return view('home/contact',$data);
    }



}
