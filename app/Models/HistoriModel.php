<?php 
namespace App\Models;

use CodeIgniter\Model;

class HistoriModel extends Model{
    protected $table      = 'tbl_histori';
    protected $primaryKey = "id_histori";
    protected $returnType = "object"; 
    protected $allowedFields = ['booking_TOKEN', 'kode_unix','kode_transaksi','id_identitas','tgl_booking_lapangan', 'booking_lapangan', 'booking_start', 'booking_play', 'total_harga', 'booking_bukti', 'booking_status', 'tgl_pbt_histori'];
}