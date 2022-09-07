<?php 

namespace App\Controllers;
use App\Models\pelaporModel;
use \Dompdf\dompdf;






class laporan extends BaseController
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

        $model = new pelaporModel();
        // $user= $this->userModel->findAll();
        // $pelapor=$this->pelaporModel->paginate(1);
        $data =[
            'title' =>'Laporan Pelapor | PEMADAM',
            'pelapor' =>$model->getpelapor()->getResult(),
            'kordinat' =>$model->getKordinat()->getResult(),
            // 'pager'=>$this->pelaporModel->pager,
            // 'currentpage'=>$currentpage
        ];
        return view ('laporan/index',$data);

    }
    public function printpdf(){
        $dompdf=new Dompdf();
        

        if(!$this->session->get('isLogin')){
            return redirect()->to('/admin');
        }
        if($this->session->get('role') != 1){
            return redirect()->to('/user');
        }

        $model = new pelaporModel();
        $data=[
        'title' =>'Print PDF| PEMADAM',
        'pelapor' =>$model->getpelapor()->getResult(),
        'kordinat' =>$model->getKordinat()->getResult(),
        ];
        $html= view('pelapor/printpdf',$data);
        $dompdf->loadhtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->set_option('isRemoteEnabled', true);
        $dompdf->render();
        $dompdf->stream('Laporan Kebakaran.pdf', array(
            "Attachment" =>false
        ));

    }


    
}