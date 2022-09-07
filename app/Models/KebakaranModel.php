<?php

namespace App\Models;

use CodeIgniter\Model;

class KebakaranModel extends Model
{
    protected $table = "jns_kebakaran";
    protected $primaryKey = "id_kebakaran";
    protected $allowedFields = ["nm_kebakaran", "deskripsi","data_create"];
    protected $useTimestamps = false;
    

    public function search($keyword)
    {
           return $this->table('jns_kebakaran')->like('nm_kebakaran',$keyword); 
    }
}


