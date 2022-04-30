<?php 
namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model{
    protected $table      = 'tbl_user';
    protected $primaryKey = "id_users";
    protected $returnType = "object"; 
    protected $allowedFields = ['id_users','username_users', 'password_users', 'level_users', 'tgl_pbt_users'];


    function getcountall($count = null)
    { 
        $builder = $this->db->table('tbl_user');   
        $builder->selectCount($count); 
        $query = $builder->get();

        return $query->getResult();
    }


    
















}