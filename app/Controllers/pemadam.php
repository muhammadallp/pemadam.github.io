<?php 


namespace App\Controllers;
use App\Models\PemadamModel;






class pemadam extends BaseController
{
    
 
    protected $pemadamModel;
    public function __construct()
    {
        $this->pemadamModel = new PemadamModel();
     
        $this->session = \Config\Services::session();
    }
    
    public function index()
    {

        if(!$this->session->get('isLogin')){
            return redirect()->to('home');
        }
        
        //cek role dari session
        if($this->session->get('role') != 1){
            return redirect()->to('/user');
        }
        $keyword=$this->request->getVar('keyword');
        if ($keyword) {
            $pemadam = $this->pemadamModel->search($keyword);
        }else {
            $pemadam =$this->pemadamModel;
        }

        $currentpage =$this->request->getVar('page') ? $this->request->getVar('page') : 1;
    
        // $pemadam = $this->pemadamModel->findAll();
        $data=[
            'title' =>'Data Pemadam | PEMADAM',
            'pemadam'=>$pemadam->paginate(1),
             'pager'=>$this->pemadamModel->pager,
            'currentpage'=>$currentpage
        ];       
        return view('pemadam/index',$data);
        
    }

    public function add(){

        if(!$this->session->get('isLogin')){
            return redirect()->to('home');
        }
        
        //cek role dari session
        if($this->session->get('role') != 1){
            return redirect()->to('/user');
        }
        $pemadam = $this->pemadamModel->findAll();
        $data=[
            'title' =>'Data Pemadam | PEMADAM',
            'pemadam'=>$pemadam
        ];       
        return view('pemadam/add',$data);

    }

    public function save()
    {
        $filegambar = $this->request->getFile('image');
        if ($filegambar->getError() == 4) {
            $namagambar = 'default.png';
        } else {
            $namagambar = $filegambar->getName();
            // $namagambar = $filegambar->getRandomName();
            $filegambar->move('assets/img/pemadam/', $namagambar);
        } 
        $lat =$this->request->getVar('latitude');
        $lng =$this->request->getVar('longitude');

       $this->pemadamModel->save([
           'nama' => $this->request->getVar('nama'),
           'alamat' => $this->request->getVar('alamat'),
           'nohp' => $this->request->getVar('nohp'),
           'latitude' => $lat,
           'longitude' => $lng,
           'data_create' => date('Y-m-d'),
           'gambar' => $namagambar,
        
       ]);

       session()->setFlashdata('pesan','<div class="alert alert-success" role="alert">
        Data Berhasil Di Tambahkan!
      </div>');
       return redirect()->to('pemadam');
    }


    public function delete($id)
    {
        if(!$this->session->get('isLogin')){
            return redirect()->to('home');
        }
        if($this->session->get('role') != 1){
            return redirect()->to('/user');
        }

        $pemadam=$this->pemadamModel->find($id);

        
            unlink('assets/img/pemadam/'.$pemadam['gambar']);
     
         $this->pemadamModel->delete($id);

        session()->setFlashdata('pesan','<div class="alert alert-success" role="alert">
        Data Berhasil Di Hapus!
      </div>');

        return redirect()->to('pemadam');
    }






}














?>