<?php 
namespace App\Models;

use CodeIgniter\Model;

class IdentitasModel extends Model{
    protected $table      = 'tbl_identitas';
    protected $primaryKey = "id_identitas";
    protected $returnType = "object"; 
    protected $allowedFields = ['id_users', 'firstname', 'lastname', 'email', 'hp', 'tim', 'alamat', 'provinsi_name', 'kabupaten_name', 'kecamatan_name', 'desa_name', 'gambar', 'tgl_pbt_identitas'];



    function joinAll()
    {
        $builder = $this->db->table('tbl_identitas');  
        $builder->join('tbl_user', 'tbl_user.id_users = tbl_identitas.id_users');   
        $query = $builder->get();

        return $query->getResult();
    }



    function join_where($a = null)
    {
        $builder = $this->db->table('tbl_identitas');  
        $builder->join('tbl_user', 'tbl_user.id_users = tbl_identitas.id_users');    
        $builder->where('id_identitas ', $a);

        $query = $builder->get();

        return $query->getResult();
    }
    

    function join_profil_a($a = null)
    {
        $builder = $this->db->table('tbl_identitas');  
        $builder->join('tbl_user', 'tbl_user.id_users = tbl_identitas.id_users');     

        $builder->where('tbl_identitas.id_users', $a);
        $query = $builder->get();

        return $query->getResult();
    }

    function join_where_spc($a, $b)
    {
        $builder = $this->db->table('tbl_identitas');  
        $builder->join('tbl_user', 'tbl_user.id_users = tbl_identitas.id_users');   
        $builder->where($a, $b);

        $query = $builder->get();

        return $query->getResult();
    }










}