<?php 
namespace App\Models;

use CodeIgniter\Model;

class IdentitasModel extends Model{
    protected $table      = 'tbl_identitas';
    protected $primaryKey = "id_identitas ";
    protected $returnType = "object"; 
    protected $allowedFields = ['id_user', 'firstname', 'lastname', 'email', 'hp', 'tim', 'alamat', 'provinsi_id', 'kabupaten_id', 'kecamatan_id', 'desa_id', 'gambar', 'tgl_pbt_identitas'];
}