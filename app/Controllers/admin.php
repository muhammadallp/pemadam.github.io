<?php 

namespace App\Controllers;
use App\Models\UserModel;
use App\Models\PemadamModel;
use App\Models\Dashboard_model;






class admin extends BaseController
{
    
    protected $userModel;
    protected $pemadamModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->pemadamModel = new PemadamModel();
        $this->dashboard_model = new Dashboard_model();
     
        $this->session = \Config\Services::session();
         //meload validation
         $this->validation = \Config\Services::validation();
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
    

        $data=[
            'title' =>'Dashboard | Putti-Bordir',
            'total_pemadam' =>$this->dashboard_model->getCountpemadam(),
            'total_jeniskebakaran' =>$this->dashboard_model->getCountjeniskebakaran(),
            'total_pelapor'=>$this->dashboard_model->getCountPelapor(),
            'total_user' =>$this->dashboard_model->getCountUser(),

            'title' =>'Dashboard | PEMADAM'
        ];       
        return view('admin/index',$data);
        
    }

    
}
























?>