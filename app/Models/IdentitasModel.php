<?php 
namespace App\Models;

use CodeIgniter\Model;

class IdentitasModel extends Model{
    protected $table      = 'tbl_identitas';
    protected $primaryKey = "id_identitas";
    protected $returnType = "object"; 
    protected $allowedFields = ['id_users', 'firstname', 'lastname', 'email', 'hp', 'tim', 'alamat', 'provinsi_id', 'kabupaten_id', 'kecamatan_id', 'desa_id', 'gambar', 'tgl_pbt_identitas'];



    function joinAll()
    {
        $builder = $this->db->table('tbl_identitas');  
        $builder->join('tbl_user', 'tbl_user.id_users = tbl_identitas.id_users');  
        $builder->join('wilayah_provinsi', 'wilayah_provinsi.id = tbl_identitas.provinsi_id');  
        $builder->join('wilayah_kabupaten', 'wilayah_kabupaten.id = tbl_identitas.kabupaten_id');  
        $builder->join('wilayah_kecamatan', 'wilayah_kecamatan.id = tbl_identitas.kecamatan_id'); 
        $builder->join('wilayah_desa', 'wilayah_desa.id = tbl_identitas.desa_id');  
        $query = $builder->get();

        return $query->getResult();
    }



    function join_where($a = null)
    {
        $builder = $this->db->table('tbl_identitas');  
        $builder->join('tbl_user', 'tbl_user.id_users = tbl_identitas.id_users');  
        $builder->join('wilayah_provinsi', 'wilayah_provinsi.id = tbl_identitas.provinsi_id');  
        $builder->join('wilayah_kabupaten', 'wilayah_kabupaten.id = tbl_identitas.kabupaten_id');  
        $builder->join('wilayah_kecamatan', 'wilayah_kecamatan.id = tbl_identitas.kecamatan_id'); 
        $builder->join('wilayah_desa', 'wilayah_desa.id = tbl_identitas.desa_id');  
        $builder->where('id_identitas ', $a);

        $query = $builder->get();

        return $query->getResult();
    }
    

    function join_profil_a($a = null)
    {
        $builder = $this->db->table('tbl_identitas');  
        $builder->join('tbl_user', 'tbl_user.id_users = tbl_identitas.id_users');  
        $builder->join('wilayah_provinsi', 'wilayah_provinsi.id = tbl_identitas.provinsi_id');  
        $builder->join('wilayah_kabupaten', 'wilayah_kabupaten.id = tbl_identitas.kabupaten_id');  
        $builder->join('wilayah_kecamatan', 'wilayah_kecamatan.id = tbl_identitas.kecamatan_id'); 
        $builder->join('wilayah_desa', 'wilayah_desa.id = tbl_identitas.desa_id');  

        $builder->where('tbl_identitas.id_users', $a);
        $query = $builder->get();

        return $query->getResult();
    }

    function join_where_spc($a, $b)
    {
        $builder = $this->db->table('tbl_identitas');  
        $builder->join('tbl_user', 'tbl_user.id_users = tbl_identitas.id_users');  
        $builder->join('wilayah_provinsi', 'wilayah_provinsi.id = tbl_identitas.provinsi_id');  
        $builder->join('wilayah_kabupaten', 'wilayah_kabupaten.id = tbl_identitas.kabupaten_id');  
        $builder->join('wilayah_kecamatan', 'wilayah_kecamatan.id = tbl_identitas.kecamatan_id'); 
        $builder->join('wilayah_desa', 'wilayah_desa.id = tbl_identitas.desa_id');  
        $builder->where($a, $b);

        $query = $builder->get();

        return $query->getResult();
    }










}