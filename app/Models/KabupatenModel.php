<?php 
namespace App\Models;

use CodeIgniter\Model;

class KabupatenModel extends Model{
    protected $table      = 'wilayah_kabupaten';
    protected $primaryKey = "id";
    protected $returnType = "object"; 
    protected $allowedFields = ['provinsi_id', 'nm_kabupaten'];
}