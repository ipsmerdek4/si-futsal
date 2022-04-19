<?php 
namespace App\Models;

use CodeIgniter\Model;

class DesaModel extends Model{
    protected $table      = 'wilayah_desa';
    protected $primaryKey = "id";
    protected $returnType = "object"; 
    protected $allowedFields = ['kecamatan_id', 'nm_desa'];

}