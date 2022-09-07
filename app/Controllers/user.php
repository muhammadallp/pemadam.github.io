<?php

namespace App\Controllers;
use App\Models\PemadamModel;
use App\Models\pelaporModel;
class user extends BaseController
{
    protected $pemadamModel;
    public function __construct()
    {

        $this->session = session();
         $this->pemadamModel = new PemadamModel();
         $this->pelapormodel = new pelaporModel();
        // $this->session = session()->get('isLogin');
        // $this->product_model = new Product_model();
        // $this->barangbekas_model = new barangbekas_model();
    }
    
    public function index() 
    {

        //cek apakah ada session bernama isLogin
        if(!$this->session->get('isLogin')){
            return redirect()->to('home');
        }
        
        // $model = new Product_model();
        $data=[
        'title' =>'Home | Pemadam',
        ];
        return view('user/index',$data);
    }

}