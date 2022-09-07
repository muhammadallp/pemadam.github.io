<?php

namespace App\Controllers;
use App\Models\PemadamModel;
use App\Models\KebakaranModel;
use App\Models\pelaporModel;
class Home extends BaseController
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
            'title' =>'Home | Pemadam',
            ];

        return view('home/index',$data);
    }

    // public function map()
    // {
    //     if($this->session->get('isLogin')){
    //         return redirect()->to('/admin');
    //     }
    //     $pemadam = $this->pemadamModel->findAll();
    //     $kebakaran = $this->kebakaranModel->findAll();
    //     $data =[
    //         'title'=> 'MAP | PEMADAM',
    //         'pemadam'=>$pemadam,
    //         'kebakaran'=>$kebakaran
    //     ];
    //     return view('home/map', $data);
    // }

    // public function proses_lapor()
    // {   
    //     $filegambar = $this->request->getFile('image');
    //     if ($filegambar->getError() == 4) {
    //         $namagambar = 'default.jpg';
    //     } else {
    //         $namagambar = $filegambar->getName();
    //         // $namagambar = $filegambar->getRandomName();
    //         $filegambar->move('assets/img/pelapor/', $namagambar);
    //     } 
    //     $lat =$this->request->getVar('latitude');
    //     $lng =$this->request->getVar('longitude');
    //     $pemadam_id=$this->request->getVar('pemadam_id');
    //     $model = new pelaporModel();
    //     //-------------------------Input data kordinat--------------------------
    //     $data_pelapor = array(
    //         'nama_pel' => $this->request->getPost('nama_pel'),
    //         'nohp_pel' => $this->request->getPost('nohp_pel'),
    //         'id_jenis'=>$this->request->getPost('id_jenis'),
    //         'status_lap'=>$this->request->getPost('status_lap'),
    //         'image'=>$namagambar,
    //         'pemadam_id'=>$pemadam_id,
    //         'data_create'=>date('Y-m-d')
               
    //                     );
    //      $model->tambah_pelapor($data_pelapor);
    //      $id_pelapor =$model->insertID(); 
    //     //-------------------------Input data pelapor------------------------------
    //     $data_kordinat = array(
    //         'lat_kor'=>$lat,
    //         'long_kor'=>$lng,
    //         'pelapor_id' => $id_pelapor,
            
    //         );
    //      $model->saveKordinat($data_kordinat);
    //     //  $id_order =$model->insertID();

    //     //  $pemadam = $this->pemadamModel->findAll();
    //     // $kebakaran = $this->kebakaranModel->findAll();
    //     // $data =[
    //     //     'title'=> 'MAP | PEMADAM',
    //     //     'pemadam'=>$pemadam,
    //     //     'kebakaran'=>$kebakaran
    //     // ];

    //     // return view('home/map',$data);
    //     session()->setFlashdata('pesan','<div class="alert alert-success" role="alert">
    //     Data Laporan Berhasil Di Proses!
    //   </div>');
    //     return redirect()->to('home/map');
    // }


}
