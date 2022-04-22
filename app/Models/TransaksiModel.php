<?php 
namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model{
    protected $table      = 'tbl_transaksi';
    protected $primaryKey = "id_transaksi";
    protected $returnType = "object"; 
    protected $allowedFields = ['kode_transaksi','id_identitas','tgl_booking_lapangan', 'booking_lapangan', 'booking_start', 'booking_play', 'total_harga', 'booking_status', 'tgl_pbt_transaksi'];


     function where3($a = null, $b = null, $c = null)
    { 
        $builder = $this->db->table('tbl_transaksi');   
        //$builder->selectCount($count);
        $builder->where('tgl_booking_lapangan', $a);
        $builder->where('booking_lapangan', $b);
        $builder->where('booking_start', $c); 
        $query = $builder->get();

        return $query->getResult();
    }
 

     function join_where($a = null, $b = null)
    {
        $builder = $this->db->table('tbl_transaksi');
        $builder->join('tbl_identitas', 'tbl_identitas.id_identitas  = tbl_transaksi.id_identitas');  
        
        $builder->where('tgl_booking_lapangan', $a);
        $builder->where('booking_lapangan', $b); 
        $query = $builder->get();

        return $query->getResult();
    }



}