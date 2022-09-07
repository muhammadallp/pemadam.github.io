<?php

namespace App\Models;

use CodeIgniter\Model;

class pelaporModel extends Model
{
    protected $table = "pelapor";
    protected $primaryKey = "id_pelapor";
    protected $allowedFields = ["nama_pel", "nohp_pel","id_jenis","pemadam_id","image","status_lap","data_created"];
    protected $useTimestamps = false;
    

    public function search($keyword)
    {
           return $this->table('pelapor')->like('data_Create',$keyword); 
    }

    public function tambah_pelapor($data)
	{
		return $this->db->table('pelapor')->insert($data);
        	
	}

    public function updatePelapor($data, $id)
    {   
        
        return $this->db->table('pelapor')->update($data, array('id_pelapor' => $id));
        
    }


    public function saveKordinat($data){
        return $this->db->table('kordinat')->insert($data);
        
    }

    public function deleteKordinat($id)
    {
        $query = $this->db->table('kordinat')->delete(array('id_kor' => $id));
        return $query;
    }


    public function getPelapor()
    {
        $builder = $this->db->table('pelapor');
        $builder->select('*');
        $builder->join('jns_kebakaran', 'id_kebakaran = id_jenis','left');
        $builder->join('tbl_pemadam', 'id = pemadam_id','left');
        return $builder->get();
        
    }

    public function getKordinat()
    {
        $builder = $this->db->table('kordinat');
        $builder->select('*');
        $builder->join('pelapor', 'id_pelapor = pelapor_id','left');
        // $builder->join('kordinat', 'id_kor = kor_id','left');
        return $builder->get();
        
    }


    

}


