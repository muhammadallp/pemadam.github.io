<?php 

namespace App\Controllers;
use App\Models\pelaporModel;
use \Dompdf\dompdf;






class pelapor extends BaseController
{
    
    protected $userModel;
    public function __construct()
    {
        $this->pelaporModel = new pelaporModel();

     
        $this->session = \Config\Services::session();
         //meload validation
         $this->validation = \Config\Services::validation();
    }
    
    public function index()
    {
        if(!$this->session->get('isLogin')){
            return redirect()->to('home');
        }

        if ($this->session->get('role')!=1) {
           return redirect()->to('/user');
        }

        // $keyword=$this->request->getVar('keyword');
        // if ($keyword) {
        //     $pelapor = $this->pelaporModel->search($keyword);
        // }else {
        //     $pelapor =$this->pelaporModel;
        // }

        // $currentpage =$this->request->getVar('page') ? $this->request->getVar('page') : 1;
       
        $model = new pelaporModel();
        // $user= $this->userModel->findAll();
        // $pelapor=$this->pelaporModel->paginate(1);
        $data =[
            'title' =>'Data Pelapor | PEMADAM',
            'kordinat' =>$model->getKordinat()->getResult(),
            'pelapor' =>$model->getpelapor()->getResult(),
            // 'pager'=>$this->pelaporModel->pager,
            // 'currentpage'=>$currentpage
        ];
        return view ('pelapor/index',$data);

    }

    public function edit($id)
    {
        if(!$this->session->get('isLogin')){
            return redirect()->to('home');
        }

        if ($this->session->get('role')!=1) {
           return redirect()->to('/user');
        }

        $data = array(
            'pemadam_id'        => $this->request->getPost('pemadam_id'),
            'status_lap'        => $this->request->getPost('status_lap'),
            // 'data_create'=>date('Y-m-d')
        );
        $this->pelaporModel->updatePelapor($data,$id);
        $this->pelaporModel->deleteKordinat($id);
 
       return redirect()->to('/pelapor');


    }

   

    
}