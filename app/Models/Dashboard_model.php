<?php namespace App\Models;
use CodeIgniter\Model;
 
class Dashboard_model extends Model
{
    protected $table = 'pelapor';

    // hitung total data pada pemadam
    public function getCountpemadam()
    {
        return $this->db->table("tbl_pemadam")->countAll();
    }

    // hitung total data pada Jeniskebakaran
    public function getCountjeniskebakaran()
    {
        return $this->db->table("jns_kebakaran")->countAll();
    }

    // hitung total data pada pelapor
    public function getCountPelapor()
    {
        return $this->db->table("pelapor")->countAll();
    }

    // hitung total data pada user
    public function getCountUser()
    {
        return $this->db->table("user")->countAll();
    }


}