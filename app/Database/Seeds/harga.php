<?php 
namespace App\Database\Seeds;

class Harga extends \CodeIgniter\Database\Seeder{
    public function run(){
        $data =  [
            [
                'booking_time'  => '1',
                'harga'         =>  150000,
                'tgl_pbt_harga' =>  date("Y-m-d H:i:s")
            ],
            [
                'booking_time'  => '2',
                'harga'         =>  200000,
                'tgl_pbt_harga' =>  date("Y-m-d H:i:s")
            ]
        ];

        $this->db->table('tbl_harga')->insertBatch($data);
    }
}