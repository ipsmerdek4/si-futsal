<?php 
namespace App\Models;

use CodeIgniter\Model;

class HistoriModel extends Model{
    protected $table      = 'tbl_histori';
    protected $primaryKey = "id_histori";
    protected $returnType = "object"; 
    protected $allowedFields = ['new_total_harga','booking_bukti_update', 'booking_TOKEN', 'kode_unix','kode_transaksi','id_identitas','tgl_booking_lapangan', 'booking_lapangan', 'booking_start', 'booking_play', 'total_harga', 'booking_bukti', 'booking_status', 'tgl_pbt_histori'];


    function count_histori()
    { 
        $builder = $this->db->table('tbl_histori');    
        $builder->selectCount('id_histori ');
        $builder->where('booking_status', 1);
        $builder->orWhere('booking_status', 2);

        $query = $builder->get();

        return $query->getResult();
    }

    function limit_histori()
    { 
        $builder = $this->db->table('tbl_histori');    
        $builder->limit(5); 
        $builder->where('booking_status', 1);
        $builder->orWhere('booking_status', 2);
        $builder->orderBy('id_histori', 'DESC');

        $query = $builder->get();

        return $query->getResult();
    }

    function join_where($a = null)
    {
        $builder = $this->db->table('tbl_histori');
        $builder->join('tbl_identitas', 'tbl_identitas.id_identitas  = tbl_histori.id_identitas');  
        $builder->where('tgl_booking_lapangan', $a);
        $builder->orderBy('id_histori', 'DESC');
        $query = $builder->get();

        return $query->getResult();
    }
    
  

}