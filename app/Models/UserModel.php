<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = "user";
    protected $primaryKey = "id";
    protected $allowedFields = ["nik", "password","nama","nohp","posisi", "role","salt","image","data_create"];
    protected $useTimestamps = false;
 
    
    public function search($keyword)
    {
           return $this->table('user')->like('nik',$keyword)->orLike('nama',$keyword); 
    }
}

