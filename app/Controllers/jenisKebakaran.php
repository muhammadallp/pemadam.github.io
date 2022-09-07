<?php 


namespace App\Controllers;
use App\Models\KebakaranModel;






class jenisKebakaran extends BaseController
{
    

    protected $kebakaranModel;
    public function __construct()
    {
        $this->kebakaranModel = new KebakaranModel();
     
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
            $kebakaran = $this->kebakaranModel->search($keyword);
        }else {
            $kebakaran =$this->kebakaranModel;
        }

        $currentpage =$this->request->getVar('page') ? $this->request->getVar('page') : 1;
    
        // $kebakaran=$this->kebakaranModel->findAll();
        $data=[
            'title' =>'Jenis Kebakaran | PEMADAM',
            'kebakaran'=>$kebakaran->paginate(5),
            'pager'=>$this->kebakaranModel->pager,
            'currentpage'=>$currentpage
        ];       
        return view('jeniskebakaran/index',$data);
        
    }

    public function save()
    {
        if(!$this->session->get('isLogin')){
            return redirect()->to('home');
        }
        if($this->session->get('role') != 1){
            return redirect()->to('/user');
        }

        $this->kebakaranModel->save([
            'nm_kebakaran' => $this->request->getVar('nm_kebakaran'),
            'deskripsi' => $this->request->getVar('deskripsi'),
            'data_create' => date('Y-m-d'),
         
        ]);

        session()->setFlashdata('pesan','<div class="alert alert-success" role="alert">
        Data Berhasil di tambahkan!
      </div>');
       return redirect()->to('jeniskebakaran');
    }


    public function edit($id){
        if(!$this->session->get('isLogin')){
            return redirect()->to('home');
        }
        if($this->session->get('role') != 1){
            return redirect()->to('/user');
        }

        $this->kebakaranModel->save([
            'id_kebakaran'=>$id,
            'nm_kebakaran' => $this->request->getVar('nm_kebakaran'),
            'deskripsi' => $this->request->getVar('deskripsi'),
            // 'data_create' => date('Y-m-d'),
         
        ]);

        session()->setFlashdata('pesan','<div class="alert alert-success" role="alert">
        Data Berhasil di Edit!
      </div>');
       return redirect()->to('jeniskebakaran');
    }






    public function delete($id)
    {
        if(!$this->session->get('isLogin')){
            return redirect()->to('home');
        }
        if($this->session->get('role') != 1){
            return redirect()->to('/user');
        }

         $this->kebakaranModel->delete($id);

        session()->setFlashdata('pesan','<div class="alert alert-success" role="alert">
        Data Berhasil Di Hapus!
      </div>');

        return redirect()->to('jeniskebakaran');
    }



}


?>