<?php

namespace App\Controllers;
use App\Models\PemadamModel;
use App\Models\pelaporModel;
class map extends BaseController
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
        if(!$this->session->get('isLogin')){
            return redirect()->to('/admin');
        }
        $model= new pelaporModel();
        $pemadam = $this->pemadamModel->findAll();
        $data =[
            'title'=> 'Map | PEMADAM',
            // 'pelapor'=>$model->getKordinat()->getResult(),
            'kordinat'=>$model->getKordinat()->getResult(),
            'pemadam'=>$pemadam
        ];
        return view('user/map', $data);
        // return view('user/mapjs', $data);
    }
}