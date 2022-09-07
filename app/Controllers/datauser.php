<?php 

namespace App\Controllers;
use App\Models\UserModel;
use App\Models\PemadamModel;



class datauser extends BaseController
{
    
    protected $userModel;
    protected $pemadamModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->pemadamModel = new PemadamModel();

     
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

        $keyword=$this->request->getVar('keyword');
        if ($keyword) {
            $users = $this->userModel->search($keyword);
        }else {
            $users =$this->userModel;
        }

        $currentpage =$this->request->getVar('page') ? $this->request->getVar('page') : 1;
       
        // $user= $this->userModel->findAll();
        $user=$this->userModel->paginate(5);
        $data =[
            'title' =>'Data Users | pemadam',
            'user' =>$user,
            'pager'=>$this->userModel->pager,
            'currentpage'=>$currentpage,
            'pemadam' =>$this->pemadamModel->findAll(),
        ];
        return view ('datauser/index',$data);

    }

    public function delete($id)
    {
        if(!$this->session->get('isLogin')){
            return redirect()->to('home');
        }
        if($this->session->get('role') != 1){
            return redirect()->to('/user');
        }

         $this->userModel->delete($id);

        session()->setFlashdata('pesan','<div class="alert alert-success" role="alert">
        Data Berhasil Di Hapus!
      </div>');

        return redirect()->to('datauser');
    }

    public function register(){

        if(!$this->session->get('isLogin')){
            return redirect()->to('home');
        }
        if ($this->session->get('role')!=1) {
            return redirect()->to('/user');
        }

        $data=[
            'title'=>'Register | PEMADAM'
        ];
        //menampilkan halaman register
        return view('auth/register',$data);

    } 
    public function valid_register()
    {
        //tangkap data dari form 
        $data = $this->request->getPost();
        
        //jalankan validasi
        $this->validation->run($data, 'register');
        
        //cek errornya
        $errors = $this->validation->getErrors();
        
        //jika ada error kembalikan ke halaman register
        if($errors){
            session()->setFlashdata('error', $errors);
            return redirect()->to('datauser/index');
        }
        
        //jika tdk ada error 
        
        //buat salt
        $salt = uniqid('', true);
        
        //hash password digabung dengan salt
        $password = md5($data['password']).$salt;
        // $password = password_hash($data['password'].$salt);
        
        //masukan data ke database
        $this->userModel->save([
            'nik' => htmlspecialchars( $data['nik']),
            'password' => $password,
            'nama' => htmlspecialchars( $data['nama']),
            'nohp' => htmlspecialchars( $data['nohp']),
            'role' => 2,
            'salt' => $salt,
            'posisi'=>htmlspecialchars( $data['posisi']),
            'image'=>'default.png',
            'data_create'=>date('Y-m-d')

            ]);
        
        //arahkan ke halaman login
        session()->setFlashdata('pesan', '<div class="alert alert-success" role="alert">
       Data Berhasil Di Tambahkan!
      </div>');
        return redirect()->to('datauser');
    }

}

