<?php

namespace App\Models;

use CodeIgniter\Model;

class PemadamModel extends Model
{
    protected $table = "tbl_pemadam";
    protected $primaryKey = "id";
    protected $allowedFields = ["nama", "alamat","latitude", "longitude","nohp","gambar","data_create"];
    protected $useTimestamps = false;
    


    public function search($keyword)
    {
           return $this->table('tbl_pemadam')->like('nama',$keyword)->orLike('alamat',$keyword); 
    }
}



