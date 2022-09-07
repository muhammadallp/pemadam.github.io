<?php

namespace App\Controllers;
use App\Models\PemadamModel;
use App\Models\KebakaranModel;
use App\Models\pelaporModel;
class poskopemadam extends BaseController
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
        if(!$this->session->get('isLogin')){
            return redirect()->to('home');
        }

        if ($this->session->get('role')!=1) {
           return redirect()->to('/user');
        }
        $pemadam = $this->pemadamModel->findAll();
        $kebakaran = $this->kebakaranModel->findAll();
        $data =[
            'title'=> 'Lokasi Posko Pemadam | PEMADAM',
            'pemadam'=>$pemadam,
            'kebakaran'=>$kebakaran
        ];
        return view('admin/lokasiposko', $data);
    }

}
