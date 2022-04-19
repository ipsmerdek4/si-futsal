<?php 
namespace App\Models;

use CodeIgniter\Model;

class HargaModel extends Model{
    protected $table      = 'tbl_harga';
    protected $primaryKey = "id_harga";
    protected $returnType = "object"; 
    protected $allowedFields = ['booking_time', 'harga', 'tgl_pbt_harga'];
}